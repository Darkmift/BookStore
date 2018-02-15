<?php

//set caller for page
$GLOBALS['caller_page'] = basename(__FILE__, '.php');
include '../HTML_Page_frame/header.php';
?>
<style>
    * {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    form input {
        width: 80%;
        padding: 0.1em;
        margin-bottom: 0.5em;
        border: 0.1em solid #ccc;
        border-radius: 0.2em;
        color: #474747;
    }
    form input:focus {
        outline: 0.1em solid #7ccc14;
        background: #edfbda;
    }

</style>
<div class="main">
    <div style="border-radius: 15px;" class="main-div">
        PURCHASES
    </div>
</div>

<?php

include '../HTML_Page_frame/navbar.php';
include '../HTML_Page_frame/footer.php';
