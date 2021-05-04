<?php

namespace App\Serverces;

class Token
{

	const url = 'https://accounts.zoho.eu/oauth/v2/token';
	
	public static function getToken(string $code, string $client_id, string $client_secret, string $redirect_uri){

	$param ="client_id=$client_id&client_secret=$client_secret&redirect_uri=$redirect_uri&grant_type=authorization_code&code=$code";

	$ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, Self::url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close ($ch);

        $result = json_decode($server_output);

        return $result;
	}
}