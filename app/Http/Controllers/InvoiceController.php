<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('frontend.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
        $data['Customer_name']       = $request->Customer_name;
        $data['Customer_email']      = $request->Customer_email;
        $data['Customer_mobile']     = $request->Customer_mobile;
        $data['company_name']        = $request->company_name;
        $data['invoice_number']      = $request->invoice_number;
        $data['invoice_date']        = $request->invoice_date;

        

$details_list = [];
for($i = 0; $i < count($request->prouduct_name); $i++){
    $details_list[$i]['prouduct_name']      = $request->prouduct_name[$i];
    $details_list[$i]['unit']               = $request->unit[$i];
    $details_list[$i]['quantity']           = $request->quantity[$i];
    $details_list[$i]['unit_price']         = $request->unit_price[$i];
    $details_list[$i]['row_sub_total']      = $request->row_sub_total[$i];

}
dd($data,$details_list);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //  return view('frontend.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('frontend.edit');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
