<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public function index(){
        $user = User::where('flag', 'active')->orWhere('flag', 'inactive')->get();
        return view('admin.index', [
            "title" => "Daftar User",
            "active" => "/admin",
            "user" => $user,
        ]);
    }

    public function update(Request $request){
        $user = User::where('username', $request['username'])->first();
        if ($user){
            if ($user['flag']=='inactive') {
                $user->update([
                    'flag' => 'active',
                ]);
                return response()->json(['success'=>'User telah diaktifkan', 'flag'=>$user['flag']]);
            }
            if ($user['flag']=='active') {
                $user->update([
                    'flag' => 'inactive',
                ]);
                return response()->json(['success'=>'User telah dinonaktifkan', 'flag'=>$user['flag']]);
            }
        }
        return response()->json(['failed'=>'Username tidak ditemukan']);
    }

    public function remove(Request $request){
        $user = User::where('username', $request['username'])->first();
        if ($user){
            $user->update([
                'flag' => 'deleted',
            ]);
            return response()->json(['success'=>'User telah dihapus']);
        }
        return response()->json(['failed'=>'Username tidak ditemukan']);
    }

    public function forgotPassword(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => 'Link reset password telah dikirimkan lewat email, silahkan cek folder spam Anda'])
                : back()->withErrors(['email' => 'User dengan email tersebut tidak ditemukan']);
    }

    public function resetPassword(Request $request){
        $rules = [
            'token' => 'required',
            'username' => 'required',
            'password' => 'required|min:6|max:255|confirmed',
        ];
        $customMessages = [
            'password.comfirmed' => 'Password tidak sama',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        
        if ($validator->passes()) {
            $status = Password::reset(
                $request->only('username', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));
        
                    $user->save();
        
                    event(new PasswordReset($user));
                }
            );
    
            return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', 'Password telah di reset, silahkan Log in')
                    : back()->withErrors(['username' => [__($status)]]);
        }
        return back()->with('error', 'Terdapat isian salah!');
    }
}
