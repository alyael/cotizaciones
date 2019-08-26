@extends('layouts.app')

@section('content')


    <div class="mb-3">
        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#newCot">
            Agregar producto
        </button>
    </div>


    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Lista de productos cotizacion folio #{{ $contractView['id'] }} | Cliente {{ $contractView['listQuotation'][0]['nameClient'] }} | <a href="{{ route('QuotationIndex') }}"> Regresar...</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>CostoU</th>
                        <th>CostoT</th>
                        <th>CostoI</th>
                        <th>FechaCot</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Folio</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>CostoU</th>
                        <th>CostoT</th>
                        <th>CostoI</th>
                        <th>FechaCot</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @if( is_null($contractView['listQuotationProduct']) )
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button type="button" class="btn btn-primary btn-sm" disabled> Modificar</button></td>
                            <td> <button type="submit" class="btn btn-danger btn-sm" disabled> Eliminar</button></td>
                        </tr>
                        @else
                        @foreach( $contractView['listQuotationProduct'] as $data )
                            <tr>
                                <td>{{ $data['id'] }}</td>
                                <td>{{ $data['productName'] }}</td>
                                <td>{{ $data['quantity'] }}</td>
                                <td>{{ $data['productPrice'] }}</td>
                                <td>{{ $data['productPrice'] * $data['quantity'] }}</td>
                                <td></td>
                                <td>{{ $data['created_at'] }}</td>
                                <td><button type="button" class="btn btn-primary btn-sm"> Modificar</button></td>
                                <td>

                                    <form method="post" action="{{ route('QuotationDestroy') }}" autocomplete="off">
                                        @csrf
                                        <input type="hidden" name="typeInput" value="deleteQuotation">
                                        <input type="hidden" name="typeDelete" value="QuotationDelete">
                                        <input type="hidden" name="idProduct" value="">
                                        <button type="button" class="btn btn-danger btn-sm"> Eliminar</button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="newCot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('QuotationAddProductStore') }}" autocomplete="off">
                        @csrf

                        <input type="hidden" name="typeInput" value="insertQuotation">
                        <input type="hidden" name="typeInsert" value="insertQuotationDetailProductIndex">
                        <input type="hidden" name="id" value="{{ $contractView['id'] }}">

                        <div class="form-group">
                            <label>Producto</label>
                            <select class="form-control" name="product_id" required>
                                <option></option>
                                @foreach ( $contractView['listProduct'] as $data )
                                    <option value="{{ $data['idProduct'] }}">{{ $data['nameProduct'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Cantidad</label>
                            <input type="number" class="form-control" name="quantity" required>
                        </div>
                        <div class="" align="right">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
