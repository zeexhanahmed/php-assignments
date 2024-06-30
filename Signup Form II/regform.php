<?php 
$fname = $lname = $email = $password = $confirm_password = $user_password = $agreement = "";
$fname_err = $lname_err = $email_err = $password_err = $conf_password_err = $unmatched_pass_err = $agreement_err =  "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body , html{
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
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
                    <form class="row g-3" method="POST" action="regdata.php">
                        <div class="col-md-6">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname ?>" required><span class="text-danger"><?php echo $fname_err ?></span>
                        </div>
                        <div class="col-md-6">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname ?>" required><span class="text-danger"><?php echo $lname_err ?></span>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" required><span class="text-danger"><?php echo $email_err ?></span>
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password ?>" required><span class="text-danger"><?php echo $password_err ?></span>
                        </div>
                        <div class="col-md-6">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="<?php echo $confirm_password ?>" required><span class="text-danger"><?php echo $conf_password_err ?><?php echo $unmatched_pass_err ?></span>
                        </div>

                        <div class="col-12 mt-5 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" name = "agreement" value="checked" <?php if(isset($agreement) && $agreement == "checked") echo "checked"?> required  >
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