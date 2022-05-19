@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h3>Add Customer</h3>
                    </center>

                </div>
                <div class="card-body">
                    <form action="/customer/addCustomer" method="post" autocomplete="off">
                    @csrf
                        <div class="mb-1">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Category Product" aria-describedby="validationServer03Feedback" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Address" value="{{ old('address') }}">
                            @error('address')
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

<div class="container">
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="text-right" style="width: 15%;">Email</th>
                                <th class="text-right" style="width: 15%;">Phone</th>
                                <th class="text-right" style="width: 15%;">Address</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customerName as $item)
                            <tr>
                                <td>{{ucfirst($item->name)  }}</td>
                                <td class="text-right">{{ ucfirst($item->email) }}</td>
                                <td class="text-right">{{ ucfirst($item->phone) }}</td>
                                <td class="text-right">{{ ucfirst($item->address) }}</td>
                                <td class="table-action text-right">
                                    {{-- encrypt the id --}}
                                    @php $encrypt= Crypt::encrypt($item->id); @endphp
                                    <a href="/customer/editCustomer/{{ $encrypt }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    {{-- -------------- --}}
                                    <a href="/customer/deleteCustomer/{{ $item->id }}" class="swal-confirm"><i class="align-middle" data-feather="trash"></i></a>
                                </td>
                            </tr>
                            {{-- End modal Delete --}}
                            @endforeach

                        </tbody>
                    </table>
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
