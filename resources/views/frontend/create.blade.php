@extends('layouts.app')

@section('style')
<link href="{{ asset('frontend/css/pickadate/classic.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/pickadate/classic.date.css') }}" rel="stylesheet">
@if(config('app.locale') == 'ar')
<link href="{{ asset('frontend/css/pickadate/rtl.css') }}" rel="stylesheet">
    @endif
    <style>
    form.form label.error,label.error{
        color:red;
        font-style:italic;
    }
    </style>
@endsection
@section('content')


<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
           {{__('Frontend/frontend.Create Invoice')}}
            </div>
            
            <div class="card-body">
                <form action="{{  route('invoice.store') }}" method="post" class="form">
                  @csrf
                       <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="Customer_name">     {{__('Frontend/frontend.Customer_nam')}}</label>
                                        <input type="text" name="Customer_name" class="form-control">
                                        @error('Customer_name')<span class="help-block text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                     <div class="form-group">
                                        <label for="Customer_email"> {{__('Frontend/frontend.Customer_email')}}</label>
                                        <input type="text" name="Customer_email" class="form-control">
                                        @error('Customer_email')<span class="help-block text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="Customer_mobile">{{__('Frontend/frontend.Customer_mobile')}} </label>
                                        <input type="text" name="Customer_mobile" class="form-control">
                                        @error('Customer_mobile')<span class="help-block text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                       </div>    

                       <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="company_name">{{__('Frontend/frontend.company_name')}} </label>
                                        <input type="text" name="company_name" class="form-control">
                                        @error('company_name')<span class="help-block text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                     <div class="form-group">
                                        <label for="invoice_number">{{__('Frontend/frontend.invoice_number')}} </label>
                                        <input type="text" name="invoice_number" class="form-control">
                                        @error('invoice_number')<span class="help-block text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="invoice_date">{{__('Frontend/frontend.invoice_date')}}</label>
                                        <input type="text" name="invoice_date" class="form-control pickdate">
                                        @error('invoice_date')<span class="help-block text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                       </div>                  

                        <div class="table-responsive">
                            <table class="table" id="invoice_details">
                                <thead>
                                      <tr>
                                        <th> </th>
                                        <th>{{__('Frontend/frontend.prouduct_name')}} </th>
                                        <th> {{__('Frontend/frontend.unit')}} </th>
                                        <th>{{__('Frontend/frontend.quantity')}} </th>
                                        <th> {{__('Frontend/frontend.unit_price')}} </th>
                                        <th>{{__('Frontend/frontend.row_sub_total')}} </th>
                                      </tr>
                                </thead>
                                <tbody>
                                    <tr class="cloning_row" id="0">
                                        <td>#</td>
                                        <td><input type="text" name="prouduct_name[0]" id="prouduct_name" class="prouduct_name form-control"></td>
                                        <td> 
                                        <select name="unit[]" id="unit" class="unit form-control">
                                            <option value=""></option>
                                            <option value="price">{{__('Frontend/frontend.price')}}</option>
                                            <option value="g">{{__('Frontend/frontend.Gram')}}</option>
                                            <option value="kg">{{__('Frontend/frontend.kilo_Gram')}}</option>
                                        </select>
                                        @error('unit')<span class="help-block text-danger">{{$message}}</span>@enderror
                                        </td>
                                        <td>
                                        <input type="number" step="0.01"  name="quantity[0]" id="quantity" class="quantity form-control">
                                        @error('quantity')<span class="help-block text-danger">{{$message}}</span>@enderror
                                        </td>
                                        <td>
                                        <input type="number" step="0.01"  name="unit_price[0]" id="unit_price" class="unit_price form-control">
                                        @error('unit_price')<span class="help-block text-danger">{{$message}}</span>@enderror
                                        </td>
                                      
                                        <td>
                                        <input type="number" step="0.01"  name="row_sub_total[0]" id="row_sub_total" class="row_sub_total form-control" readonly="readonly">
                                        @error('row_sub_total')<span class="help-block text-danger">{{$message}}</span>@enderror
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">
                                            <button type="button" class="btn_add btn btn-primary">{{__('Frontend/frontend.Add_another_product')}}</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2">{{__('Frontend/frontend.sub_total')}}</td>
                                        <td><input type="number" step="0.01"  name="sub_total" id="sub_total" class="sub_total form-control" readonly="readonly"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2">{{__('Frontend/frontend.Discount')}} </td>
                                        <td>
                                           <div class="input-group mb-3">
                                            <select name="discount_type" id="discount_type" class="discount_type custom-select">
                                            <option value="fixed">{{__('Frontend/frontend.SR')}}</option>
                                            <option value="parcentage">{{__('Frontend/frontend.parcentage')}}</option>
                                            </select>
                                                <div class="input-group-append">
                                                    <input type="number" step="0.01" name="discount_value" id="discount_value" class="discount_value form-control" value="0.00">
                                                </div>    
                                           </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2">{{__('Frontend/frontend.VAT')}} </td>
                                        <td><input type="number" step="0.01"  name="vat_value" id="vat_value" class="vat_value form-control" readonly="readonly"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2">{{__('Frontend/frontend.Shipping')}} </td>
                                        <td><input type="number" step="0.01"  name="shipping" id="shipping" class="shipping form-control" ></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2">{{__('Frontend/frontend.Total_Due')}}  </td>
                                        <td><input type="number" step="0.01"  name="total_due" id="total_due" class="total_due  form-control"   readonly="readonly"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    <div class="text-right pt-3">
                        <button type="submit" name="save" class="btn btn-primary">{{__('Frontend/frontend.save')}}</button>
                    </div>
                 </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('frontend/js/form-validation/jquery.form.js')}}"></script>

<script src="{{asset('frontend/js/form-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('frontend/js/form-validation/additional-methods.min.js')}}"></script>



<script src="{{asset('frontend/js/pickadate/picker.js')}}"></script>
<script src="{{asset('frontend/js/pickadate/picker.date.js')}}"></script>
    @if(config('app.locale') == 'ar')
    <script src="{{asset('frontend/js/form-validation/messages_ar.js')}}"></script>

    <script src="{{asset('frontend/js/pickadate/ar.js')}}"></script>
    @endif
        <script>
        $(document).ready(function(){
            $('.pickdate').pickadate({
                format:'yyyy-mm-dd',
                selectMonth:true,
                selectYear:true,
                clear:'clear',
                close: 'ok',
                closeOnSelect:true
              });
            $('#invoice_details').on('keyup blur','.quantity',function(){
                let $row = $(this).closest('tr');
                let quantity = $row.find('.quantity').val() || 0 ;
                let unit_price = $row.find('.unit_price').val() || 0 ;

                $row.find('.row_sub_total').val((quantity * unit_price).toFixed(2));
                $('#sub_total').val(sub_total('.row_sub_total'));
                $('#vat_value').val(calculate_vat());
                $('#total_due').val(sum_due_total());
                  });

            $('#invoice_details').on('keyup blur','.unit_price',function(){
                let $row = $(this).closest('tr');
                let quantity = $row.find('.quantity').val() || 0 ;
                let unit_price = $row.find('.unit_price').val() || 0 ;

                $row.find('.row_sub_total').val((quantity * unit_price).toFixed(2));
                $('#sub_total').val(sub_total('.row_sub_total'));
                $('#vat_value').val(calculate_vat());
                $('#total_due').val(sum_due_total());
              });
            $('#invoice_details').on('keyup blur','.discount_type',function(){
                $('#vat_value').val(calculate_vat());
                $('#total_due').val(sum_due_total());
                 });
            $('#invoice_details').on('keyup blur','.discount_value',function(){
                  $('#vat_value').val(calculate_vat());
                $('#total_due').val(sum_due_total());
               });
            $('#invoice_details').on('keyup blur','.shipping',function(){
                $('#vat_value').val(calculate_vat());
                $('#total_due').val(sum_due_total());
                     });
         
            let sub_total = function($selector){
                let sum = 0 ;
                $($selector).each(function(){
                    let selrctorVal = $(this).val() != '' ? $(this).val() : 0;
                    sum += parseFloat(selrctorVal);
                });
                return sum.toFixed(2);
             }
            let calculate_vat = function(){
                let sub_totalVal = $('.sub_total').val() || 0;
                let discount_type = $('.discount_type').val();
                let discount_value = parseFloat($('.discount_value').val()) || 0;
                let discountVal = discount_value != 0 ? discount_type == 'parcentage' ? sub_totalVal * (discount_value /100 ) : discount_value : 0;

                let vatVal = (sub_totalVal - discountVal ) * 0.05;
                
                return vatVal.toFixed(2);
                  }
             
            let sum_due_total = function(){
                 let sum = 0 ;
                 let sub_totalVal = $('.sub_total').val() || 0 ;
                 let discount_type = $('.discount_type').val();
                let discount_value = parseFloat($('.discount_value').val()) || 0;
                let discountVal = discount_value != 0 ? discount_type == 'parcentage' ? sub_totalVal * (discount_value /100 ) : discount_value : 0;
                let vatVal = parseFloat($('.vat_value').val()) || 0;
                let shippingVal =parseFloat($('.shipping').val())|| 0;
                sum += sub_totalVal;
                sum -=discountVal;
                sum  += vatVal;
                sum += shippingVal;
                return sum.toFixed(2);
             }


        $(document).on('click','.btn_add',function(){
            let trCount = $('#invoice_details').find('tr.cloning_row:last').length;
            let numberIncr = trCount > 0 ? parseInt($('#invoice_details').find('tr.cloning_row:last').attr('id')) + 1 : 0;
            $('#invoice_details').find('tbody').append($(''+
            '<tr class="cloning_row" id="' + numberIncr + '">' +
                                    '<td><button type="button" class="btn btn-danger btn-sm delgated-btn"><i class="fa fa-minus"></button></td>' +
                                    '<td><input type="text" name="prouduct_name[' + numberIncr + ']"  class="prouduct_name form-control"></td>' +
                                        '<td>' +
                                        '<select name="unit[' + numberIncr + ']" class="unit form-control">' +
                                            '<option value=""></option>' +
                                            '<option value="price">price</option>' +
                                             '<option value="g">Gram</option>'+
                                            '<option value="kg">kilo Gram</option>' +
                                     '</select>' +
                                      '</td>' +
                                     '<td><input type="number" step="0.01"  name="quantity[' + numberIncr + ']"  class="quantity form-control"></td>' +
                                       '<td><input type="number" step="0.01"  name="unit_price[' + numberIncr + ']" class="unit_price form-control"></td>' +
                                        '<td><input type="number" step="0.01"  name="row_sub_total[' + numberIncr + ']"  class="row_sub_total form-control" readonly="readonly"></td>' +
                   '</tr>'

            ));
       });

       $(document).on('click','.delgated-btn',function(e){
        e.preventDefault();
        $(this).parent().parent().remove();
              $('#sub_total').val(sub_total('.row_sub_total'));
                $('#vat_value').val(calculate_vat());
                $('#total_due').val(sum_due_total());
       });
       $('form').on('submit',function(e){
           $('input.prouduct_name').each(function() { $(this).rules("add",{required:true}); });
           $('select.unit').each(function() { $(this).rules("add",{required:true}); });
           $('input.quantity').each(function() { $(this).rules("add",{required:true}); });
           $('input.unit_price').each(function() { $(this).rules("add",{required:true}); });
           $('input.row_sub_total').each(function() { $(this).rules("add",{required:true}); });


        e.preventDefault();
       });


       $('form').validate({
        rules:{
           'Customer_name' : {required:true},
           'Customer_email' : {required:true,email:true},
           'Customer_mobile' : {required:true,digits:true,minlength:10 ,maxlength:14  },
           'company_name' : {required:true},
            'invoice_number' : {required:true,digits:true},
            'invoice_date' : {required:true},
        },
        SubmitHandler:function(form){
            form.submit();
        }
       });


        });
        </script>

@endsection