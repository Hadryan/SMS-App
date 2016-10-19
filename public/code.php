<?php require '../includes/header.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

    $client = new Client($config['account_sid'], $config['auth_token']);

    $_SESSION['code'] = $code = mt_rand(100000, 999999);;

    $receiver = $config['receiver'];

    $con->query("INSERT INTO verifications(phone_number, verification_code) VALUES ('$receiver', '$code')");

    $client->messages->create(
    // the number you'd like to send the message to
        $config['receiver'],
        array(
            // The Twilio phone number you purchased at twilio.com/console
            'from' => $config['phone_number'],
            // the code you'd like to send
            'body' => "Your verification code is " . $code)
    );

    echo "<h6 class='text-center'>Your code has been sent</h6>";


require '../includes/footer.php';