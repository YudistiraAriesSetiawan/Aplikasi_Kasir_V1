@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">List Product</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th class="text-right" style="width: 15%;">User Name</th>
                                    <th class="text-right">Email</th>
                                    <th class="text-right">Password</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Yudistira Aries S</td>
                                    <td class="text-right">yudistira </td>
                                    <td class="text-right">admin@mail.com</td>
                                    <td class="text-right">12345678</td>
                                    <td class="table-action text-right">
                                        <a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
                                        <a href="#"><i class="align-middle" data-feather="trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
