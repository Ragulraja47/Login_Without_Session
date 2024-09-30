<?php
include("db.php");
?>
<html>

<head>
  <title>Auction Time</title>
  <!--Bootstrap 5 css link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style>
    body {
      margin: 0;
    }

    .registration_form {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .require {
      color: red;
    }
  </style>
</head>

<body>
  <div class="registration_form">

    <form id="reg_form" action="index.php">
      <h2><b>Registration Form</b></h2>
      <div class="mb-3">
        <label for="username" class="form-label">User Name<span class="require">*</span></label>
        <input type="text" name="username" class="form-control" id="username" required autocomplete="username">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address<span class="require">*</span></label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
      </div>
      <div class="mb-3">
        <label for="pnumber" class="form-label">Mobile Number<span class="require">*</span></label>
        <input type="text" name="phone" class="form-control" id="pnumber" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Creat Password<span class="require">*</span></label>
        <input type="password" name="password" class="form-control" id="password" required autocomplete="current-password">
      </div>
      <div class="mb-3">
        <label for="password_verify" class="form-label">Re-Enter Password<span class="require">*</span></label>
        <input type="password" name="password_verify" class="form-control" id="password_verify" required autocomplete="current-password">
      </div>
      <div class="mb-3">
        <a href="index.php">Already having an account!!</a> 
      </div>
      <br>
      <center>
        <button type="submit" class="btn btn-primary">Submit</button>
      </center>
    </form>
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
    $(document).on("submit", "#reg_form", function(e) {
      e.preventDefault();
      var data = new FormData(this);
      console.log(data);
      data.append("reg_user", true);
      $.ajax({
        type: "POST",
        url: "backend.php",
        data: data,
        contentType: false,
        processData: false,
        success: function(response) {
          console.log(response);

          var res = jQuery.parseJSON(response);

          if (res.status == 200) {
            swal({
              title: "Success",
              text: res.message,
              icon: "success",
              button: "OK",
            }).then(function() {
              window.location.href = "index.php";
            })

          } else {
            alert(res.message);
            $("#reg_form")[0].reset();
          }
        }
      })
    })
  </script>
</body>

</html>