<?php


//Lấy mã hoa duoc chon

if(isset($_POST["ten"]))
 {
	 $tenhoa=$_POST["ten"];
	
	 $options = array(
PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
$dbh = new PDO('mysql:host=localhost;dbname=qlbh', 'root', '',$options);
$banghoa=$dbh->query("select * from hoa where tenhoa like'%".$tenhoa."%' or mota like '%".$tenhoa."%'");
echo"<table>";
$dem=0;
foreach($banghoa as $hoa)
{
	if($dem%2==0)
		echo "<tr>";
	 echo "<td><img src='hinh_anh/".$hoa[4]."'/></td>
		   <td><b>".$hoa[2]."</b><br><i>Giá bán </i>".number_format($hoa[3])."vnđ<br><i>Thành phần chính</i><br>".$hoa[5]."<br><a href='trang_1.php?maloai=".$hoa[1]."'>Về trang chủ</a></td>";
		$dem++;
	if($dem%2==0)
	 echo"</tr>";
		   
}
echo"</table>";
	 }

?>