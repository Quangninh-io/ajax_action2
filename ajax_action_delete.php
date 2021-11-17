<?php 
    $conn = mysqli_connect("localhost","ninh","123456","ninh");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        echo 'successfully';
    }
    //xoa du lieu
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM ajax WHERE id='$id'";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
?>