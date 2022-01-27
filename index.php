<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup - JSSTACK DEVELOPERS</title>
    <?php include "./utils/links.php" ?>
</head>
<body>

<?php 

    include './connection.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        $pswd = password_hash($password, PASSWORD_BCRYPT);
        $con_pswd = password_hash($confirm_password, PASSWORD_BCRYPT);

        $email_select = "SELECT * FROM register WHERE email='$email'";
        $email_verify = mysqli_query($dbCon,$email_select);
        $count_email = mysqli_num_rows($email_verify);

        if($count_email > 0){
            echo "Email Already Exists";
        }else{
            echo "Email Does not Exists";
        }

        $insert_query = "INSERT INTO register(username, email, phone, password, confirm_password) VALUES ('$username','$email','$phone','$pswd','$con_pswd')";
        $execute_query = mysqli_query($dbCon, $insert_query);

        if($execute_query) {
            echo "Data Inserted Successfully";
        }else{
            echo "No, Data Inserted";
        }

    }

?>

    
    <main class="main">
        <div class="col-lg-6 col-md-11 col-sm-11 col-11 mx-lg-auto mx-md-auto mx-sm-auto mx-auto">
            <form method="POST" name="signup_form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                <div class="form-floating">
                    <input type="text" name="username" placeholder="Username" class="form-control" id="floatingUsername" autocomplete="off" required>
                    <label for="floatingUsername">Username</label>
                </div>
                <div class="form-floating my-4">
                    <input type="email" name="email" placeholder="Email" class="form-control" id="floatingEmail" autocomplete="off" required>
                    <label for="floatingEmail">Email</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="phone" placeholder="Phone number" class="form-control" id="floatingPhone" autocomplete="off" required>
                    <label for="floatingPhone">Phone Number</label>
                </div>
                <div class="form-floating my-4">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" autocomplete="off" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating my-4">
                    <input type="password" name="confirm_password" class="form-control" id="floatingCPassword" placeholder="Password" autocomplete="off" required>
                    <label for="floatingCPassword">Confirm Password</label>
                </div>
                <div class="button-group">
                    <input type="submit" name="submit" class="form-control bg-primary text-white" value="Create an account" />
                    <p class="text-center text-black fs-5 d-block mt-1">Already Have an account!! <a href="" class="btn-link">SIGN IN</a></p>
                </div>
            </form>
        </div>
    </main>

</body>
</html>