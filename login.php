<?php
// Database connection
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input from the form
    $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';

    $message = '';
    //Fetch the user from the database
    $sql = "SELECT * FROM users WHERE fullname = '$fullname'";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // No user found with the provided fullname
        $message = "User not found";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(45deg, #49a09d, #5f2c82);
        }

        .login-form {
            width: 300px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px #000000;
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
        }

        .login-form input[type="text"], .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #cccccc;
        }

        .login-form button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
        }

        .login-form button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .login-form button[type="button"] {
            width: 100%;
            padding: 10px;
            background-color: #6c757d;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            margin-top: 10px;
        }

        .login-form button[type="button"]:hover {
            background-color: #5a6268;
        }

        .message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form class="login-form" method="post" action="">
        <h2>Login</h2>
        <?php if (!empty($message)) : ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <input type="text" name="fullname" placeholder="Full Name" autocomplete="off" required>
        <input type="password" name="password" placeholder="Password" autocomplete="off" required>
        <button type="submit">Login</button>
        <button type="button" onclick="location.href='forgot-pwd.php'">Forgot Password?</button>
    </form>
</body>
</html>

