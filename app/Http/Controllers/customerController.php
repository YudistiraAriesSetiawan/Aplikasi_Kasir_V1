<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customers.index',[
            'customerName' => Customer::all(),

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
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|max:12',
            'address' => 'required',

        ],[
            'name.required' => 'The name must be filled !',
            'email.required' => 'The email must be filled !',
            'email.email' => 'Fill with the true email !',
            'phone.required' => 'The phone must be filled !',
            'phone.numeric' => 'Fill with real phone number !',
            'address.required' => 'The address must be filled !',
        ]);

        $addData = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        toast('Product '.$request->name.' added successfully','success');
        return redirect('/customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($idCustomer)
    {
        $encryptId = Crypt::decrypt($idCustomer);
        return view('customers.edit',[
            'customer' => Customer::find($encryptId)
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {

        $customer = Customer::find($request->idCustomer);

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        toast('Customer '.$request->name.' updated successfully','success');
        return redirect('/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, $idCustomer)
    {

        $customer = Customer::find($idCustomer);
        $customer->delete();
        toast('Customer '.$customer->name.' delete successfully','success');
        return redirect('/customer');
    }
}
