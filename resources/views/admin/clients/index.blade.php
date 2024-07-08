@extends("layouts/layout")
@section("content")

@php
    use Illuminate\Support\Facades\Route;
@endphp


<h3>Listagem de Clientes</h3>
<br/><br/>
<a class="btn btn-default" href="{{route("clients.create")}}">Adicionar novo cliente</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>|ID|</th>
            <th>|NOME|</th>
            <th>|CNPJ/CPF|</th>
            <th>|DATA NASC|</th>
            <th>|EMAIL|</th>
            <th>|TELEFONE|</th>
            <th>|SEXO|</th>
            <th>|AÇÃO|</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{$client->id}} </td>
            <td>{{$client->name}} </td>
            <td>{{$client->document_number}} </td>
            <td>{{$client->date_birth}} </td>
            <td>{{$client->email}} </td>
            <td>{{$client->phone}} </td>
            <td>{{$client->sex}} </td>
            <td>
            <a class="btn btn-default" href="{{route("clients.show", $client->id)}}">Ver</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- {{$clients->links()}} --}}

@endsection
