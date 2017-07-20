<?php

namespace Ibonly\FacebookAccountKit;

class FacebookAccountKit extends AccountKit
{
    public function getUserId($code)
    {
        return $this->getData($code)['id'];
    }

    public function getRefreshInterval($code)
    {
        return $this->getData($code)->token_refresh_interval_sec;
    }

    public function facebookAccountKit($code)
    {
        $accountKitData = $this->data($code);

        $output = [
            'id' => $accountKitData->id,
            'phoneNumber' => '',
            'email' => '',
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
