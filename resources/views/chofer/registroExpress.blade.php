@extends('layouts.app')

@section('title', 'Registro pasajero express')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Registro pasajero express') }}</div>
				<div class="card-body">
					<form action="{{route('combi19.storeExpress', [$viaje])}}" method="POST">
						@csrf
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">Nombre:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
								@error('nombre')
								<small>{{$message}}</small>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">Apellido:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="apellido" value="{{old('apellido')}}">
								@error('apellido')
								<small>{{$message}}</small>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">DNI:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="dni" value="{{old('dni')}}">
								@error('dni')
								<small>{{$message}}</small>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">Email:</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{old('email')}}">
								@error('email')
								<small>{{$message}}</small>
								@enderror
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-md-8 offset-md-4">
								<button type="submit"class="btn btn-primary">
									{{ __('Registrar') }}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
