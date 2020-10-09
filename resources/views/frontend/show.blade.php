@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
               <div class="card-header d-flex">
               <h2> {{__('Frontend/frontend.Invoice',['invoice_number' => $invoice->invoice_number])}}</h2> 
               <a href="{{route('invoice.index')}}" class="btn btn-primary ml-auto"><i class="fa fa-home"> </i> {{__('Frontend/frontend.back_to_invoice')}}</a>

               </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                          <th>{{__('Frontend/frontend.Customer_nam')}}</th>
                          <td>{{$invoice->Customer_name}}</td>
                          <th>{{__('Frontend/frontend.Customer_email')}}</th>
                         <td>{{$invoice->Customer_email}}</td>
                        </tr>
                       <tr>  
                         <th>{{__('Frontend/frontend.Customer_mobile')}}</th>
                         <td>{{$invoice->Customer_mobile}}</td>
                         <th>{{__('Frontend/frontend.company_name')}}</th>
                         <td>{{$invoice->company_name}}</td>
                        </tr>                   
                        <tr> 
                        <th>{{__('Frontend/frontend.invoice_number')}}</th>
                          <td>{{$invoice->invoice_number}}</td>
                          <th>{{__('Frontend/frontend.invoice_date')}}</th>
                          <td>{{$invoice->invoice_date}}</td>
                        </tr>  
                    </table>
                        <h3>{{__('Frontend/frontend.invoice_details')}}</h3>
                      <table class="table">
                      <thead>
                      <th>#</th>
                      <th>{{__('Frontend/frontend.prouduct_name')}}</th>
                      <th>{{__('Frontend/frontend.unit')}}</th>
                      <th>{{__('Frontend/frontend.quantity')}}</th>
                      <th>{{__('Frontend/frontend.unit_price')}}</th>
                      <th>{{__('Frontend/frontend.sub_total')}}</th>
                     </thead>
                     <tbody>
                     @foreach($invoice->details as $item)
                     <tr>
                     <td>{{$loop->iteration}} </td>
                     <td>{{$item->prouduct_name}}</td>
                     <td>{{$item->unitText()}}</td>
                     <td>{{$item->quantity}}</td>
                     <td>{{$item->unit_price}}</td>
                     <td>{{$item->row_sub_total}}</td>

                     </tr>
                     @endforeach
                     </tbody>
                     <tfoot>
                        <tr>
                           <td colspan="3"></td>
                           <th colspan="2">{{__('Frontend/frontend.sub_total')}}</th>  
                           <td>{{$invoice->sub_total}}</td>
                        </tr>
                        <tr>
                           <td colspan="3"></td>
                           <th colspan="2">{{__('Frontend/frontend.Discount')}}</th>  
                           <td>{{$invoice->discountResult()}}</td>
                        </tr>
                        <tr>
                           <td colspan="3"></td>
                           <th colspan="2">{{__('Frontend/frontend.VAT')}}</th>  
                           <td>{{$invoice->vat_value}}</td>
                        </tr>
                        <tr>
                           <td colspan="3"></td>
                           <th colspan="2">{{__('Frontend/frontend.Shipping')}}</th>  
                           <td>{{$invoice->shipping}}</td>
                        </tr>
                        <tr>
                           <td colspan="3"></td>
                           <th colspan="2">{{__('Frontend/frontend.Total_Due')}}</th>  
                           <td>{{$invoice->total_due}}</td>
                        </tr>
                     </tfoot>
                      </table>  
                </div>    
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-primary btn-sm ml-auto"><i class="fa fa-print"></i> {{__('Frontend/frontend.print')}}</a>
                        <a href="#" class="btn btn-secondary btn-sm ml-auto"><i class="fa fa-file-pdf"></i> {{__('Frontend/frontend.print_pdf')}}</a>
                        <a href="#" class="btn btn-success btn-sm ml-auto"><i class="fa fa-envelope"></i> {{__('Frontend/frontend.send_to_email')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
