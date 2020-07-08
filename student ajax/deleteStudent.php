<?php
     if (isset($_POST['id'])) {
         # code...
         $id = $_POST['id'];

         require_once('dbhelp.php');
         $sql = 'delete from students where id = '.$id;
         execute($sql);

         echo 'Xóa Sinh Viên Thành Công';
     }


?>