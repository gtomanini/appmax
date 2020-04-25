@extends('layouts.app')

@section('content')
<h1>Lista de produtos</h1>
<div class="card">
    <div class="card-body">
        <a href="{{ route('products.create') }}"><button type="button" class="btn btn-primary">Cadastrar novo produto</button></a> 
        <a href="{{ route('stock.create') }}"><button type="button" class="btn btn-primary">Cadastrar nova movimentação de estoque</button></a> 
    </div>
</div>

<div class="card">
    <div class="card-body">
<table class='table table-striped'>
<thead class='thead-dark'>
    <th scope="col">SKU</th>
    <th scope="col">Nome</th>
    <th scope="col">Quantidade em estoque</th>
    <th scope="col">Ações</th>
</thead>
<tbody>
@foreach($products as $product)
<tr>
    <td>{{ $product->sku }}</td>
    <td>{{ $product->name }}</td>
    <td>{{ $product->availableQty() }} {{ $product->availableQty() > 100 ? '' : '(Alerta de estoque baixo)'}}</td>
    <td><a href="{{ route('products.edit', $product->id) }}">Editar</a></td>
</tr>


@endforeach
</tbody>
</table>
    </div></div>
@endsection