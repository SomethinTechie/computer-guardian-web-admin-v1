<?php

namespace App\Http\Controllers;

use App\Models\ResidentialAddress;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cellphone = $request->mobileNumber;
        $user->save();

        //find or create ResidentialAddress
        $residentialAddress = ResidentialAddress::where('user_id', $user->id)->first();
        if (!$residentialAddress) {
            $residentialAddress = new ResidentialAddress();
            $residentialAddress->user_id = $user->id;
        }
        $residentialAddress->street = $request->address['street'];
        $residentialAddress->city = $request->address['city'];
        $residentialAddress->state = $request->address['state'];
        $residentialAddress->zip_code = $request->address['zip'];
        $residentialAddress->save();

        return response()->json(['success' => 'success', 'user' => $user]);
    }
}
