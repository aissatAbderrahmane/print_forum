<?PHP
	@include("includes_islames/conection.database.php");
	@include("includes_islames/class.core.php");
	@include("includes_islames/function.islamnet.php");
	@define("Step", @intval($system->_define_url("step")));
?>
<html dir="rtl" >
<head >
<link rel="stylesheet" type="text/css" href="styles_f/IEstyles_blue.css">
<META CONTENT="text/html; charset=windows-1256" HTTP-EQUIV="Content-Type">
<title>تثبيت نسخة منتديات برينت فوريم التجريبية</title>
</head>
<body>
	<center><br /><br /><br />
		<div class="error" <?PHP if(Step == 2) echo'style="width:780px;"'; ?> >
			<font color="#CC0000">:: Print Forum Test ::</font><br />
			<?PHP if(Step == ""){ ?>
			بسم الله الرحمن الرحيم<br />
			أهلا وسهلا بك في تركيب النسخة التجريبة<br />
			لنسخة منتديات برينت فوريم.<br />
			<a href="install-1.html" class="url_adm"> --إضغط هنا إن أردت تنصيب النسخة--</a>
			<br /><br />
			<?PHP }elseif(Step == 1){ 
					@mysql_query("
						CREATE TABLE `".$prefix_start."cat_deleted".$prefix_end."` (
						  `id` int(9) NOT NULL auto_increment,
						  `title` longtext NOT NULL,
						  `icon` longtext NOT NULL,
						  `membersup` tinytext NOT NULL,
						  `site` int(3) NOT NULL,
						  `post` int(9) NOT NULL,
						  `topic` int(9) NOT NULL,
						  `text` text NOT NULL,
						  `status` int(1) NOT NULL,
						  `groupe` int(9) NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."cat".$prefix_end."` (
						  `id` int(9) NOT NULL auto_increment,
						  `title` longtext NOT NULL,
						  `icon` longtext NOT NULL,
						  `membersup` tinytext NOT NULL,
						  `site` int(3) NOT NULL,
						  `post` int(9) NOT NULL,
						  `topic` int(9) NOT NULL,
						  `text` text NOT NULL,
						  `status` int(1) NOT NULL,
						  `groupe` int(9) NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."forum_deleted".$prefix_end."` (
						  `id` int(9) NOT NULL auto_increment,
						  `title` longtext NOT NULL,
						  `icon` longtext NOT NULL,
						  `membersup` tinytext NOT NULL,
						  `cat` int(9) NOT NULL,
						  `post` int(9) NOT NULL,
						  `topic` int(9) NOT NULL,
						  `text` mediumtext NOT NULL,
						  `status` int(1) NOT NULL,
						  `groupe` int(9) NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."forum".$prefix_end."` (
						  `id` int(9) NOT NULL auto_increment,
						  `title` longtext NOT NULL,
						  `icon` longtext NOT NULL,
						  `membersup` tinytext NOT NULL,
						  `cat` int(9) NOT NULL,
						  `post` int(9) NOT NULL,
						  `topic` int(9) NOT NULL,
						  `text` mediumtext NOT NULL,
						  `status` int(1) NOT NULL,
						  `groupe` int(9) NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."forum_moderate".$prefix_end."` (
						  `id` int(11) NOT NULL auto_increment,
						  `forumid` int(11) NOT NULL,
						  `memberid` int(11) NOT NULL,
						  `suprnums` int(11) NOT NULL,
						  `status` int(1) NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."fsupervisor".$prefix_end."` (
						  `id` int(11) NOT NULL auto_increment,
						  `reli` int(11) NOT NULL,
						  `memberid` int(11) NOT NULL,
						  `suprnums` int(11) NOT NULL,
						  `status` int(1) NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."lastpost".$prefix_end."` (
						  `id` int(11) NOT NULL auto_increment,
						  `memberid` int(11) NOT NULL,
						  `reli` int(11) NOT NULL,
						  `time` text NOT NULL,
						  `date` text NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."lastpost_t".$prefix_end."` (
						  `id` int(11) NOT NULL auto_increment,
						  `memberid` int(11) NOT NULL,
						  `reli` int(11) NOT NULL,
						  `time` text NOT NULL,
						  `date` text NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."members".$prefix_end."` (
						  `id` int(9) NOT NULL auto_increment,
						  `user_name` longtext NOT NULL,
						  `password` longtext NOT NULL,
						  `email` longtext NOT NULL,
						  `age` int(9) NOT NULL,
						  `type` tinytext NOT NULL,
						  `level` int(3) NOT NULL,
						  `post` int(9) NOT NULL,
						  `topic` int(9) NOT NULL,
						  `suprnum` int(9) NOT NULL,
						  `img` varchar(255) NOT NULL,
						  `register` varchar(255) NOT NULL,
						  `lastconect` varchar(255) NOT NULL,
						  `status` int(1) NOT NULL,
						  `font` varchar(60) NOT NULL,
						  `align` varchar(7) NOT NULL,
						  `color` varchar(7) NOT NULL,
						  `bold` int(1) NOT NULL,
						  `italic` int(1) NOT NULL,
						  `underligne` int(1) NOT NULL,
						  `size` int(2) NOT NULL,
						  `titles` text NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."msg_f".$prefix_end."` (
						  `id` int(11) NOT NULL auto_increment,
						  `title` text NOT NULL,
						  `reli` int(11) NOT NULL,
						  `writer` text NOT NULL,
						  `contenu` longtext NOT NULL,
						  `date` text NOT NULL,
						  `post` int(11) NOT NULL,
						  `time` text NOT NULL,
						  `status` int(11) NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."publicitie".$prefix_end."` (
						  `id` int(9) NOT NULL auto_increment,
						  `alt` mediumtext NOT NULL,
						  `href` mediumtext NOT NULL,
						  `src` mediumtext NOT NULL,
						  `date` mediumtext NOT NULL,
						  `expire` mediumtext NOT NULL,
						  `status` int(9) NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."replie".$prefix_end."` (
						  `id` int(11) NOT NULL auto_increment,
						  `reli` int(11) NOT NULL,
						  `writer` text NOT NULL,
						  `contenu` longtext NOT NULL,
						  `vote` int(11) NOT NULL,
						  `date` text NOT NULL,
						  `time` text NOT NULL,
						  `hidestatus` int(11) NOT NULL,
						  `lockstatus` int(11) NOT NULL,
						  `starstatus` int(11) NOT NULL,
						  `delstatus` int(11) NOT NULL,
						  `status` int(1) NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."supervisor".$prefix_end."` (
						  `id` int(11) NOT NULL auto_increment,
						  `reli` int(11) NOT NULL,
						  `memberid` int(11) NOT NULL,
						  `suprnums` int(11) NOT NULL,
						  `status` int(1) NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."titles".$prefix_end."` (
						  `id` int(9) NOT NULL auto_increment,
						  `name` varchar(255) NOT NULL,
						  `members` text NOT NULL,
						  `color` varchar(7) NOT NULL,
						  `reli` int(1) NOT NULL,
						  `status` int(1) NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."topic_deleted".$prefix_end."` (
						  `id` int(11) NOT NULL auto_increment,
						  `title` text NOT NULL,
						  `reli` int(11) NOT NULL,
						  `writer` text NOT NULL,
						  `contenu` longtext NOT NULL,
						  `vote` int(11) NOT NULL,
						  `icon` longtext NOT NULL,
						  `date` text NOT NULL,
						  `post` int(11) NOT NULL,
						  `time` text NOT NULL,
						  `hidestatus` int(11) NOT NULL,
						  `lockstatus` int(11) NOT NULL,
						  `starstatus` int(11) NOT NULL,
						  `pinstatus` int(11) NOT NULL,
						  `status` int(11) NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."topic".$prefix_end."` (
						  `id` int(11) NOT NULL auto_increment,
						  `title` text NOT NULL,
						  `reli` int(11) NOT NULL,
						  `writer` text NOT NULL,
						  `contenu` longtext NOT NULL,
						  `vote` int(11) NOT NULL,
						  `icon` longtext NOT NULL,
						  `date` text NOT NULL,
						  `post` int(11) NOT NULL,
						  `time` text NOT NULL,
						  `hidestatus` int(11) NOT NULL,
						  `lockstatus` int(11) NOT NULL,
						  `starstatus` int(11) NOT NULL,
						  `pinstatus` int(11) NOT NULL,
						  `status` int(11) NOT NULL,
						  PRIMARY KEY  (`id`)
						)");
						@mysql_query("CREATE TABLE `".$prefix_start."viseadmin".$prefix_end."` (
						  `id` int(11) NOT NULL auto_increment,
						  `typev` varchar(255) NOT NULL,
						  `memberid` int(11) NOT NULL,
						  `forumid` int(11) NOT NULL,
						  `catid` int(11) NOT NULL,
						  `time` text NOT NULL,
						  `date` text NOT NULL,
						  `txt` text NOT NULL,
						  `ip` varchar(255) NOT NULL,
						  PRIMARY KEY  (`id`)
						)
						");
						$system->_true("تم انشاء الجداول بنجاح.");
						echo '<a href="install-'.(Step+1).'.html" class="url_adm"> --إنتقال للمرحلة التالية-- </a>';
			}elseif(Step == 2){?>
				<br /> أدخل بيانات المدير <br />
<form method="post" name="regi" action="install-3.html">
<table width="88%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" width="152px" height="28px"><center>الإسم</td>
<td class="regis" ><center><input name="name" size="42" /></td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>الكلمة السرية</td>
<td class="regis" ><center><input type="password" name="password" size="42" /></td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>البريد الالكتروني</td>
<td class="regis" ><center><input name="email" size="42" /></td>
</tr>
<tr >
<td class="regis" colspan="2" ><center><input class="buton" type="submit" value="إرسال" /></td>
</tr>
</table>
</form>
			<?PHP }elseif(Step == 3){
					@define("NAME", $system->_define_input("name"));
					@define("PASSWORD", md6($system->_define_input("password")));
					@define("EMAIL", $system->_define_input("email"));
						if(NAME == "" OR PASSWORD == "" OR EMAIL == "")
							echo "يرجى ملأ جميع البيانات <br /> <a class='url_adm' href='install-2.html'> العودة </a>";
							else{
								if($system->email(EMAIL) == FALSE) echo "الإيميل خاطئ <br /> <a class='url_adm' href='install-2.html'> العودة </a>";
									else{
										@mysql_query("INSERT INTO {$prefix_start}members{$prefix_end} VALUES(NULL,'".NAME."','".PASSWORD."','".EMAIL."','0','home','96','0','0','0','','$date','$date $time','1','tahoma','center','#353535','1','0','0','16','') ");
										echo "تم تسجيل عضويية المدير بنجاح، <br /> <a href='islam.html'> الرئيسية </a>";
									}
						}
			}else{ $system->_error("خطأ، لا أدري مالذي تريده مني بالضبط !"); }?>
		</div>
	</center>	
</body>
</html>

