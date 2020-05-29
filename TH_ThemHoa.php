<?php
$options = array(
PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
$dbh = new PDO('mysql:host=localhost;dbname=qlbanhoa', 'root', '',$options);
$bangloaihoa=$dbh->query("select * from loaihoa");
//Lấy dữ liệu thêm vào bảng Hoa
if(isset($_POST["ten_hoa"]))
{
	$caulenh="insert into Hoa(maloai,tenhoa,dongia,hinh,mota)
	values(".$_POST["loai"].",'".$_POST["ten_hoa"]."',".$_POST["gia_ban"].",'".$_FILES["file"]["name"]."','".$_POST["mo_ta"]."')";
	$dbh->exec($caulenh);
	echo"<script>alert('Thêm thành công');</script>";
	//dua hinh len server
	move_uploaded_file( $_FILES["file"]["tmp_name"],'hinh_anh/'.$_FILES["file"]["name"]);
}
?>
<form action="trang_3.php" method="post" enctype="multipart/form-data" name="form1">
        <table width="70%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#E6F6D9">
          <tr bgcolor="#D7F2C5">
            <td colspan="2"><div align="center" class="style4"> THÊM BÓ HOA MỚI </div></td>
          </tr>
          <tr>
            <td width="26%"><p class="style10">&nbsp;Tên bó hoa: </p></td>
            <td width="74%"><label>
              <input name="ten_hoa" type="text" id="ten_hoa" size="35">
            </label></td>
          </tr>
          <tr>
            <td><p class="style10">&nbsp;Loại hoa:</p></td>
            <td><label>
              <select name="loai" id="loai">
			  <?php	
			  // hien thi loai
			 						
						foreach($bangloaihoa as $loaihoa)
						{
							
							echo  "<option value='".$loaihoa[0]."'>".$loaihoa[1]."</option>";
						}					
			?>
              </select>
            </label></td>
          </tr>
          <tr>
            <td><p class="style10">&nbsp;Thành phần: </p></td>
            <td><label>
              <textarea name="mo_ta" cols="35" id="mo_ta"></textarea>
            </label></td>
          </tr>
          <tr>
            <td><p class="style10">&nbsp;Đơn giá </p></td>
            <td><label>
              <input name="gia_ban" type="text" id="gia_ban">
            </label></td>
          </tr>
          <tr>
            <td><p class="style10">&nbsp;Hình bó hoa </p></td>
            <td><label>
              <input name="file" type="file" size="45">
            </label></td>
          </tr>
          <tr>
            <td height="35" colspan="2"><p align="center">
              <label>
              <input type="submit" name="Submit" value="Thêm bó hoa mới">
              </label>
            </p></td>
          </tr>
        </table>
      </form>