<?php

namespace App\Helpers;

use App\Models\Menu; // Pastikan Anda telah mengimpor model yang sesuai

class MenuHelper
{
    public static function getMenuItems()
    {
        return Menu::with(['ChildMenu'])->where('menu_status',1)->get(); // Ubah ini sesuai dengan logika Anda untuk mengambil menu dari tabel
    }
}
