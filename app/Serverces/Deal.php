<?php

namespace App\Serverces;

use App\Exceptions\InvalidToken;

class Deal
{

	const url = 'https://www.zohoapis.eu/crm/v2/Deals';

	public static function save($OwnerId, $Closing_Date, $DealName, $ExpectedRevenue, $Stage, $Account_Name, $Amount, $Probability, $access_token){

	$paramOwner = '"Owner": {"id": "'.$OwnerId.'"}';
	$paramClosing_Date = '"Closing_Date": "'.$Closing_Date.'"';
	$paramDealName = '"Deal_Name": "'.$DealName.'"';
	$paramExpectedRevenue = '"Expected_Revenue": '.$ExpectedRevenue;
	$paramStage = '"Stage": "'.$Stage.'"';
	$paramAccount_Name = '"Account_Name": { "id": "'.$Account_Name.'"}';
	$paramAmount = '"Amount": '. $Amount;
	$paramProbability = '"Probability": '.$Probability;

	$param = '{ "data": [{'.$paramOwner. ','.$paramClosing_Date.','.$paramDealName.','. $paramExpectedRevenue. ','.$paramStage.','. $paramAccount_Name.','. $paramAmount.','.$paramProbability.'}]}';

	
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

	public static function getDeals($access_token){
	
	$ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, Self::url);
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Zoho-oauthtoken $access_token" ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close ($ch);

    $result = json_decode($server_output);

    if (property_exists($result, 'status')) {
         if ($result->code == 'INVALID_TOKEN') {
                     throw new InvalidToken('INVALID_TOKEN');
            }   
    }

    return $result;
	

	}



}