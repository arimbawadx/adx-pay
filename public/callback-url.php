<?php 
/* Script ini hanya membantu menyimpan dalam file saja
	* Hasil yg tersimpan silakan dianalisa agar dapat diproses oleh sistem Anda.
	*/

	$ip = (@$_SERVER['HTTP_X_FORWARDED_FOR']=='') ? $_SERVER['REMOTE_ADDR'] : @$_SERVER['HTTP_X_FORWARDED_FOR']; if($ip=='172.104.161.223'){ // memastikan data terikirim dari server portalpulsa

	file_put_contents('save.txt', json_encode($_POST['content'])); // menyimpan dalam file save.txt

	}

 ?>