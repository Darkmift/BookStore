<?php

//header('Content-Type: text/html; charset=Windows-1255');
//encode addslashes
function hebrew($param) {
    $param = addslashes($param);
    $param = iconv('Windows-1255', 'UTF-8', $param);
    return $param;
}

function book_To_SQL444($Book_Name, $Author_Name, $Book_img_url, $Book_Year, $Book_price) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookstore";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset('UTF-8');
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// prepare and bind

    $sql = "
	INSERT INTO 
            `books`(
                    `NAME`,
                    `author_name`,
                    `img_url`,
                    `year`,
                    `price`
                    ) 
                    VALUES (
                       '$Book_Name', '$Author_Name', '$Book_img_url', '$Book_Year', '$Book_price'
                    )";

    $stmt = $conn->prepare($sql);
    //$stmt->bind_param("bbbbb", $Book_Name, $Author_Name, $Book_img_url, $Book_Year, $Book_price);



    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<hr>" . $conn->error . "<hr>" . $conn->errno;
    }

    $stmt->close();
    $conn->close();

///////////////
}
