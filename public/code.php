<?php require '../includes/header.php';?>
<?php
use Twilio\Rest\Client;

if (isset($_POST['submit'])) {

    $client = new Client($config['account_sid'], $config['auth_token']);

    $_SESSION['code'] = $code = rand(1000, 9999);

    $client->messages->create(
        $_POST['number'],
        array(
            'from' => $config['phone_number'],
            'body' => $code,
        )
    );

    echo "<h3 class='text-center bg-success'>Your code has been sent! <a href='verify.php'>Verify</a></h3>";

}

?>

<form role="form" method="post">
    <div class="form-group">
        <label for="number">Phone Number</label>
        <input name="number" type="tel" class="form-control" placeholder="Enter Number" required>
    </div>
    <input name="submit" type="submit" class="btn btn-primary btn-block" value="Send Code" required>
</form>

<?php require '../includes/footer.php';?>
