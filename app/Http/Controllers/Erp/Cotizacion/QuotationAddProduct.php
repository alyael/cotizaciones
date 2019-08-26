<?php

namespace App\Http\Controllers\Erp\Cotizacion;

use App\Contract\Cotizacion\QuotationContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuotationAddProduct extends Controller
{

    protected $repository;

    public function __construct(QuotationContract $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index($id)
    {
        $arrayData = array_merge(["id"=>$id]);
        $contractView = $this->repository->contractQueryView($arrayData);
        //dd($contractView);
        return view('Erp/Cotizacion/CotizacionAddProduct/index',compact('contractView'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $arrayData = $request->all();
        $contractView = $this->repository->contractQueryInsert($arrayData);
        return back()->with('success','Item created successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
