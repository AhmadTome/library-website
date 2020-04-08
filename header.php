<style>
    body{
        font-family: Tahoma;
        background-color: #e8e2e2;
        background-size: 100% 100%;
        background-attachment: fixed;
    }
    .container{

        min-height: 500px;
        border-color: #ccc;
        width: 1300px;


    }
    .nav-header{
        height: 100px;
        line-height: 100px;


    }
    .logo{
        height: 170px;
        float: left;
        padding: 5px;
        margin: 8px;
    }
    .search-box{
        float: right;
        padding: 15px;
        font-family: 'Century Gothic';
        margin: 25px;
        border-style: solid;
        border-width: 1px;
        font-size: 13px;
        border-color: #e6b669;
        background-color: #fafafa;
        color: #e6b669;
        width: 400px;   box-shadow: 4px 4px 7px #ccc;

    }


    .core{
        margin-top: 20px;
        padding: 20px;


    }
    #primary_nav_wrap
    {

       background-color: #e6b669;
        text-align: center;
        padding: 10px;
        width: 100%;

    }

    #primary_nav_wrap ul
    {
        list-style:none;
        position:relative;
        display: inline-table;
        margin:0;
        padding:0
            ;

    }

    #primary_nav_wrap ul a
    {
        display:block;
        color:white;
        text-decoration:none;

        font-size:15px;
        line-height:32px;
        padding:0 15px;
        margin-left: 10px;
        margin-right: 10px;

    }

    #primary_nav_wrap ul li
    {
        position:relative;
        display: inline-table;
        margin:0;
        padding:0
    }

    #primary_nav_wrap ul li.current-menu-item
    {
        background-color: #e6b669;;

    }

    #primary_nav_wrap ul li:hover
    {
        background:#f6f6f6;
    }

    #primary_nav_wrap ul ul
    {
        display:none;
        position:absolute;
        top:100%;
        left:0;
        background:#fff;
        padding:0;
        color: #e6b669;

    }

    #primary_nav_wrap ul ul li
    {
        float:none;
border-style: solid;
border-width: 1px;
border-color: #ccc;
        width:300px
    }

    #primary_nav_wrap ul ul a
    {
        line-height:120%;
        padding:10px 15px;
        color: #e6b669;
    }

    #primary_nav_wrap ul ul ul
    {
        top:0;
        left:100%
    }

    #primary_nav_wrap ul li:hover > ul
    {
        display:block
    }

</style>
    <form action="results.php" method="get">
<div class="nav-header">
    <a href="index.php"> <img class="logo" src="images/logo.png" style="height: 90px;"></a>
    <span style="
       ;background-color: #e6b669;color: #fff;
       padding: 15px;
      box-shadow: 4px 4px 7px #ccc;
             -webkit-transition: all 0.4s ease; /* Safari and Chrome */
                -moz-transition: all 0.4s ease; /* Firefox */
                -ms-transition: all 0.4s ease; /* IE 9 */
                -o-transition: all 0.4s ease; /* Opera */
                transition: all 0.4s ease;
       " id="changeText">Books for everyone..</span>



    <input type="text" name= "query" class="search-box" placeholder="What are you looking for ?" />

</div>
</form>
<nav id="primary_nav_wrap">
    <ul>
        <li class="current-menu-item"><a href="index.php">Home</a></li>
        <li><a href="#">Categories</a>
            <ul>
                <?php
                $all = getCategories();
                foreach ($all as $c) {
                    ?>
                    <li><a href="#"><?php echo $c['name']; ?></a>

                        <ul>
                            <?php
                            $subs = $c['subs'];
                            foreach ($subs as $s) {
                                ?>

                            <li><a href="category.php?id=<?php echo $s['id']; ?>"><?php echo $s['name']; ?></a>
                                </li>
    <?php } ?>
                        </ul>
                    </li>

<?php } ?>


            </ul>

        <li><a href="About.php">About us</a></li>

        <?php if(!isset($_SESSION['user'])){ ?>

        <li><a href="login.php">Login</a></li>
        <li><a>Join us</a>
            <ul>
        <li><a href="signup.php?type=promoter">As publisher</a></li>
        <li><a href="signup.php">As Customer</a></li>


            </ul>

        </li>
        <?php }else{?>

        <?php if($_SESSION['user']['user_type']=='1'){ ?>
           <li><a href="AddBook.php">Add Book</a></li>
            <?php } ?>
           <li><a href="index.php?action=logout">Logout <?php echo $_SESSION['user']['username']; ?></a></li>
        <?php } ?>
    </ul>
</nav>
<div style="height: 1px;background-color: #ccc;margin-top: 10px;margin-bottom: 10px;" ></div>
<script>
var text = ["Find Your favorite book", "be in touch about the available book to reserve", "Charming books available"];
var counter = 0;
var elem = document.getElementById("changeText");
setInterval(change, 3000);
function change() {
  elem.innerHTML = text[counter];
  counter++;
  if (counter >= text.length) {
    counter = 0;
  }
}
</script>


