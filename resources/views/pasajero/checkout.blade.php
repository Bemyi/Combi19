@extends('layouts.app')

@section('title', 'Mi carrito')

@section('content')
<div class="container">
  <div class="row">
       <div class="col-sm-12 bg-light">   
        <table class="table table-striped">
            @if (count(Cart::getContent()))
                <thead>
                    <th>VIAJE</th>
                    <th>PASAJERO</th>
                    <th>PRECIO VIAJE</th>
                    <th>PRECIO(T)</th>
                    <th>ACCIONES</th>
                </thead>
                <tbody>
                    <?php
                        $precioTotal = 0;
                    ?>
                    @foreach (Cart::getContent() as $item)
                        <tr>
                            <?php
                                $precioTotal = $precioTotal + $item->price * $item->quantity;
                                $pasaje = App\Models\Pasaje::find($item->id);
                            ?>
                            <td>{{$item->name}}</td>
                            <td>{{$pasaje->nombrePasajero()}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$pasaje->precio}}</td>
                            <td>
                                <form action="{{route('cart.removeitem')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <input type="hidden" name='cantidad' value="{{$item->quantity}}">
                                    <button type="submit" class="btn btn-link btn-sm text-danger"><i class="material-icons">&#xE5C9;</i></button>
                                    <button type="button" data-toggle="modal" data-target="#exampleModal{{$pasaje->id}}" class="btn btn-link btn-sm"><i class="material-icons">&#xE417;</i></button>
                                </form>
                                

                            <!-- The Modal -->
            
<div class="modal" id="exampleModal{{$pasaje->id}}">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Lista de insumos pasaje</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <table class="table table-bordered">
                                                                    @if(count($pasaje->insumos_asociados()) != 0)
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nombre</th>
                                                                                <th>Descripción</th>
                                                                                <th>Cantidad</th>
                                                                                <th>Precio</th>
                                                                                <th>Acciones</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($pasaje->insumos_pasaje() as $insumo)
                                                                            <tr>
                                                                                <td>{{$insumo->insumo->nombre}}</td>
                                                                                <td>{{$insumo->insumo->descripcion}}</td>
                                                                                <td>{{$insumo->cantidad}}</td>
                                                                                <td>{{$insumo->precio_al_reservar}}</td>
                                                                                <td>
                                                                                    <a href="{{route('combi19.eliminarReservaInsumo', $insumo->id)}}" class="text-danger"><i class="material-icons">&#xE5C9;</i></a>
                                                                                </td>
                                                                                @endforeach
                                                                            </tr>
                                                                        </tbody>
                                                                    @else
                                                                        <h1>No hay insumos cargados</h1>
                                                                    @endif
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
  </div>

      <!-- Modal footer -->
      <div class="modal-footer btn-group" role="group">
                                                    <a href="{{route('combi19.listarInsumosViaje', [$pasaje->viaje_id, $pasaje->pasajero_id])}}" class="btn btn-primary">
                                                        {{ __('Agregar insumos') }}
                                                    </a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        {{ __('Cancelar') }}
                                                    </button>
                                                </div>
                    @endforeach
                        </tr>
                </tbody>
                @else
                    <h1>Carrito vacío</h1>
                @endif
            </table>
</div>
</div>
</div>
@endsection