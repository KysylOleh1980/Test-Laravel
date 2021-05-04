<?php

namespace App\Serverces;

use App\Exceptions\InvalidToken;

class Task 
{
	
	const url = 'https://www.zohoapis.eu/crm/v2/Tasks';

	public static function save($Subject, $Due_Date, $Status, $ContactsId, $DealId, $access_token){

    $paramSubject = '"Subject": "'.$Subject.'"';
    $paramDue_Date = '"Due_Date ": "'.$Due_Date.'"';
    $paramStatus = '"Status": "'.$Status.'"';
    $paramContactId = '"Who_Id": "'.$ContactsId.'"';
    $paramDealId = '"What_Id": "'.$DealId.'"';

    $param = '{"data": [{'.$paramSubject.','.$paramDue_Date.','.$paramStatus. ',' .$paramContactId.', "$se_module": "Deals", '.$paramDealId.'}]}';

	$ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, Self::url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Zoho-oauthtoken $access_token" ]);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $param);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close ($ch);

    $result = json_decode($server_output);

    return $result; 
	}
}