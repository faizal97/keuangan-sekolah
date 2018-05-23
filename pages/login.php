<?php include 'template/header.php' ?>
<body style="background-color:#eeeeee">
<div id="login"  style="margin-right:50%;margin-top: 40px;margin-left:-50px; margin-bottom:30px">
<div class="container">
        <div class="row" align="center">
            <div class="col-md col-md-4 col-md-offset-4">
                <form class="form-logreg adm" action="system/login.php" method="post" style=" box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);width: 105%; height:20%;padding: 30px;margin:10%; margin-left:130px ">
                  <img src="images/logo2.png" style="width:50%; height:50%">
                    <h2><label> Administrator</label></h2> <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" name="username" class="form-control" style="font-family:times new roman;font-size:11pt" placeholder="Masukkan Username" required autofocus >
                    </div> <br>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" required="required" name="password" style="font-family:times new roman;font-size:11pt" placeholder="Masukkan Kata Sandi">
                     </div> <br>

                      <div class="form-group"> <button class="btn btn-lg btn-primary btn-block" type="submit">MASUK</button>
                      </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'template/footer.php' ?>
</body>
