<?php

namespace App\Http\Controllers\Erp\Cotizacion;

use App\Contract\Cotizacion\Quotation;
use App\Contract\Cotizacion\QuotationContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Erp\Cotizacion\QuotationStoreRequest;
use App\Model\TypeCenterCost;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    protected $repository;

    public function __construct(QuotationContract $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function getIndex()
    {
        $contractView = $this->repository->contractQueryView($arrayData=0);
        return $contractView;
    }

    public function index()
    {
        $contractView = $this->repository->contractQueryView($arrayData=0);
        return view('Erp/Cotizacion/index',compact('contractView'));
    }

    public function create()
    {
        //
    }

    public function store(QuotationStoreRequest $request)
    {
        $arrayData = $request->all();
        $contractView = $this->repository->contractQueryInsert($arrayData);
        return back()->with('success','Item created successfully!');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        $arrayData = $request->all();
        $contractView = $this->repository->contractQueryDelete($arrayData);
        return back()->with('success','Item created successfully!');
    }
}
