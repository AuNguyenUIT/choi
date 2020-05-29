<script language="javascript" type="text/jscript">
 function thongbaoxoa(mahoa)
 {
	 chon=confirm('Bạn có muốn xóa hoa này không?');
	 if(chon==true)
	location.href = "trang_dat_hang_test?mahoaxoa="+mahoa;

	 }
</script>
<?php
 if(isset($_SESSION["giohang"]))
  {
	  $giohang=$_SESSION["giohang"];
	  
	  if(count($giohang)>0)
	  {
		  if(isset($_GET["mahoaxoa"]))
		   {
			   $mahoaxoa=$_GET["mahoaxoa"];
			   unset($giohang[$mahoaxoa]);
			   $_SESSION["giohang"]=$giohang;
			 }
		if(isset($_POST["capnhat"]))
		{
			foreach($giohang as $h)
			{
				$sl=$_POST["txtsl".$h[0]];
				if($sl>0)
				 $giohang[$h[0]][2]=$sl;
			}
			$_SESSION["giohang"]=$giohang;
		}
	  echo"<form method='post'><table border='1' cellpadding='0' cellspacing='0' width='80%' align='center'><tr><td width='10%'>Stt</td><td width='30%'>Tên Hoa</td><td width='15%'>Sl</td><td width='20%'>Đơn giá</td><td width='20%'>Thành Tiền</td><td>Xóa</td></tr>";
	  $stt=1;
	  $tongtien=0;
	  foreach($giohang as $h)
	   {
		   echo"<tr><td>".$stt."</td><td>".$h[1]."</td><td><input type='number' min='1' max='100' value='".$h[2]."' name='txtsl".$h[0]."'/></td><td>".$h[3]."</td><td>".number_format($h[2]*$h[3])."</td><td><a href='#' onClick='thongbaoxoa(".$h[0].")' >Xóa</a></td></tr>";
		   $stt++;
            $tongtien+=$h[2]*$h[3];
		   }
		   echo"<tr><td align='right' colspan='6'>Tổng tiền :".number_format($tongtien)."</td></tr>";
		   echo"<tr><td align='center' colspan='6'><input type='submit' name='capnhat' value='Cập nhật'/></td></tr>"; 
		  echo"</table></form>";
	  }
	  }
?>
