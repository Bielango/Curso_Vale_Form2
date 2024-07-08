<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    const TYPE_INDIVIDUAL = "individual";
    const TYPE_LEGAL = "legal";

    const MARITAL_STATUS =[
        1=>"solteiro",
        2=>"casado",
        3=>"divorciado",
    ];
    protected $fillable = ["name", "document_number", "email",
    "phone", "defaulter", "sex",
    "marital_status","date_birth" , "physical_disability,
    client_type, company_name"];

    public static function getClientType($type){
        return $type == Client::TYPE_LEGAL? $type : Client::TYPE_INDIVIDUAL;
    }
}
