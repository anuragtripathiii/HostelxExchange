 </div><!-- /.blog-main -->
      </div><!-- /.row -->
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    </div><!-- /.container -->

    <div class="blog-footer">
      <p>anurag tripathi &copy; 2020</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </div>
 <div class="card-body">
     <h2>To suggest anything feel free to contact us, We will revert back to you within 48 hours.</h2>
     <form action="index.php" method="post">

         <input type="text" name="UName" placeholder="Name" class="form-control mb-2">

         <input type="email" name="Email" placeholder="Email" class="form-control mb-2">

         <input type="text" name="Subject" placeholder="Subject" class="form-control mb-2">

         <textarea name="msg" class="form-control mb-2" placeholder="Write The Message"></textarea>

         <br>

         <button class="btn btn-success" name="btn-send"> Send </button>

     </form>


 </div>




 <?php

 if(isset($_POST['btn-send']))
 {
     $UserName = $_POST['UName'];
     $Email = $_POST['Email'];
     $Subject = $_POST['Subject'];
     $Msg = $_POST['msg'];

     if(empty($UserName) || empty($Email) || empty($Subject) || empty($Msg))
     {
         print "<script>print('Please Fill the required credentials!')</script>";
         print "<script>window.open('index.php?error','_self')</script>";
     }
     else
     {
         $to = "anuragtripathi600@gmail.com";

         if(mail($to,$Subject,$Msg,$Email))
         {
             print "<script>print('Email sent Successfully!')</script>";
             print "<script>window.open('index.php?success','_self')</script>";
         }
     }
 }
 ?>



 <?php
 $msg="";
 if (isset($_GET['success'])) {
     $msg= "Email Sent Seccessfully!";
     print "<div class='alert alert-success'>".$msg."</div>";
 }
 if (isset($_GET['error'])) {
     $msg= "Please Fill the required credentials!";
     print "<div class='alert alert-danger'>".$msg."</div>";
 }
 ?>







 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
 <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/767448/t/1"></script>
 </body>
  </body>
</html>