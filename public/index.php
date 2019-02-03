<?php require '../includes/header.php';?>
<?php
use Twilio\Rest\Client;

if (isset($_POST['submit'])) {

    // Sanitize data for storing to databases
    if (isset($_POST['number']) && isset($_POST['message'])) {

        $client = new Client($config['account_sid'], $config['auth_token']);

        $client->messages->create(
            $_POST['number'],
            array(
                'from' => $config['phone_number'],
                'body' => $_POST['message'],
            )
        );

        echo "<h3 class='text-center bg-success'>Message has been sent!</h3>";

    }

}

?>

<form role="form" method="post">
    <div class="form-group">
        <label for="number">Phone Number</label>
        <input name="number" type="tel" class="form-control" placeholder="Enter Number" required>
    </div>
    <div class="form-group">
        <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Enter your message..." required></textarea>
    </div>

    <input name="submit" type="submit" class="btn btn-primary btn-block" value="Send Message">
</form>

<?php require '../includes/footer.php';?>
