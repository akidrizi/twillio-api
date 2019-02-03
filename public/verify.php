<?php require '../includes/header.php';?>
<?php
if (isset($_POST['submit'])) {

    if (isset($_POST['code'])) {

        if ($_POST['code'] == $_SESSION['code']) {
            header("Location: success.php");
        } else {
            echo "<div class='row'><h3 class='bg-danger text-center'>Wrong code, please try again</h3></div>";
        }

    }

}

?>

<form role="form" method="post">
    <div class="form-group">
        <label for="number">Phone Number</label>
        <input name="code" type="tel" class="form-control" placeholder="Enter your code" required>
    </div>
    <input name="submit" type="submit" class="btn btn-primary btn-block" value="Verify" required>
</form>

<?php require '../includes/footer.php';?>
