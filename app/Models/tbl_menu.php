<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class tbl_menu extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'desc',
        'price',
        'categoryID',
        'isActive',
    ];
    public function category()
    {
        return $this->belongsTo(tbl_category::class);
    }
}
