<?php
//set caller for page
$GLOBALS['caller_page'] = basename(__FILE__, '.php');
include '../HTML_Page_frame/header.php';

///gen random date
$int = mt_rand(315536461, 1518462289);
$date = date("Y-m-d", $int);

//gen random price
function frand($min, $max, $decimals = 0) {
    $scale = pow(10, $decimals);
    return mt_rand($min * $scale, $max * $scale) / $scale;
}
?>
<div class="main">
    <div style="border-radius: 15px;" class="main-div">
        <h1><b>Add Book to Inventory</b></h1>
        <hr>
        <form action="../Data_Creation/SQL_add_book.php" method="POST">

            <input type="text" name="Book_Name" placeholder=" Book name" required/>
            <input type="text" name="Author_Name" placeholder=" Author" required/>  
            <input type="text" name="Book_img_url" placeholder=" Book image link" required/>  
            <input style="width:33%;" type="text" name="Book_Year" value="<?PHP echo $date ?>" required/>
            <input style="width:33%;" type="text" name="Book_price" value="<?PHP echo frand(60, 100, 2) ?>"  placeholder = " Retail Price" required/>
            <br><br>
            <input type = "submit" class = "btn-login" value = " Submit"/>

        </form>
        <hr>
    </div>
</div>
<?php
include '../HTML_Page_frame/navbar.php';
include '../HTML_Page_frame/footer.php';
