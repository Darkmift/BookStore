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
        createBookArray($_POST);
    } else {
        die('go away');
    }
}

function createBookArray($arrayparam) {
    foreach ($arrayparam as $key => $value) {
        $jsonVal[$key] = $value;
    }
    write_to_SQL($jsonVal);
}

function write_to_SQL($param) {
    //The name of the file that we want to create if it doesn't exist.
    $file = 'BooksDB.json';
    //Use the function is_file to check if the file already exists or not.
    if (is_file($file)) {
        ////
        $search_array = json_decode(file_get_contents($file), true);
        array_push($search_array, $param);
        file_put_contents($file, json_encode($search_array));
        //echo 'Success!<hr>' . file_get_contents($file);
        ////
    } else {
        $search_array = array();
        file_put_contents($file, json_encode($search_array));
        write_to_SQL($param);
    }
}
