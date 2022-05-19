<div>
    <div class="container">

        <div class="row mt-5">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <select name="" id="" class="form-select" wire:model="idMenuOrder">
                                            <option value="">-- Select Menu --</option>
                                            @foreach ($products as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <input class="btn btn-secondary" type="submit" value="Select Menu" wire:click="addOrder">
                                    </div>
                                    <div class="col-4">
                                        <select name="" id="" class="form-select" wire:model="idCustomer">
                                            <option value="">-- Select Customer --</option>
                                            @foreach ($customer as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Start Alert sesion --}}
        <div class="container">
            <div class="row">
                <div class="col-8">
                    @if (session()->has('message'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                                <div class="alert-icon">
                                    <i class="far fa-fw fa-bell"></i>
                                </div>
                                <div class="alert-message">
                                    {{ session('message') }}
                                </div>
                        </div>
                    @elseif (session()->has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                                <div class="alert-icon">
                                    <i class="far fa-fw fa-bell"></i>
                                </div>
                                <div class="alert-message">
                                    {{ session('success') }}
                                </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        {{-- End Alert sesion --}}
        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Menu</th>
                                                    <th class="text-right" style="width: 15%;">Qty</th>
                                                    <th class="text-right">Price</th>
                                                    <th class="text-right">Total</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $item)
                                                    <tr>
                                                        <td>{{ $item->product->name }}</td>
                                                        <td class="text-right">
                                                            <div class="input-group">
                                                                <button type="button" class="btn btn-danger" wire:click="$emit('minusQty',{{ $item->id }})">-</button>
                                                                <input type="text" class="form-control" value="{{ $item->qty }}">
                                                                <button type="button" class="btn btn-success" wire:click="$emit('plusQty',{{ $item->id }})">+</button>
                                                            </div>
                                                        </td>
                                                        <td class="text-right">Rp. {{ number_format($item->price )}}</td>
                                                        <td class="text-right">Rp. {{ number_format($item->total) }}</td>
                                                        <td class="table-action text-right">
                                                            <a href="#" wire:click="$emit('deleteOrder',{{ $item->id }})"><i class="align-middle" data-feather="trash"></i></a>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <th class="text-right">Total</th>
                                                <td class="text-right">Rp. {{ number_format($sumOrders) }}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <th class="text-right"></th>
                                                    <td ></td>
                                                    <td class="text-right"><button type="button" class="btn btn-info" wire:click="addInvoiceOrder">Add Order</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
