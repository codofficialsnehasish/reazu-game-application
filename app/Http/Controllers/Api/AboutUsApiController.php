<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Founder;
use App\Models\AboutUs;

class AboutUsApiController extends Controller
{
    public function about_us(){
        $about_us = AboutUs::first();
        $data = [
            'about_content' => strip_tags($about_us->about_content),
            'our_story' => strip_tags($about_us->our_story)
        ];

        return apiResponse(true, 'About Us', ['about_us' => $data], 200);
    }

    public function founders(){
        $founders = Founder::orderBy('order', 'desc')
            ->get()
            ->map(function ($founder) {
                return [
                    'name' => $founder->name,
                    'image' => asset('storage/' . $founder->image),
                    'contact_number' => $founder->contact_number,
                    'email' => $founder->email,
                ];
            });
        return apiResponse(true,'Founders', ['founders' => $founders], 200);
    }
}