<?php


namespace App\Contract\Cotizacion;


class QueryDelete
{
    public static function delete($arrayData)
    {
        if($arrayData['typeDelete']=='QuotationDelete') {
            self::QuotationDelete($arrayData);
        }
        return null;
    }

    private static function QuotationDelete($arrayData){
        $Quotation = \App\Model\Quotation::find($arrayData['id']);
        $Quotation->delete();
        return true;
    }

}
