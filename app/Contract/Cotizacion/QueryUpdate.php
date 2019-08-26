<?php


namespace App\Contract\Cotizacion;


class QueryUpdate
{
    public static function update($arrayData)
    {
        if($arrayData['typeView']=='updateQuotation') {
            return [

            ];
        }
        return null;
    }
}
