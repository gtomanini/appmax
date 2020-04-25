@extends('layouts.app')

@section('content')
<h1>Cadastrar movimentação de estoque</h1>
<form action="{{ route('stock.store') }}" method="POST">
    @csrf
  <div class="form-row">
    <div class="col">
    <select name="product_id" class="form-control">
        @foreach($products AS $product)
            <option value={{ $product->id }}>{{ $product->sku }} - {{ $product->name }} ({{ $product->availableQty() }} em estoque)</option>
        @endforeach
    </select>
    </div>
    <div class="col">
      <input type="number" name="qty" class="form-control" placeholder="Quantidade (para saídas informar valor negativo)">
    </div>
  </div>
  <input type="hidden" name="source" value="sistema" />
  <button type="submit" class="btn btn-primary">Cadastrar movimentação</button>
</form>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection