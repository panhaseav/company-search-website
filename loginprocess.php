
<?php
    //Start a session.
    session_start();
    //links the connection.php page to this page.
    include "connection.php";
    //Checks wether a variable set to login.
    if(isset($_POST['login']))
    {
        //set the username from user to $username_form.
        $username_form = $_POST['username'];
        //set the password from user to $password_form.
        $password_form = $_POST['password'];
        //set the $password_form to $password_hash.In $password_hash it hashes the password from user .
        $password_hash = md5($password_form);
        //it check if $username_form or $password_form is empty or $username_form and $password_form is  empty
        if((empty($username_form) || empty($password_form)) || empty($username_form) && empty($password_form)){
            //it check wether the $username_form and $password_form is empty
            if(empty($username_form) && empty($password_form)){
                // if the condition above is true it redirect to login page with error.
                header("Location: loginpage.php?error=both");
            }
            else{
                //It checks if $username_form is empty
                if(empty($username_form)) {
                    // if the condition above is true it redirect to login page with error.
                    header("Location: loginpage.php?error=usrempty");
                }
                //It checks if $password_form is empty
                elseif(empty($password_form)) {
                    // if the condition above is true it redirect to login page with error.
                    header("Location: loginpage.php?error=passempty");
                }
            }
        }
        else{
            // It check if the preparation statement is not working.
            if(!$stmt = $connection->prepare("SELECT user_name,pass_word FROM Login_tbl where user_name = ? and pass_word = ? ")){
                //print out a error message
                echo "prepaeation failed";
            }
            // It check if the binding param  is not working.
            if(!$stmt->bind_param("ss", $username_form, $password_hash)){
                //print out a error message
                echo "binding failed";
            }
            // It check if the execution is not working.
            if(!$stmt->execute()){
                //print out a error message
                echo "execution failed";
            }
            $stmt->bind_result($username,$password);
            //fetch assosiated results
            $row = $stmt->fetch();
            //It checks if the entered username and password matches the database.
            if($username ==$username_form && $password == $password_hash)
            {
                //if it satisfy the condition above it create the session to a variable called $username;
                $_SESSION['username'] = $username;
                // if there is a value for session redirects to admindashboard.
                if(isset($_SESSION['username'])){
                    header("Location: admindashboard.php?user=$username");
                }
                else{
                    // if redirects to admindashboard.
                    header("Location: loginpage.php");
                }
            }
            else{
                // It redirects to login page with an error message.
                header("Location: loginpage.php?error=InvalidEntry");
                exit();
            }
          }
        //closing the connection
        $connection -> close();
        }
     
?>

