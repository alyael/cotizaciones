<?php


namespace App\Contract\Cotizacion;


interface Quotation
{

    public function contractQueryView($arrayData);
    public function contractQueryInsert($arrayData);
    public function contractQueryUpdate($arrayData);
    public function contractQueryDelete($arrayData);

}
