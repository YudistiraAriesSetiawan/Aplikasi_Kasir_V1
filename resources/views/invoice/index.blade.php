@extends('layouts.main')

@section('content')

@if ($message = Session::get('success'))
<br>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="alert-icon">
                    <i class="far fa-fw fa-bell"></i>
                </div>
                <div class="alert-message">
                   {{ $message }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="container">
    <div class="row mt-5">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="/listOrder/search" method="get">
                            <div class="input-group input-group-navbar">
                                <input id="search" name="search" type="text" class="form-control" placeholder="Search…" aria-label="Search" autocomplete="off" autofocus>
                                <button type="submit" class="btn inline"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@hasrole('admin')
<div class="container">
    <div class="row mb-2">
        <div class="d-inline">
            <a href="#" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Export Excel"><i class="fas fa-file-excel"></i></a>
            <a href="" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Export PDF"><i class="fas fa-file-pdf"></i></a>
        </div>
    </div>
</div>
@endrole
<div class="container">
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class=" mb-0">List Order</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>Customer Name</th>
                                <th class="text-right">Total</th>
                                <th class="text-right">Status</th>
                                <th class="text-right">Input By</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $item)
                            <tr>
                                <td>{{ $item->invoice }}</td>
                                <td>{{ $item->customer->name }}</td>
                                <td class="text-right">Rp. {{ number_format($item->total) }}</td>
                                @if ($item->status == "Process")
                                    <td class="text-right"><span class="badge bg-warning">{{ $item->status }}</span></td>
                                @elseif ($item->status == "Finish")
                                    <td class="text-right"><span class="badge bg-success">{{ $item->status }}</span></td>
                                @endif
                                <td class="text-right">{{ $item->user->name }}</td>
                                <td class="table-action text-right">
                                    @php $encrypt= Crypt::encrypt($item->id); @endphp
                                    @if ($item->status == "Finish")

                                    @else
                                    <a href="/listOrder/detailOrder/{{ $encrypt }}"><i class="align-middle" data-feather="eye"></i></a>
                                    @endif
                                    <a href="#"><i class="align-middle" data-feather="trash" data-toggle="modal" data-target="#centeredModalPrimary"></i></a>
                                </td>
                            </tr>
                             {{-- Begin modal Delete --}}
                             <div class="modal fade" id="centeredModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Message Alert </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body m-3 centered">
                                            <p class="mb-0">Are you sure want to delete ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <a href="/listOrder/deleteListOrder/{{ $item->id }}" class="btn btn-primary">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End modal Delete --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
