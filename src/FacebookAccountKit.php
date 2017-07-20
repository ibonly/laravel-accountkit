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

    public function kitDetails($code)
    {
        $data = $this->data($code);

        $val = [
            'id' => $data->id,
            'phoneNumber' => '',
            'email' => '',
        ];

        if (array_key_exists('phone', $data)) {
            $val['phoneNumber'] = $data->phone->number ?? null;
        }

        if (array_key_exists('email', $data)) {
            $val['email'] = $data->email->address ?? null;
        }

        return $val;
    }
}
