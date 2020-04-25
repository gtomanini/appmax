@extends('layouts.app')

@section('content')
<h1>Lista de produtos</h1>
<a href="{{ route('products.create') }}"><button type="button" class="btn btn-primary">Cadastrar novo produto</button></a> 
<a href="{{ route('stock.create') }}"><button type="button" class="btn btn-primary">Cadastrar nova movimentação de estoque</button></a> 


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
    <td>{{ $product->availableQty() }}</td>
    <td></td>
</tr>


@endforeach
</tbody>
</table>
@endsection