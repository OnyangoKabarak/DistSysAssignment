<?php
include 'db.php';

$search_result = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $registration_number = isset($_POST["registration_number"]) ? $_POST["registration_number"] : '';

    // Search for the user in the database
    $sql = "SELECT * FROM users WHERE registration_number = '$registration_number'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            $search_result .= "<tr><td>" . $row["fullname"]. "</td><td>" . $row["email"]. "</td><td>" . $row["mobile"]. "</td><td>" . $row["address"]. "</td></tr> ";
        }
    } else {
        $search_result = "<tr><td colspan='4'>No results found</td></tr>";
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
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        .logout-btn {
        display: inline-block;
        padding: 10px 20px;
        margin-bottom: 20px;
        background-color: #dc3545;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        }

        form {
            display: flex;
            margin-bottom: 20px;
        }

        form input[type="text"] {
            flex: 1;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form input[type="submit"] {
            padding: 10px 20px;
            border: none;
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        h2 {
            color: #555;
            margin-top: 30px;
        }
        p {
            color: #777;
            line-height: 1.6;
        }
        .tier {
            margin-bottom: 20px;
        }
        .tier-title {
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .tier-description {
            color: #555;
            margin-left: 20px;
        }
        .layer {
            margin-bottom: 20px;
        }
        .layer-title {
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .layer-description {
            color: #555;
            margin-left: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        footer {
            background-color: #333333;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
    <a href="logout.php" class="logout-btn">Logout</a>
        <h2>Search Contacts</h2>
        <form method="post" action="">
            <input type="text" name="registration_number" placeholder="Enter Registration Number" autocomplete="off">
            <input type="submit" value="Search">
        </form>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $search_result; ?>
            </tbody>
        </table>
    
    <br>
        <h1>Explaining Tiers and Layers in Web Applications</h1>
        
        <div class="tier">
            <h2 class="tier-title">Tier</h2>
            <p class="tier-description">
                The term "tiers" usually describes the logical or physical division of a system's components according to their functions and roles. A web application's deployment architecture is frequently described using tiers. Often employed tiers consist of:
            </p>
            <ul class="tier-description">
                <li>Single-tier architecture: A single system or server houses the display, application logic, and data management components of a single-tier architecture, sometimes referred to as monolithic architecture.</li>
                <li>Two-tier architecture: This usually divides the data storage and management layer (server) from the presentation layer (client). Take a client-server approach, for instance, in which the client communicates with the server directly.</li>
                <li>Three-tier architecture: This places the application or business logic layer between the data and presentation layers, adding another layer in between. The separation of the display layer (client), application layer (server), and data layer (database) is a frequent feature of this architecture in web applications.</li>
                <li>N-tier architecture: Any design that has more than three levels, where tiers can be added for security, scalability, or other reasons, is referred to as an N-tier architecture.</li>
            </ul>
        </div>

        <div class="layer">
            <h2 class="layer-title">Layer</h2>
            <p class="layer-description">
                Contrarily, layers describe the logical division of parts according to their functions inside a single tier. Layers can exist within a single tier or span numerous tiers, with their main purpose being to organize the codebase. Typical web application layers consist of:
            </p>
            <ul class="layer-description">
                <li>Presentation layer: In charge of managing user interactions and providing information to users. Front-end frameworks, HTML, CSS, and JavaScript are frequently included in this layer.</li>
                <li>Application layer: Manages data processing, authorization, and authentication. It also contains the application's business logic. Frequently, server-side languages like PHP, Python, Java, etc. are included in this layer.</li>
                <li>Data layer: In charge of organizing and keeping data. The application layer accesses this layer, which contains databases like MySQL, to store and retrieve data.</li>
            </ul>
        </div>
    </div>
    </div>

</body>
</html>