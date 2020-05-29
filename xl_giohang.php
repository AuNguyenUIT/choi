<?php
if(isset($_REQUEST["mahoamua"]))
{
session_start();
/*
Gio hang luu tru trong session là mảng 2 chiếu
các phần tử MaHoa=>Thong tin hoa
[1]=>Hoa1{ma hoa,tenhoa,soluong,dongia}
[2]=>hoa2{}

*/
if(isset($_SESSION["giohang"])) 
$Giohang=$_SESSION["giohang"];
else
$Giohang="";
$mahoa=$_REQUEST["mahoamua"];
$maloaihoa=$_REQUEST["maloaihoa"];
if(isset($Giohang[$mahoa]))//neu hoa da cho mua truoc thi tang so luong len 1
 $Giohang[$mahoa][2]++;
else //chua co tao moi hoa
{
	include_once("xl_csdl.php");
	 $banghoa=Doc_Bang("select * from hoa where mahoa=".$mahoa);
	foreach($banghoa as $h)
	{
	 $hoa=array($h[0],$h[2],1,$h[3]);
	 $Giohang[$mahoa]=$hoa;
	}
}
$_SESSION["giohang"]=$Giohang;
echo"<script>location.href = 'trang_1.php?maloai=".$maloaihoa."';</script>";
}
?>