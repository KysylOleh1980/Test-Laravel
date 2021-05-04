<?php

namespace App\Serverces;

use App\Exceptions\InvalidToken;

class Contacts 
{
	
	const url = 'https://www.zohoapis.eu/crm/v2/Contacts';

	public static function getContacts(string $access_token){

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