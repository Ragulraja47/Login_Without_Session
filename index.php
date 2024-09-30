<?php
include("db.php");
?>

<html>

<head>
  <title>Auction Time</title>
  <!--Bootstrap 5 css link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
  body {
    margin: 0;
  }

  .log_in {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .require {
    color: red;
  }
</style>

<body>
  <div class="log_in">
    <form id="login_form">
      <h2><b>Log-In</b></h2>
      <div class="mb-3">
        <label for="email" class="form-label">Email address<span class="require">*</span></label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Enter Password<span class="require">*</span></label>
        <input type="password" name="password" class="form-control" id="password" required autocomplete="current-password">
      </div>
      <div class="mb-3">
        <a href="register.php">To create an new account!!</a> <br>
        <a type="button" class="forgot_pass" data-bs-toggle="modal" data-bs-target="#forgot_pass">Forgot Password?</a>
      </div>
      <center>
        <button type="submit" class="btn btn-primary">Log-In</button>
      </center>
    </form>
  </div>

  <!-- Forgot Password Modal -->
<div class="modal fade" id="forgot_pass" tabindex="-1" aria-labelledby="forgot_passLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="forgot_passLabel">Forgot Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
        <label for="email" class="form-label">Enter email<span class="require">*</span></label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send mail</button>
      </div>
    </div>
  </div>
</div>


  <!--js link for jquerry-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <!--js link for Bootstrap 5-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <!--Js link for sweet Alert-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <script>
    $(document).on("submit", "#login_form", function(e) {
      e.preventDefault();
      var data = new FormData(this);
      console.log(data);
      data.append("login_details", true);
      $.ajax({
        url: "backend.php",
        data: data,
        type: "POST",
        processData: false,
        contentType: false,
        success: function(res) {
          var res = jQuery.parseJSON(res);
          console.log(res);
          if (res.status = 200) {
            swal({
              title: "Success",
              text: res.message,
              icon: "success",
              button: "OK",
            }).then(function() {
              window.location.href = "home.php";
            })

          } else {
            alert(res.message);
          }

        }

      })
    })

    /* //forgot password
    $(document).on("click",".forgot_pass",function(e){
      e.preventDefault();

    }) */
  </script>
</body>

</html>