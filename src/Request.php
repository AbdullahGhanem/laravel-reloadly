<?php

namespace Ghanem\Reloadly;

use Illuminate\Support\Facades\Http;

class Request
{
    static public function request($method, $endpoint, array $params = [])
    {
        $domian = config('reloadly.is_production') ?  "https://dvs-api.reloadly.com/" : "https://topups-sandbox.reloadly.com/";
        $client_id = config('reloadly.is_production')?config('reloadly.client_id'):config('reloadly.test_client_id');
        $secret = config('reloadly.is_production')?config('reloadly.secret'):config('reloadly.test_secret');

        $response = Http::post('https://auth.reloadly.com/oauth/token', [
            "client_id" => $client_id ,
            "client_secret" => $secret,
            "grant_type" => "client_credentials",
            "audience" => "https://topups-sandbox.reloadly.com"
        ]);

        $token = $response->json()['access_token'];

        $response = Http::withHeaders([
            'Accept' => 'application/com.reloadly.topups-v1+json',
        ])->withToken($token)->$method($domian . $endpoint, $params);
        if($response->ok()){
            return $response->collect();
        }else{
            return array_merge(['status_code' => $response->status()], $response->json()) ;
        }
    }

    static public function countries($page, $per_page)
    {
        $params = [];
        isset($page) ? $params['page'] = $page : null;
        isset($per_page) ? $params['per_page'] = $per_page : null;
        $params['list_api'] = true;
        return Request::request('get', 'countries', $params);
    }

    static public function countryByIsoCode($iso_code)
    {
        $endpoint = 'countries/' . $iso_code ;
        return Request::request('get', $endpoint);
    }

    static public function operators($country_iso_code, $page, $per_page)
    {
        $params = [];
        isset($page) ? $params['page'] = $page : null;
        isset($per_page) ? $params['per_page'] = $per_page : null;
        isset($country_iso_code) ? $params['country_iso_code'] = $country_iso_code : null;
        $params['list_api'] = true;

        if(isset($country_iso_code))
            $domain = "operators/countries/{$country_iso_code}";
        else
            $domain = "operators";

        return Request::request('get', $domain, $params);
    }

    static public function operatorById($id)
    {
        $endpoint = 'operators/' . $id ;
        return Request::request('get', $endpoint);
    }

    static public function autoDetectOperator($country_iso_code, $phone)
    {
        $endpoint = "operators/auto-detect/phone/{$phone}/countries/{$country_iso_code}";
        return Request::request('get', $endpoint);
    }

    static public function balances()
    {
        return Request::request('get', 'accounts/balance');
    }

    static public function createTransaction($operator_id, $amount, $recipient_phone, $refrance_id = null)
    {
        $params['operatorId'] = $operator_id;
        $params['amount'] = $amount;
        $params['recipientPhone'] = $recipient_phone;
        $params['countryCode'] = $recipient_phone['countryCode'];
        $params['useLocalAmount'] = true;
        isset($refrance_id) ? $params['customIdentifier'] = $refrance_id : null;

        return Request::request('post', 'topups', $params);
    }

    static public function transactions($page, $per_page)
    {
        $params = [];
        isset($page) ? $params['page'] = $page : null;
        isset($per_page) ? $params['per_page'] = $per_page : null;
        $params['list_api'] = true;
        return Request::request('get', 'topups/reports/transactions', $params);
    }

    static public function transactionById($id)
    {
        return Request::request('get', "topups/reports/transactions/{$id}");
    }
}
