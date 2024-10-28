<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Kategori;
use App\Models\Merek;
use App\Models\sepatui;
use App\Models\Size;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Kategori::create([
            'nama'=> 'Wanita'
        ]);
        Kategori::create([
            'nama'=> 'Pria'
        ]);

        Merek::create([
            'nama_merek'=> 'adidas',
            'gambar'=> 'adidas.png'
        ]);
        Merek::create([
            'nama_merek'=> 'ventela',
            'gambar'=> 'ventela.png'
        ]);
        Merek::create([
            'nama_merek'=> 'nike',
            'gambar'=> 'nike.png'
        ]);
        Merek::create([
            'nama_merek'=> 'vans',
            'gambar'=> 'vans.png'
        ]);
        Merek::create([
            'nama_merek'=> 'new balance',
            'gambar'=> 'newbalance.png'
        ]);

        User::create([
            'name'=> 'Raihan',
            'email'=> 'raihan@gmail.com',
            'password'=> 'password'
        ]);
        User::create([
            'name'=> 'Wahyu',
            'email'=> 'wahyu@gmail.com',
            'password'=> 'password'
        ]);
        User::create([
            'name'=> 'Fauzan',
            'email'=> 'fauzan@gmail.com',
            'password'=> 'password'
        ]);

        sepatui::create([
            'gambar_sepatu' => 'sepatu1.jpeg'
        ]);
        sepatui::create([
            'gambar_sepatu' => 'sepatu2.jpeg'
        ]);
        sepatui::create([
            'gambar_sepatu' => 'sepatu3.jpeg'
        ]);
        sepatui::create([
            'gambar_sepatu' => 'sepatu4.jpeg'
        ]);
        sepatui::create([
            'gambar_sepatu' => 'sepatu5.jpeg'
        ]);
        sepatui::create([
            'gambar_sepatu' => 'sepatu6.jpeg'
        ]);
        sepatui::create([
            'gambar_sepatu' => 'sepatu7.jpeg'
        ]);
        sepatui::create([
            'gambar_sepatu' => 'sepatu8.jpeg'
        ]);

        //hilangkan semua command jika database memang kosong semua/tidak ada isi

        Color::create([
            'color' => 'putih'
        ]);

        Color::create([
            'color' => 'hitam'
        ]);

        Size::create([
            'size' => '36'
        ]);
        Size::create([
            'size' => '37'
        ]);
        Size::create([
            'size' => '38'
        ]);
        Size::create([
            'size' => '39'
        ]);
        Size::create([
            'size' => '40'
        ]);
        Size::create([
            'size' => '41'
        ]);
        Size::create([
            'size' => '42'
        ]);
        Size::create([
            'size' => '43'
        ]);
        Size::create([
            'size' => '44'
        ]);
        Size::create([
            'size' => '45'
        ]);
        Size::create([
            'size' => '46'
        ]);



    }
}
