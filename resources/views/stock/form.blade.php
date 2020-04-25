@extends('layouts.app')

@section('content')
<h1>Cadastrar movimentação de estoque</h1>
<form action="{{ route('stock.store') }}" method="POST">
    @csrf
  <div class="form-row">
    <div class="col">
    <select name="product_id" class="form-control">
        @foreach($products AS $product)
            <option value={{ $product->id }}>{{ $product->name }}</option>
        @endforeach
    </select>
      <!-- <input type="text" name="product_id" class="form-control" placeholder="Produto"> -->
    </div>
    <div class="col">
      <input type="number" name="qty" class="form-control" placeholder="Quantidade">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar novo produto</button>
</form>


@endsection