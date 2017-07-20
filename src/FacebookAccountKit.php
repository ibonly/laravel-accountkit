<?php

namespace Ibonly\FacebookAccountKit;

class FacebookAccountKit extends AccountKit
{
    public function getUserId($code)
    {
        return $this->getData($code)['id'];
    }

    public function getAppToken($code)
    {
        return $this->getData($code);
    }

    public function facebookAccountKit($code)
    {
        $accountKitData = $this->data($code);
        $token = $this->getAppToken($code);

        $output = [
            'id' => $accountKitData->id,
            'phoneNumber' => '',
            'email' => '',
            'token' => $token->access_token,
            'timeInterval' => $token->token_refresh_interval_sec
        ];

        if (array_key_exists('phone', $accountKitData)) {
            $output['phoneNumber'] = $accountKitData->phone->number ?? null;
        }

        if (array_key_exists('email', $data)) {
            $output['email'] = $data->email->address ?? null;
        }

        return $output;
    }
}
