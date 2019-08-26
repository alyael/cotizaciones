<?php


namespace App\Contract\Cotizacion;


use App\QuotationDetail;

class QueryInsert
{
    public static function insert($arrayData)
    {
        if($arrayData['typeInsert']=='insertQuotationIndex') {
            return self::insertQuotationIndex($arrayData);
        }

        if($arrayData['typeInsert']=='insertQuotationDetailProductIndex') {
            return self::insertQuotationDetailProductIndex($arrayData);
        }

        return null;
    }

    private static function insertQuotationIndex($arrayData){

        $Quotation = \App\Model\Quotation::firstOrCreate([
            'client_id' => $arrayData['client_id'],
            'user_create_id'=>Auth()->id(),
            'type_center_id' => $arrayData['centerCost_id']
            ]);
        return true;
    }

    private static function insertQuotationDetailProductIndex($arrayData){

        $Quotation = QuotationDetail::firstOrCreate([
            'quotation_id' => $arrayData['id'],
            'product_id'=> $arrayData['product_id'],
            'quantity' => $arrayData['quantity']
        ]);

        return true;
    }

}
