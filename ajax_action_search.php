<?php
    $conn = mysqli_connect("localhost","ninh","123456","ninh");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result_search = $_POST['result_search'];
    $sql = "SELECT * FROM ajax WHERE ten LIKE '%$result_search%'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<table  class="table"> <tr> 
        <th>ten</th> 
        <th>dien thoai</th>
        <th>dia chi</th>
        <th>Name</th> 
        <th>xoa</th> 
        </tr>';
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
            <td data-id1='.$row["id"].' contenteditable class="ten">'. $row["ten"].'</td>
            <td data-id2='.$row["id"].' contenteditable  class="dienthoai">'. $row["dienthoai"].'</td>
            <td contenteditable>'. $row["diachi"].'</td> 
            <td contenteditable>'. $row["email"].'</td>
            <td><button data-id3='.$row["id"].' class="delete_data" name ="delete_data">xoa</button></td>
            </tr>';
        }
        echo "</table>";
      } else {
        echo "0 results";
      }
      mysqli_close($conn);

?>