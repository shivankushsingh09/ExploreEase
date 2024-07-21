<?php
$insert = false;
if (isset($_POST['name'])) {
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `exploreease`.`user` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', CURRENT_TIMESTAMP);";
    // echo $sql;

    // Execute the query
    if ($con->query($sql) == true) {
        // echo "Successfully inserted";

        // Flag for successfully insertion
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <title>ExploreEase</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Roboto", sans-serif;
        }

        .container {
            max-width: 80%;
            background-color: rgb(198, 152, 241);
            padding: 34px;
            margin: auto;
        }

        .container h1 {
            text-align: center;
            font-family: "Sriracha", cursive;
            font-size: 40px;
        }

        p {
            font-size: 17px;
            text-align: center;
            font-family: "Sriracha", cursive;
        }

        input,
        textarea {
            width: 80%;
            margin: 11px 0px;
            padding: 7px;
            font-size: 16px;
            border-radius: 6px;
            border: 2px solid black;
            outline: none;
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .btn {
            color: white;
            background: purple;
            padding: 8px 12px;
            font-size: 20px;
            border: 2px solid white;
            border-radius: 14px;
            cursor: pointer;
        }

        .bg {
            width: 100%;
            position: absolute;
            z-index: -1;
            opacity: 0.8;
        }

        .submitMsg {
            color: green;
        }
    </style>
</head>

<body>
    <!-- <img class="bg" src="/assets/img" alt="Background Image"> -->
    <div class="container">
        <h1>ExploreEase</h1>
        <p>Fill the below form to confirm your Trip.</p>
        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'>Thank you for submitting your form. We are delighted to welcome you on this trip!</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Name">
            <input type="text" name="age" id="age" placeholder="Age">
            <input type="text" name="gender" id="gender" placeholder="gender">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="phone" name="phone" id="phone" placeholder="Phone">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter any other information here."></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="/assets/js/index.js"></script>
</body>

</html>