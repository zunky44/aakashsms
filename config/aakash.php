<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    //aaskashSMS auth token from dashboard
    'auth_token' => '',

    //Identity about the sender provide by AakashSMS
    'from'       => '',

    'apiURL' => 'http://aakashsms.com/admin/public/sms/v1/',
    'methods' =>  [
        'send' => 'send/',
        'credit'  => 'credit/'
    ]

];

