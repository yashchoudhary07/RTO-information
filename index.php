<?php
$insert = false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("connection to this database failed. " . mysqli_connect_error());
    }
    //echo"success connecting to the db";

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $vehicle = $_POST['vehicle'];
    $sql = "INSERT INTO `rto form`.`form` ( `name`, `gender`, `phone`, `vehicle`, `dt`) VALUES ( '$name', '$gender', '$phone', '$vehicle', current_timestamp());";
    //echo $sql;

    if ($con->query($sql) == true) {
        //  echo"successfully inserted";
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";

    }
    $con->close();

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" type="text/css" href="form.css">

    <style>
        body {
            background: #C9A7EB;
            color: rgb(2, 2, 2);

        }

        .container {
            margin: auto;
            padding: 34px;
            max-width: 60%;
        }

        .container h1 {
            text-align: center;
            font-size: 50px;
        }

        .container p {
            text-align: center;
            font-size: 40px;
        }

        .text {

            text-align: center;
            display: flex;
            color: black;
            align-items: center;
            justify-self: center;
            flex-direction: column;
           
            

        }

        .btn {
            margin-top: 1rem;
            width: 100px;
            padding: 7px;
            font-size: 10px;
            font-family: sans-serif;
            font-weight: 600;
            border-radius: 3px;
            background-color: brown;
            color: white;
            cursor: pointer;
            border: 1px solid;
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            opacity: 3;
        }

        .submitmsg {
            color: green;
        }

        .fp {
            opacity: 0.3;
            z-index: -1;

        }


        ::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: black;
            opacity: 0.6;
            /* Firefox */
            font-weight: 600;
           
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Vehicle Registration</h1>
        <p>Enter your details</p>
        <?php
        if ($insert == true) {
            echo "<p class = 'submitform' > Thanks for submitting the form </p>";
        }
        ?>
        <!-- <p class="submitmsg">Thanks for submitting your form.</p>-->
        <div class="text">
            <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="enter your name"><br>
                <input type="text" name="gender" id="gender" placeholder="enter your gender"><br>
                <input type="phone" name="phone" id="phone" placeholder="enter phone number"><br>
                <input type="vehicle" name="vehicle" id="vehicle" placeholder="enter vehicle number"><br>
                <button class="btn">submit</button><br>
                <button class="btn">reset</button>
            </form>
        </div>

    </div>
</body>

</html>