<?php
if(isset($_POST["ten_dn"]))
{
	include_once("xl_csdl.php");
	$tendn=$_POST["ten_dn"];
	$matkhau=$_POST["mat_khau"];
	$caul="select * from khachhang where TenDN='".$tendn."' and MatKhau='".$matkhau."'";
	$bangkh=Doc_Bang($caul);
	if($bangkh->rowCount()>0)
	{
	 foreach($bangkh as $kh)
	 {
	  $_SESSION["tenkh"]=$kh["HoTen"];
	  $_SESSION["makh"]=$kh["Makh"];
	  $_SESSION["email"]=$kh["Email"];
	  $_SESSION["dienthoai"]=$kh["DienThoai"];
	  $_SESSION["diachi"]=$kh["DiaChi"];
	 }
	echo"<script>location.href = 'trang_1.php';</script>";
	}
	else
	 echo"<script>alert('Dang nhap sai');</script>";
	}
?>
<form id="form1" name="form1" method="post" action="trang_1.php">
<table width="100%" border="0" cellpadding="0" cellspacing="2">
      	  <tr>
        <td colspan="2"><div align="center" class="style5">     Đăng nhập</div></td>
        </tr>
      <tr>
        <td width="46%"><p class="style10">Tên đăng nhập: </p></td>
        <td width="54%"><span class="style10">
          <label>
            <input name="ten_dn" type="text" id="ten_dn" size="15" />
            </label>
        </span> </td>
      </tr>
      <tr>
        <td><p class="style10">Mật khẩu: </p></td>
        <td><span class="style10">
          <label>
            <input name="mat_khau" type="password" id="mat_khau" size="15" />
            </label>
        </span></td>
      </tr>
      
        <td colspan="2"><div align="center">
          <label>
          <input type="submit" name="Submit" value="Đăng nhập" />
          </label>
        </div></td>
        </tr>
	
    </table>
    </form>