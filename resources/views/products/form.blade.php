@extends('layouts.app')

@section('content')
<h1>{{ isset($product) ? 'Editando produto' : 'Cadastrando produto' }}</h1>
<div class="card">
  <div class="card-body">
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
  <div class="form-row">
    <div class="col">
    @if(isset($product))
    <input type="hidden" value="{{ $product->id }}" name="id" />
    <button type="submit" class="btn btn-warning">Salvar</button>
    @else 
    <button type="submit" class="btn btn-primary">Cadastrar novo produto</button>
    @endif
  </div>
  </div>
</form>
  </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<br />
<br />
@if(isset($product))
    <h3>Movimentações de estoque desse produto</h3>
    <div class="card">
      <div class="card-body">
    <table class='table table-striped'>
      <thead class='thead-dark'>
            <th>Quantidade</th>
            <th>Data</th>
            <th>Fonte</th>
        </thead>
        <tbody>
        
    @foreach($product->stockMoves AS $stockmove)
        <tr>
            <td>{{ $stockmove-> qty }}</td>
            <td>{{ $stockmove->created_at->format('d/m/Y H:i') }}</td>
            <td>{{ $stockmove->source}}</td>
        </tr>
    @endforeach
    </table>
      </div>
    </div>
@endif

@endsection