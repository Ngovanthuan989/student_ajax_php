<?php
   require_once('dbhelp.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Student Management</title>
</head>
<body>
     <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Quản Lí Thông Tin Sinh Viên
                <form method="GET">
                   <input type="text" name="s" class="form-control" style="margin-top:15px; margin-bottom:15px" placeholder="Tìm Kiếm Theo Tên">
                </form>
            </div>
            <div class="panel-body">
                 <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th>STT</th>
                           <th>Họ & Tên</th>
                           <th>Tuổi</th>
                           <th>Địa Chỉ</th>
                           <th width="60px"></th>
                           <th width="60px"></th>
                        </tr>
                     </thead>
                     <tbody>
                          <?php
                             if (isset($_GET['s']) && $_GET['s'] !='') {
                                 # code...
                                 $sql = 'select * from students where fullname like "%'.$_GET['s'].'%"';
                             }else{
                                $sql = 'select * from students';
                             }
                            
                             $studentList = executeResult($sql);
                             $index = 1;
                             foreach ($studentList as $std) {
                                 # code...
                                 echo ' <tr>
                                            <td>'.($index++).'</td>
                                            <td>'.$std['fullname'].'</td>
                                            <td>'.$std['age'].'</td>
                                            <td>'.$std['address'].'</td>
                                            <td><button class="btn btn-warning" onclick=\'window.open("update.php?id='.$std['id'].'","_self")\'>Edit</button></td>
                                            <td><button class="btn btn-danger" onclick="deleteStudent('.$std['id'].')">Delete</button></td>
                                        </tr>';
                             }
                          ?>
                         
                     </tbody>
                 </table>
                 <button class="btn btn-success" onclick="window.open('input.php', '_self')">Add Student</button>
            </div>
         </div>
     </div>
     <script type="text/javascript">
         function deleteStudent(id) {

             option = confirm('Bạn Có Chắc Chắn Muốn Xóa Sinh Viên Không?');
             if (!option) {
                 return;
             }
             console.log(id);
             $.post('deleteStudent.php', {
                 'id': id
             }, function(data){
                 alert(data)
                 location.reload()
             });
         }
     </script>
</body>
</html>