<?php

/*
 * This file is part of the Laravel EtextMail package.
 *
 * (c) Adeniyi Ibraheem <ibonly01@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    'senderid' => getenv('ETEXTMAIL_SENDER'),

    'username' => getenv('ETEXTMAIL_EMAIL'),

    'password' => getenv('EXTEXTMAIL_PASSWORD'),

    'url'	   => getenv('ETEXTMAIL_URL'),
];
