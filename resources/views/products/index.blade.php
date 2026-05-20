@extends('layouts.store')

@section('content')
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>PixelStore</h4>
          <h2>Nuestro Catálogo de Componentes</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading d-flex justify-content-between align-items-center">
          <h2>Productos Disponibles</h2>
          <a href="{{ route('products.create') }}" class="btn btn-danger text-white font-weight-bold px-4 py-2" style="border-radius: 20px;">
            + Agregar Nuevo
          </a>
        </div>
      </div>

      @foreach($products as $product)
      <div class="col-md-4 col-sm-6 mb-4">
        <div class="product-item">
          <a href="#">
            @if($product->image)
              <img src="{{ asset('storage/' . $product->image->url) }}" alt="{{ $product->name }}" style="height: 250px; object-fit: cover; width: 100%;">
            @else
              <img src="{{ asset('assets/images/product_01.jpg') }}" alt="Imagen no disponible" style="height: 250px; object-fit: cover; width: 100%;">
            @endif
          </a>
          <div class="down-content">
            <a href="#">
              <h4>{{ Str::limit($product->name, 20) }}</h4>
            </a>
            <h6>${{ number_format($product->price, 0) }}</h6>
            <p class="text-muted" style="height: 60px; overflow: hidden;">
              {{ Str::limit($product->description, 80) }}
            </p>
            
            <p class="text-muted" style="height: 60px; overflow: hidden;">
              {{ Str::limit($product->description, 80) }}
            </p>
            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-2 mb-3">
                @csrf
                <button type="submit" class="btn btn-danger btn-block text-white" style="border-radius: 20px;">
                    Agregar al Carrito
                </button>
            </form>
            <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                <span class="badge badge-secondary">Stock: {{ $product->stock }}</span>
                <div class="btn-group">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar componente del inventario?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Borrar</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>
@endsection