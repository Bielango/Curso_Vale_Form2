{{-- {{csrf_field()}} token já foi enviado pelo form::open
Todos os old() foram trocados para null por causa do (Form::model)--}}
{{Form::hidden("client_type", $clientType)}}

@component("form._form_group", ["field" => "name"])
    {{Form::label("name", "Nome", ["class"=> "control-label"])}}
    {{Form::text("name", null, ["class"=> "form-control"])}}
@endcomponent
{{-- {{Form::text("name", old("name", $client->name), ["class"=> "form-control"])}} --}}

    @component("form._form_group", ["field" => "document_number"])
        {{Form::label("document_number", "Documento")}}
        {{Form::text("document_number", null, ["class"=> "form-control"])}}
    @endcomponent

    @component("form._form_group", ["field" => "email"])
        {{Form::label("email", "E-mail")}}
        {{Form::email("email", null, ["class"=> "form-control"])}}
    @endcomponent

    @component("form._form_group", ["field" => "phone"])
        {{Form::label("phone", "Telefone")}}
        {{Form::text("phone", null, ["class"=> "form-control"])}}
    @endcomponent

        @php
            use App\Models\Client;
        @endphp

    @if($clientType == Client::TYPE_INDIVIDUAL) {{--se tipo do cliente for pessoa fisica(individual) vai mostrar as informações dentro do if--}}

    @component("form._form_group", ["field" => "marital_status"])
        {{Form::label("marital_status", "Estado Civil")}}
        {{Form::select("marital_status", [
         "" => "Selecione o estado civil",
         "1" => "Solteiro(a)",
         "2" => "Casado(a)",
         "3" => "Divorciado(a)"
         ], null, ["class"=> "form-control"] )}}
          <label for="marital_status">Estado Civil</label>
          {{-- ], old("marital_status", $maritalStatus), ["class"=> "form-control"] )}} --}}
    @endcomponent

    @component("form._form_group", ["field" => "date_birth"])
        {{Form::label("date_birth", "Data Nasc.")}}
        {{Form::date("date_birth", null, ["class"=> "form-control"])}}
    @endcomponent

    <div class="radio">

        <label for="sex">
        {{-- {{Form::radio("sex", "m", old("sex", $client->sex) == "m")}} Masculino --}}
        {{Form::radio("sex", "m")}} Masculino
        </label>
    </div>
    <div class="radio">
        <label for="sex_f">
        {{Form::radio("sex", "f")}} Feminino
        </label>
    </div>

    @component("form._form_group", ["field" => "physical_disability"])
            {{Form::label("physical_disability", "Deficiência Física")}}
            {{Form::text("physical_disability", null, ["class"=> "form-control"])}}
    @endcomponent

    @else {{-- se o tipo for qualquer coisa diferente de individual (pessoa fisica) ele vai rodar o comando dentro do else--}}

    @component("form._form_group", ["field" => "company_name"])
        {{Form::label("company_name", "Nome da Empresa")}}
        {{Form::text("company_name", null,["class"=> "form-control"])}} {{--para forms de criação apenas--}}
    @endcomponent

    @endif {{--vai impedir que o if else continue rodando a partir deste ponto do codigo --}}
    <div class="form-group">
        <label for="defaulter">
            {{-- {{Form::checkbox("defaulter", 1, old("defaulter", $client->defaulter))}} Inadimplente --}}
            {{Form::checkbox("defaulter")}} Inadimplente
        </label>
    </div>
