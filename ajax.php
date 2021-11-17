<html>
  <head>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form method="POST" id="insert_data_hoten">
                <div class="modal-body">
                  <p>name</p>
                  <input type="text" placeholder="name" id="name">
                  <p>phone</p>
                  <input type="text" placeholder="phone" id="phone">
                  <p>address</p>
                  <input type="text" placeholder="address" id="address">
                  <p>email</p>
                  <input type="text" placeholder="email" id="email"><br><br>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-secondary" id="button_insert"   name="insert_data">save</button>
                </div>
              </form>
          </div>
        </div>
      </div>
      <h3>tim kiem bang ajax</h3>
      <div class="row" >
        <div class="col-md-6 col-md-offset-3">
          <input type="text" class="timkiem" name="" value="">
        </div>
      </div>
      <h3>loaad du lieu bang ajax</h3>
      <div id="loaddata"></div >
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
        //lay dulieu
        function fetch_data(page){
          $.ajax({
            url:"ajax_action.php",
            method:"POST",
            data:{page:page},
            success:function(data){
              $('#loaddata').html(data);
            
            }
          });
        }
        fetch_data();
        //doi trang 
        $(document).on('click','.pagination_link',function(){
          var page = $(this).attr("id");
          fetch_data(page);
        });
        //tim kiem du lieu
        $('.timkiem').keyup(function(){
          var result_search = $('.timkiem').val();
          if(result_search==""){
            fetch_data();
          }
          else{
            $.ajax({
            url:"ajax_action_search.php",
            method:"POST",
            data: {result_search:result_search},
            success:function(data){
              $('#loaddata').html(data);
            }
          });
          }
        });
        //xoa du lieu
        $(document).on('click','.delete_data',function(){
          var id = $(this).data('id3');
          $.ajax({
            url:"ajax_action_delete.php",
            method:"POST",
            data: {id:id},
            success:function(data){
              alert('xoa du lieu');
              fetch_data();
            }
          });
        })
        // sua du lieu 
        function edit_data(id,text,colum_name){
          $.ajax({
            url:"ajax_action_insert.php",
            method:"POST",
            data: {id:id,text:text,colum_name:colum_name},
            success:function(data){
              alert('edit du lieu thanh cong');
              fetch_data();
            }
          });
        }
        //sua ten
        $(document).on('blur','.ten',function(){
          var id = $(this).data('id1');
          var text = $(this).text();
          edit_data(id,text,"ten");
        })
        //sua dienthoai
        $(document).on('blur','.dienthoai',function(){
          var id = $(this).data('id2');
          var text = $(this).text();
          edit_data(id,text,"dienthoai");
        })
        // insert du lieu
        $('#button_insert').on('click',function(){
        var name = $('#name').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var email = $('#email').val();
        if(name == ''||phone==''||address==''||email==''){
          alert('khong duoc bo trong');
        }
        else{
          $.ajax({
            url:"ajax_action_add.php",
            method:"POST",
            data: {name:name,phone:phone,address:address,email:email},
            success:function(data){
              alert('insert successfully');
              fetch_data();
            }
          });
        }
      });
      });
      
    </script>
  </body>
</html>