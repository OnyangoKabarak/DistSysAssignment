<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(45deg, #49a09d, #5f2c82);
            font-family: 'Roboto', sans-serif;
        }

        main {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px #000000;
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        main h1 {
            margin-bottom: 20px;
            color: #333333;
        }

        main input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #cccccc;
        }

        main button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
        }

        main button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <main>
        <h1>Reset Your Password</h1>
        <?php if (isset($_SESSION['emailSent']) && $_SESSION['emailSent']): ?>
            <p>An email with the reset link has been sent to you.</p>
            <?php unset($_SESSION['emailSent']); ?>
        <?php endif; ?>
        <form action="reset-request.php" method="post">
            <input type="text" name="email" placeholder="Enter Your Email Your Address">
            <button type="submit" name="reset-request-submit">Recover Password</button>
        </form>
    </main>
</body>
</html>