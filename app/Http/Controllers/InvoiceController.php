<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Invoice;
use App\Models\InvoiceDetails;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $invoices = Invoice::orderBy('id','desc')->paginate(10);
       return view('frontend.index',compact('invoices'));
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
//$details = InvoiceDetails::create($details_list);
if(!$details){
    return redirect()->back()->with(['message' =>__('frontend/frontend.created_failed'),'alert-type'=> 'danger']);


 
}
return redirect()->back()->with([
    'message' =>__('frontend/frontend.created_Successfuly'),
    'alert-type' => 'success']);
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
      $invoice = Invoice::findOrFail($id);
      return view('frontend.show',compact('invoice'));
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
        $invoice = Invoice::findOrFail($id);
        if($invoice){
           $invoice->delete();
           
           return redirect()->back()->with(['message' =>__('frontend/frontend.delete_Successfuly'),'alert-type'=> 'success']);

        }else{
        return redirect()->back()->with(['message' =>__('frontend/frontend.delete_failed'),'alert-type'=> 'danger']);
        }
    }
}
