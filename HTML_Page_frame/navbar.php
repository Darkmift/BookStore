<?php
$css_active_books = "";
$css_active_clients = "";
$css_active_purchase = "";
switch ($GLOBALS['caller_page']) {
    case 'Add_Books':
        $css_active_books = 'class="active"';
        break;
    case 'Add_Clients':
        $css_active_clients = 'class="active"';
        break;
    case 'Add_Purchase':
        $css_active_purchase = 'class="active"';
        break;
}
?>


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Book Store</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php echo $css_active_books ?>><a href="../Forms/Add_Books.php">Add Book</a></li>
                <li <?php echo $css_active_clients ?>><a href="../Forms/Add_Clients.php">Add Client</a></li>
                <li <?php echo $css_active_purchase ?>><a href="../Forms/Add_Purchase.php">Purchases</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>