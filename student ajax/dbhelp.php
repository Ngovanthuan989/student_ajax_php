<?php

   require_once('config.php');



//    Thực Hiện Cho Các Hàm :insert,update,delete ->sử dụng cái functions này
   function execute($sql)
   {
       # code...
    //    create connection tới database
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    
    //  query
      mysqli_query($conn, $sql);

    //close
    mysqli_close($conn);
   }
   

//    sử dựng cho select => trả về kết quả
   function executeResult($sql)
   {
       # code...

        //    create connection tới database
        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        
        //  query
        $resultset = mysqli_query($conn, $sql);
        $list = [];
        while ($row = mysqli_fetch_array($resultset, 1)) {
            # code...
            $list[] = $row;
        }

        //close
        mysqli_close($conn);
        return $list;
   }
?>