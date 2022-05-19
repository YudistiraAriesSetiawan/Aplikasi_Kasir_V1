@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h3>Add Category Product</h3>
                    </center>

                </div>
                <div class="card-body">
                    <form action="/addCategory/submitEditCategoy" method="post" autocomplete="off">
                        <input type="hidden" class="form-control @error('name') is-invalid @enderror" id="id" name="id" placeholder="Category Product" aria-describedby="validationServer03Feedback" value="{{ $data->id }}">
                    @csrf
                        <div class="mb-1">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Category Product" aria-describedby="validationServer03Feedback" value="{{ $data->name }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Description Product" value="{{ $data->description}}">
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <center><button type="submit" class="btn btn-success">Save</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
