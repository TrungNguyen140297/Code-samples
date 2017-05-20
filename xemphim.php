<?php
	ob_start();
	$id = $_GET['id'];
	$phim = mysqli_query($conn, "SELECT * FROM phim WHERE idphim='$id' ");
	$dong_phim = mysqli_fetch_array($phim);
	$daodien = mysqli_query($conn, "SELECT * FROM daodien WHERE idphim='$id' ");
	$kichban = mysqli_query($conn, "SELECT * FROM kichban WHERE idphim='$id' ");
	$dienvien = mysqli_query($conn, "SELECT * FROM dienvien WHERE idphim='$id' ");
	$theloai = mysqli_query($conn, "SELECT * FROM theloai WHERE idphim='$id' ");
	$luotxem = $dong_phim['luotxem'];
	$luotxem = $luotxem + 1;
	mysqli_query($conn, "UPDATE phim SET luotxem='$luotxem' WHERE idphim = '$id'");
?>
<div class="thongtinphim row">
	<div class="poster col-md-4 col-xs-4">
		<img src="<?php echo($dong_phim['poster']); ?>" width="100%" height="auto" class="img-thumbnail" />
	</div>
	<div class="thongtin col-md-8 col-xs-8">
		<p style="color: #B8A000; font-size: 18px;"><?php echo($dong_phim['tenphimvi']); ?></p>
		<p style="font-size: 16px;"><?php echo($dong_phim['tenphimen']); ?></p>
		<p>Đạo diễn: 
		<?php 
		$i = 1;
		$count = mysqli_num_rows($daodien);
		while($daodien_dong = mysqli_fetch_array($daodien))
		{
			echo($daodien_dong['tendaodien']);
			if ($i < $count)
			{
				echo(", ");	
			}
			$i++;
		} 
		?>
		</p>
		<p>Kịch Bản: 
		<?php 
		$i = 1;
		$count = mysqli_num_rows($kichban);
		while($kichban_dong = mysqli_fetch_array($kichban))
		{
			echo($kichban_dong['kichban']);
			if ($i< $count)
			{
				echo(", ");	
			}
			$i++;
		} 
		?>
		</p>
		<p>Diễn Viên: 
		<?php 
		$i = 1;
		$count = mysqli_num_rows($dienvien);
		while($dienvien_dong = mysqli_fetch_array($dienvien))
		{
			echo($dienvien_dong['tendienvien']);
			if ($i < $count)
			{
				echo(", ");	
			}
			$i++;
		} 
		?>
		</p>
		<p>Năm sản suất: <?php echo($dong_phim['nam']) ?></p>
		<p><img src="/img/imdb.png" height="20px" pandding="0">: <?php echo($dong_phim['diemimdb']); ?></p>
		<p>Thời lượng: <?php echo($dong_phim['thoigian']); ?></p>
		<p>Thể loại: 
		<?php 
		$i = 1;
		$count = mysqli_num_rows($theloai);
		while($theloai_dong = mysqli_fetch_array($theloai))
		{
		?>
			<a href="index.php?xem=phim_theloai&theloai=<?php echo($theloai_dong['tentheloai_khongdau']); ?>"><?php echo($theloai_dong['tentheloai']); ?></a>
		<?php
			if ($i < $count)
			{
				echo(", ");	
			}
			$i++;
		} 
		?>
		</p>
	</div>
</div>
<div class="play">
	<p style="color: #B8A000; font-size: 18px; padding-top: 20px;">Giới thiệu phim:</p>
	<p style="color: #9F9F9F;"><?php echo($dong_phim['mota']); ?></p>
</div>
<p style="color: #D4D4D4; font-size: 20px;">BẠN ĐANG XEM PHIM</p>
<div class="embed-responsive embed-responsive-16by9">
<iframe src="<?php echo($dong_phim['linkphim']); ?>" allowfullscreen></iframe>
</div>