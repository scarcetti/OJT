<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_category extends Model
{
    use HasFactory;


    protected $fillable =[
        'main_course',
        'isActive',
    ];
    protected $table = 'tbl_categories';
    public function menus()
    {
        return $this->hasMany(tbl_menu::class, 'categoryID');
    }
    public function delete(){
        $this->menus()->delete();
        return parent::delete();
    }
}
