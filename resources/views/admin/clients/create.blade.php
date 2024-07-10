@extends("layouts.layout")

@section("content")
<h3>Novo Cliente</h3>
@php
    use App\Models\Client;
@endphp
<h4>{{$clientType == Client::TYPE_INDIVIDUAL? 'Pessoa Física':'Pessoa Jurídica'}} </h4>
<td>
<a href="{{route("clients.create", ["client_type" =>Client::TYPE_INDIVIDUAL])}}">Pessoa Física</a>|
<a href="{{route("clients.create", ["client_type" =>Client::TYPE_LEGAL])}}">Pessoa Jurídica</a>
</td>
@include("form._form_errors")

<!--<form method="post" action="{{route("clients.store")}}">-->
    {{ Form::open(["route" => "clients.store"]) }}
    @include("admin.clients._form")
    <td>
    <button type="submit" class="btn btn-default">Criar</button>|
    <a class="btn btn-default" href="{{route("clients.index")}}">Voltar</a>
    </td>
    {{Form::close()}}
<!--</form>-->

@endsection

