<?php
    session_start();
    include 'connect.php';
    require_once 'includes/header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/register.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>REGISTRATION</h1>
            <h2>User Information</h2>
        </div>

        <div class="form_container">
            <form method="POST">
                <label>First Name</label>
                <input type="text" name="txtfname">

                <label>Middle Name</label>
                <input type="text" name="txtmname">

                <label>Last Name</label>
                <input type="text" name="txtlname">

                <label>Password</label>
                <input type="text" name="password">

                <label>Gender</label>
                <select name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <label>Mobile Number</label>
                <input type="text" name="txtmobile" value="+63" maxlength="13">

                <label>Email</label>
                <input type="email" name="txtemail">

                <input type="submit" name="bttnRegister" value="Register">
            </form>
        </div>
    </div>
    <script src="js/alerts.js"></script> <!-- Include JavaScript file -->
    <script>
        // Pass PHP variable to JavaScript
        let recordSaved = <?php echo json_encode($recordSaved ?? null); ?>;
        let errorMsg = <?php echo json_encode($errorMsg ?? null); ?>;
        if (recordSaved) {
            alert('New Record Added');
        }
        if (errorMsg) {
            alert(errorMsg);
        }
    </script>
</body>
</html>

<?php
    if (isset($_POST['bttnRegister'])) {
        $fname = $_POST['txtfname'];
        $mname = $_POST['txtmname'];
        $lname = $_POST['txtlname'];
        $pword = $_POST['password'];
        $gender = $_POST['gender'];
        $mobile = $_POST['txtmobile'];
        $email = $_POST['txtemail'];

        if (empty($fname) || empty($lname) || empty($gender) || empty($mobile) || empty($email) || empty($pword)) {
            echo "<script>
                alert('Some fields are empty!');
            </script>";
            header("Location: register.php");
            exit();
        }

        $sql1 = "INSERT INTO tbluser (fname, mname, lname, password, gender, mobilenumber, email) VALUES ('$fname', '$mname', '$lname', '$pword', '$gender', '$mobile', '$email')";
            mysqli_query($connection, $sql1);

            $sql2 = "SELECT * FROM tblaccount WHERE email = '$email'";
            $result = mysqli_query($connection, $sql2);
            $row = mysqli_num_rows($result);

        if ($row == 0) {
            $sql = "INSERT INTO tblaccount (email, password) VALUES ('$email', '$pword')";
            mysqli_query($connection, $sql);
            echo "<script>
                alert('New Record Added');
            </script>";
            header("Location: login.php");  
            exit();
        } else {
            echo "<script>
                alert('Email already existing');
            </script>";
            header("Location: register.php");
            exit();
        }
    }
?>

<?php require_once 'includes/footer.php'; ?>