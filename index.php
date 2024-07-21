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
    $sql = "INSERT INTO `exploreease`.`user` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', CURRENT_TIMESTAMP);";
    // echo $sql;

    // Execute the query
    if ($con->query($sql) == true) {
        // echo "Successfully inserted";

        // Flag for successful insertion
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito&display=swap">
    <title>ExploreEase</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Nunito", sans-serif;
        }

        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin: auto;
            padding: 20px;
        }

        .row {
            display: flex;
            justify-content: space-around;
            width: 100%;
            max-width: 900px;
            box-shadow: rgba(0, 0, 0, 0.13) 0px 3.2px 7.2px, rgba(0, 0, 0, 0.11) 0px 0.6px 1.8px;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
        }

        .col {
            flex: 1;
            text-align: center;
            overflow: hidden;
        }

        .col img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form-col {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-col h1 {
            text-align: left;
            margin-bottom: 10px;
            color: #333;
        }

        .form-col p {
            text-align: left;
            margin-bottom: 20px;
            color: #666;
        }

        .form-col input,
        .form-col textarea,
        .form-col select,
        .form-col button {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-col input:focus,
        .form-col textarea:focus,
        .form-col select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-col button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: bold;
        }

        .form-col button:hover {
            background-color: #0056b3;
        }

        .thankyou-message {
            color: green;
            margin-bottom: 20px;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .row {
                flex-direction: column;
            }

            .col img {
                height: 200px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="assets/img/bg.png" alt="Background Image">
            </div>
            <div class="col form-col">
                <h1>ExploreEase</h1>
                <p><small>Fill the form below to confirm your trip.</small></p>
                <?php
                if ($insert == true) {
                    echo "<div class='thankyou-message'>Thank you for submitting your form. We are delighted to welcome you on this trip!</div>";
                }
                ?>
                <form action="index.php" method="post">
                    <input type="text" name="name" id="name" placeholder="Name" required>

                    <input type="number" name="age" id="age" placeholder="Age" required>

                    <select name="gender" id="gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>

                    <input type="email" name="email" id="email" placeholder="Email" required>

                    <input type="tel" name="phone" id="phone" placeholder="Phone" pattern="[0-9]{10}" required>

                    <textarea name="desc" id="desc" cols="30" rows="5"
                        placeholder="Enter any other information here."></textarea>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>