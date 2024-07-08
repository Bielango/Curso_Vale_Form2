<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'defaulter' => $this->faker->boolean(),
        ];
    }

    //fabrica de pessoa fisica ---------------------------------------//
    public function individual(){

    return $this->state(function(array $atributes){

        $cpfs = cpfs();
        $marital_status = array_keys(Client::MARITAL_STATUS);
        $clientType = Client::TYPE_INDIVIDUAL;
        return [
        "document_number"=>$this->faker->randomElement($cpfs),
        'date_birth' => $this->faker->date(),
        'sex' => $this->faker->boolean()? "m" : "f",
        'marital_status' => $this->faker->randomElement($marital_status),
        'physical_disability' => $this->faker->boolean()? $this->faker->word() : null,
        "client_type" =>$clientType,
            ];

        });
    }
    //----------------------------------------------------------------//

    //fabrica de pessoa juridica -------------------------------------//
    public function legal(){

    return $this->state(function(array $atributes){

        $cnpjs = cnpjs();
        $clientType = Client::TYPE_LEGAL;

        return [
        "document_number"=>$this->faker->randomElement($cnpjs),
        "company_name"=>$this->faker->company(),
        'date_birth' => null,
        'sex' => null,
        'marital_status' => null,
        'physical_disability' => null,
        "client_type" =>$clientType,
            ];

        });
    }
    //----------------------------------------------------------------//
}
