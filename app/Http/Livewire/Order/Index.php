<?php

namespace App\Http\Livewire\Order;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class Index extends Component
{
    public $idMenuOrder;
    public $idCustomer;

    protected $listeners = ['plusQty','minusQty','deleteOrder'];

    public function render()
    {
        return view('livewire.order.index',[
            'products' => Product::where('stock','>', 0)->get(),
            'orders' => Order::all(),
            'customer' => Customer::all(),
            'sumOrders' => Order::all()->sum('total'),

        ]);
    }

    public function addOrder(){


        if($this->idMenuOrder == null){
            session()->flash('message', 'Please select some menu');
        }
        else{

            $data = Product::find($this->idMenuOrder);
            $dataOrder = Order::where('product_id',$data->id)->first();

            if(!empty($dataOrder)){

            session()->flash('message', 'Product is already in Order');

                }
                else{
                    Order::create([
                    'product_id' => $data->id,
                    'qty' => '1',
                    'price' => $data->price,
                    'total' => $data->price,
                ]);
                }
        }





    }

    public function plusQty(Order $post)
    {
        $dataOrder = Order::find($post->id);
        $dataProduct = Product::find($dataOrder->product_id);

        if($dataProduct->stock <= $dataOrder->qty){
            session()->flash('message', $dataProduct->name.' only have '.$dataProduct->stock.' stock');
        }
        else{

            $dataOrder->qty = $dataOrder->qty + 1;
            $dataOrder->total = $dataOrder->qty * $dataOrder->price;
            $dataOrder->save();
        }

    }

    public function minusQty(Order $post)
    {
        $data = Order::find($post->id);
        if($data->qty <= 1){

            session()->flash('message', 'Please input the QTY or DELETE the menu');

        }
        else{

            $data->qty = $data->qty - 1;
            $data->total = $data->qty * $data->price;
            $data->save();

        }

    }

    public function addInvoiceOrder(){

        $random = Str::random(5);
        $order = Order::all();

        if(!$order->isEmpty()){

            //order not empty
            Invoice::create([
                'invoice' => 'ORDER/'.$random,
                'customer_id' => $this->idCustomer ,
                'user_id' => '1',
                'status' => 'Process',
                'total' => $order->sum('total'),
            ]);

            $idInvoice = Invoice::orderBy('id', 'desc')->first();

            foreach ($order as $item){
                $item->invoice_id = $idInvoice->id;
                $item->save();
                $item->delete();

                $stockProduct = Product::find($item->product_id);
                $stockProduct->stock = $stockProduct->stock - $item->qty;
                $stockProduct->save();

            }

            session()->flash('success', 'Invoice order added successfully');
        }
        else{
            // Order Empty
            session()->flash('message', 'Please input some menu');
        }








    }

    public function deleteOrder(Order $idOrder){

        $data = Order::find($idOrder->id);
        $data->forceDelete();
    }

}
