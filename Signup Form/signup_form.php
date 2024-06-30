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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body , html{
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        
    </style>
</head>

<body>
    </head>

    <body class="bg-info-subtle">
        <div class="container">
            <div class="row rounded-3 overflow-hidden">
                <div class="col-6 bg-primary text-white p-5 ">
                    <h3 class="pb-3">INFORMATION</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima ducimus quidem, officia veniam est explicabo assumenda eius ab nesciunt voluptates perferendis ipsum expedita cum sint neque ad repellendus beatae libero consectetur in nostrum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi iusto repellat, odit consequuntur dolore iste natus hic ipsam quam officia iure dolorum tempore aspernatur ratione ducimus amet.</p>
                    <button type="button" class="btn btn-light btn-lg mt-4 fs-6">Have An Account</button>
                </div>
                <div class="col-6 bg-white  p-5">
                    <h3 class="pb-3 text-primary">REGISTER FORM</h3>
                    <form class="row g-3" method="POST" action="signup_form.php">
                        <div class="col-md-6">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname ?>"><span class="text-danger"><?php echo $fname_err ?></span>
                        </div>
                        <div class="col-md-6">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname ?>"><span class="text-danger"><?php echo $lname_err ?></span>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>"><span class="text-danger"><?php echo $email_err ?></span>
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password ?>"><span class="text-danger"><?php echo $password_err ?></span>
                        </div>
                        <div class="col-md-6">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="<?php echo $confirm_password ?>"><span class="text-danger"><?php echo $conf_password_err ?><?php echo $unmatched_pass_err ?></span>
                        </div>

                        <div class="col-12 mt-5 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" name = "agreement" value="checked" <?php if(isset($agreement) && $agreement == "checked") echo "checked"?>>
                                <label class="form-check-label" for="gridCheck">
                                    I agree to the <a href="#" class="text-primary"> Terms and Conditions</a>
                                </label>
                                <br/><span class="text-danger"><?php echo $agreement_err ?></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>