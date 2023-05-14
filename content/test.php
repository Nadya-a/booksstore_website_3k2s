
<!-- PHP code to establish connection with the localserver -->
<?php

// Username is root
$user = 'root';
$password = '';

$database = 'booksstore';

// Server is localhost with
// port number 3306
$servername='localhost:3306';



if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!';
}

$mysqli = new mysqli($servername, $user,
    $password, $database);

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
        $mysqli->connect_errno . ') '.
        $mysqli->connect_error);
}

// SQL query to select data from database
$sql = " SELECT * FROM book ORDER BY Book_id DESC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>GFG User Details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
</head>

<body>
<section>
    <h1>GeeksForGeeks</h1>
    <!-- TABLE CONSTRUCTION -->
    <table>
        <tr>
            <th>GFG UserHandle</th>
            <th>Practice Problems</th>
            <th>Coding Score</th>
            <th>GFG Articles</th>
        </tr>
        <!-- PHP CODE TO FETCH DATA FROM ROWS -->
        <?php
        // LOOP TILL END OF DATA
        while($rows=$result->fetch_assoc())
        {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['Book_id'];?></td>
                <td><?php echo $rows['Book_name'];?></td>
                <td><?php echo $rows['Book_type'];?></td>
                <td><?php echo $rows['Book_price'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</section>
</body>

</html>