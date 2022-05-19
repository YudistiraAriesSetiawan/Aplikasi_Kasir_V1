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
                    <form action="/addCategory/submitAddCategoy" method="post" autocomplete="off">
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
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Description Product" value="{{ old('description') }}">
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

<div class="container">
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-7">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th class="text-right" style="width: 15%;">Description</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                            <tr>
                                <td>{{ucfirst($item->name)  }}</td>
                                <td class="text-right">{{ ucfirst($item->description) }}</td>
                                <td class="table-action text-right">
                                    {{-- encrypt the id --}}
                                    @php $encrypt= Crypt::encrypt($item->id); @endphp
                                    <a href="/addCategory/editCategory/{{ $encrypt }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    {{-- -------------- --}}
                                    <a href="/addCategory/deleteDataCategory/{{ $item->id }}" class="swal-confirm"><i class="align-middle" data-feather="trash"></i></a>
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
