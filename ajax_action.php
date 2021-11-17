<?php
    $conn = mysqli_connect("localhost","ninh","123456","ninh");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // lay du lieu
    $record_per_page = 5;
    if(isset($_POST["page"])){
        $page = $_POST["page"];
    }else{
        $page = 1;
    }
    $start_from = ($page-1)*$record_per_page;
    

    $sql = "SELECT * FROM ajax ORDER BY id DESC LIMIT $start_from,$record_per_page";
    
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        
        echo '<table  class="table"> <tr> 
        <th>ten</th> 
        <th>dien thoai</th>
        <th>dia chi</th>
        <th>Name</th> 
        <th>xoa</th>
        <th>chi tiet</th> 
        </tr>';
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
            <td data-id1='.$row["id"].' contenteditable class="ten">'. $row["ten"].'</td>
            <td data-id2='.$row["id"].' contenteditable  class="dienthoai">'. $row["dienthoai"].'</td>
            <td contenteditable>'. $row["diachi"].'</td> 
            <td contenteditable>'. $row["email"].'</td>
            <td><button data-id3='.$row["id"].' class="delete_data" name ="delete_data">xoa</button></td>
            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#chitiet">
            chi tiet
            </button></td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="chitiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>
            
            ';
        }
        
      } 

        $sql2 = "SELECT * FROM ajax";
        $result2 = mysqli_query($conn, $sql2);
        $total_pages = floor(mysqli_num_rows($result2)/$record_per_page)+1;
        
        echo "</table> <ul class='pagination'>";
        for ($i =1 ; $i<=$total_pages;$i++){
            echo "<li><span class ='pagination_link' id='".$i."'>".$i."</span></li>";
        }
        echo "</ul>";
      
      mysqli_close($conn);

?>