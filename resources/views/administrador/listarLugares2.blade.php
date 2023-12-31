@extends('layouts.app')

@section('title', 'Lista de lugares')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Lista de Lugares 2') }}</div>
				<div class="card-body">
					@if(Session::has('messageNO'))
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<a href="{{route('combi19.modificarRuta', session('ruta'))}}" class="alert-link">{{Session::get('messageNO')}}</a>
						</div>
					@elseif(Session::has('messageSI'))
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							{{Session::get('messageSI')}}
						</div>
					@endif
					<table class="table table-bordered">
<<<<<<< HEAD
						@if($lugares[0] !== null)
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($lugares as $lugar)
								<tr>
									<td>{{$lugar->nombre}}</td>
									<td>
										<button type="button" data-toggle="modal" data-target="#exampleModal{{$lugar->id}}"><i class="material-icons">&#xE254;</i></button>
										<form action="{{route('combi19.eliminarLugar', $lugar)}}" class="formulario-eliminar" method="POST">
											@csrf
											@method('delete')
											<button class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></button>
										</form>
									</td>
								</tr>
=======
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($lugares as $lugar)
							<tr>
								<td>{{$lugar->nombre}}</td>
								<td>
									<button type="button" data-toggle="modal" data-target="#exampleModal{{$lugar->id}}"><i class="material-icons">&#xE254;</i></button>
									<form action="{{route('combi19.eliminarLugar', $lugar)}}" method="POST">
										@csrf
										@method('delete')
										<button class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></button>
									</form>
								</td>

							</tr>
>>>>>>> a08901bc91ead727633a1225cfd917aa2217aaa6

								<!-- Modal -->
								<div class="modal fade" id="exampleModal{{$lugar->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Actualizar lugar</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">

								        <form action="{{route('combi19.updateLugar', $lugar)}}" method="POST">
											@csrf
											@method('PUT')
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-md-right">Nombre:</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="nombre" value="{{$lugar->nombre}}">
													@error('nombre')
														<small>{{$message}}</small>
													@enderror
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit"class="btn btn-primary">
													{{ __('Actualizar') }}
												</button>
												<button type="button"class="btn btn-secondary" data-dismiss="modal">
													{{ __('Cancelar cambios') }}
												</button>
											</div>
										</form>
								      </div>
								    </div>
								  </div>
								</div>
							@endforeach
						</tbody>
					@else
						<h1>No hay lugares activos</h1>
					@endif
				</table>

				<!-- Modal -->
				<div class="modal fade" id="altaLugarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="altaLugarModalLabel">Alta lugar</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<form action="{{route('combi19.storeLugar')}}" method="POST">
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
							<div class="form-group row mb-0">
								<div class="col-md-8 offset-md-4">
									<button type="submit"class="btn btn-primary">
										{{ __('Cargar') }}
									</button>
									<button type="button"class="btn btn-secondary" data-dismiss="modal">
										{{ __('Cancelar') }}
									</button>
								</div>
							</div>
						</form>
				      </div>
				    </div>
				  </div>
				</div>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#altaLugarModal">Alta lugar</button>
					{{$lugares->links()}}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
