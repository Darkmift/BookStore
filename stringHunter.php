<?php

//preg_match_all("(steim.amazingcdn.space/catalog/product/cache/1/image/.*?.jpg)", file_get_contents('string.txt'), $out, PREG_PATTERN_ORDER);
////echo $out[0][0] . ", " . $out[0][1] . "\n";
////echo $out[1][0] . ", " . $out[1][1] . "\n";
//print_r($out);
////echo file_get_contents('string.txt');
?>

<?php

$subject = file_get_contents('strinSteim.txt');
$pattern = "/steim.amazingcdn.space\/catalog\/product\/cache\/1\/image\/300x\/9df78eab33525d08d6e5fb8d27136e95\/0\/1\/[\w%+\/-]+?.jpg/";
//preg_match_all("/\/steim.amazingcdn.space\/catalog\/product\/cache\/1\/image\/300x\/9df78eab33525d08d6e5fb8d27136e95\/0\/1\/[\w%+\/-]+?.jpg/", $subject, $matches);
//preg_match($pattern, substr($subject, 3), $matches, PREG_OFFSET_CAPTURE);
//print_r($matches[0]);
preg_match_all($pattern, $subject, $matches);
print_r($matches);
?>