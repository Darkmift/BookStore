<?php

$GLOBALS['caller_page'] = basename(__FILE__, '.php');
$Book_Name = $Author_Name = $Book_img_url = $Book_Year = $Book_price = "";
//print_r($_POST);
//validate post array
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //check post array for empty values
    foreach ($_POST as $key => $value) {
        $value = trim($value);
        if (empty($value)) {
            die("Missing Values detected-aborting");
        }
    }
    //check array length is 5
    if (!sizeof($_POST) == 5) {
        die("Array length anomaly detected-aborting");
    }
    //check that POST has the correct values
    if (
            isset($_POST["Book_Name"]) &&
            isset($_POST["Author_Name"]) &&
            isset($_POST["Book_img_url"]) &&
            isset($_POST["Book_Year"]) &&
            isset($_POST["Book_price"])
    ) {
        $Book_Name = $_POST["Book_Name"];
        $Author_Name = $_POST["Author_Name"];
        $Book_img_url = $_POST["Book_img_url"];
        $Book_Year = $_POST["Book_Year"];
        $Book_price = $_POST["Book_price"];
        write_to_SQL($Book_Name, $Author_Name, $Book_img_url, $Book_Year, $Book_price);
    } else {
        die('go away');
    }
}

function write_to_SQL($Book_Name, $Author_Name, $Book_img_url, $Book_Year, $Book_price) {
    ///setup connection
    $connection = new mysqli('localhost', 'root', '', 'bookstore');
    if ($connection->connect_errno) {
        die('connection failed:' . $connection->connect_error);
    }

    $sql = "
	INSERT INTO 
            `books`(
                    `NAME`,
                    `author_name`,
                    `price`,
                    `img_url`,
                    `year`
                    ) 
                    VALUES (
                        '$Book_Name' ,
                        '$Author_Name',
                        '$Book_price',
                        '$Book_img_url',
                        '$Book_Year'
                    )";
    mysqli_set_charset($connection, "utf8");
    if ($connection->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
