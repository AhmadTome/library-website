<?php include_once './webservices/API.php';
if(isset($_GET['action'])){
if($_GET['action']=='logout'){
    unset($_SESSION['user']);
    $message='you logged out succesfully';
}
if($_GET['action']=='book_added_succesfully'){
    $message='your book has been added';
}

}

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Book Library Home page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery.js" type="text/javascript" ></script>
        <link href="css/style.css" rel='stylesheet' type='text/css' />
    </head>
    <body>
    <center>
        <div class="container">
         <?php include_once './header.php'; ?>
            <div class="core">
                <?php if($message!='')echo '<br/>'.$message.'<br />'; ?>
                <h3 style="color: #838383">The best most available books</h3>
                <p style="width: 900px;
                   padding: 50px;color: #ff9400;">Welcome to our Library, in our online web you will find
                    used books as best books, enjoy..</p>


              <?php
              $all  = getLatestBooks();
              foreach ($all as $o){

              ?>

                <!--              Start of book  -->
                <a href='book_info.php?id=<?php echo $o['id']; ?>'> <div class="book">
                    <p class="book-title"><?php echo $o['title']; ?></p>
                    <img src="images/books/<?php echo $o['id']; ?>.jpg" class="book-pic" />
                    <div class="desc">
                        <h2>description : </h2>
                        <div>
                            <h4><?php echo $o['description']; ?> $</h4>

                        </div>

                    </div>
                    </div> </a>
                <!--              End of book  -->

              <?php }  ?>


            </div>
        </div>
<?php include_once './footer.php'; ?>

    </center>
</body>
</html>
