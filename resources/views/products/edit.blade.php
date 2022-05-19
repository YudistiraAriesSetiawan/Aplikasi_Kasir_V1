@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="card">
                <div class="card-body">
                    <form  action="{{ url('updateStock') }}" method="POST"">
                        {{ @csrf_field() }}
                        <input type="hidden" name="id"  value="{{ $data->id }}">
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2 text-sm-right">Name</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" placeholder="Name" value="{{ $data->name }}" name="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2 text-sm-right">Stock</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" placeholder="Stock" value="{{ $data->stock }}" name="stock">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2 text-sm-right">Price</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" placeholder="Price" value="{{ $data->price }}"name="price">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2 text-sm-right">Description</label>
                            <div class="col-lg-4">
                                <textarea class="form-control" placeholder="Description" rows="3" name="description">{{ $data->description }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-10 ml-sm-auto">
                                <input type="submit" class="btn btn-success" value="Save">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
