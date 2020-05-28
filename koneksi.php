<?php
$host	= "localhost";	//alamat server, biasanya 'localhost' atau isi dengan alamat ip server mysql anda
$user	= "root";		//defaultnya 'root', sesuaikan dg konfigurasi server anda
$pass	= "";		//kosongkan jika tidak ada
$db		="UKK_RPL";	//isi dengan nama database

mysql_connect($host, $user, $pass) or die( "server database tidak ditemukan!");
mysql_select_db($db) or die( "database tidak ditemukan di server!" );
?>