<?php include_once './webservices/API.php';
if(isset($_POST['go'])){
    if(addBook()){
      redirect ("index.php?action=book_added_succesfully");

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
        <title>Add Book</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="js/jquery.js" type="text/javascript" ></script>
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

            .form-control input , .form-control select{
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
                <h3 style="color: #838383">Add a book</h3>


                <form action="AddBook.php" method="post" enctype="multipart/form-data">


                    <div class="form-control">
                        <h3>New book for publish</h3>



                        <input required type="text" name="title" placeholder="Title of your Book here.." /> <br />
                        <input required  type="text" name="desc" placeholder="Enter your description here.." /><br />
                        <p>The Book image : </p>
                        <input required  type="file" name="fileToUpload" placeholder="Enter your description here.." /><br />

                        <p>The start date  : </p>

                         <input required  type="date" name="start" placeholder="Enter the start date here.." /><br />
                                               <p>The end date : </p>

                         <input required  type="date" name="end" placeholder="Enter the end date here.." /><br />


       <select required  name="cat">
           <option value="-1" selected disabled="">Select Category</option>
                                       <?php
                $all = getCategories();
                foreach ($all as $c) {
                $subs = $c['subs'];
                            foreach ($subs as $s) {
                                ?>
                            <option value="<?php echo $s['id']; ?>"><?php echo $c['name'].'-'.$s['name']; ?></option>
                <?php }} ?>






                        </select>

                            <br />
                        <button name='go' type="submit">Go</button>
                    </div>





                </form>

            </div>
        </div>

<?php include_once './footer.php'; ?>
    </center>
</body>
</html>
