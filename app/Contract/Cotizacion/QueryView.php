<?php


namespace App\Contract\Cotizacion;


use App\Model\TypeCenterCost;
use App\User;

class QueryView
{
    public static function view($arrayData)
    {
        if($arrayData==0) {
            return [
                "userClientQuotation"=>self::userClientQuotation($arrayData),
                "typeCenterCostQuotation"=>self::typeCenterCostQuotation($arrayData),
                "listQuotation"=>self::listQuotation($arrayData),
            ];
        }

        return null;
    }

    private static function userClientQuotation($arrayData){
        return User::where('role_id',3)->get()->toArray();
    }

    private static function typeCenterCostQuotation($arrayData){
        return TypeCenterCost::select('id','name')->get()->toArray();
    }

    private static function listQuotation($arrayData){
        return \App\Model\Quotation::select('id','client_id','user_create_id','type_center_id','created_at')->get()->toArray();
    }
}
