<?php

namespace Scngnr\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class en_product extends Model
{
    protected $fillable = ['name','stockCode','stock','price'];  
    use HasFactory;
}
