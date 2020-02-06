<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ornek extends Controller
{
    //
    public function __invoke()
    {
        return "test asadasdasd";
    }

    public function iletisim(){
        return "iletişim sayfası";
    }
    public function kullanici($kullanici){
        return $kullanici;
    }
}
