<?php

namespace App\Http\Controllers\Pdf\Cotizacion;

use App\Http\Controllers\Controller;
use App\Model\Quotation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PdfQuotationController extends Controller
{
    public function __construct()
    {
        if (!Auth::guest()){

            return redirect('login')->with(Auth::logout());

        }
    }

    public function request($id)
    {
        $today = Carbon::now()->format('d/m/Y');
        $cart                = Quotation::find($id);
        if($cart == null){
            return 'No existe Cotizacion';
        }

        $quotationFirst = self::getDataUnique( $id );
        $quotationGet = self::getDataAll( $id );
        $sumCostProduct = self::sumCostProduct($id);

        $view =  \View::make('Pdf.Cotizacion.cotizacion',compact('id','quotationFirst','quotationGet','sumCostProduct','today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('request.pdf');
    }

    private static function getDataUnique($id)
    {
        return Quotation::leftJoin('users','quotations.client_id','users.id')
            ->select(
                'quotations.id AS id',
                'users.name AS nameClient',
                'users.email AS emailClient',
                'quotations.user_create_id AS user_create_id',
                'quotations.type_center_id AS type_center_id',
                'quotations.created_at AS created_at'
            )
            ->where('quotations.id',$id)
            ->first();
    }

    private static function getDataAll($id)
    {
        return Quotation::leftJoin('users','quotations.client_id','users.id')
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
                'quotation_details.product_id AS product_id',
                'products.name AS productName',
                'products.price AS productPrice',
                'quotation_details.quantity AS quantity'
            )
            ->where('quotation_details.quotation_id',$id)
            ->get();
    }

    private static function sumCostProduct($id)
    {
        return Quotation::where('quotations.id',$id)
            ->leftJoin('quotation_details','quotations.id','quotation_details.quotation_id')
            ->leftJoin('products','quotation_details.product_id','products.id')
            ->select(
                DB::raw('SUM(products.price * quotation_details.quantity) as total_profit')
            )
            ->get()->toArray();
    }
}
