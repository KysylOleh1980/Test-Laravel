<?php

namespace App\Http\Controllers\Token;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Serverces\Owner;
use App\Serverces\Token;

class TokenController extends Controller
{
    
    public function token(Request $request){
        $code = $request->input('code');

        $token = Token::getToken($code, Owner::client_id, Owner::client_secret, Owner::redirect_uri);

        Session::put('access_token', $token->access_token);
        Session::put('refresh_token', $token->refresh_token);
        
        return redirect('/');
    }
}    