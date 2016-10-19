<?php require '../includes/header.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

    if (isset($_POST['submit'])){

        if (isset($_POST['number']) && isset($_POST['message'])){

            $client = new Client($config['account_sid'], $config['auth_token']);

            $sanitized_number = trim($_POST['number']);
            $sanitized_message = trim($_POST['message'], "\0");

            $con->query("INSERT INTO messages(phone_number, message) VALUES ('$sanitized_number', '$sanitized_message')");

            $client->messages->create(
                // the number you'd like to send the message to
                $sanitized_number,
                array(
                    // The Twilio phone number you purchased at twilio.com/console
                    'from' => $config['phone_number'],
                    // the body of the text message you'd like to send
                    'body' => $sanitized_message)
            );

            echo "<h6 id='successMsg' class='text-center'>Your Message has been sent</h6>";
        }
    }

?>

    <div class="col-sm-6 col-sm-offset-3">

        <form role="form" method="post">
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input name="number" type="text" class="form-control" id="phoneNumber" required placeholder="Enter Number">
            </div>
            <div class="form-group">
                <textarea name="message" id="message" cols="30" rows="10" required class="form-control"></textarea>
            </div>

            <input name="submit" type="submit" class="btn btn-primary btn-block" value="Send Message">
        </form>

    </div>

<?php require '../includes/footer.php'?>