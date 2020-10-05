<?php

namespace App\Models;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
  //  protected  $table="invoice_details";

  //protected $fillable=['invoice_id','prouduct_name','unit','quantity','unit_price','row_sub_total'];
    
  //  protected  $hidden =['created_at','updated_at'];
    protected $guarded = [];
     
    public function invoice(){
        return $this->belongsTo(Invoice::class,'invoice_id','id');
    }
}
