<?php
 if(isset($_SESSION["giohang"]))
  {
	  $giohang=$_SESSION["giohang"];
	  if(count($giohang)>0)
	  {
	 	  $sl=0;
	  $tongtien=0;
	  foreach($giohang as $h)
	   {
		  $sl=$sl+$h[2];
            $tongtien+=$h[2]*$h[3];
		   }
		 echo "Số lượng :".$sl;
		 echo"<br>Tổng tiển :".number_format($tongtien);
		 echo"<br><a href='trang_dat_hang_test.php'>Chi tiết</a>";
	  }
	  }
?>