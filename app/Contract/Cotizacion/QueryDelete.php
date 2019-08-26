<?php


namespace App\Contract\Cotizacion;


class QueryDelete
{
    public static function delete($arrayData)
    {
        if($arrayData['typeView']=='deleteQuotation') {
            return [

            ];
        }
        return null;
    }
}
