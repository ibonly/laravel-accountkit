<?php

namespace Ibonly\FacebookAccountKit;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Config;

class FacebookAccountKit
{

    protected $client;
    protected $tokenUrl;
    protected $meTokenUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->accessTokenUrl = 'https://graph.accountkit.com/v1.0/access_token';
        $this->meTokenUrl = 'https://graph.accountkit.com/v1.0/me?access_token=';
    }

    protected function tokenUrl($code, $appId, $appSecret)
    {
        return $this->accessTokenUrl.'?grant_type=authorization_code&code='.$code.'&access_token=AA|'.$appId.'|'.$appSecret;
    }

    protected function getFacebookAppID()
    {
        return Config::get('facebookAccountKit.appId');
    }

    protected function getFacebookAppSecret()
    {
        return Config::get('facebookAccountKit.appSecret');
    }

    protected function tokenExchangeEndPoint($code)
    {
        return $this->tokenUrl($code, $this->getFacebookAppID(), $this->getFacebookAppSecret());
    }

    public function getData($code)
    {
        $data = $this->client->request('GET', $this->tokenExchangeEndPoint($code));

        return json_decode($data->getBody());
    }

    public function getUserId($code)
    {
        return $this->getData($code)['id'];
    }

    public function getAccessToken($code)
    {
        return $this->getData($code)['access_token'];
    }

    public function getRefreshInterval($code)
    {
        return $this->getData($code)['token_refresh_interval_sec'];
    }

    public function meEndPoint($code)
    {
        return $this->meTokenUrl.''.$this->getAccessToken($code);
    }

    public function data()
    {
        return $this->client->request('GET', $this->meEndPoint());
    }

    public function getPhone()
    {
        return $this->data()['phone']['number'];
    }

    public function getEmail()
    {
        return $this->data()['email']['address'];
    }
}
