@extends('layouts.store')

@section('content')
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>Tu Orden</h4>
          <h2>Carrito de Compras</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="send-message mb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        @if(session('cart') && count(session('cart')) > 0)
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered bg-white mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Componente</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Subtotal</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity']; @endphp
                        <tr>
                            <td class="align-middle font-weight-bold">{{ $details['name'] }}</td>
                            <td class="align-middle text-center">${{ number_format($details['price'], 2) }}</td>
                            <td class="align-middle text-center">{{ $details['quantity'] }}</td>
                            <td class="align-middle text-center font-weight-bold text-danger">${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                            <td class="align-middle text-center">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Quitar del carrito">
                                        <i class="fa fa-trash"></i> Quitar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-light">
                    <tr>
                        <th colspan="3" class="text-right text-uppercase">Total a pagar:</th>
                        <th colspan="2" class="text-left text-danger" style="font-size: 1.2rem;">${{ number_format($total, 2) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary px-4 py-2" style="border-radius: 20px;">Seguir Comprando</a>
            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <button type="submit" class="filled-button">
                    Confirmar Compra
                </button>
            </form>
        </div>
        @else
            <div class="text-center py-5 bg-light rounded shadow-sm">
                <h4 class="text-muted mb-4">Tu carrito está vacío.</h4>
                <a href="{{ route('products.index') }}" class="filled-button">Ir al Catálogo de Componentes</a>
            </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection