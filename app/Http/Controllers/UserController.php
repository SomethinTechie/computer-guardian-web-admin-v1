<?php

namespace App\Http\Controllers;

use App\Models\ResidentialAddress;
use App\Models\User;
use App\Models\Otp;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user_update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cellphone = $request->mobileNumber ?? '0';
        $user->save();

        //find or create ResidentialAddress
        $residentialAddress = ResidentialAddress::where('user_id', $user->id)->first();

        if (!$residentialAddress) {
            $residentialAddress = new ResidentialAddress();
            $residentialAddress->user_id = $user->id;
        }

        $residentialAddress->street = $request->address['street'] ?? '';
        $residentialAddress->city = $request->address['city'] ?? '';
        $residentialAddress->state = $request->address['state'] ?? '';
        $residentialAddress->zip_code = $request->address['zip'] ?? '';
        $residentialAddress->save();

        $user->load('user_address');

        return response()->json(['success' => 'success', 'user' => $user]);
    }

    public function users() {
        $users = User::where("role", 'Admin')
        ->orWhere('role', 'Super admin')
        ->get();
        $total = $users->count();

        return response()->view('admin.users', compact('users','total'));
    }

    public function create(Request $request) {
        return response()->view('admin.create');
    }

    public function store(UserStoreRequest $request) {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);


        $user = User::create($data);
        $user->customer_number = 'CG00' . $user->id;
        $user->save();


        return response()->json('user created successfully');
    }

    public function getOtp(Request $request) {

        $email = User::where('email', $request->email)->select('email')->first();

        if (!$email) {
            return response()->json(['error' => 'Email does not exist.']);
        }
        
        $otp = rand(100000, 999999); 
        
        $storeOtp = Otp::create([
            'email' => $request->email,
            'otp' => $otp,
        ]);
        
        return response()->json([
            'success' => 'Otp successfully sent to your email',
            'message' => 'THIS IS THE OTP',
            'otp' => $storeOtp
        ]);
    }

    public function validateOtp(Request $request) {
        $otp = Otp::where('otp', $request->otp)->first();

        if (!$otp) {
            return response()->json(['error' => 'OTP not valid, please make sure it\'s correct']);
        }

        return response()->json(['otp' => $otp,'success' => 'Otp valid.']);
    }

    public function resetPassword(Request $request) {

        if($request->password !== $request->confirmPassword) {
            return response()->json(['message' => 'please make sure the passwords match']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['success' => 'Password reset successfully.']);
    }

}
