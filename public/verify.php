<?php require '../includes/header.php';

if (isset($_POST['submit'])) {

    if(isset($_POST['code'])){

        $code = $_SESSION['code'];

        $res = $con->query("SELECT * FROM verifications WHERE verification_code = '{$code}'");
        echo "number of rows: " . $res->num_rows;

        while($row = $res->fetch_assoc()) {

            if (trim($_POST['code']) == $row['verification_code']) {

                $con->query("UPDATE verifications SET status = 1 WHERE verification_code = '{$code}'");

                header("Location: success.php");
            } else {

                echo "<h6 class='bg-danger text-center'>Wrong code, please try again</h6>";
            }
        }
    }
}


?>

<div class="row">

    <div class="col-sm-6 col-sm-offset-3">

        <form role="form" method="post">
            <div class="form-group">

                <input name="code" type="text" class="form-control" id="code" required placeholder="Enter Code">
            </div>

            <input name="submit" type="submit" class="btn btn-primary btn-block" value="Verify">
        </form>

    </div>
</div>


<?php require '../includes/footer.php'?>