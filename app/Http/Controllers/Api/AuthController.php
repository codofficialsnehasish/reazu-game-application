<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function sendOtpForRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:10',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return apiResponse(false, 'Validation Errors', $validator->errors(), 422);
        }

        // Generate OTP
        $otp = 1234; // or use rand(100000, 999999)

        $user = User::where('phone', $request->phone)->first();

        if ($user) {
            // Update OTP for existing user
            $user->otp = $otp;
            $user->save();
        } else {
            // Create new user
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'otp' => $otp,
                'password' => $request->password,
            ]);

            $user->assignRole('User');
        }

        // SendSms($request->phone, "Your OTP is $otp");

        return apiResponse(true, 'OTP generated successfully and sent to your phone number.', null, 200);
    }

    public function verifyOtpAndRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|digits:10|exists:users',
            'otp' => 'required|digits:4',
        ]);

        if ($validator->fails()) {
            return apiResponse(false, 'Validation Errors', $validator->errors(), 422);
        }

        $user = User::where('phone', $request->phone)
                    ->where('otp', $request->otp)
                    ->first();

        if (!$user) {
            return apiResponse(false, 'Invalid OTP', null, 401);
        }

        $user->status = 1;
        $user->otp = null;
        $user->save();

        $token = $user->createToken('api-token')->plainTextToken;

        $user->profile_image = $user->profile_image ? asset('storage/' . $user->profile_image) : null;

        $data = [
            'token' => $token,
            'user' => $user
        ];
        return apiResponse(true, 'Registration complete.', $data, 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|digits:10|exists:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return apiResponse(false, 'Validation Errors', $validator->errors(), 422);
        }

        $user = User::where('phone', $request->phone)->first();

        if($user->status != 1){
            return apiResponse(false, 'You are not verified !', [ 'user'=>$user ], 401);
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            return apiResponse(false, 'Invalid credentials', null, 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        $user->profile_image = $user->profile_image ? asset('storage/' . $user->profile_image) : null;

        $data = [
            'token' => $token,
            'user' => $user
        ];

        return apiResponse(true, 'Login successful', $data, 200);
    }

    public function resendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|digits:10|exists:users,phone',
        ]);

        if ($validator->fails()) {
            return apiResponse(false, 'Validation Errors', $validator->errors(), 422);
        }

        // Find user
        $user = User::where('phone', $request->phone)->first();

        // Generate new OTP
        $otp = 1234; // or use rand(100000, 999999)

        $user->otp = $otp;
        $user->save();

        // Optionally send SMS
        // SendSms($user->phone, "Your new OTP is $otp");

        return apiResponse(true, 'OTP resent successfully.', null, 200);
    }


    public function sendOtpForForgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|digits:10|exists:users',
        ]);

        if ($validator->fails()) {
            return apiResponse(false, 'Validation Errors', $validator->errors(), 422);
        }

        // $otp = rand(100000, 999999);
        $otp = 1234;

        $user = User::where('phone', $request->phone)->first();
        $user->otp = $otp;
        $user->save();

        // SendSms($request->phone, "Your OTP for password reset is $otp");

        return apiResponse(true, 'OTP sent to your phone number.', null, 200);
    }

    public function verifyOtpForForgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|digits:10|exists:users',
            'otp' => 'required|digits:4',
        ]);

        if ($validator->fails()) {
            return apiResponse(false, 'Validation Errors', $validator->errors(), 422);
        }

        $user = User::where('phone', $request->phone)
                    ->where('otp', $request->otp)
                    ->first();

        if (!$user) {
            return apiResponse(false, 'Invalid OTP', null, 401);
        }

        // Mark as verified for reset, don't log in yet
        $user->otp = null;
        $user->status = 1; // optional if needed
        $user->save();

        return apiResponse(true, 'OTP verified successfully. You may now reset your password.', null, 200);
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|digits:10|exists:users',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return apiResponse(false, 'Validation Errors', $validator->errors(), 422);
        }

        $user = User::where('phone', $request->phone)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return apiResponse(true, 'Password has been reset successfully.', null, 200);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        // Revoke current access token
        $user->currentAccessToken()->delete();

        return apiResponse(true, 'Logged out successfully.', null, 200);
    }

    public function deleteAccount(Request $request)
    {
        $user = $request->user();

        // Delete all tokens
        $user->tokens()->delete();

        // Optionally, perform cleanup (e.g. related data, files, etc.)

        // Delete user
        $user->delete();

        return apiResponse(true, 'Account deleted successfully.', null, 200);
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|digits:10|unique:users,phone,' . $user->id,
            'profile_image' => 'nullable|string', // base64 image
            'theme' => 'nullable',
        ]);

        if ($validator->fails()) {
            return apiResponse(false, 'Validation Errors', $validator->errors(), 422);
        }

        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('email')) {
            $user->email = $request->email;
        }

        if ($request->has('phone')) {
            $user->phone = $request->phone;
        }

        if ($request->has('theme')) {
            $user->theme = $request->theme;
        }

        if ($request->filled('profile_image')) {
            try {
                $imageData = $request->profile_image;

                // Extract extension
                preg_match("/^data:image\/(.*?);base64,/", $imageData, $imageExt);
                $extension = $imageExt[1] ?? 'png';

                // Clean base64 string
                $image = preg_replace('/^data:image\/(.*);base64,/', '', $imageData);
                $image = str_replace(' ', '+', $image);
                $imageName = 'profile_' . time() . '.' . $extension;

                // Save to storage (you can change path)
                \Storage::disk('public')->put("profiles/$imageName", base64_decode($image));

                // Optionally remove old image if exists
                if ($user->profile_image) {
                    \Storage::disk('public')->delete($user->profile_image);
                }

                $user->profile_image = "profiles/$imageName";
            } catch (\Exception $e) {
                return apiResponse(false, 'Invalid base64 image format.', null, 400);
            }
        }

        $user->save();

        // Append full URL
        $user->profile_image = $user->profile_image ? asset('storage/' . $user->profile_image) : null;

        return apiResponse(true, 'Profile updated successfully.', $user, 200);
    }

    public function get_profile(Request $request){
        $user = $request->user();
        $user->profile_image = $user->profile_image ? asset('storage/' . $user->profile_image) : null;

        return apiResponse(true, 'Profile get successfully.', $user, 200);
    }

}
