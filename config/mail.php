<?php
use System\Config\Env;
return 
[

    /*
    |--------------------------------------------------------------------------
    | Email configuration
    |--------------------------------------------------------------------------
    |
    |
    |
    */
    'SMTP' => [
        'PHPMailer' => Env::get('PHPMAILER'),
        'Host'       => Env::get('HOST'),
        'SMTPAuth'   => Env::get('SMTPAUTH'),
        'Username'   => Env::get('USERNAME'),
        'Password'   => Env::get('PASSWORD'),
        'Port'       => Env::get('PORT'),
        'setFrom'    => [
            'mail'  =>  Env::get('MAIL'),
            'name'  =>  Env::get('NAME')
        ],
        'SMTPDebug' => Env::get('SMTPDEBUG'),
        'CharSet' => Env::get('CHARSET'),
        'HTML' => Env::get('HTML')
    ]

];