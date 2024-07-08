<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Doctrine\DBAL\Types\Type;
use Code\Validator\Cpf;   // Importando validador Cpf.
use Code\Validator\Cnpj; // Importando validador Cnpj.
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Faker\Generator::class, function(){
            return \Faker\Factory::create("pt_BR");
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!Type::hasType('char') && !Type::hasType('enum')) {
            Type::addType('char', 'Doctrine\DBAL\Types\StringType');
            Type::addType('enum', 'Doctrine\DBAL\Types\StringType');
        }

        Validator::extend("document_number", function ($attribute, $value, $parameters, $validator){
            $documentValidator = $parameters [0] == "cpf" ?new Cpf(): new Cnpj();
            return $documentValidator->isValid($value);
        });
    }
}
