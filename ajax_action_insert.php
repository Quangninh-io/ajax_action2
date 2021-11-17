<?php 
    $conn = mysqli_connect("localhost","ninh","123456","ninh");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        echo 'successfully';
    }
    //edit du lieu
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $text = $_POST['text'];
        $column_name = $_POST['colum_name'];
        $sql = "UPDATE ajax SET $column_name ='$text' WHERE id='$id'";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
?>