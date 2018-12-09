<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
	protected $fillable = ['name', 'email', 'address', 'phone_number', 'note'];


}
