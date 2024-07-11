@extends("layouts.layout")
@section("content")
<h3>Ver cliente</h3>
<br/><br/>
<td>
<a class="btn btn-primary" href="{{route("clients.edit", $client->id)}}">Editar Cliente</a> |
{{-- inicio botao delete --}}
<a class="btn btn-danger" href="{{route("clients.destroy", $client->id)}}"
    onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir Cliente</a>
    {{Form::open(['route' => ['clients.destroy', $client->id], 'method'=> 'DELETE', 'id' => 'form-delete'])}}
    {{Form::close()}}
    {{-- {{ csrf_field() }} Desnecessario graças a o {{Form}}
{{-- fim botao delete --}}|
<a class="btn btn-default" href="{{route("clients.index")}}">Voltar</a>
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
            <td>{{$client->document_number_formatted}}</td>
        </tr>
        <tr>
            <th scope="row">E-mail</th>
            <td>{{$client->email}}</td>
        </tr>
        <tr>
            <th scope="row">Telefone</th>
            <td>{{$client->phone}}</td>
        </tr>

        {{-- @if("client_type" == App\Models\Client::TYPE_INDIVIDUAL) --}}
        <tr>
            <th scope="row">Estado Civil</th>
            <td>@switch($client->marital_status)
                @case("")//
                         @break
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
            <td>{{$client->date_birth_formatted? $client->date_birth_formatted: "//"}}</td>
        </tr>
        <tr>
            <th scope="row">Sexo</th>
            <td>{{$client->sex_formatted?$client->sex_formatted:"//"}}</td>
        </tr>
        <tr>
            <th scope="row">Def. Física</th>
            <td>{{$client->physical_disability?$client->physical_disability:"//"}}</td>
        </tr>

        {{-- @else --}}
        <tr>
            <th scope="row">Nome da empresa</th>
            <td>{{$client->company_name? $client->company_name : "//"}}</td>
        </tr>

        {{-- @endif --}}

        <tr>
            <th scope="row">Inadimplencia</th>
            <td>{{$client->defaulter?"Inadimplente":"Adimplente"}}</td>
        </tr>
    </tbody>
</table>
@endsection
