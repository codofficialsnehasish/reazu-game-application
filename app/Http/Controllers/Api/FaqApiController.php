<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Game;
use App\Models\Faq;

class FaqApiController extends Controller
{
    public function index(){
        $faqs = Faq::where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->get();
        return apiResponse(true, 'Faqs', ['faq' => $faqs], 200);
    }
}