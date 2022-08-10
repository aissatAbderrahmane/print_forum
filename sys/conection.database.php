<?
/*
 * PRINT FORUM V 0.1 
 * Powred By MR-O : Abdolahe Ibne Abdel hakime
 * Started At : 18/07/2011 , time -> 10:48
 */
   @mysql_connect("localhost","root","123456");
 //@mysql_query("create database print");
   @mysql_select_db("mro"); 
 $prefix_start = "table_";
 $prefix_end = "_islam";
$date = date("d-m-Y");
$time = date("H:i:s");
$gmtimeh = gmdate("H")+1;
$gmtime = $gmtimeh.gmdate(":i:s");
 
 ?>