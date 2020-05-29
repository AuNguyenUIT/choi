<?php session_start();?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cua hang Hoa Dep</title>
<style type="text/css">
<!--
.style2 {
	color: #000099;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: smaller;
}
.style3 {
	color: #006633;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: smaller;
}
.style8 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: smaller; }
.style10 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: smaller;
	font-weight: bold;
	color: #009933;
}
.style15 {font-size: smaller}
a:link {
	color: #006633;
}
a:visited {
	color: #006633;
}
a:hover {
	color: #009900;
}
a:active {
	color: #009900;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#F4FBEB">
    <td width="21%" valign="top"><img src="hinh_anh/LogotypeKvitka.gif" width="199" height="115" /></td>
    <td width="28%" valign="top"><div align="center">
      <table width="300" border="0" cellpadding="0" cellspacing="2" bgcolor="#F4FBEB">
        <tr>
          <td><span class="style10">(08) 9891234 </span></td>
        </tr>
        <tr>
          <td><span class="style8">(Giờ mở cửa: 8:00 - 22:00 mỗi ngày) </span></td>
          </tr>
        <tr>
          <td><span class="style8"><img src="hinh_anh/IconMail.gif" width="16" height="16" /> <a href="./ktphuong@hcmuns.edu.vn">ktphuong@hcmuns.edu.vn </a></span></td>
          </tr>
        <tr>
          <td><span class="style8"><img src="hinh_anh/online0.gif" width="18" height="18" />hoadep.com.vn</span></td>
          </tr>
      </table>
    </div></td>
    <td colspan="3" valign="top"><div align="right"><img src="hinh_anh/top.jpg" width="450" height="113"></div></td>
  </tr>
  <tr bgcolor="#F4FBEB">
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#C7EAB0"><span class="style3">&nbsp;Danh mục
          </span>
          <table width="100%" border="0" bgcolor="#F4FBEB">
            <tr>
              <td>&nbsp;<a href="trang_1.php" class="style8">Trang ch&#7911;</a></td>
            </tr>
            <tr>
              <td>&nbsp;<a href="trang_2.php" class="style8">T&igrave;m ki&#7871;m b&oacute; hoa </a></td>
            </tr>
            <tr>
              <td height="21">&nbsp;<a href="trang_3.php" class="style8">Th&ecirc;m m&#7899;i b&oacute; hoa </a></td>
            </tr>
          </table>		  </td>
      </tr>
      <tr>
        <td valign="bottom" bgcolor="#F4FBEB">&nbsp;</td>
      </tr>
    </table>    
    <img src="hinh_anh/BannerSideCreative.jpg" width="200" height="200" /></td>
    <td colspan="3" valign="top" bgcolor="#F4FBEB"><p><?php
    include_once("TH_GioHang.php");
	if(isset($_SESSION["giohang"]))
	{
		$giohang=$_SESSION["giohang"];
		if(count($giohang)>0)
		{
			$hoten="";
			$dienthoai="";
			$email="";
			$makh="";
			$diachi="";
			if(isset($_POST["cmddathang"]))
				{
					include_once("xl_csdl.php");
					$hoten=$_POST["ho_ten"]; 
		 			$email= $_POST["email"];
		 			$dienthoai= $_POST["dien_thoai"];
		 			$diachi= $_POST["dia_chi"];
					if(isset($_SESSION["makh"]))
		 				 $makh=$_SESSION["makh"];	 
		 			$ngaydh=date("Y-m-d H:s:i"); 
					//Ghi thong tin xuong bang don hang
					$caulenh="insert into 	donhang(ngaydh,makh,hoten,diachi,dienthoai,email,trangthai) values('".$ngaydh."',".$makh.",'".$hoten."','".$diachi."','".$dienthoai."','".$email."',1)";			
			Ghi_Du_Lieu($caulenh);
			$bangdh=Doc_Bang("select max(sodh)as sodhmoi from donhang");
			foreach($bangdh as $dh)
			{
				$sodh=$dh[0];
				//Them bang chi tiet
				$caulenh="insert into ctdonhang(sodh,mahoa,soluong,dongia,thanhtien)
				values";
				foreach($giohang as $h)
				  $caulenh=$caulenh."(".$sodh.",".$h[0].",".$h[2].",".$h[3].",".($h[2]*$h[3])."),";
				 //bỏ dau, cuoi
				 $caulenh=substr($caulenh,0,strlen($caulenh)-1);
				
				 Ghi_Du_Lieu($caulenh);
				 //Xóa gio hang
				 unset($_SESSION["giohang"];
				 echo "<script>alert('Chúc mừng bạn đã mua hàng')</script>"; 
				 
			}
				}
			
	else if(isset($_SESSION["makh"]))
	{
		$hoten=$_SESSION["tenkh"];
	  $makh=$_SESSION["makh"];
	 $email= $_SESSION["email"];
	 $dienthoai= $_SESSION["dienthoai"];
	 $diachi= $_SESSION["diachi"];
		}
		}
	}
	
		?></p>
      <form name="form1" method="post" >
        <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td><span class="style3">Họ Tên:</span></td>
            <td><input name="ho_ten" type="text" id="ho_ten" value="<?php echo $hoten?>" size="30"></td>
          </tr>
           <tr>
            <td><span class="style3">Số Điện Thoại :</span></td>
            <td><input name="dien_thoai" type="text" id="dien_thoai" value="<?php echo $dienthoai?>" size="30"></td>
          </tr>
           <tr>
            <td><span class="style3">Email:</span></td>
            <td><input name="email" type="text" id="email" value="<?php echo $email?>" size="30"></td>
          </tr>
          <tr>
            <td><span class="style3">Địa chỉ giao hàng:</span></td>
            <td><input name="dia_chi" type="text" id="dia_chi" value="<?php echo $diachi?>" size="30"></td>
          </tr>
          <tr>
            <td height="30" colspan="2" align="center"><input type="submit" name="cmddathang" value="Đặt hàng"></td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#DEF4CE"><span class="style2">Copyright &copy;2003-2007 <br />
    Công ty thiết kế Ý Tưởng </span></td>
    <td valign="top" bgcolor="#DEF4CE"><span class="style15"></span></td>
    <td width="27%" valign="top" bgcolor="#DEF4CE"><span class="style15"></span></td>
    <td bgcolor="#DEF4CE"><span class="style8"><img src="hinh_anh/IconMail.gif" width="16" height="16" />
	    <a href="./ktphuong@hcmuns.edu.vn">ktphuong@hcmuns.edu.vn</a>
      <br />
      <img src="hinh_anh/online0.gif" width="18" height="18" />hoadep.com.vn</span></td>
  </tr>
</table>
</body>
</html>
