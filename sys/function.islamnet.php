<?
/*
 * PRINT FORUM V 0.1 
 * Powred By MR-O : Abdolahe Ibne Abdel hakime
 * Started At : 18/07/2011 , time -> 10:48
 */
 
 
######################################################
 $f0 = "<img src='".$table_folder["styles"].$table_folder["captcha"]."0.jpg' />";
 $f1 = "<img src='".$table_folder["styles"].$table_folder["captcha"]."1.jpg' />";
 $f2 = "<img src='".$table_folder["styles"].$table_folder["captcha"]."2.jpg' />";
 $f3 = "<img src='".$table_folder["styles"].$table_folder["captcha"]."3.jpg' />";
 $f4 = "<img src='".$table_folder["styles"].$table_folder["captcha"]."4.jpg' />";
 $f5 = "<img src='".$table_folder["styles"].$table_folder["captcha"]."5.jpg' />";
 $f6 = "<img src='".$table_folder["styles"].$table_folder["captcha"]."6.jpg' />";
 $f7 = "<img src='".$table_folder["styles"].$table_folder["captcha"]."7.jpg' />";
 $f8 = "<img src='".$table_folder["styles"].$table_folder["captcha"]."8.jpg' />";
 $f9 = "<img src='".$table_folder["styles"].$table_folder["captcha"]."9.jpg' />";
$var = array(0=>$f0,1=>$f1,2=>$f2,3=>$f3,4=>$f4,5=>$f5,6=>$f6,7=>$f7,8=>$f8,9=>$f9);
 
 $capt = $var[rand(0,9)].$var[rand(0,9)].$var[rand(0,9)].$var[rand(0,9)];

 $text_num = array($f0,$f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9);
$replace_num = array("0","1","2","3","4","5","6","7","8","9");
$captcha = str_ireplace($text_num,$replace_num,$capt);
######################################################
function protection($var){
$var = @mysql_real_escape_string($var);
$var = @htmlspecialchars($var);
return $var;
}

function protection_simple($var){
return protection($var);
} 

function redirect(){
echo '<META http-equiv="refresh" content="0; URL=islam.html" ></META>'; 
}
function redirect2($var){
echo '<META http-equiv="refresh" content="2; URL='.protection($var).'" ></META>'; 
}
################   ENCODING  #########################
function md6($var){
$v = array("0","1","2","3","4","5","6","7","8","9");
$vr = array("m31","45s","3z","0c","8t","7x","2q","h0","1e","g5");
$var = str_ireplace($v,$vr, $var);
$t =array('@','/','//','/*','*/',"'",'"','@_','%_','&','OR','<','>','--','--xx--');
$f = array('q5','z1s','c','d6e','x3',"q9x",'3c','01','858','e6','a9','x1','w6','e6','q8');
$var = str_ireplace($t,$f, $var);
$a =array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
$b = array("d5","e4","fr1e","re4","t5i","d1a","f2t4","p5f4","4g2p2","r5f7","0d1z4","f0r5","w8d1z","m2r4o","s25q","007x","z470","12c","9s","p0","j5s","s9","q4","r56","e1","a8");
$var = str_ireplace($a,$b,$var);
return $var;
}

################## EMAIL ::-> COPYED #############
function VerifierAdresseMail($adresse) { 
   $Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#'; 
   if(preg_match($Syntaxe,$adresse)) 
      return true; 
   else 
     return false; }
#################  FUNCTION member  ##################

function member($id,$row){
global $prefix_start,$prefix_end ;
$select = @mysql_query("SELECT $row FROM {$prefix_start}members{$prefix_end}  Where id='".intval($id)."' ");
$fetch = @mysql_fetch_array($select);
$new = protection($fetch[$row]);
return $new;
}
function member_on($rows){
global $_SESSION,$prefix_start,$prefix_end ;
$v = protection($_SESSION['name_is']);
$p = protection($_SESSION["pass_is"]);
if(!empty($_SESSION['name_is']) and !empty($_SESSION["pass_is"])){
$sel = @mysql_query("SELECT $rows FROM {$prefix_start}members{$prefix_end} WHERE user_name='".$v."' and password ='".$p."'");
$fet = @mysql_fetch_array($sel);
return @protection($fet[$rows]);
}else{
return 0;
}
}

function level_is(){
global $_SESSION;
if($_SESSION['name_is']){
return member_on("level");
}else{
return false;
}
}

function member_inf($i){
if(member($i,"level") == "55" ){
$var = "<a class='url_spr'  href='member$i.html'>". @member($i,"user_name")."</a>";
}elseif(member($i,"level") == "27"){
$var = "<a class='url_mspr'  href='member$i.html'>". @member($i,"user_name")."</a>";
}elseif(member($i,"level") == "14"){
$var = "<a class='url_mod'  href='member$i.html'>". @member($i,"user_name")."</a>";
}elseif(member($i,"level") == "1"){
$var = "<a class='url_mem'  href='member$i.html'>". @member($i,"user_name")."</a>";
}elseif(member($i,"level") == "96"){
$var = "<a class='url_adm'  href='member$i.html'>". @member($i,"user_name")."</a>";

}
#a.,a.,a.,a.,a.
echo $var;
}
########################### CAT ##########################
function cat_title($id){
global $prefix_start,$prefix_end ;
$selection= @mysql_query("select * from {$prefix_start}cat{$prefix_end} where id='".intval($id)."'");
$fetchion= @mysql_fetch_array($selection);
$title = @protection($fetchion["title"]);
return $title;
}
 

##############Function SUPERVISOR
function supervisor($id,$type,$v){
global $prefix_start,$prefix_end ;
if(!empty($v) and !empty($type)){
if($type=="cat"){
$sq = @mysql_query("select $v From {$prefix_start}supervisor{$prefix_end} where reli='".intval($id)."' ");
}elseif($type=="forum"){
$sq = @mysql_query("select $v From {$prefix_start}fsupervisor{$prefix_end} where reli='".intval($id)."' ");
}

$fetc = @mysql_fetch_array($sq);
return $fetc[$v];


}elseif(empty($v) and !empty($type)){
if($type=="cat"){
$sqli = @mysql_query("select * From {$prefix_start}supervisor{$prefix_end} where reli='".intval($id)."' ");
}elseif($type=="forum"){
$sqli = @mysql_query("select * From {$prefix_start}fsupervisor{$prefix_end} where reli='".intval($id)."' ");
}

if( @mysql_num_rows($sqli)>0){
while($fetchi = @mysql_fetch_array($sqli) ){
if($fetchi["status"] == "1"){
member_inf($fetchi["memberid"]);
}elseif(level_is()== "96" and $fetchi["status"] == "2" ){
member_inf($fetchi["memberid"]);
}elseif(level_is()== "96" and $fetchi["status"] == "3" ){
member_inf($fetchi["memberid"]);
}elseif(level_is()== "96" and $fetchi["status"] == "4" ){
member_inf($fetchi["memberid"]);
}
if(@mysql_num_rows($sqli)>1){
echo "+";
}

}
}

}

}
 
################# moderator ##################
function moderator($id,$row){
global $prefix_start,$prefix_end;
$select_from = @mysql_query("select $row from {$prefix_start}forum_moderate{$prefix_end} where forumid='$id'");
$fetch_frm = @mysql_fetch_array($select_from);
return protection($fetch_frm[$row]);

}

function forum_moderator($f){
if( member_on("id") == moderator($f,"memberid") and moderator($f,"status") == "1" ){
return true ;
}else{
return false ;
}


}

########Topic ~#################"
function stars($id){
global $icons;
$img = "<img src='".$icons."toff.png' />";
$ingon = "<img src='".$icons."ton.png' />";
$var = member($id,"topic") + member($id,"post");
if($var == 0){$i = 0;}elseif($var >= 35){$i = 1;if($var >= 250){$i = 2;if($var >= 550){$i = 3;if($var >= 1130){$i = 4;if($var >= 1532){$i = 5;if($var >= 2100){$i = 6;if($var >= 3050){$i = 7;if($var >= 4505){$i = 8;if($var >= 6550){$i = 9;if($var >= 10500){$i = 10;}}}}}}}}}}
if($i == 0){
echo $img.$img.$img.$img.$img."<br />".$img.$img.$img.$img.$img."<br />";
}elseif($i == 1){
echo $ingon.$img.$img.$img.$img."<br />".$img.$img.$img.$img.$img."<br />";
}elseif($i == 2){
echo $ingon.$ingon.$img.$img.$img."<br />".$img.$img.$img.$img.$img."<br />";
}elseif($i == 3){
echo $ingon.$ingon.$ingon.$img.$img."<br />".$img.$img.$img.$img.$img."<br />";
}elseif($i == 4){
echo $ingon.$ingon.$ingon.$ingon.$img."<br />".$img.$img.$img.$img.$img."<br />";
}elseif($i == 5){
echo $ingon.$ingon.$ingon.$ingon.$ingon."<br />".$img.$img.$img.$img.$img."<br />";
}elseif($i == 6){
echo $ingon.$ingon.$ingon.$ingon.$ingon."<br />".$ingon.$img.$img.$img.$img."<br />";
}elseif($i == 7){
echo $ingon.$ingon.$ingon.$ingon.$ingon."<br />".$ingon.$ingon.$img.$img.$img."<br />";
}elseif($i == 8){
echo $ingon.$ingon.$ingon.$ingon.$ingon."<br />".$ingon.$ingon.$ingon.$img.$img."<br />";
}elseif($i == 9){
echo $ingon.$ingon.$ingon.$ingon.$ingon."<br />".$ingon.$ingon.$ingon.$ingon.$img."<br />";
}elseif($i == 10){
echo $ingon.$ingon.$ingon.$ingon.$ingon."<br />".$ingon.$ingon.$ingon.$ingon.$ingon."<br />";
}
}
##
function replaceText($var){
$text = array("newTopic",'href="#"',"javascript",'class="editor"',"ok:)","no:)","hh","haha",":)","@:","^)","$","£","euro",'yen',' ≈‰‘«¡ «··Â ',' «·”·«„ ⁄·Ìﬂ ','(L)','(G)','(O)','(S)','salam:)','bye:)',"onblur","onchange","onclick","ondblclick","onfocus","onkeydown","onkeypress","onkeyup","onload","onmousedown","onmousemove","onmouseout","onmouseover","onreset","onsubmit","onunload",'<?','?>','<?php');
$replace = array("islam","~|href->#|~","-java-s-cript-","-xx-","<img src='edicons/smille/ok.gif' />","<img src='edicons/smille/no.gif' />","<img src='edicons/smille/hh.gif' />","<img src='edicons/smille/haha.gif' />","<img src='edicons/smille/happy).gif' />","<img src='edicons/smille/@).gif' />","<img src='edicons/smille/^).gif' />","<img src='edicons/smille/$.gif' />","<img src='edicons/smille/£.gif' />","<img src='edicons/smille/euro.gif' />",'<img src="edicons/smille/yen.gif" />',' ≈‰ ‘«¡ «··Â ',' «·”·«„ ⁄·Ìﬂ„ ','<img src="edicons/smille/(L).gif" />','<img src="edicons/smille/(G).gif" />','<img src="edicons/smille/(O).gif" />','<img src="edicons/smille/(S).gif" />','<img src="edicons/smille/salam).gif" />','<img src="edicons/smille/bye).gif" />',"-xx--","-xx--","-xx--","-xx--","-xx--","-xx--","-xx--","-xx--","-xx--","-xx--","-xx--","-xx--","-xx--","-xx--","-xx--","-xx--",'php :','/php .','php :');
$v = str_ireplace($text,$replace,$var);
return $v;
}
/*
$replace_text = replaceText($text);
$finale_text = str_replace("<IMG","<img",$replace_text);
$text  = stripslashes($_POST["texttopic"]);
*/
function Topic($rows,$id,$forumid){
global $prefix_start,$prefix_end;
if($forumid == ""){ 
$slt = @mysql_query("select ".protection($rows)." from {$prefix_start}topic{$prefix_end} where id='".intval($id)."'");
}else{
$slt = @mysql_query("select ".protection($rows)." from {$prefix_start}topic{$prefix_end} where id='".intval($id)."' and reli ='".intval($forumid)."'");
}
$ftc = @mysql_fetch_array($slt) ;
return protection($ftc[$rows]);
}

function lastPost($forumid,$type){
global $prefix_start,$prefix_end,$date,$gmtime;
if(empty($type)){
$select = @mysql_query("select * from {$prefix_start}lastpost{$prefix_end} where reli ='".intval($forumid)."' ");
}elseif($type=="topic"){
$select = @mysql_query("select * from {$prefix_start}lastpost_t{$prefix_end} where reli ='".intval($forumid)."' ");
}
if( @mysql_num_rows($select)>0){
$fetch = @mysql_fetch_array($select);
$dat = protection($fetch['date']);
$tim = protection($fetch['time']);
$time_echo = explode(':',$tim );
$memid = $fetch['memberid'];
$dat2 = $dat + 1 ;
echo "<center>".member_inf($memid)."<font color='red' ><b>";
if($date == $dat){
echo"«·ÌÊ„";
}elseif( $date == $dat2 ){
echo "ÌÊ„ √„”";
}else{
echo $dat;
}
echo"<br />".$time_echo['0'].':'.$time_echo['1'];
if(level_is()>="14"){
echo ":".$time_echo['2'];
}
echo"</b></font><br /></center>";
}else{
echo "&nbsp;";
}
}
#############FORUM ##########"
function forum($rows,$id){
global $prefix_start,$prefix_end;
$slt_Frm = @mysql_query("select $rows from {$prefix_start}forum{$prefix_end} where id ='".intval($id)."' ");
$ftc_Frm = @mysql_fetch_array($slt_Frm);
return @protection($ftc_Frm[$rows]);
}
function starforum($startuts){
 for($i=1 ; $i<=$startuts;   $i++){
echo '<img title=" ﬁÌÌ„ «·„Ê÷Ê⁄ Ê «·√Â„Ì…" src="styles_f/images/icons/ton.png" />';
continue;
 }
if($startuts == "5"){
echo "";
}elseif($startuts == "4"){
 for($u =1; $u<2 ; $u++){
echo '<img title=" ﬁÌÌ„ «·„Ê÷Ê⁄ Ê «·√Â„Ì…" src="styles_f/images/icons/toff.png" />';
continue;
}
}elseif($startuts == "3"){
 for($u =1; $u<3 ; $u++){
echo '<img title=" ﬁÌÌ„ «·„Ê÷Ê⁄ Ê «·√Â„Ì…" src="styles_f/images/icons/toff.png" />';
continue;
}
}elseif($startuts == "2"){
 for($u =1; $u<4 ; $u++){
echo '<img title=" ﬁÌÌ„ «·„Ê÷Ê⁄ Ê «·√Â„Ì…" src="styles_f/images/icons/toff.png" />';
continue;
}
}elseif($startuts == "1"){
 for($u =1; $u<5 ; $u++){
echo '<img title=" ﬁÌÌ„ «·„Ê÷Ê⁄ Ê «·√Â„Ì…" src="styles_f/images/icons/toff.png" />';
continue;
}
}else{
for($u =1; $u<6 ; $u++){
echo '<img title=" ﬁÌÌ„ «·„Ê÷Ê⁄ Ê «·√Â„Ì…" src="styles_f/images/icons/toff.png" />';
continue;
}
 }
}
################## Function css & Topicschow #############"
function css($id = "",$type){
global $forum;
$hidestatus = Topic("hidestatus",$id,$forum);
$lockstatus = Topic("lockstatus",$id,$forum);
$pinstatus  = Topic("pinstatus",$id,$forum);
$status = Topic("status",$id,$forum);
if($type=="topic"){
if($status == "2"){
echo 'class="infosdel" ';
}elseif($hidestatus == "1"){
echo 'class="infoshide" ';
 }elseif($pinstatus == "1"){
 echo 'class="infospin" ';
 }else{
echo 'class="infosf"';
 }
}

}
###################################Function about change in moderator administrations *
function update($message,$table,$set,$value,$id){
global $prefix_start,$prefix_end;
  @mysql_query("UPDATE {$prefix_start}$table{$prefix_end} SET $set='$value' where id='".intval($id)."' ");
  if(!empty($message)){
  echo "$message<br /><br />
  <a class='urlforum' href='javascript:history.go(-1);'>«·⁄Êœ… ··’›Õ…</a><br/>
  <a class='urlforum' href='islam.html'>«·≈‰ ﬁ«· ··’›Õ… «·—∆Ì”Ì…</a>
  <br/>
  <br/>
  ";
  }
  }
 
########################### Function To FIND CATID #######################
function findcat($id,$type){
$top_sele = @Topic("reli",$id,"");
if($type=="cat"){
$forcat = @forum("cat",$top_sele);
}elseif($type=="forum"){
$forcat = $top_sele;
}
return intval($forcat);
}
########## Function page #############
function pg($ig,$type){
global $prefix_start,$prefix_end,$forum;
$cat_id_frm = forum('cat',$forum);
if(level_is() <= "1" OR level_is() == "55" and member_on("id") != supervisor($cat_id_frm,"cat","memberid") OR level_is() == "14" AND forum_moderator($forum) == false OR level_is() == "55" and member_on("id") != supervisor($forum,"forum","memberid")){
$slt_pg = @mysql_query("select * from {$prefix_start}topic{$prefix_end} where reli ='".intval($ig)."' and hidestatus = '0' and status = '1'");
}else{
$slt_pg = @mysql_query("select * from {$prefix_start}topic{$prefix_end} where reli ='".intval($ig)."'");
}
$num_pg = @mysql_num_rows($slt_pg) ;
if($type==""){
if($num_pg>20){
$s_pg = ($num_pg / 20 );
for($i_pg = 0; $i_pg<$s_pg ;$i_pg++){
echo "<a class='page' href='forum".$ig."pg".$i_pg.".html'>".$i_pg."</a>&nbsp;";}
}}else{
if($num_pg>10){
$s_pg = ($num_pg / 10 );
for($i_pg = 0; $i_pg<$s_pg ;$i_pg++){
echo "<a class='page' href='".$type.$ig."pg".$i_pg.".html'>".$i_pg."</a>&nbsp;";}}}
}
//SECOND PAGE FUNCTIOn 
function pg_adm($table,$numpg,$tx,$where = ""){
global $prefix_start,$prefix_end;
if($table == "viseadmin"){
$slt_pg = @mysql_query("select * from {$prefix_start}viseadmin{$prefix_end} ");
}else{
if($table =="members"){
$slt_pg = @mysql_query("select * from {$prefix_start}members{$prefix_end} where level>= '14' ");
}else{
$slt_pg = @mysql_query("select * from {$prefix_start}$table{$prefix_end} ".$where);
}
}
$num_pg = @mysql_num_rows($slt_pg) ;
if($num_pg>$numpg){
$s_pg = ($num_pg / $numpg );
for($i_pg = 0; $i_pg<$s_pg ;$i_pg++){
echo "<a class='page' href='".$tx."&pg=".$i_pg."'>".$i_pg."</a>&nbsp;";
}
}else{
return false;
}
}
// TRUE FUNCTION 
function ThePage($table,$row,$val,$pagn,$href){
global $prefix_start,$prefix_end;
$selection = @mysql_query("select * from {$prefix_start}$table{$prefix_end} where $row = '$val' ");
$rows_sql = @mysql_num_rows($selection);
if($rows_sql>$pagn){
$s = ($rows_sql / $pagn );
for($i = 0; $i<$s ;$i++){
echo "<a class='page' href='".$href.$i.".html'>".$i."</a>&nbsp;"; 
}
}else{
echo "<a class='page' href='".$href."0.html'>0</a>&nbsp;";
}


}
####################### Functions ADM :(PROGRAME OF VIRIF) »—‰«„Ã «·„—«ﬁ»… ##############
function visad($tpv,$mid,$fid,$cid,$tim,$dt,$txt,$ip){
global $prefix_start,$prefix_end;
$tpv= @protection($tpv);
$mid= @intval($mid);
$fid= @intval($fid);
$cid= @intval($cid);
$tim= @protection($tim);
$dt = @protection($dt);
$txt= @protection($txt);
$ip=  @protection($ip);
/*
      @mysql_query("
 CREATE TABLE {$prefix_start}viseadmin{$prefix_end}(
 id int not null auto_increment PRIMARY KEY,
 typev varchar(255) not null,
 memberid int not null,
 forumid int not null,
 catid int not null,
 time text not null,
 date text not null,
 txt  text not null,
 ip varchar(255) not null
 )
 ");
*/
@mysql_query("INSERT INTO {$prefix_start}viseadmin{$prefix_end} values('','$tpv','$mid','$fid','$cid','$tim','$dt','$txt','$ip')");

}
function insert_visad($txt){
Global $topic,$time,$date,$_SERVER;
@visad("moderator",member_on("id"),findcat($topic,"forum"),findcat($topic,"cat"),$time,$date,"$txt:$topic",$_SERVER["REMOTE_ADDR"]);
}

################### FUnction MESSAGE FORUM »—Ìœ «·„‰ œÏ ##########" not yet 

Function msg($msg,$href){
  if(!empty($msg)){
  echo "$message<br /><br />
  <a class='urlforum' href='javascript:history.go(-1);'>«·⁄Êœ… ··’›Õ…</a><br/>
  <a class='urlforum' href='islam.html'>«·≈‰ ﬁ«· ··’›Õ… «·—∆Ì”Ì…</a>
  <br/>
  <br/>
  ";
  }else return "";
    @redirect2($href);
}
######################### function Editor HTML & PHP  ###################
function editor($var){
$text_Tp = @htmlspecialchars($var);
$text_Tp  = @stripslashes($var);
$replace_text = @replaceText($text_Tp);
$finale_text = @str_replace("<IMG","<img",$replace_text);
return($finale_text);
}
function replie($row,$id){
global $prefix_start,$prefix_end;
$query = @mysql_query("select $row from {$prefix_start}replie{$prefix_end} where id='$id' limit 1 ");
if(mysql_num_rows($query)>0){
$fetch = @mysql_fetch_array($query);
return @protection($fetch[$row]);
}else return "";

}
 function titles($t){
 if(!$t) echo("");else{$titles_member = explode(', ', $t);
		for($i =0; $i < count($titles_member); $i++ ){
			echo "'".$titles_member[$i]."'"; if(count($titles_member)>1 and ($i+1) != count($titles_member)) echo ', ';
		}
	}	
 }
 
?>
