@extends("layouts.layout")

@section("content")
<h3>Editar Cliente</h3>

@include("form._form_errors")

<form method="post" action="{{route("clients.update", [$client->id])}}">
    {{method_field("PUT")}}
    @include("admin.clients._form", ["clientType"=> $clientType])
    <td>
    <button type="submit" class="btn btn-primary">Salvar</button> |
    <a class="btn btn-default" href="{{route("clients.index")}}">Voltar</a>
    </td>
</form>

@endsection
