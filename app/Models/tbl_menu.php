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
    protected $table ='tbl_menus';
    public function category()
    {
        return $this->belongsTo(tbl_category::class, 'categoryID', 'id');
    }
}
