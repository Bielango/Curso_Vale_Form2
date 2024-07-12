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
    "marital_status","date_birth" , "physical_disability",
    "client_type", "company_name"];

    public static function getClientType($type){
        return $type == Client::TYPE_LEGAL? $type : Client::TYPE_INDIVIDUAL;
    }

    // public function getSexAttribute(){
    //sobre escreve a informação original
    //     return $this->attributes["sex"] == "m" ? "Masculino" : "Feminino";
    // }
    // padrao para criar essas functions é: getNome_do_Atributo_no_ModelFormattedAttribute()
    public function getSexFormattedAttribute(){
        //Formatação pelo model
        return $this->client_type == self::TYPE_INDIVIDUAL ?($this->attributes["sex"] == "m" ? "Masculino" : "Feminino"): "";
    }

    public function getDateBirthFormattedAttribute(){
        return $this->client_type == self::TYPE_INDIVIDUAL ?(new \DateTime($this->date_birth))->format("d/m/Y"): "";
    }

    public function getDocumentNumberFormattedAttribute(){
        $document = $this->document_number;
        if(!empty($document)){
            if(strlen($document)== 11){
                $document = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "$1.$2.$3-$4", $document);
            }elseif(strlen($document)== 14){
                $document = preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})/", "$1.$2.$3/$4-$5", $document);
            }
        }
        return $document;
    }

    public function setDocumentNumberAttribute($value){
        //este código vai retirar caracteres que não sejam numeros quando cpf e cnpj for inserido
        $this->attributes["document_number"] = preg_replace("/[^0-9]/", "", $value);
    }

}
