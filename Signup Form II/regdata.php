<?php
$fname = $lname = $email = $password = $confirm_password = $user_password = $agreement = "";
$fname_err = $lname_err = $email_err = $password_err = $conf_password_err = $unmatched_pass_err = $agreement_err =  "";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(!empty($_POST["fname"])){
        $fname = validateData($_POST["fname"]);
    }else {
        $fname_err = " *First name is required!";
    }

    if(!empty($_POST["lname"])){
        $lname = validateData($_POST["lname"]);
    }else {
        $lname_err = " *Last name is required!";
    }

    if(!empty($_POST["email"])){
        $email = validateData($_POST["email"]);
    }else {
        $email_err = " *Email name is required!";
    }

    if(!empty($_POST["password"])){
        $password = validateData($_POST["password"]);
    }else {
        $password_err = " *Password is required!";
    }

    if(!empty($_POST["confirm_password"])){
        $confirm_password = validateData($_POST["confirm_password"]);

        if(($_POST["password"] == $_POST["confirm_password"])){
            $user_password = $confirm_password;
        }else if(empty($_POST["password"])){
            $unmatched_pass_err = " *Please write your password first!";
        }else{
            $unmatched_pass_err = " *Password didn't matched!";
        }
    
    }else{
        $conf_password_err = " *Confirm your password!";
    }

    if(!empty($_POST["agreement"])){
        $agreement = validateData($_POST["agreement"]);
        
    }else {
        $agreement_err = " *Please read & check this!";
    }

    if(empty($fname_err) && empty($lname_err) && empty($email_err) && empty($conf_password_err) && empty($unmatched_pass_err) && empty($agreement_err)){
        echo "<br/> User First Name : $fname";
        echo "<br/> User Last Name : $lname";
        echo "<br/> User Email : $email";
        echo "<br/> User Password : $user_password";
        echo "<br/> Terms and condition : $agreement";
    }
}

function validateData($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

?>
