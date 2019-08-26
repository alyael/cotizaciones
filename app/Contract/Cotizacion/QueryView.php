<?php


namespace App\Contract\Cotizacion;


use App\Model\Product;
use App\Model\TypeCenterCost;
use App\QuotationDetail;
use App\User;

class QueryView
{
    public static function view($arrayData)
    {
        if($arrayData >= 0) {
            return [
                "id"=>$arrayData['id'],
                "userClientQuotation"=>self::userClientQuotation($arrayData),
                "typeCenterCostQuotation"=>self::typeCenterCostQuotation($arrayData),
                "listQuotation"=>self::listQuotation($arrayData),
                "listQuotationProduct"=>self::listQuotationProduct($arrayData),
                "listProduct"=>self::listProduct($arrayData)
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
        return \App\Model\Quotation::leftJoin('users','quotations.client_id','users.id')
            ->select(
                'quotations.id AS id',
                'quotations.client_id AS client_id',
                'users.name AS nameClient',
                'quotations.user_create_id AS user_create_id',
                'quotations.type_center_id AS type_center_id',
                'quotations.created_at AS created_at'
            )->get()->toArray();
    }

    private static function listQuotationProduct($arrayData){

        if(QuotationDetail::where('quotation_id',$arrayData['id'])->exists()){
            return \App\Model\Quotation::leftJoin('users','quotations.client_id','users.id')
                ->leftJoin('quotation_details','quotations.id','quotation_details.quotation_id')
                ->leftJoin('products','quotation_details.product_id','products.id')
                ->select(
                    'quotations.id AS id',
                    'quotations.client_id AS client_id',
                    'users.name AS nameClient',
                    'quotations.user_create_id AS user_create_id',
                    'quotations.type_center_id AS type_center_id',
                    'quotations.created_at AS created_at',
                    'quotation_details.id AS quotation_details_id',
                    'products.name AS productName',
                    'products.price AS productPrice',
                    'quotation_details.quantity AS quantity'
                )
                ->where('quotation_details.quotation_id',$arrayData['id'])
                ->get()
                ->toArray();
        }

        return null;

    }

    private static function listProduct($arrayData){

        if(Product::exists()){
            return Product::select(
                    'products.id AS idProduct',
                    'products.name AS nameProduct'
                )->get()->toArray();
        }

        return null;

    }
}
