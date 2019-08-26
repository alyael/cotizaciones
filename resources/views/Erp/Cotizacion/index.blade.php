@extends('layouts.app')

@section('content')


            <div class="mb-3">
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#newCot">
                    Nueva Cotizacion
                </button>
            </div>


            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Row Cotizaciones
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>idCliente</th>
                                <th>NombreCliente</th>
                                <th>Status</th>
                                <th>Fecha</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>idCliente</th>
                                <th>NombreCliente</th>
                                <th>Status</th>
                                <th>Fecha</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach( $contractView['listQuotation'] as $client )
                            <tr>

                                <td>{{ $client['id'] }}</td>
                                <td>{{ $client['client_id'] }}</td>
                                <td>Pendiente</td>
                                <td>{{ $client['created_at'] }}</td>
                                <td><button type="button" class="btn btn-primary btn-sm"> Edit</button></td>
                                <td><button type="button" class="btn btn-warning btn-sm"> Cancelar</button></td>
                                <td><button type="button" class="btn btn-dark btn-sm"> <i class="far fa-file-pdf"> <i class="fas fa-download"></i></i></button></td>
                                <td><button type="button" class="btn btn-dark btn-sm"> <i class="far fa-file-pdf"> <i class="fas fa-envelope-square"></i></i></button></td>

                            </tr>
                            @endforeach
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
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Cotizacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('QuotationStore') }}" autocomplete="off">
                        @csrf

                        <input type="hidden" name="typeInput" value="insertQuotation">
                        <input type="hidden" name="typeInsert" value="insertQuotationIndex">

                        <div class="form-group">
                            <label>Cliente</label>
                            <select class="form-control" name="client_id">
                                <option></option>
                                @foreach ( $contractView['userClientQuotation'] as $client )
                                <option value="{{ $client['id'] }}">{{ $client['name'] }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>C.Costo</label>
                            <select class="form-control" name="centerCost_id">
                                <option></option>
                                @foreach ( $contractView['typeCenterCostQuotation'] as $centerC )
                                    <option value="{{ $centerC['id'] }}">{{ $centerC['name'] }}</option>
                                @endforeach
                            </select>
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
