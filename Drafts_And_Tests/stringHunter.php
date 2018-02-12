<?php

//preg_match_all("(steim.amazingcdn.space/catalog/product/cache/1/image/.*?.jpg)", file_get_contents('string.txt'), $out, PREG_PATTERN_ORDER);
////echo $out[0][0] . ", " . $out[0][1] . "\n";
////echo $out[1][0] . ", " . $out[1][1] . "\n";
//print_r($out);
////echo file_get_contents('string.txt');
?>

<?php

$steimatzky = file_get_contents('../Data_files/strinSteim.txt');
$pattern = "/steim.amazingcdn.space\/catalog\/product\/cache\/1\/image\/300x\/9df78eab33525d08d6e5fb8d27136e95\/0\/1\/[\w%+\/-]+?.jpg/";
//preg_match_all("/\/steim.amazingcdn.space\/catalog\/product\/cache\/1\/image\/300x\/9df78eab33525d08d6e5fb8d27136e95\/0\/1\/[\w%+\/-]+?.jpg/", $subject, $matches);
//preg_match($pattern, substr($subject, 3), $matches, PREG_OFFSET_CAPTURE);
//print_r($matches[0]);
preg_match_all($pattern, $steimatzky, $matches);
//print_r($matches);
$counter = 0;
foreach ($matches[0] as $key => $value) {
    echo '<img src=https://' . $value . '><p>' . $value . '</p><hr>';
    $jsonVal->counter = $counter;
    $jsonVal->url = $value;
    write_to_SQL($jsonVal);
    $counter++;
}

function write_to_SQL($param) {
    //The name of the file that we want to create if it doesn't exist.
    $file = 'bookDataArray.json';
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
?>
