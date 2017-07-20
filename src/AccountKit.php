<?php

namespace Ibonly\FacebookAccountKit;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use GuzzleHttp\Exception\RequestException;

class AccountKit
{
    protected $client;
    protected $tokenUrl;
    protected $meTokenUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->accessTokenUrl = 'https://graph.accountkit.com/v1.1/access_token';
        $this->meTokenUrl = 'https://graph.accountkit.com/v1.1/me?access_token=';
    }

    private function tokenUrl($code, $appId, $appSecret)
    {
        $url = $this->accessTokenUrl.'?grant_type=authorization_code&code='.$code.'&access_token=AA|'.$appId.'|'.$appSecret;

        return $url;
    }

    private function getFacebookAppID()
    {
        return Config::get('AccountKit.appId');
    }

    private function getFacebookAppSecret()
    {
        return Config::get('AccountKit.appSecret');
    }

    private function getVersion()
    {
        return Config::get('AccountKit.version');
    }

    private function tokenExchangeEndPoint($code)
    {
        return $this->tokenUrl($code, $this->getFacebookAppID(), $this->getFacebookAppSecret());
    }

    private function getContentBody($url)
    {
        $data = $this->client->request('GET', $url);

        return json_decode($data->getBody());
    }

    private function getAccessToken($code)
    {
        return $this->getData($code)->access_token;
    }

    private function meEndPoint($code)
    {
        return $this->meTokenUrl.''.$this->getAccessToken($code);
    }

    public function getData($code)
    {
        $url = $this->tokenExchangeEndPoint($code);

        return $this->getContentBody($url);
    }

    public function data($code)
    {
        return $this->getContentBody($this->meEndPoint($code));
    }
}
