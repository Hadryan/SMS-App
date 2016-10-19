<?php

defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_USER") ? null : define("DB_USER", "root");
defined("DB_PASS") ? null : define("DB_PASS", "");
defined("DB_NAME") ? null : define("DB_NAME", "sms");

$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

return $config = [

    'account_sid' => 'AC6456af9a9fd2aab6a6597517a1189f66',
    'auth_token'  => '2e3ced524081c1ed62157a2b134a713f',
    'phone_number'=> '8559503344',
    'india_cc'    => "+91",
    'receiver'    => "+919650237667"
];