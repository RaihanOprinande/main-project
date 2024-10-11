<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        $cards = [
            [
                'title' => 'Just In',
                'description' => 'P-6000',
                'image' => 'https://example.com/image1.jpg',
            ],
            [
                'title' => 'Run in the Rain',
                'description' => 'Nike Pegasus 41 GORE-TEX',
                'image' => 'https://example.com/image2.jpg',
            ],
            [
                'title' => 'EasyOn',
                'description' => 'For playtime',
                'image' => 'https://example.com/image3.jpg',
            ],
        ];

        return view('card', compact('cards'));
    }
}

