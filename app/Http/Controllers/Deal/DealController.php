<?php

namespace App\Http\Controllers\Deal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Serverces\Accounts;
use App\Serverces\Deal;
use App\Exceptions\InvalidToken;
use App\Serverces\Owner;

use Illuminate\Support\Facades\Session;

class DealController extends Controller
{
    public function create()
    {  
        $access_token = Session::get('access_token');
        
        try {
            $AccountsCollection=Accounts::getAccounts($access_token);            
        } catch (InvalidToken $e) {
            return view('invalid-token', ['scope' => Owner::scope, 'client_id' => Owner::client_id, 'redirect_uri' => Owner::redirect_uri]);
        }

        return view('deal-form', ['AccountsCollection' => $AccountsCollection]);

    }

    public function save(Request $request){
        $access_token = Session::get('access_token');

        $DealName = $request->get('DealName');
        $AccountName = $request->get('AccountName');
        $ExpectedRevenue = $request->get('ExpectedRevenue');
        $ClosingDate = $request->get('ClosingDate');
        $Amount = $request->get('Amount');
        $Probability = $request->get('Probability');
        $Stage = $request->get('Stage');

        $result = Deal::save(Owner::id, $ClosingDate, $DealName, $ExpectedRevenue, $Stage, $AccountName, $Amount, $Probability, $access_token);


        if ($result->data[0]->code == 'SUCCESS') {
            return view('deal-succes');
        }
    }

    
}
