@extends('layouts.app')

@section('content')
<h1>{{ isset($product) ? 'Editando produto' : 'Cadastrando produto' }}</h1>
<form action="{{ isset($product) ? route('products.update') : route('products.store') }}" method="POST">
    @csrf
  <div class="form-row">
    <div class="col">
      <input type="text" name="sku" class="form-control" placeholder="SKU" value="{{ isset($product) ? $product->sku : null }}">
    </div>
    <div class="col">
      <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ isset($product) ? $product->name : null }}">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar novo produto</button>
</form>


@if(isset($product))
    <h3>Movimentações de estoque desse produto</h3>
    <table class='table table-stripped'>
        <thead>
            <th>Quantidade</th>
            <th>Data</th>
        </thead>
        <tbody>
        
    @foreach($product->stockMoves AS $stockmove)
        <tr>
            <td>{{ $stockmove-> qty }}</td>
            <td>{{ $stockmove->created_at->format('d/m/Y H:i') }}</td>
        </tr>
    @endforeach
    </table>

@endif

@endsection