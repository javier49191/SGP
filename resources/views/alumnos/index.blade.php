@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<b>Alumnos</b>
					<a href="{{ route('alumnos.create') }}" class="btn btn-success float-right">
						Registrar alumno
					</a>
				</div>

				<div class="card-body table-responsive">
					<table id="alumnos" class="table table-bordered table-hover" style="width:100%">
						<thead>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Alias</th>
							<th>DNI</th>
							<th>Vinculado</th>
						</thead>
						<tbody>
							@forelse($alumnos as $alumno)
							<tr>
								<td>{{$alumno->nombre}}</td>
								<td>{{$alumno->apellido}}</td>
								<td>{{$alumno->alias}}</td>
								<td>{{$alumno->dni}}</td>
								<td class="text-center">
									@if ($vinculacion->firstWhere('alumno_id', $alumno->id))
										<span class="badge badge-pill badge-success">Si</span>
									@else
										<span class="badge badge-pill badge-danger">No</span>
									@endif
								</td>
							</tr>
							@empty
							<tr>
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

<script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
	$(document).ready( function () {
		$('#alumnos').DataTable({
			"lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],

			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
			}
		});
	} );
</script>
@endsection