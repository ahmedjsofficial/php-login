# This documentation is powered by JSSTACK DEVELOPERS.
#-- Start the Server:
# sudo /opt/lampp/lampp start
#-- Now develope the Signup Form
# signup.php

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