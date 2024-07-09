<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Client;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //não pode esquecer de muda de false pra true, senao da erro
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //retirei o protected function, funcao de nome validate e as variaveis *$request foram trocados para $this*
                $clientType = Client::getClientType($this->client_type);
                $documentNumberType = $clientType == Client::TYPE_INDIVIDUAL ? "cpf" : "cnpj";
                $client = $this->route('client');
                $clientId = $client instanceof Client ? $client->id : null;
                $rules = [
                    "name" => "required|string|max:255",
                    "document_number" => "required|unique:clients,document_number, $clientId|document_number:$documentNumberType",
                    "email" => "required|email|max:255",
                    "phone" => "required|max:255",
                ];
                $marital_status= implode(",",array_keys(Client::MARITAL_STATUS));
                $rulesIndividual =[
                    "date_birth" => "required|date",
                    "sex" => "required|in:m,f",
                    "marital_status" => "required|in:$marital_status",
                    "physical_disability"=> "max:255"
                ];
                $rulesLegal = [
                    "company_name"=>"required|max:255",
                ];
                return $clientType == Client::TYPE_INDIVIDUAL ? $rules + $rulesIndividual : $rules + $rulesLegal;
    }
}
