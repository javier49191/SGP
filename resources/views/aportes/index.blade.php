@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<b>Aportes</b>
					<a href="{{ route('aportes.create') }}" class="btn btn-success float-right">
						Registrar aporte
					</a>
				</div>

				<div class="card-body table-responsive">
					<table id="pagos" class="table table-bordered table-hover" style="width:100%">
						<thead>
							<th>Padrino</th>
							<th>Monto</th>
							<th>Fecha de pago</th>
							<th>Pago ingresado</th>
							<th>Usuario</th>

						</thead>
						<tbody>
							@forelse($pagos as $pago)
							<tr>
								<td>{{$pago->padrino->nombre}}</td>
								<td>{{$pago->monto_pago}}</td>
								<td>{{$pago->fecha_pago->format('d-m-Y')}}</td>
								<td>{{$pago->created_at->format('d-m-Y')}}</td>
								<td>{{$pago->user->name}}</td>
							</tr>
							@empty
							<tr>
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
		$('#pagos').DataTable({
			"lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],

			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
			}
		});
	} );
</script>
@endsection