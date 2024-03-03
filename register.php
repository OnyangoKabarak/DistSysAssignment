<?php
include 'db.php';
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';
    $mobile = isset($_POST["mobile"]) ? $_POST["mobile"] : '';
    $address = isset($_POST["address"]) ? $_POST["address"] : '';
    $registration_number = isset($_POST["registration_number"]) ? $_POST["registration_number"] : '';

    // Insert data into the database
    $sql = "INSERT INTO users (fullname, email, password, mobile, address, registration_number) VALUES ('$fullname', '$email', '$password', '$mobile', '$address', '$registration_number')";

    if ($conn->query($sql) === TRUE) {
        $message = "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(45deg, #49a09d, #5f2c82);
        }

        .container {
            width: 300px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px #000000;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
        }

        .container label {
            display: block;
            margin-bottom: 5px;
        }

        .container input[type="text"], .container input[type="email"], .container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #cccccc;
        }

        .container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
        }

        .container input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="" method="post">
            <?php if (!empty($message)) : ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
            <input type="text" id="fullname" name="fullname" placeholder="Enter your Username" autocomplete="off">
            <input type="text" name="mobile" placeholder="Enter your mobile Phone Number" autocomplete="off">
            <input type="text" name="address" placeholder="Enter your Address" autocomplete="off">
            <input type="text" name="registration_number" placeholder="Enter your Registration Number" autocomplete="off">
            <input type="email" id="email" name="email" placeholder="Enter your Email"autocomplete="off">
            <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="off">
            <input type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>