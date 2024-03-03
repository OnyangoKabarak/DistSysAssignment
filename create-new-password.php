<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Password</title>
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

        main input[type="password"] {
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
        <h1>Create New Password</h1>
        <?php
            // Check if the selector and validator values exist in the $_GET array
            if (isset($_GET["selector"]) && isset($_GET["validator"])) {
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];

                // Check if the values are not empty and are hexadecimal
                if (!empty($selector) && !empty($validator) && ctype_xdigit($selector) && ctype_xdigit($validator)) {
                    ?>
                    <form action="reset-password.php" method="post">
                        <input type="hidden" name="selector" value="<?php echo $selector ?>">
                        <input type="hidden" name="validator" value="<?php echo $validator ?>">
                        <input type="password" name="password" placeholder="Enter a new password">
                        <input type="password" name="password-repeat" placeholder="Repeat new password">
                        <button type="submit" name="reset-password-submit">Reset Password</button>
                    </form>
                    <?php
                } else {
                    echo "Could not validate your request. Invalid selector or validator.";
                }
            } else {
                echo "Could not validate your request. Required parameters are missing.";
            }
        ?>
    </main>
</body>
</html>