<?php

$GLOBALS['caller_page'] = basename(__FILE__, '.php');
$Client_Name_first = $Client_Name_last = $Client_Phone = "";
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
    if (!sizeof($_POST) == 3) {
        die("Array length anomaly detected-aborting");
    }
    //check that POST has the correct values
    if (
            isset($_POST["Client_Name_first"]) &&
            isset($_POST["Client_Name_last"]) &&
            isset($_POST["Client_Phone"])
    ) {
        $Client_Name_first = iconv('Windows-1255', 'UTF-8', $_POST["Client_Name_first"]);
        $Client_Name_last = iconv('Windows-1255', 'UTF-8', $_POST["Client_Name_last"]);
        $Client_Phone = $_POST["Client_Phone"];
        write_client_to_SQL($Client_Name_first, $Client_Name_last, $Client_Phone);
    } else {
        die('go away');
    }
}

function write_client_to_SQL($Client_Name_first, $Client_Name_last, $Client_Phone) {
    ///setup connection
    $connection = new mysqli('localhost', 'root', '', 'bookstore');
    if ($connection->connect_errno) {
        die('connection failed:' . $connection->connect_error);
    }
    $fullname = $Client_Name_first . " " . $Client_Name_last;
    $sql = "
            INSERT INTO `clients`(`NAME`,
                                  `phone`
                                  ) 
                                  VALUES (
                                  '$fullname',
                                  '$Client_Phone'
                                  )";
    mysqli_set_charset($connection, "utf8");
    if ($connection->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
