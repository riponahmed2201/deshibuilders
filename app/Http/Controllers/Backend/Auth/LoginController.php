<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }

    public function login(LoginRequest $loginRequest)
    {
        try {

            $adminUser = Admin::where('email', $loginRequest->email)->where('status', 'YES')->first();

            if (!empty($adminUser)) {

                if (Hash::check($loginRequest->password, $adminUser->password)) {

                    $user_data = [
                        "id" => $adminUser->id,
                        "name" => $adminUser->name,
                        "role_id" => $adminUser->role_id,
                        "email" => $adminUser->email,
                    ];

                    session()->put('logged_session_data', $user_data);
                    return redirect()->intended(url('/admin/dashboard'));

                } else {
                    return redirect(url('/admin/login'))->withInput()->with('error', 'Wrong password');
                }
            }

            return redirect(url('/admin/login'))->withInput()->with('error', 'Please give the valid information');

        } catch (\Throwable $th) {
            return redirect(url('/admin/login'))->with('error', $th->getMessage());
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect(url('/admin/login'))->with('success', 'logout successful ..!');
    }
}
