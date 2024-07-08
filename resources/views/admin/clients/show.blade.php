@extends("layouts.layout")
@section("content")
<h3>Ver cliente</h3>
<br/><br/>
<td>
<a class="btn btn-primary" href="{{route("clients.edit", $client->id)}}">Editar Cliente</a> |
{{-- inicio botao delete --}}
<a class="btn btn-danger" href="{{route("clients.destroy", $client->id)}}"
    onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir Cliente</a>
    <form id="form-delete" style="display: none" action="{{route("clients.destroy", $client->id)}}" method="post">
    {{ csrf_field() }}
    {{ method_field("DELETE") }}
    </form>
{{-- fim botao delete --}}
    |
<a class="btn btn-default" href="{{route("clients.index")}}">Voltar</a>
{{-- @php
    use App\Models\Client;
@endphp --}}
</td>
<table class="table table-bordered">
    <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{$client->id}}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$client->name}}</td>
        </tr>
        <tr>
            <th scope="row">Documento</th>
            <td>{{$client->document_number}}</td>
        </tr>
        <tr>
            <th scope="row">E-mail</th>
            <td>{{$client->email}}</td>
        </tr>
        <tr>
            <th scope="row">Telefone</th>
            <td>{{$client->phone}}</td>
        </tr>

        {{-- @if($clientType == Client::TYPE_INDIVIDUAL) --}}
        <tr>
            <th scope="row">Estado Civil</th>
            <td>@switch($client->marital_status)
                @case(1)Solteiro
                        @break
                @case(2)Casado
                        @break
                @case(3)Divorciado
                        @break
                @endswitch
            </td>
        </tr>
        <tr>
            <th scope="row">Data Nasc.</th>
            <td>{{$client->date_birth}}</td>
        </tr>
        <tr>
            <th scope="row">Sexo</th>
            <td>{{$client->sex == "m" ? "Masculino" : "Feminino"}}</td>
        </tr>
        <tr>
            <th scope="row">Def. Física</th>
            <td>{{$client->physical_disability}}</td>
        </tr>

        {{-- @else --}}
        <tr>
            <th scope="row">Nome da empresa</th>
            <td>{{$client->company_name}}</td>
        </tr>

        {{-- @endif --}}

        <tr>
            <th scope="row">Inadimplencia</th>
            <td>{{$client->defaulter}}</td>
        </tr>
    </tbody>
</table>
@endsection
