<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\InvoiceDetails;
class Invoice extends Model
{

 /* protected $fillable =['id','Customer_name','Customer_email','Customer_mobile','company_name','invoice_number','invoice_date','sub_total',
'discount_type','discount_value','vat_value','shipping','total_due'];*/

   protected $guarded = [];
   public function details(){
       return $this->hasMany(InvoiceDetails::class,'invoice_id','id');
   }
}
