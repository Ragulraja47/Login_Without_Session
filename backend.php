<?php
include("db.php");

//backend code for registration
if(isset($_POST["reg_user"])){
    $name = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $password_verify = $_POST["password_verify"];
    
    if($password!= $password_verify){
        $res =[
            "status"=>400,
            "message"=>"Passwords does not match"
        ];
        echo json_encode($res);
    }
    $unique = "SELECT email FROM register WHERE email = '$email' ";
    $find_exist = mysqli_query($conn,$unique);
    if(mysqli_num_rows($find_exist)){
        $res=[
            "status"=>300,
            "message"=>"Email already exists"
        ];
        echo json_encode($res);

    }
    else{
    $query = "INSERT INTO register(username,email,phone,password) VALUES('$name','$email','$phone','$password')";

    if(mysqli_query($conn, $query)){
        $res =[
            "status"=>200,
            "message"=>"Registred Sucessfully"
        ];
        echo json_encode($res);
    }
}
}

//backend code for Login
if(isset($_POST["login_details"])){
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $query = "SELECT email, password FROM register WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)){
        $res=[
            "status"=>200,
            "message"=>"Login Successful"
        ];
        echo json_encode($res);
    }
    else{
        $res=[
            "status"=>400,
            "message"=>"Invalid Credentials"
        ];
        echo json_encode($res);
    }
}
?>