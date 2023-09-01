<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChildMenu extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'link',
        'parrent_id',
        'icon',
        'status',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class,'parrent_id','id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class,'id_child_menu','id');
    }

    public function content()
    {
        return $this->hasMany(Content::class,'child_menu_id','id');
    }
}
