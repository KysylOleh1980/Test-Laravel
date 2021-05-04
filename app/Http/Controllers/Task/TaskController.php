<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Serverces\Contacts;
use App\Serverces\Deal;
use App\Serverces\Task;
use App\Exceptions\InvalidToken;
use App\Serverces\Owner;

use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function assign()
    {  
        $access_token = Session::get('access_token');
        
        try {
            $ContactsCollection = Contacts::getContacts($access_token);
            $DealCollection = Deal::getDeals($access_token);               
        } catch (InvalidToken $e) {
            return view('invalid-token', ['scope' => Owner::scope, 'client_id' => Owner::client_id, 'redirect_uri' => Owner::redirect_uri]);
        }

        return view('task-form', ['ContactsCollection' => $ContactsCollection, 'DealCollection' => $DealCollection]);

    }

    public function savetask(Request $request){

        $access_token = Session::get('access_token');

        $Subject = $request->get('Subject');
        $DuoDate = $request->get('DuoDate');
        $ContactId = $request->get('Contacts');
        $DealId = $request->get('Deal');
        $Status = $request->get('Status');

        $result = Task::save($Subject, $DuoDate, $Status, $ContactId, $DealId, $access_token);

        if ($result->data[0]->code == 'SUCCESS') {
            return view('task-succes');
        }
    }

    
}
