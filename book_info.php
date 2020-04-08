<?php include_once './webservices/API.php';
$o = getBook($_GET['id']);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title><?php echo $o['title'] ?> :: Book Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>

            .book{
                width: 350px;
                margin: 10px;
                display: inline-table;
                text-align: center;
                padding: 5px;
                border-style: solid;
                border-width: 1px;
                border-color: #ccc;
                min-height: 260px;
                 -webkit-transition: all 0.4s ease; /* Safari and Chrome */
                -moz-transition: all 0.4s ease; /* Firefox */
                -ms-transition: all 0.4s ease; /* IE 9 */
                -o-transition: all 0.4s ease; /* Opera */
                transition: all 0.4s ease;
                cursor: pointer;

            }
            .book:hover{
            box-shadow: 8px 8px 14px #ccc;

            }
            .book-title{
                font-size: 26px;
                color: white;
                font-weight: bold;
                margin: 10px;
                margin-top: 20px;
                margin-bottom: 10px;

            }
            .book-pic{
                max-width: 850px;
                 margin-top: 20px;

            }
            .desc{

                width: 190px;
                float: right;
                text-align: center;
            }
            .desc h2{
                color: #c6c0b6;
            }
            .old-price{
                text-decoration: line-through;
                font-size: 20px;
                color: #717171
            }
            .new-price{
                font-size: 25px;
                color: #ff9400;
                font-weight: bold;
            }

            .description{
                margin-top: 20px;
                background-color: #f5f5f5;
                padding: 10px;
                font-size: 15px;
                color: #626262;
            }
            .io{
                width: 80%;
                margin: 20px;
            }
            .io tr td{
              text-align: left;
              padding: 10px;
              border-bottom-style: solid;
              border-bottom-width: 1px;
              border-bottom-color: #ccc;
              font-weight: bold;
              color: #5d5d5d;
            }


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.3); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
   background-color: rgba(109,129,135,0.7);
  margin: auto;
  padding: 20px;
  width: 60%;
  color: #ffffff;
  font-weight: bold;
  text-align: center;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
    .logoMODAL{
        height: 130px;

    }



	a:link {
  text-decoration: none;

}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}


        </style>

    </head>
    <body>
    <center>
        <div class="container">
         <?php include_once './header.php'; ?>
            <div class="core">
                <?php if($message!='')echo '<br/>'.$message.'<br />'; ?>
                <h3 style="color: #838383"><?php echo $o['title'] ?></h3>
                <p style="width: 900px;
                   padding: 50px;color: #e6b669;">
                <?php echo $o['description'] ?>
                </p>

                <img src="images/books/<?php echo $o['id']; ?>.jpg" class="book-pic" />


                <table class='io'>
                    <tr>
                        <td>publisher name : </td>
                      <td><?php echo $o['user']['bus_name'] ?></td>
                    </tr>
                     <tr>
                        <td>publisher location : </td>
                      <td><?php echo $o['user']['location'] ?></td>
                    </tr>
                      <tr>
                        <td>publisher phone : </td>
                      <td><?php echo $o['user']['phone'] ?></td>
                    </tr>
                      <tr>
                        <td>publisher email : </td>
                      <td><?php echo $o['user']['email'] ?></td>
                    </tr>
                </table>



            </div>
        </div>
<?php include_once './footer.php'; ?>

    </center>


<script src="js/popContact.js" type="text/javascript" ></script>

</body>
</html>
