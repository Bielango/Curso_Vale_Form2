<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

require_once __DIR__ . "/../faker_data/document_number.php";

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $maritalStatus = array_keys(App\Models\Client::MARITAL_STATUS); //Constante fica dentro do model Client
            $table->increments("id");
            $table->string("name");
            $table->string("document_number")->unique();
            $table->string("email");
            $table->string("phone");
            $table->boolean("defaulter"); //inadimplente.
            //campos de pessoa fisica ----------------------------------------
            $table->date("date_birth")->nullable();
            $table->char("sex")->nullable(); // "m" para masculino e "f" para feminino.
            $table->enum("marital_status", $maritalStatus)->nullable(); // "solteiro", "casado", "divorciado".
            $table->string("physical_disability")->nullable();
            // ---------------------------------------------------------------
            //campos de pessoa juridica --------------------------------------
            $table->string("company_name")->nullable();
            $table->string("client_type")->default(App\Models\Client::TYPE_INDIVIDUAL); // TYPE_: INDIVIDUAL OU LEGAL
            //----------------------------------------------------------------
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
