<?php include_once './webservices/API.php';
if(isset($_POST['go'])){
    if(signup())redirect ("index.php?action=signup_succesfull");
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
        <title>SignUp</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>

            .form-control{
                 background-color: #6d8187;
                padding: 10px;
                width: 550px;
                border-radius: 20px;
            }

            .form-control button{
                border-style: none;
                background-color: #e6b669;
                font-family: 'Century Gothic';
                color: #fff;
                width: 80px;
                height: 80px;
                border-radius: 50%;
                font-size: 18px;

                padding: 15px;
                margin: 5px;
            }

            .form-control input{
                padding: 15px;
                margin: 5px;
                border-radius: 20px;
   font-family: 'Century Gothic';
                width: 90%;
                border-width: 1px;
                font-size: 18px;
                border-style: none;
                -webkit-transition: all 0.4s ease; /* Safari and Chrome */
                -moz-transition: all 0.4s ease; /* Firefox */
                -ms-transition: all 0.4s ease; /* IE 9 */
                -o-transition: all 0.4s ease; /* Opera */
                transition: all 0.4s ease;
            }
            .form-control input:hover{
                background-color: #fff8ef;
            }
            .form-control h3{
                margin: 20px;
                color: #e6b669;
            }
        </style>

    </head>
    <body>
    <center>
        <div class="container">
            <?php include_once './header.php'; ?>
            <div class="core">
                <h3 style="color: #838383">Create your accont now</h3>
                <p style="width: 900px;
                   padding: 10px;color: #e6b669;">
                    Select your type  , a customer or a publisher
                    ..</p>


                <form action="signup.php" method="post">


                    <div class="form-control">
                        <h3>New account</h3>
                        <input required type="email" name="email" placeholder="Enter your email here.." /> <br />
                        <input required  type="password" name="pass1" placeholder="Enter your password here.." /><br />
                        <input required  type="password" name="pass2" placeholder="Enter your password again here.." /><br />
                         <input required type="text" name="username" placeholder="Enter your name here.." /> <br />

                    <?php if(isset($_GET['type']) && $_GET['type']=='promoter'){ ?>
                        <input required type="text" name="busname" placeholder="Enter your business name here.." /> <br />
                       <input required type="text" name="phone" placeholder="Enter your phone here.." /> <br />
                        <input required type="text" name="location" placeholder="Enter your location here.." /> <br />
                        <?php }else{; ?>
                        <input required type="hidden" name="busname" placeholder="Enter your business name here.." /> <br />
                       <input required type="hidden" name="phone" placeholder="Enter your phone here.." /> <br />
                        <input required type="hidden" name="location" placeholder="Enter your location here.." /> <br />

                        <?php } ?>
                        <input required type="hidden" name="user_type" value="<?php echo (isset($_GET['type']) && $_GET['type']=='promoter')?"1":"0";?>"/> <br />

                        <button name='go' type="submit">Go</button>
                    </div>





                </form>

            </div>
        </div>

<?php include_once './footer.php'; ?>
    </center>
</body>
</html>
