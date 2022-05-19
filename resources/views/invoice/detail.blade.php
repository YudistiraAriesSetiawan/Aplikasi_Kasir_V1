@extends('layouts.main')

@section('content')
<center>
    <div class="container">
        <div class="row mt-5 col-7">
            <div class="card">
                <div class="card-body">
                    <form  action="{{ url('/listOrder/updateInvoice') }}" method="POST"">
                        {{ @csrf_field() }}
                        <h1>{{ $invoice->invoice }}</h1>
                        <input type="hidden" name="id" id="id" value="{{ $invoice->id }}">
                        <input type="hidden" name="status" id="status" value="Finish">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width:40%;">Name</th>
                                    <th style="width:10%">Qty</th>
                                    <th class="d-none d-md-table-cell" style="width:25%">Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>Rp. {{  number_format($item->price) }}</td>
                                    <td>Rp. {{  number_format($item->total) }}</td>
                                    <td><a href="/listOrder/deleteMenuInvoice/{{ $item->id }}/{{ $invoice->id }}" class="swal-confirm"><i class="align-middle" data-feather="trash"></i></a></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>
                                        Grand Total
                                    </th>
                                    <th>Rp. {{  number_format($invoice->total) }}</th>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</center>

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
