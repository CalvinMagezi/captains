<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use App\Mail\SigninEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt;
use DB;
 
class AuthController extends Controller
{
 
    /**
     * Processes the logout
     *
     * @param \Illuminate\Http\Request $request
     * @return redirect
     **/
    public function logout(Request $request)
    {
        // logout
    Auth::logout();
 
    // Redirect to homepage
    return redirect('/');
    }


}