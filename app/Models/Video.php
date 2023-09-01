<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'link',
        'status',
        'id_main_menu',
        'id_child_menu',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class,'id_main_menu','id');
    }

    public function childMenu()
    {
        return $this->belongsTo(ChildMenu::class,'id_child_menu','id');
    }
    
}
