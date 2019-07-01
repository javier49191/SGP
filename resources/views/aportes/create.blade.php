@extends('layouts.app')

@section('content')
<div class="container">

	<div class="card">
		<h5 class="card-header">Registrar Aporte</h5>
		<div class="card-body">

			<form action="{{ route('aportes.store') }}" method="POST">
				@csrf
				<div class="row">
					<div class="col-md-12">
						<label for="padrino_id">Buscar Padrinos</label>
						<select class="custom-select {{$errors->has('padrino_id') ? 'is-invalid' : ''}}" name="padrino_id">
							<option selected disabled>Seleccionar...</option>
							@forelse($padrinos as $padrino)
								<option value="{{$padrino->id}}">{{$padrino->nombre}}</option>
							@empty
								<option>No existen registros</option>
							@endforelse
						</select>
						@error('padrino_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
{{-- ############################################### --}}
				<div class="row mt-3">
					<div class="col-md-4">
						<label for="tipo_pago_id">Medio de pago</label>
						<select class="custom-select {{$errors->has('tipo_pago_id') ? 'is-invalid' : ''}}" name="tipo_pago_id">
							<option selected value>Seleccionar...</option>
							@forelse($tipos as $tipo)
								<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
							@empty
								<option>No existen registros</option>
							@endforelse
						</select>
						@error('tipo_pago_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					<div class="col-md-4">
						<label for="monto_pago">Monto</label>
						<input type="text" class="form-control {{$errors->has('monto_pago') ? 'is-invalid' : ''}}" name="monto_pago" value="{{ old('monto_pago') }}">

						@error('monto_pago')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					<div class="col-md-4">
						<label for="fecha_pago">Fecha del pago</label>
						<input type="date" class="form-control {{$errors->has('fecha_pago') ? 'is-invalid' : ''}}" name="fecha_pago" value="{{ old('fecha_pago') }}">

						@error('fecha_pago')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
{{-- ############################################### --}}
				<div class="row mt-3">
					<div class="col-md-4">
						<label for="factura">Factura</label>
						<input type="text" class="form-control {{$errors->has('factura') ? 'is-invalid' : ''}}" name="factura" value="{{ old('factura') }}">

						@error('factura')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					<div class="col-md-4">
						<label for="comprobante">Comprobante</label>
						<input type="text" class="form-control {{$errors->has('comprobante') ? 'is-invalid' : ''}}" name="comprobante" value="{{ old('comprobante') }}">

						@error('comprobante')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					<div class="col-md-4">
						<label for="descripcion">Descripción</label>
						<input type="text" class="form-control {{$errors->has('descripcion') ? 'is-invalid' : ''}}" name="descripcion" value="{{ old('descripcion') }}">

						@error('descripcion')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
{{-- ############################################### --}}

				<button type="submit" class="btn btn-primary mt-3">Guardar</button>

			</form>
		</div>
	</div>

</div>

@endsection
