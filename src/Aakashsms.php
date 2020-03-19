<?php

namespace Zunky44\Aakashsms;

use GuzzleHttp\Client;

class Aakashsms
{
    // Build your next great package.

    public static function getAuthToken()
    {
        return config('aakash.auth_token');
    }

    public static function getFrom()
    {
        return config('aakash.from');
    }

    public static function getAPIUrl()
    {
        return config('aakash.apiURL');
    }

    public static function getSendURL()
    {
        return Aakashsms::getAPIUrl() . config('aaksah.methods.send');
    }

    public static function getCreditURL()
    {
        return Aakashsms::getAPIUrl() . config('aaksah.methods.credit');
    }

    public static function send($to = null, $from = null, $message = null, $auth_token = null)
    {

        if (is_null($to) || is_null($message)) {
            return json_encode([
                'response' => 'A required field is missing',
                'response_code' => 4000
            ]);
        }

        $from = is_null($from) ? Aakashsms::getFrom() : $from;
        $auth_token = is_null($auth_token) ? Aakashsms::getAuthToken() : $auth_token;

        $args = http_build_query(array(
            'auth_token'=> $auth_token,
            'from'  => $from,
            'to'    => $to,
            'text'  => $message
        ));
        $url = Aakashsms::getSendURL();

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1); ///
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Response
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;

    }


    public static function credits($auth_token = Null)
    {
        $accessToken = is_null($auth_token) ? Aakashsms::getAuthToken() : $auth_token;

        $client = new Client();
        $request = $client->get(Aakashsms::getCreditUrl(), [
            'query' => [
                'token' => $auth_token
            ],
            'http_errors' => false
        ]);

        $response = $request->getBody();
        return $response;


    }
}
