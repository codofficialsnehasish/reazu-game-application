<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\ContactAction;

class ContactActionApiController extends Controller
{
    public function index(){
        $contact_actions = ContactAction::where('is_active',1)
            ->orderBy('order', 'desc')
            ->get()
            ->map(function ($contactAction) {
                return [
                    'title' => $contactAction->title,
                    'icon_image' => asset('storage/' . $contactAction->icon_image),
                    'link' => $contactAction->link,
                    'type' => $contactAction->type,
                ];
            });
        return apiResponse(true,'How can we help', ['contact_actions' => $contact_actions], 200);
    }
}