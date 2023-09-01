<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'menu_name',
        'menu_link',
        'menu_icon',
        'menu_status',
    ];

    public function childMenu()
    {
        return $this->hasMany(ChildMenu::class,'parrent_id','id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class,'id_main_menu','id');
    }
}
