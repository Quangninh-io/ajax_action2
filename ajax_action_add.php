<?php
    $conn = mysqli_connect("localhost","ninh","123456","ninh");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        echo 'successfully';
    }
    // them du lieu
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $sql = "INSERT INTO ajax (ten,dienthoai, diachi, email) VALUES ('$name','$phone','$address','$email')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
        mysqli_close($conn);
       
    }
?>