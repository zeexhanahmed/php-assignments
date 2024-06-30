<?php
    $name = $phone = $check_in = $check_out = $adult = $children = $condition = "";
    $name_err = $phone_err = $check_in_err = $check_out_err = $adult_err = $children_err = $condition_err = ""; 

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        if(!empty($_POST['name'])){
            $name = validateData($_POST["name"]);
        }else{
            $name_err = " *Name Required!";
        }

        if(!empty($_POST['phone'])){
            $phone = validateData($_POST["phone"]);
        }else{
            $phone_err = " *Phone Required!";
        }

        if(!empty($_POST['check_in'])){
            $check_in = validateData($_POST["check_in"]);
        }else{
            $check_in_err = " *Check-in Required!";
        }

        if(!empty($_POST['check_out'])){
            $check_out = validateData($_POST["check_out"]);
        }else{
            $check_out_err = " *Check-out Required!";
        }

        if(!empty($_POST['adult'])){
            $adult = validateData($_POST["adult"]);
        }else{
            $adult_err = " *Required!";
        }

        if(!empty($_POST['children'])){
            $children = validateData($_POST["children"]);
        }else{
            $children_err = " *Required!";
        }

        if(!empty($_POST['condition'])){
            $condition = validateData($_POST["condition"]);
        }else{
            $condition_err = " *Please read & Check this!";
        }

        if(empty($name_err) && empty($phone_err) && empty($check_in_err) && empty($check_out_err) && empty($adult_err) && empty($children_err) && empty($condition_err)){
            echo "<br/> Name of user : $name";
            echo "<br/> Phone of user : $phone";
            echo "<br/> Check-in date : $check_in";
            echo "<br/> Check-out date : $check_out";
            echo "<br/> Adult count : $adult";
            echo "<br/> Children count : $children";
            echo "<br/> Terms & Conditions : $condition";
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
    <title>Document</title>

    <style>
        body,
        html {
            background-image: url(bg-img.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin: 0;
            padding: 0;

            font-size: small;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container bg-white border rounded">
        <form method="POST" action="hotel_reg.php" class="p-4">
            <h1 class="text-primary my-4">FIND A ROOM</h1>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="name" class="form-label">Name*</label>
                    <input type="text" class="form-control fw-lighter" id="name" name="name" placeholder="Enter Your Name" value = "<?php echo $name?>"><span class = "text-danger"><?php echo $name_err?></span>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone*</label>
                    <input type="text" class="form-control fw-lighter" id="phone" name="phone" placeholder="Enter Your Phone No." value="<?php echo $phone?>"><span class = "text-danger"><?php echo $phone_err?></span>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="check-in" class="form-label">Check-in*</label>
                    <input type="date" class="form-control fw-lighter" id="check-in" name="check_in" value="<?php echo $check_in?>"><span class = "text-danger"><?php echo $check_in_err?></span>
                </div>
                <div class="col-md-6">
                    <label for="check-out" class="form-label">Check-out*</label>
                    <input type="date" class="form-control fw-lighter" id="check-out" name="check_out" value="<?php echo $check_out?>"><span class = "text-danger"><?php echo $check_out_err?></span>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="adult" class="form-label">Adult*</label>
                    <select class="form-select fw-lighter" id="adult" name="adult">
                        <option value="1" class="fw-lighter" <?php if(isset($adult) && $adult == "1") echo "selected"?>>1</option>
                        <option value="2" class="fw-lighter" <?php if(isset($adult) && $adult == "2") echo "selected"?>>2</option>
                        <option value="3" class="fw-lighter" <?php if(isset($adult) && $adult == "3") echo "selected"?>>3</option>
                    </select>
                    <span class = "text-danger"><?php echo $adult_err?></span>
                </div>


                <div class="col-md-6">
                    <label for="children" class="form-label">Children*</label>
                    <select class="form-select fw-lighter" id="children" name="children">
                        <option value="1" class="fw-lighter" <?php if(isset($children) && $children == "1") echo "selected"?>>1</option>
                        <option value="2" class="fw-lighter" <?php if(isset($children) && $children == "2") echo "selected"?>>2</option>
                        <option value="3" class="fw-lighter" <?php if(isset($children) && $children == "3") echo "selected"?>>3</option>
                    </select>
                    <span class = "text-danger"><?php echo $children_err?></span>
                </div>
            </div>

            <div class="col-12 my-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" value= "checked" name="condition" <?php if(isset($condition) && $condition == "checked") echo "checked"?>>
                    <label class="form-check-label fs-6 fw-light" for="gridCheck">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </label>
                    <br/><span class = "text-danger"><?php echo $condition_err?></span>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary my-2">Book Room</button>
            </div>
        </form>
    </div>
</body>

</html>