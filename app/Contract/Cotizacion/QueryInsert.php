<?php


namespace App\Contract\Cotizacion;


class QueryInsert
{
    public static function insert($arrayData)
    {
        if($arrayData['typeInsert']=='insertQuotationIndex') {
            return self::insertQuotationIndex($arrayData);
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
}
