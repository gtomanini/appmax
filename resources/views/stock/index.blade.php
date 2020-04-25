@extends('layouts.app')

@section('content')
<h1>Movimentação de estoque</h1>
<a href="{{ route('stock.create') }}">
<button type="button" class="btn btn-primary">Cadastrar nova movimentação</button>
</a> 

<table class='table table-striped'>
<thead class='thead-dark'>
    <th scope="col">Produto</th>
    <th scope="col">Quantidade</th>
    <th scope="col">Data</th>
    <th scope="col">Origem</th>
</thead>
<tbody>
@foreach($stockMoves as $stockMove)
<tr>
    <td>{{ $stockMove->product->name }}</td>
    <td>{{ $stockMove->qty }}</td>
    <td>{{ $stockMove->created_at->format('d/m/Y') }}</td>
    <td>{{ $stockMove->source }}</td>
</tr>


@endforeach
</tbody>
</table>
@endsection