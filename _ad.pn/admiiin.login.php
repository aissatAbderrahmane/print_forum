<?
session_start();
$table_folder=array(
/* html => */"templates" => "templates_islam/",
/* admin => includes => */"include" => "includes_islames/",
/* styles => */ "styles" =>"../styles_f/",
                     "img"=>"../images/",
                 "ic"=>"../icons/",
                "sm"=>"../smilles/",
              "img_st"=>"../style_image/",
                 "f_medal"=>"../medals/",
                "f_logo"=>"../forum_logo/",
				"captcha"=>"captcha/"
				);
 $icons = $table_folder["styles"].$table_folder["img"].$table_folder["ic"];
@include("../{$table_folder["include"]}conection.database.php");			
@include("../{$table_folder["include"]}function.islamnet.php");

$login = protection($_GET['login']);
if($login == "admiin_login_admiin_login"){
?>
<html dir="rtl">
<head>
<META CONTENT="text/html; charset=windows-1256" HTTP-EQUIV="Content-Type">
<link rel="stylesheet" type="text/css" href="./<? echo $table_folder["styles"];?>IEstyles_blue.css">
</head>
<body style="background-color:#EBEBEB;">
<center>
<form method="post" name="login" action="admiiin.login.php?login=admiin_setlog_admiin_login">
<table width="52%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" width="152px" height="28px"><center>الإسم</td>
<td class="regis" ><center><input name="login_name"  size="42" />
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>الكلمة السرية</td>
<td class="regis" ><center><input type="password" name="login_password"  size="42" />
</td>
</tr>
<tr >
<td class="register" dir="ltr" width="152px" height="28px"><center>
<? 
echo $capt;
?></td>
<td class="regis" ><center>
<input name="login_captcha" size="42" value="أكتب الكود المقابل هنا" Onclick="document.login.login_captcha.value='';" />
</td>
</tr>
<? $_SESSION["captcha_is"] = intval($captcha) ; ?>
<tr >
<td class="regis" colspan="2" ><center>
<input class="buton" type="submit" value="إرسال"/> &nbsp;&nbsp; <input class="buton" type="reset" value="تفريغ"/>
</td>
</tr>
</table></form>
<?}elseif($login == "admiin_setlog_admiin_login"){

$login_names=@protection($_POST["login_name"]);
$login_passwords= md6($_POST["login_password"]);
$login_captchas=@protection($_POST["login_captcha"]);
if($_SESSION["captcha_is"] == $login_captchas){

   if(empty($login_names) or empty($login_passwords)){
   echo "لم تقم بملأ البيانات كما ينبغي
   بالتوفيق";
   redirect2("admiiin.login.php?login=admiin_login_admiin_login");
$_SESSION["captcha_is"] = "";
session_destroy();
   }else{
   $query=@mysql_query("select  user_name,password from {$prefix_start}members{$prefix_end} where level='96'");
   if(mysql_num_rows($query)>0){
   $_SESSION["name_is"] = $login_names;
   $_SESSION["pass_is"] = $login_passwords;
      $_COOKIE["administrator"] = "loged";
   $administrator = protection($_COOKIE["administrator"]) ;
   setcookie("administrator",$administrator);
  ?>
  <html dir="rtl">
<head>
<META CONTENT="text/html; charset=windows-1256" HTTP-EQUIV="Content-Type">
<link rel="stylesheet" type="text/css" href="./<? echo $table_folder["styles"];?>styles_blue.css">
</head>
<body style="background-color:#EBEBEB;">
  <? echo"
   تم تسجيل الدخول بنجاح
    أهلا بك يا :
$login_names
   بالتوفيق 
   ";
     redirect2("admiiin.index.php");
$_SESSION["captcha_is"] = "";
   }else{
   echo "لقد تم اكتشاف محاولة اختراق 
   تم تسجيل بيانات حاسبك و الايبي الخاص بك في سجلاتنا
   ";
   echo '<META http-equiv="refresh" content="0; URL=../islam.php" ></META>'; 
$_SESSION["captcha_is"] = "";
session_destroy();
   }
   @mysql_free_result($query);
   
   }

}else{
?>
<br /><br />

<table width="100%" >
<tr>
<td class="forum">
<center>رسالة إدارية
</td>
</tr>
<tr>
<td class="message">
<center>
<br />

<?
echo"كود تحقق خاطئ ،
أعد ادخال البيانات من جديد
بالتوفيق ";?>
</td>
</tr>
</table>
<?
redirect2("admiiin.login.php?login=admiin_login_admiin_login");
$_SESSION["captcha_is"] = "";
session_destroy();

}



}elseif($login == "admiin_logout_admiin_logout"){
?>
<table width="100%" >
<tr>
<td class="forum">
<center>رسالة إدارية
</td>
</tr>
<tr>
<td class="message">
<center>
<br />
<?echo"تم تسجيل الخروج بنجاح";?>
</td>
</tr>
</table>
<?
redirect2("admiiin.login.php?login=admiin_login_admiin_login");
session_destroy();
}else{
echo '<META http-equiv="refresh" content="0; URL=../islam.php" ></META>'; 
}?>

</body>
</html>
