<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'slug', 'content', 'category_id', 'type', 'status'];
}
