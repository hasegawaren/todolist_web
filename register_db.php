<?php 

    session_start();
    require_once("config.php");

    if (isset($_POST['signup'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $urole = 'user';

        if (empty($firstname)) {
            $_SESSION["error"] = "Please enter your first name!";
            header("location: login1.php");
        } else if (empty($lastname)) {
            $_SESSION["error"] = "Please enter your last name!";
            header("location: login1.php");
        } else if (empty($email)) {
            $_SESSION["error"] = "Please enter your email!";
            header("location: login1.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"] = "Invalid email!";
            header("location: login1.php");
        } else if (empty($password)) {
            $_SESSION["error"] = "Please enter your password!";
            header("location: login1.php");
        } else if (strlen($password) > 20 || strlen($password) < 5) {
            $_SESSION["error"] = "The password must be between 5 and 20 characters long!";
            header("location: login1.php");
        } else if (empty($c_password)) {
            $_SESSION["error"] = "Please confirm your password!";
            header("location: login1.php");
        } else if ($password != $c_password) {
            $_SESSION["error"] = "Passwords do not match!";
            header("location: login1.php");
        } else {
            try {

                $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email) {
                    $_SESSION['warning'] = "This email is already in the system <a href='login.php' class='alert-link'>Click here</a> to login";
                    header("location: login1.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users(firstname, lastname, email, password, urole) VALUES(:firstname, :lastname, :email, :password, :urole)");
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();

                 

                    $sToken = "r5N08z43EKN2UhRjF58xTMqE39y0opLSciMB3Tx7kFK";
                    $sMessage = "Subscription notification!\r\n";
                    $sMessage .= $firstname . " " . $lastname . " You have subscribed!\r\n";
                    $sMessage .= "Full Name: " . $firstname . " " . $lastname . " \r\n";
                    $sMessage .= "Email: " . $email . " \r\n";

                    $chOne = curl_init(); 
                    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
                    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
                    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
                    curl_setopt( $chOne, CURLOPT_POST, 1); 
                    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
                    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
                    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
                    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
                    $result = curl_exec( $chOne ); 

                    //Result error 
                    if(curl_error($chOne)) 
                    { 
                        echo 'error:' . curl_error($chOne); 
                    } 
                    else { 
                        $result_ = json_decode($result, true); 
                        echo "status : ".$result_['status']; echo "message : ". $result_['message'];
                    } 
                    curl_close( $chOne );

                    $_SESSION['success'] = "This email is already in the system <a href='login.php' class='alert-link'>Click here</a> to login";
                    header("location: login1.php");
                } else {
                    $_SESSION['error'] = "something went wrong";
                    header("location: login1.php");
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>