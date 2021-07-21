
<?php  session_start(); 
error_reporting(0);
if($_GET['id']==1){

	echo "<script>alert('comic sent');</script>";
}
if($_GET['id']==2){

	echo "<script>alert('wront otp');</script>";

}

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   
  </head>
  <body>
<style>
	
	#cover {
    background: #222 url('https://unsplash.it/1920/1080/?random') center center no-repeat;
    background-size: cover;
    height: 100%;
    text-align: center;
    display: flex;
    align-items: center;
    position: relative;
}

#cover-caption {
    width: 100%;
    position: relative;
    z-index: 1;
}

/* only used for background overlay not needed for centering */
form:before {
    content: '';
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    background-color: rgba(0,0,0,0.3);
    z-index: -1;
    border-radius: 10px;
}

</style>


   <section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                	<?php if(!isset($_SESSION['otp'])){ ?>
                    <h1 class="display-4 py-2 text-truncate">Get Comic.</h1>
                    <div class="px-2">
                        <form action="mail.php" method="post" class="justify-content-center">
                                              	

                            <div class="form-group">
                                <label class="sr-only">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="jane.doe@example.com" required="">
                            </div>
                            <button type="submit" name="btn" class="btn btn-primary btn-lg">Send otp</button>
                                                	<?php }if(isset($_SESSION['otp'])){ ?>

                    <h1 class="display-4 py-2 text-truncate">Enter Otp.</h1>
                    <div class="px-2">
                        <form action="mail.php" method="post" class="justify-content-center">
                                              	

							<div class="form-group">
                                <label class="sr-only">otp</label>
                                <input type="text" class="form-control" name="otp"  required="">
                            </div>
                            <button type="submit" name="btn2" class="btn btn-primary btn-lg">Verify</button>
                        <?php }?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

