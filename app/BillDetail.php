<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bill_details';
	protected $fillable = ['bill_id', 'product_id', 'quantily', 'price'];

}
