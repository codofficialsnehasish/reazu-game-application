<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\LegalContent;

class LegalContentApiController extends Controller
{
    public function index(){
        $legal_content = LegalContent::first();

        $data = [
            'terms_conditions' => strip_tags($legal_content->terms_condition),
            'privacy_policy' => strip_tags($legal_content->privacy_policy)
        ];

        return apiResponse(true, 'T&C | Privacy Policy', ['legal_content' => $data], 200);
    }
}