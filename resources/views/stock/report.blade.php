@extends('layouts.app')

@section('content')
<h1>Movimentação de estoque</h1>
<a href="{{ route('stock.create') }}">
<button type="button" class="btn btn-primary">Cadastrar nova movimentação</button>
</a> 


<h1>Movimentações realizadas hoje</h1>
<table class='table table-striped'>
<thead class='thead-dark'>
    <th scope="col">Produto</th>
    <th scope="col">Tipo de operação</th>
    <th scope="col">Quantidade</th>
    <th scope="col">Data</th>
    <th scope="col">Origem</th>
</thead>
<tbody>
@foreach($todayMoves as $todayMove)
<tr>
    <td>{{ $todayMove->product->name }}</td>
    <td>{{ $todayMove->qty > 0 ? 'Entrada' : 'Saída'}}</td>
    <td>{{ $todayMove->qty }}</td>
    <td>{{ $todayMove->created_at->format('d/m/Y') }}</td>
    <td>{{ $todayMove->source }}</td>
</tr>


@endforeach
</tbody>
</table>
@endsection