@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<b>Estados Financieros</b>
					{{-- <a href="{{ route('alumnos.create') }}" class="btn btn-success float-right">
						Registrar alumno
					</a> --}}
				</div>

				<div class="card-body table-responsive">
					<table id="estados" class="table table-bordered table-hover" style="width:100%">
						<thead>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Alias</th>
							<th>Cuotas pagas</th>
							<th>Cuotas pendientes</th>
							<th>Monto Total</th>
							<th class="text-center">Estado</th>
						</thead>
						<tbody>
							@forelse($padrinos as $padrino)
							<tr>
								<td>{{$padrino->nombre}}</td>
								<td>{{$padrino->apellido}}</td>
								<td>{{$padrino->alias}}</td>
								<td class="text-center">{{$padrino->pagos->count()}}</td>
								<td class="text-center">{{12 - $padrino->pagos->count()}}</td>
								<td class="text-center">{{$padrino->pagos->pluck('monto_pago')->sum()}}</td>
								<td class="text-center">
									@if (12 - $padrino->pagos->count() > 8)
										<span class="badge badge-pill badge-danger">moroso</span>
									@elseif(12 - $padrino->pagos->count() > 4)
										<span class="badge badge-pill badge-warning">Atrasado</span>
									@else
										<span class="badge badge-pill badge-success">regular</span>
									@endif
								</td>
							</tr>
							@empty
							<tr>
								<td class="alert alert-danger">No hay registros</td>
								<td class="alert alert-danger">No hay registros</td>
								<td class="alert alert-danger">No hay registros</td>
								<td class="alert alert-danger">No hay registros</td>
								<td class="alert alert-danger">No hay registros</td>
								<td class="alert alert-danger">No hay registros</td>
								<td class="alert alert-danger">No hay registros</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
	@if (Session::has('info'))
	toastr.options = {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": true,
		"positionClass": "toast-top-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "100",
		"hideDuration": "1000",
		"timeOut": "3000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "slideUp"
	}
	toastr.success("{{Session::get('info')}}");

	@endif
</script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
	$(document).ready( function () {
		$('#estados').DataTable({
			"lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],

			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
			}
		});
	} );
</script>
@endsection