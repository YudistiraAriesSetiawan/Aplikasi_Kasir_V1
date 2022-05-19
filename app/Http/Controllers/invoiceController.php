<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class invoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoice.index',[
            'post' => Invoice::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $encryptId = Crypt::decrypt($id); //encrypt the id
        $data = Order::onlyTrashed()->where('invoice_id', $encryptId)->get();
        $invoice = Invoice::find($encryptId);

        return view('invoice.detail',compact('data','invoice'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $product = Invoice::where('id',$request->id)
        ->update([
           'status' => $request->status,
         ]);
        return redirect('/listOrder')->with(['success' => 'Data Berhasil Diupdate!']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Invoice::find($id);
        $data->delete();
        return redirect('/listOrder')->with(['success' => 'Data has been deleted successfuly']);
    }

    public function deleteMenuInvoice($id,$invoice_id){
        // $encryptId = Crypt::decrypt($id);
        $dataOrder = Order::onlyTrashed()->where('invoice_id',$invoice_id)->where('id',$id)->forceDelete();
        $sumOrder = Order::onlyTrashed()->where('invoice_id',$invoice_id)->sum('total');

        $data = Order::onlyTrashed()->where('invoice_id', $invoice_id)->get();
        $invoice = Invoice::find($invoice_id);
        $invoice->total = $sumOrder;
        $invoice->save();
        toast('Menu deleted successfully','success');

        return view('invoice.detail',compact('data','invoice'));

    }

    public function search(Request $request){

        $report = Invoice::where('status','like','%'.$request->search.'%')
                            ->orwhere('invoice','like','%'.$request->search.'%')
                            ->get();

       if($report->isEmpty()){
        return view('invoice.index',[
            'post' => $report
        ])->withErrors(['no_post'=>'There is no result']);
       }
       else{
             return view('invoice.index',[
                    'post' => $report
                    ]);
       }

    }

}
