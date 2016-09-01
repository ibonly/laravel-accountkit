<?php

namespace Ibonly\AccountKit;

use Illuminate\Support\Facades\Config;

class AccountKit
{

    protected $tokenUrl;
    protected $meTokenUrl;

    public function __construct()
    {
        $this->tokenUrl = 'https://graph.accountkit.com/v1.0/access_token';
        $this->meTokenUrl = 'https://graph.accountkit.com/v1.0/me?access_token=';

    }

    public function tokenUrl($code, $appId, $appSecret)
    {
        return $this->tokenUrl.'?grant_type=authorization_code&code={$code}&access_token=AA|{$appId}|{$appSecret}';
    }

    public function getFacebookAppID()
    {
        return Config::get('services.facebook.client_id');
    }

    public function getFacebookAppSecret()
    {
        return Config::get('services.facebook.client_secret');
    }

    public function tokenExchangeEndPoint($code)
    {
        return $this->tokenUrl($code, $this->getFacebookAppID(), $this->getFacebookAppSecrete());
    }

    public function doCurl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $data;
    }

    public function getData($code)
    {
        return $this->doCurl($this->tokenExchangeEndPoint($code));
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

    public function meEndPoint()
    {
        return $this->meTokenUrl.''.$this->getAccessToken();
    }

    public function data()
    {
        return $this->doCurl($this->meEndPoint());
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
