<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiecsController extends Controller
{
    public function index()
    {
       return view('frontend.index');
    }

    public function create()
    {
        return view('frontend.create');

    }
    public function store(Request $request)
    {
            
        $data['Customer_name']       = $request->Customer_name;
        $data['Customer_email']      = $request->Customer_email;
        $data['Customer_mobile']     = $request->Customer_mobile;
        $data['company_name']        = $request->company_name;
        $data['invoice_number']      = $request->invoice_number;
        $data['invoice_date']        = $request->invoice_date;
        $data['sub_total']           = $request->sub_total;
        $data['discount_type']       = $request->discount_type;
        $data['discount_value']      = $request->discount_value;
        $data['vat_value']           = $request->vat_value;
        $data['shipping']            = $request->shipping;
        $data['total_due']           = $request->total_due;
        
        $invoice = Invoice::create($data);

$details_list = [];
for($i = 0; $i < count($request->prouduct_name); $i++){
    $details_list[$i]['prouduct_name']      = $request->prouduct_name[$i];
    $details_list[$i]['unit']               = $request->unit[$i];
    $details_list[$i]['quantity']           = $request->quantity[$i];
    $details_list[$i]['unit_price']         = $request->unit_price[$i];
    $details_list[$i]['row_sub_total']      = $request->row_sub_total[$i];

}
$details = $invoice->details()->createMany($details_list);
if($details){
    return redirect()->bake()->with(['message' =>__('frontend/frontend.created_Successfuly'),'alert-type'=> 'success']);
}else{
    return redirect()->bake()->with(['message' =>__('frontend/frontend.created_failed'),'alert-type'=> 'danger']);

}

    }

}
