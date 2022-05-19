@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('search') }}" method="get">
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
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="/stockProduct/addDataStock" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add Stock"><i class="fas fa-plus-circle"></i></a>
                    <div class="d-inline">
                        <a href="#" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Export Excel"><i class="fas fa-file-excel"></i></a>
                        <a href="" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Export PDF"><i class="fas fa-file-pdf"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th class="text-right" style="width: 15%;">Stock</th>
                                <th class="text-right">Price</th>
                                <th class="text-right">Description</th>
                                <th class="text-right">Category</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td class="text-right">{{ $item->stock }} </td>
                                <td class="text-right">{{ $item->price }}</td>
                                <td class="text-right">{{ $item->description }}</td>
                                <td class="text-right">{{ $item->category->name}}</td>
                                <td class="table-action text-right">
                                    {{-- encrypt the id --}}
                                    @php $encrypt= Crypt::encrypt($item->id); @endphp
                                    <a href="/stockProduct/editDataStock/{{ $encrypt }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="{{ route('delete',$item->id) }}" class="swal-confirm"><i class="align-middle" data-feather="trash"></i></a>
                                </td>
                            </tr>
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
