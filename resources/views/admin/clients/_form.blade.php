{{csrf_field()}}
    @php
        use App\Models\Client;
    @endphp
<input type="hidden" name="client_type" value="{{$clientType}}">
    {{-- <input type="hidden" name="_method" value="PUT"> --}}
    {{-- {{method_field("PUT")}} nao pode manter o method field por causa do PUT --}}
    <div class="form-group">
        <label for="name">Nome</label>
        <input class="form-control" id="name" type="text" name="name" value="{{old("name", $client->name)}}">
    </div>

    <div class="form-group">
        <label for="document_number">Documento</label>
        <input class="form-control" id="document_number" type="text" name="document_number" value="{{old("document_number",$client->document_number)}}">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" id="email" type="email" name="email" value="{{old("email",$client->email)}}">
    </div>

    <div class="form-group">
        <label for="phone">Telefone</label>
        <input class="form-control" id="phone" type="phone" name="phone" value="{{old("phone",$client->phone)}}">
    </div>

    @if($clientType == Client::TYPE_INDIVIDUAL) {{--se tipo do cliente for pessoa fisica(individual) vai mostrar as informações dentro do if--}}
    @php
    //variavel usada para o código não ficar enorme
    $maritalStatus = $client->marital_status;
    @endphp
    <div class="form-group">
        <label for="marital_status">Estado Civil</label>
        <select class="form-control" id="marital_status" name="marital_status" value="{{$maritalStatus}}">
            <option value="">Selecione o estado civil</option>
            <option value="1" {{old("marital_status", $maritalStatus) == 1? 'selected="selected"': ""}}>Solteiro</option>
            <option value="2" {{old("marital_status", $maritalStatus) == 2? 'selected="selected"': ""}}>Casado</option>
            <option value="3" {{old("marital_status", $maritalStatus) == 3?  'selected="selected"': ""}}>Divorciado</option>
        </select>
    </div>

    <div class="form-group">
        <label for="date_birth">Data de Nascimento</label>
        <input class="form-control" id="date_birth" type="date" name="date_birth" value="{{old("date_birth",$client->date_birth)}}">
    </div>

    <div class="radio">
        <label for="sex_m">
        <input id="sex_m" type="radio" name="sex" value="m" {{old("sex", $client->sex) == "m"? 'checked="checked"': ""}}> Masculino
        </label>
    </div>
    <div class="radio">
        <label for="sex_f">
        <input id="sex_f" type="radio" name="sex" value="f" {{old("sex", $client->sex) == "f"? 'checked="checked"': ""}}> Feminino
        </label>
    </div>

    <div class="form-group">
        <label for="physical_disability">Deficiência Física</label>
        <input class="form-control" id="physical_disability" type="text" name="physical_disability" value="{{old("physical_disability", $client->physical_disability)}}">
    </div>

    @else {{-- se o tipo for qualquer coisa diferente de individual (pessoa fisica) ele vai rodar o comando dentro do else--}}

    <div class="form-group">
        <label for="company_name">Nome da Empresa</label>
        <input class="form-control" id="company_name" type="text" name="company_name" value="{{old("company_name", $client->company_name)}}">
    </div>

    @endif {{--vai impedir que o if else continue rodando a partir deste ponto do codigo --}}
    <div class="form-group">
        <label for="defaulter">
        <input class="checkbox" id="defaulter" type="checkbox" name="defaulter" {{old("defaulter", $client->defaulter)? 'checked="checked"': ""}}> Inadimplente
        </label>
    </div>
