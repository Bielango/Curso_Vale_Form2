<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Session;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // var_dump(route("meu-nome")); teste de função
        // Session::flash("Chave", "Transmissão");
        $clients = Client::paginate(3);
        return view("admin.clients.index", compact("clients"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $clientType = Client::getClientType($request->client_type);
        return view('admin.clients.create', ["client"=> new Client(), "clientType"=>$clientType]);
        // [new client] serve para que o form não de erro, já que ele está sendo usado como template para o create.blade
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(ClientRequest $request)
    {
        // $data = $this->_validate($request);
        $data = $request->safe()->all();
        $data["defaulter"] = $request->has("defaulter");
        $data["client_type"]= Client::getClientType($request->client_type);
        Client::create($data);
        // Session::flash("message", "Cliente cadastrado com sucesso");
        return redirect()->route("clients.index")
        ->with("message", "Cliente cadastrado com sucesso");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $clientType = $client->client_type;
        return view("admin.clients.show", compact("client"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client) //route Model Binding Implicito - Tambem tem o route Model Binding Explicito
    {
        // $client = Client::findOrFail($id); não é masi necessario por conta do (route Model Binding Implicito), laravel
        //já consegue fazer isso de modo automatico por conta deste route
        $clientType = $client->client_type;
        return view("admin.clients.edit", compact("client", "clientType"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    // public function update(Request $request, Client $client)
    {
        // $data = $this->_validate($request);
        $data = $request->safe()->all();
        $data["defaulter"] = $request->has("defaulter");
        $client->fill($data);
        $client->save();
        // Session::flash("message", "Cliente editado com sucesso"); outro metodo de mandar um flash message abaixo
        return redirect()->route("clients.index")->with("message", "Cliente editado com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route("clients.index")
        ->with("message", "Cliente eliminado com sucesso");
    }

    // metodo de validação dentro do controller, foi desativado aqui e re construido no: Request\ClientRequest
    // protected function _validate(Request $request){
    //     $clientType = Client::getClientType($request->client_type);
    //     $documentNumberType = $clientType == Client::TYPE_INDIVIDUAL ? "cpf" : "cnpj";
    //     $client = $request->route('client');
    //     $clientId = $client instanceof Client ? $client->id : null;
    //     $rules = [
    //         "name" => "required|max:255",
    //         "document_number" => "required|unique:clients,document_number, $clientId|document_number:$documentNumberType",
    //         "email" => "required|email|max:255",
    //         "phone" => "required|max:255",
    //     ];
    //     $marital_status= implode(",",array_keys(Client::MARITAL_STATUS));
    //     $rulesIndividual =[
    //         "date_birth" => "required|date",
    //         "sex" => "required|in:m,f",
    //         "marital_status" => "required|in:$marital_status",
    //         "physical_disability"=> "max:255"
    //     ];
    //     $rulesLegal = [
    //         "company_name"=>"required|max:255",
    //     ];
    //     return $this->validate($request, $clientType == Client::TYPE_INDIVIDUAL?
    //     $rules + $rulesIndividual : $rules + $rulesLegal);
    // }
}
