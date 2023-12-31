@extends('layouts.app')

@section('title', 'Buscar viajes')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Buscar Viaje') }}</div>

                <div class="card-body">
                    @if(Session::has('viajeCargado'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{Session::get('viajeCargado')}} <a href="{{route('combi19.listarInsumosViaje', [$viaje->id, $comprador->id])}}">Agregar insumos al carrito</a>
                        </div>
                    @else
                        @if(Session::has('suspendidoCovid')) 
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{Session::get('suspendidoCovid')}}
                            </div>
                        @endif
                    @endif
                    <form method="POST" action="{{route('buscarViajeConDatos')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="col-form-label text-md-right">Ciudad Origen:</label>
                                <div>
                                    @if($ciudadO !== null)
                                        <input type="text" class="form-control" name="ciudadO"  value="{{$ciudadO}}">
                                    @else
                                        <input type="text" class="form-control" name="ciudadO"  value="">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label text-md-right">Ciudad Destino:</label>
                                <div>
                                    @if($ciudadD !== null)
                                        <input type="text" class="form-control" name="ciudadD"  value="{{$ciudadD}}">
                                    @else
                                        <input type="text" class="form-control" name="ciudadD"  value="">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label text-md-right">Precio máximo:</label>
                                <div>
                                    @if($precio !== null)
                                        <input type="number" class="form-control" name="precio"  value="{{$precio}}">
                                    @else
                                        <input type="number" class="form-control" name="precio"  value="">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label text-md-right">Tipo de Combi:</label>
                                <div>
                                    <select class="form-control" name="tipo_de_combi">
                                        @if($tipo_de_combi == 'Cómoda')
                                            <option value='Super Cómoda'>
                                                Super Cómoda
                                            </option>
                                            <option value='Cómoda' selected="">
                                                Cómoda
                                            </option>
                                        @elseif($tipo_de_combi == 'Super Cómoda')
                                            <option value='Super Cómoda' selected="">
                                                Super Cómoda
                                            </option>
                                            <option value='Cómoda'>
                                                Cómoda
                                            </option>
                                        @else
                                            <option value='' disabled selected="">
                                                Seleccione el tipo
                                            </option>
                                            <option value='Super Cómoda'>
                                                Super Cómoda
                                            </option>
                                            <option value='Cómoda'>
                                                Cómoda
                                            </option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label text-md-right">Fecha:</label>
                                    <div>
                                        @if($fecha !== null)
                                            <input type="date" class="form-control" name="fecha"  value="{{$fecha}}">
                                        @else
                                            <input type="date" class="form-control" name="fecha"  value="">
                                        @endif
                                    </div>
                                </div>

                            <div class="form-group col-md-4">
                                <label class="col-form-label text-md-right"></label>
                                <div>
                                    <button type="submit" class="btn btn-primary" style="margin-top: 14px">
                                        {{ __('Buscar') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Listado -->
                    <div class="listado">
                        <table class="table table-bordered">
                            @if(count($viajes) !== 0)
                            <thead>
                                <tr>
                                    <th>Ciudad Origen</th>
                                    <th>Ciudad Destino</th>
                                    <th>Precio</th>
                                    <th>Combi</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viajes as $viaje)
                                <tr>
                                    <td>{{$viaje->ruta->origen->nombre}}</td>
                                    <td>{{$viaje->ruta->destino->nombre}}</td>
                                    <td>{{$viaje->precio}}</td>
                                    <td>{{$viaje->combi->tipo}}</td>
                                    <td>{{$viaje->fecha_sin_segundos()}}</td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#exampleModal{{$viaje->id}}" class="btn btn-link btn-sm"><i class="material-icons">&#xE417;</i></button>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$viaje->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Información del viaje</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label text-md-right">
                                                        Ruta: {{$viaje->ruta->origen->nombre}} - {{$viaje->ruta->destino->nombre}}
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label text-md-right">
                                                        Descripción: {{$viaje->ruta->descripcion}}
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label text-md-right">
                                                        Tipo de combi: {{$viaje->combi->tipo}}
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label text-md-right">
                                                        Fecha: {{$viaje->fecha_sin_segundos()}}
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label text-md-right">
                                                        Precio: {{$viaje->precio}}
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label text-md-right">
                                                        <?php
                                                            $asientos_disponibles = $viaje->combi->cantidad_asientos - count($viaje->asientos_ocupados());
                                                        ?>
                                                        Asientos disponibles: {{$asientos_disponibles}}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="modal-footer btn-group" role="group">
                                                @if($asientos_disponibles > 0)
                                                    @if($pasajero->tienePasaje($viaje->id, $pasajero->id))
                                                        @if($pasajero->buscarPasajeComprado($viaje->id))
                                                        <a href="#" class="btn btn-primary disabled" role="button" aria-disabled="true">
                                                            {{ __('Pasaje comprado') }}
                                                        </a>
                                                        @else
                                                            <a href="{{route('combi19.listarInsumosViaje', [$viaje->id, $pasajero->id])}}" class="btn btn-primary">
                                                                {{ __('Agregar insumos') }}
                                                            </a>
                                                        @endif
                                                    @else
                                                        <a href="{{route('cart.addViaje', [$viaje->id, 1])}}" class="btn btn-primary">
                                                            {{ __('Comprar pasaje para mi') }}
                                                        </a>
                                                    @endif
                                                    <a href="{{route('combi19.cargarDatosTercero', $viaje->id)}}" class="btn btn-primary">
                                                        {{ __('Comprar pasaje para otro') }}
                                                    </a>
                                                @else
                                                    @if($pasajero->tienePasaje($viaje->id, $pasajero->id))
                                                        @if($pasajero->buscarPasajeComprado($viaje->id))
                                                            <a href="#" class="btn btn-primary disabled" role="button" aria-disabled="true">
                                                                {{ __('Pasaje comprado') }}
                                                            </a>
                                                        @else
                                                            <a href="{{route('combi19.listarInsumosViaje', [$viaje->id, $pasajero->id])}}" class="btn btn-primary">
                                                                {{ __('Agregar insumos') }}
                                                            </a>
                                                        @endif
                                                    @else
                                                        <a href="#" class="btn btn-primary disabled" role="button" aria-disabled="true">
                                                            {{ __('Comprar pasaje para mi') }}
                                                        </a>
                                                    @endif
                                                    <a href="#" class="btn btn-primary disabled" role="button" aria-disabled="true">
                                                        {{ __('Comprar pasaje para otro') }}
                                                    </a>
                                                @endif
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    {{ __('Cancelar') }}
                                                </button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                @endforeach
                                </tr>
                            </tbody>
                            @else
                            <h1>No hay viajes disponibles</h1>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
