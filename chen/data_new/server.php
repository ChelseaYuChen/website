<?php 
error_reporting(E_ERROR | E_PARSE);
session_start();
    
    $username = "";
    $email = "";
    $errors = array();

    $db = @mysqli_connect('localhost', 'id6396725_register', '123456', 'id6396725_registration');

    // define('DB_SERVER', "localhost");
    // define('DB_USER', "id6396725_registration");
    // define('DB_PASSWORD', "G45623498");
    // define('DB_DATABASE', "id6396725_registration");
    // define('DB_DRIVER', "mysql");

    // $db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    // date_default_timezone_set("Asia/Taipei");




    if(isset($_POST['register'])){

            
            $username = mysqli_real_escape_string($db, $_POST['username']);
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
            $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
          
            if (empty($username)) { array_push($errors, "Username is required"); }
            if (empty($email)) { array_push($errors, "Email is required"); }
            if (empty($password_1)) { array_push($errors, "Password is required"); }
            if ($password_1 != $password_2) {
              array_push($errors, "The two passwords do not match");
            }
          
            
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            
            if ($user) { // if user exists
              if ($user['username'] == $username) {
                array_push($errors, "Username already exists");
              }
          
              if ($user['email'] == $email) {
                array_push($errors, "email already exists");
              }
            }
          
            
            if (count($errors) == 0) {
                $password = md5($password_1);
          
                $query = "INSERT INTO users (username, email, password) 
                          VALUES('$username', '$email', '$password')";
                mysqli_query($db, $query);

                //-------------------------------------------------------------
                // if (mysqli_num_rows($results) == 1) {
                  $_SESSION['username'] = $username;
                  $_SESSION['success'] = "You are now logged in";
                  header('location: index_back.php');
                // }
                // else {
                //   array_push($errors, "Wrong username/password combination");
                // }
            }
          }

          //log for user in login page

          if(isset($_POST['login'])){

            $username = mysqli_real_escape_string($_POST['username']);
            $password = mysqli_real_escape_string($_POST['password']);

            if(empty($username)){
              array_push($errors,"Username is required");
              
            }
            if(empty($password)){
              array_push($errors,"Password is required");
            }

          
           
          }

          //logout

          if(isset($_GET['logout'])){

            session_destroy();
            unset($_SESSION['username']);
            header('location: login.php');
          }


  ?>     
