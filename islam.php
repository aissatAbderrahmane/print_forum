<?
/*
 * PRINT FORUM V 0.1 
 * Powred By MR-O : Abdolahe Ibne Abdel hakime
 * Started At : 18/07/2011 , time -> 10:48
 */

@error_reporting(0);
@session_start();
@ob_start('ob_gzhandler');
@header("Content-Type: text/html; charset=windows-1256");
				@define("_sys", "_system/"); // Folder Of system: func, class, config, connect...etc.
				@define("_adm", "_ad.pn/"); // Folder Of admin panel.
				@define("_img", "style/"); // Folder Of style.css, images, icons ...etc.
				@define("tmp", _sys."/tmp/"); // Folder of templates files.
				@define("img", _img."img/"); // Folder of images and icons and editor icons and .... all the imgs.
 @include(_sys."conection.database.php");
 @include(_sys.".class.core.php");
 @include(_sys."function.islamnet.php");
 @include(_sys."class.is_lib.php");
 @include("contenu.islamnet.php");

session_write_close();
?>