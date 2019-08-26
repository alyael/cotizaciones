<?php


namespace App\Contract\Cotizacion;


class QuotationContract implements Quotation
{
    public function contractQueryView($arrayData)
    {

        $response = call_user_func (function () use($arrayData){

            if( ! is_null(QueryView::view($arrayData))){
                return QueryView::view($arrayData);
            }


            return null;

        });

        return $response;

    }

    public function contractQueryInsert($arrayData)
    {

        $response = call_user_func (function () use($arrayData){

            if($arrayData['typeInput']=='insertQuotation') {
                return QueryInsert::insert($arrayData);
            }
            return null;

        });

        return $response;

    }

    public function contractQueryUpdate($arrayData)
    {

        $response = call_user_func (function () use($arrayData){

            if( ! is_null(QueryUpdate::update($arrayData))){
                return QueryUpdate::update($arrayData);
            }
            return null;

        });

        return $response;

    }

    public function contractQueryDelete($arrayData)
    {

        $response = call_user_func (function () use($arrayData){

            if($arrayData['typeInput']=='deleteQuotation') {
                return QueryDelete::delete($arrayData);
            }
            return null;

        });

        return $response;

    }

}
