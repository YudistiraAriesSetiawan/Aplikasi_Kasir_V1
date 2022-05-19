@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h3>Add Stock Product</h3>
                    </center>

                </div>
                <div class="card-body">
                    <form action="/stockProduct/submitAddDataStock" method="post" autocomplete="off">
                    @csrf
                        <div class="mb-1">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Product Name" aria-describedby="validationServer03Feedback" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" placeholder="Stock Product" value="{{ old('stock') }}">
                            @error('stock')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Price" value="{{ old('price') }}">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Description" value=" {{ old('description') }}">
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Categoty</label>
                            <select class="form-select  @error('category') is-invalid @enderror" name="category" id="category" aria-label="Default select example">
                                <option selected value="">Open this select menu</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                                @error('category')
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
