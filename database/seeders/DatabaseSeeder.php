<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Merek;
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
        // User::factory(10)->create();

        // User::factory(10)->create();

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
            'nama_merek'=> 'newb alance',
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



    }
}
