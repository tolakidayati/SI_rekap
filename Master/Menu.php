<?php

namespace Master;

class Menu 
{
    public function topMenu()
    {
        $base = "http://localhost/praktikumOop/MyApp/index.php?target=";
        $data = [
            array('Text' => 'Home', 'Link' => $base . 'home'),
            array('Text' => 'Pegawai', 'Link' => $base . 'pegawai'),
            array('Text' => 'riwayatjabatan', 'Link' => $base . 'riwayatjabatan'),
            array('Text' => 'riwayatpangkat', 'Link' => $base . 'riwayatpangkat')  
        ];
        return $data;
    }
}