<?php

//set caller for page
$GLOBALS['caller_page'] = basename(__FILE__, '.php');

$postArray = $_POST['postArray'];
//check postArray is valid
if (isset($postArray) && !empty($postArray)) {
    validate_and_insert();
} else {
    die('DA FUCK YA DOING IN MY SERVAH?!');
}

//validate POST data
function validate_and_insert() {
    $book = array(
        "myfirstvalue" => "myfirsttext",
        "mysecondvalue" => "mysecondtext"
    );
}

//write JSON
function write_to_SQL($param) {
    //The name of the file that we want to create if it doesn't exist.
    $file = 'bookDataArray.json';
    //Use the function is_file to check if the file already exists or not.
    if (is_file($file)) {
        ////
        $search_array = json_decode(file_get_contents($file), true);
        array_push($search_array, $param);
        file_put_contents($file, json_encode($search_array));
        echo 'Success!<hr>' . file_get_contents($file);
        ////
    } else {
        $search_array = array();
        file_put_contents($file, json_encode($search_array));
        write_to_SQL($param);
    }
}
