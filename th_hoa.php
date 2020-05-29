<?php
include_once("xl_csdl.php");
$maloai=1;
if(isset($_GET["maloai"]))
   $maloai=$_GET["maloai"];
$banghoa=Doc_Bang("select * from hoa where maloai=".$maloai);

echo"<table >";
$sl=0;
foreach($banghoa as $hoa)
{
	
	if($sl%5==0)
	 echo"<tr>";
	echo"<td>
	<a href='trang_chi_tiet_hoa.php?mahoa=". $hoa[0]."'><img src='hinh_anh/".$hoa[4]."'/></a><br><b>".$hoa[2]."<a href='xl_giohang.php?mahoamua=".$hoa[0]."&&maloaihoa=".$hoa[1]."'><img src='hinh_anh/gio_hang.jpg'/></a><br><i>Giá bán </i>".number_format($hoa[3])."vnđ</td>";
	$sl++; 
	if($sl%5==0)
	 echo"</tr>";
	
}
echo"</table>";
?>