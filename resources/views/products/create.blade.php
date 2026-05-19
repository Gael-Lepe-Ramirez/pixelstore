@extends('layouts.store')

@section('content')
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>Inventario</h4>
          <h2>Registrar Nuevo Componente</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="send-message mb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Información del Producto</h2>
        </div>
      </div>
      <div class="col-md-8 mx-auto">
        <div class="contact-form bg-light p-4 rounded shadow-sm">
          
          <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label for="name" class="font-weight-bold text-dark">Nombre del Componente</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" placeholder="Ej. Tarjeta de Video NVIDIA RTX 4060">
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label for="category_id" class="font-weight-bold text-dark">Categoría</label>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                  <option value="">-- Selecciona una categoría --</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                      {{ $category->name }}
                    </option>
                  @endforeach
                </select>
                @error('category_id')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="price" class="font-weight-bold text-dark">Precio ($)</label>
                <input name="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ old('price') }}" placeholder="0.00">
                @error('price')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="stock" class="font-weight-bold text-dark">Stock Inicial</label>
                <input name="stock" type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" value="{{ old('stock') }}" placeholder="Cantidad disponible">
                @error('stock')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-lg-12 form-group">
                <label for="description" class="font-weight-bold text-dark">Descripción Técnica</label>
                <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Detalles, especificaciones de compatibilidad, etc.">{{ old('description') }}</textarea>
                @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-lg-12 mt-3 d-flex justify-content-between">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary px-4 py-2" style="border-radius: 20px;">
                  Cancelar
                </a>
                <button type="submit" id="form-submit" class="filled-button">
                  Guardar Producto
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