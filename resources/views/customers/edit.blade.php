@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h3>Edit Customer</h3>
                    </center>

                </div>
                <div class="card-body">
                    <form action="/customer/updateCustomer" method="post" autocomplete="off">
                    @csrf
                    <input type="hidden" class="form-control @error('name') is-invalid @enderror" id="idCustomer" name="idCustomer" placeholder="Category Product" aria-describedby="validationServer03Feedback" value="{{ $customer->id }}">
                        <div class="mb-1">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Category Product" aria-describedby="validationServer03Feedback" value="{{ $customer->name }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $customer->email }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone" value="{{ $customer->phone }}">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Address" value="{{ $customer->address }}">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <center><button type="submit" class="btn btn-success ">Save</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".swal-confirm").click(function(e){

        e.preventDefault();
        var self = $(this);
        console.log(self.data('tittle'));


        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff3333',
            cancelButtonColor: '#66b3ff',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                location.href = self.attr('href');
            }
        })
    })
    </script>
@endsection
