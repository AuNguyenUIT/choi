<?php
$bangDshoa=
array(1=>array(
array(1,1,"Đón xuân",50000,"cuc_9.jpg","Hoa cúc các màu: trắng, vàng, cam"),
array(2,1,"Hồn nhiên",60000,"cuc_2.jpg","Hoa cúc vàng, cam. lá măng"),
array(3,1,"Tím thuỷ chung",45000,"cuc_3.jpg","Hoa cúc tím"),
array(4,1,"Nét duyên tím hoa cà",40000,"cuc_4.jpg","Hoa cúc màu tím nhạt")
),
2=>array(
array(8,2,"Cầu thuỷ tinh",220000,"cuoi_2.jpg","Hoa hồng và hoa thuỷ tiên trắng"),
array(9,2,"Duyên thầm",260000,"cuoi_3.jpg","Hoa cúc trắng, baby, lá măng"))
);

/*10|2|Đâm chồi nảy lộc|180000|cuoi_4.jpg|Hoa hồng trắng và các loại lá măng
/*11|2|Hoà quyện|270000|cuoi_5.jpg|Hoa hồng trắng, lá thuỷ tùng
/*12|2|Nồng nàn|210000|cuoi_6.jpg|Hoa hồng đỏ, lá thuỷ tùng, lá măng
/*13|3|Together|120000|hong_1.jpg|Hồng xác pháo, cúc tím
/*14|3|Long trip|85000|hong_2.jpg|Hoa hồng đỏ, lá kim thuỷ tùng
/*15|3|Beautiful life|100000|hong_3.jpg|Hoa hồng đỏ, lá măng, lá đệm
/*16|3|Morning Sun|75000|hong_4.jpg|Hoa hồng vàng
/*17|3|Pretty Bloom|65000|hong_5.jpg|Hoa hồng trắng và lá thông
/*18|3|Red Rose|45000|hong_7.jpg|Hoa hồng đỏ và lá măng
/*19|4|Vấn vương|150000|xuan_1.jpg|Hoa hồng đỏ, hồng đậm, cúc đỏ, các loại lá
/*20|4|Nắng nhẹ nhàng|50000|xuan_2.jpg|Hoa cúc xanh, hoa lys vàng, lá đệm
/*21|4|Thanh tao|120000|xuan_3.jpg|Hoa thủy tiên, cúa trắng, cúc dại tím, các loại lá đệm
/*22|4|Tinh khiết|110000|xuan_4.jpg|Hồng trắng và salem
/*23|4|Mùa xuân chín|150000|xuan_5.jpg|Hồmg cam, cúc xanh, thuỷ tiên và các loại lá
/*24|4|Rực rỡ nắng vàng|75000|xuan_6.jpg|Hồng vàng và cúc vàng
/*25|3|Love Candy|95000|hong_13.jpg|Hoa hồng trắng tinh khôi xen với hoa hồng màu hồng nhạt, điểm thêm baby trắng và lá măng
/*26|2|Happy Wedding|210000|cuoi_9.jpg|Hoa hồng môn và các loại lá/*27|1|Cúc nhiệt đới|150000|cuc_15.jpg|Cúc vàng - hồng cam - lá măng";
$bangt1=explode("/*",$chuoi);

$banghoa=array(array(array()));

for($i=1;$i<count($bangt1);$i++)
 {
	 $hoa=explode("|",$bangt1[$i]);
	 $banghoa[$hoa[1]]=$hoa;
}*/
$maloai=1;
if(isset($_GET["maloai"]))
   $maloai=$_GET["maloai"];
   $banghoa=$bangDshoa[$maloai];
echo"<table >";

for($i=0;$i<count($banghoa);$i++)
{
	
	if($i%5==0)
	 echo"<tr>";
	echo"<td>
	<a href='trang_chi_tiet_hoa.php?mahoa=". $banghoa[$i][0]."'><img src='hinh_anh/".$banghoa[$i][4]."'/></a><br><b>".$banghoa[$i][2]."<img src='hinh_anh/gio_hang.jpg'/><br><i>Giá bán </i>".number_format($banghoa[$i][3])."vnđ</td>";
	if(($i+1)%5==0)
	 echo"</tr>";
	}

echo"</table>";
?>