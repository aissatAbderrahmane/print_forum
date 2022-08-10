<?
/*
 * PRINT FORUM V 0.1 
 * Powred By MR-O : Abdolahe Ibne Abdel hakime
 * Started At : 18/07/2011 , time -> 10:48
 */
 ## ICONS ## 
 $icons = $table_folder["styles"].$table_folder["img"].$table_folder["ic"];
 $publifolder = $table_folder["styles"].$table_folder["img"].$table_folder["publi"];
 // URL 
 $page = @protection($_GET["page"]);
 $web = @protection($_GET["web"]);
 $register = @protection($_GET["register"]);
 $login = @protection($_GET["login"]);
 $mnt_link = @protection($_GET["monitor"]);
 $mnt_function = @protection($_GET["function"]);
 $forum = intval($_GET["forum"]);
 $visore = @protection($_GET["visore"]);
 $topic = @protection($_GET["topic"]);
 $pg = @intval($_GET["pg"]);
 $replie = @intval($_GET["replie"]);
 $Get_member = @intval($_GET["member"]);

##classes ##
$Ccondition = new files_ifelse() ;
## Änd ## 
    if($web == "sport"){
 $_COOKIE["sport"] = "websport";

 }elseif($web =="forum"){
 $_COOKIE["sport"] ="";
 }
  $web_cookies = @protection($_COOKIE["sport"]);
  @setcookie("sport",$web_cookies);
 @include($table_folder["templates"]."header.html");
if($forum >0)
$cat_id_frm = @forum('cat',$forum);

 
switch($page){
 case "" :
 @include($table_folder["templates"]."forum.html");
 break;
 case "register" :
  if( $_SESSION["name_is"]!=""){
  @include($table_folder['templates']."error.html");
 }else{
 if($register==""){
  @include($table_folder["templates"]."register.html");
 }elseif($register=="yes"){
 @include($table_folder["templates"]."register.html");
 }elseif($register=="insert"){
  @include($table_folder["templates"]."register.html");
 }else @include($table_folder['templates']."error.html");
 }
 break;

 case "login":
 if( $_SESSION["name_is"]!=""){
  @include($table_folder['templates']."error.html");
 }else{
 if(empty($login)){
 @include($table_folder["templates"]."login.html");
 }elseif($login=="insert"){
  @include($table_folder["templates"]."login.html");
 }else @include($table_folder['templates']."error.html");
 }
 break;
 case "logout":
 if( $_SESSION["name_is"]!=""){
 if($page=="logout"){
   @include($table_folder["templates"]."logout.html");
 }else @include($table_folder['templates']."error.html");
 }else @include($table_folder['templates']."error.html");
 break;
 case "monitor" :
 if($mnt_link == "admin" and empty($mnt_function) and !empty($forum) and $forum !="0"){
 @include($table_folder["templates"]."mnt_is.html");
 }elseif($mnt_link == "admin" and $mnt_function == "medals"  and !empty($forum) and $forum !="0"){
  @include($table_folder["templates"]."mnt_is.html");
 }else @include($table_folder['templates']."error.html"); 
 break;
  case "visore":
 if(level()=="55" and $visore == "visore"){
 @include($table_folder["templates"]."visore_is.html");
 }else @include($table_folder['templates']."error.html");
break;
 case "forum":
 if($forum!="0" and empty($topic) and $pg>="0"){
 @include($table_folder["templates"]."forum_is.html");
 }elseif($forum!="0" and $topic=="new"){
 @include("{$table_folder["templates"]}editor.html");
 }elseif($forum!="0" and $topic=="addTopic"){
 if($true == false){
 @include($table_folder["templates"]."topicadd.html");
 }else{
 echo'
 <br />
<div class="error">
Œÿ√ :<img  src="<?echo $icons;?>hide.png"/>·« Ì„ﬂ‰ﬂ ≈œŒ«· «·‰’ √ﬂÀ— „‰ „—… .
</div>
<br />
 ';
 @redirect2("islam.html");
 }
 }else @include($table_folder['templates']."error.html");
 break;
 case "contactf":
 if($forum!="0" and empty($topic)){
 @include($table_folder["templates"]."_contact_f.html");
 }else @include($table_folder['templates']."error.html");
 break;
 case "topic":
 if( @intval($topic) != "0" and $pg>=0){
 @include($table_folder["templates"]."TopicHtmlis.html");
 }else @include($table_folder['templates']."error.html");
 break;
 case "editopic": 
  if( @intval($topic) != "0"){
 @include($table_folder["templates"]."TopicEdit.html");
 }else @include($table_folder['templates']."error.html");
 break;
 case "SetNtopic": 
  if( @intval($topic) != "0"){
       if($EdT == false){
 @include($table_folder["templates"]."setNew.html");
 }else{
 echo'<br /><div class="error">Œÿ√ :<img  src="<?echo $icons;?>hide.png"/>·« Ì„ﬂ‰ﬂ ≈œŒ«· «·‰’ √ﬂÀ— „‰ „—… .</div><br /> ';
 @redirect2("islam.html");
 }
 }else @include($table_folder['templates']."error.html");
 break;
 case "forumadmin":
 if($forum != "0" and empty($topic) ){
 @include($table_folder["templates"]."mnt_is.html");
 }elseif($forum != "0" and $topic == "monitored" and $pg>="0"){
 @include($table_folder["templates"]."mnt_is.html");
 }else @include($table_folder['templates']."error.html");
 break;
  case "pintopic" :
  case "unpintopic" :
  case "closetopic" :
  case "unclosetopic" :
  case "hidetopic" :
  case "starstopic":
  case "startopic":
  case "unhidetopic" :
  case "functopic":
  case "eftopic":
  case "opntop":
  case "deltopic":
  case "bactopic":
  case "pubtopic":
 if( @intval($topic) != "0"){
 @include($table_folder["templates"]."Topicpin.html");
 }else @include($table_folder['templates']."error.html");
 break;
 case "Newreplie":
 case "setReplie":
 case "hideReplie":
 case "unhideReplie":
 case "delReplie":
 case "bckReplie":
 case "editReplie":
 case "seteditReplie":
 if(@intval($topic) > 0 OR $replie > 0){
 @include($table_folder["templates"]."addreplie.html");
 }else @include($table_folder['templates']."error.html");
 break;
 case "member":
 if($Get_member >0){
 @include($table_folder["templates"]."member.html");
 }else @include($table_folder['templates']."error.html");
 break;
 case "infomem":
 case "setinfomem":
 if( level_is()>0 ){
  @include($table_folder["templates"]."Minfo.html");
  }else @include($table_folder['templates']."error.html");
 break;
 case "monitor":
	@include($table_folder['templates']."monitors.html");
 break;
 default: @include($table_folder['templates']."error.html"); break;
 }
 



?>