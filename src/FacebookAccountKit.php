<?php
/*
 * This file is part of the Laravel Facebook Account-Kit package.
 *
 * (c) Adeniyi Ibraheem <ibonly01@gmail.com>
 * (c) Surajudeen AKande <surajudeen.akande@andela.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Ibonly\FacebookAccountKit;

class FacebookAccountKit extends AccountKit
{
    /**
     * Get All User Data
     *
     * @param string $code
     * @return array
     */
    public function accountKitData($code)
    {
        $data = $this->data($code);

        $output = [
            'id' => $data->id,
            'phoneNumber' => '',
            'email' => '',
        ];

        if (array_key_exists('phone', $data)) {
            $output['phoneNumber'] = $data->phone->number ?? null;
        }

        if (array_key_exists('email', $data)) {
            $output['email'] = $data->email->address ?? null;
        }

        return $output;
    }
}
