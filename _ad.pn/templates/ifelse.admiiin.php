<?
switch($admini){
case "": 
echo "<FONT COLOR='red'>Â Â ’›Õ… Œ«’… »‰‘«ÿ «·„‘—›Ì‰ Ê «·„—«ﬁ»Ì‰ .</FONT>";
break;
case "cat": 
if($cat=="controle" && $pg>=0){
@include("cat_forum.admiiin.php");
}elseif($cat=="add"){
@include("cat_forum.admiiin.php");
}elseif($cat=="new"){
@include("cat_forum.admiiin.php");
}elseif($cat=="forum" and $cat_num !="0" and $forum=="add"){
@include("cat_forum.admiiin.php");
}elseif($cat=="forum" and $cat_num !="0" and $forum=="new"){
@include("cat_forum.admiiin.php");
}elseif($cat_num !="0" and $cat=="suprime"  ){
@include("cat_forum.admiiin.php");
}elseif($cat=="corbeille"){
@include("cat_forum.admiiin.php");
}elseif($cat=="delecteds" and $cat_num!="0"){
@include("cat_forum.admiiin.php");
}elseif($cat=="revi" and $cat_num!="0"){
@include("cat_forum.admiiin.php");
}elseif($cat_num!="0" and $cat=="hide"){
@include("cat_forum.admiiin.php");
}elseif($cat_num!="0" and $cat=="edit"){
@include("cat_forum.admiiin.php");
}elseif($cat_num!="0" and $cat=="setedit"){
@include("cat_forum.admiiin.php");
}elseif($cat_num!="0" and $cat=="hideit"){
@include("cat_forum.admiiin.php");
}elseif($cat_num!="0" and $cat=="newsprmem"){
@include("cat_forum.admiiin.php");
}elseif($cat_num!="0" and $cat=="setsprmem" and $fun=="" ){
@include("cat_forum.admiiin.php");
}elseif($cat_num!="0" and $cat=="sprmem" and $fun==""  ){
@include("cat_forum.admiiin.php");
}elseif($cat_num!="0" and $cat=="sprmem" and $fun=="delet" and $sprmem!="0"){
@include("cat_forum.admiiin.php");
}elseif($cat_num!="0" and $cat=="sprmem" and $fun=="hide" and $sprmem!="0"){
@include("cat_forum.admiiin.php");
}elseif($cat_num!="0" and $cat=="sprmem" and $fun=="unhide" and $sprmem!="0"){
@include("cat_forum.admiiin.php");
}else{
echo '<META http-equiv="refresh" content="0; URL=../islam.php" ></META>'; 
}

break;
case "forum" :
if($forum=="controle" && $pg>=0){
@include("forum_forum.admiiin.php");
}elseif($forum=="corbeille"){
@include("forum_forum.admiiin.php");
}elseif($forum=="revi" and $frm_num!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum=="newsprmem" and $frm_num!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum=="setnewvisor" and $frm_num!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum=="hide" and $frm_num!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum=="sethide" and $frm_num!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum=="addmoderate" and $frm_num!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum=="setmoderate" and $frm_num!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum=="cntmod" and $frm_num!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum=="delmode" and $frm_num!="0" and $moderator!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum=="hidmode" and $frm_num!="0" and $moderator!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum=="blockmode" and $frm_num!="0" and $moderator!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum=="unhidemode" and $frm_num!="0" and $moderator!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum=="unlockmode" and $frm_num!="0" and $moderator!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum=="blhimode" and $frm_num!="0" and $moderator!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum=="unblhimode" and $frm_num!="0" and $moderator!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum=="delforum" and $frm_num!="0" ){
@include("forum_forum.admiiin.php");
}elseif($forum=="edit" and  $frm_num !="0"){
@include("forum_forum.admiiin.php");
}elseif($forum="setedit" and $frm_num!="0"){
@include("forum_forum.admiiin.php");
}elseif($forum="superv" and $frm_num!="0" and empty($fun) and $sprmem!="0" ){
@include("forum_forum.admiiin.php");
}elseif($forum="superv" and $frm_num!="0" and $fun=="delet" and  $sprmem!="0" ){
@include("forum_forum.admiiin.php");
}elseif($forum="superv" and $frm_num!="0" and $fun=="hide" and  $sprmem!="0" ){
@include("forum_forum.admiiin.php");
}elseif($forum="superv" and $frm_num!="0" and $fun=="unhide" and  $sprmem!="0" ){
@include("forum_forum.admiiin.php");
}elseif($forum="superv" and $frm_num!="0" and $fun=="block" and  $sprmem!="0" ){
@include("forum_forum.admiiin.php");
}elseif($forum="superv" and $frm_num!="0" and $fun=="unblock" and  $sprmem!="0" ){
@include("forum_forum.admiiin.php");
}elseif($forum="superv" and $frm_num!="0" and $fun=="hideblock" and  $sprmem!="0" ){
@include("forum_forum.admiiin.php");
}elseif($forum="superv" and $frm_num!="0" and $fun=="unhideblock" and  $sprmem!="0" ){
@include("forum_forum.admiiin.php");
}else{
echo '<META http-equiv="refresh" content="0; URL=../islam.html" ></META>'; 
}
break;
case "visorf":
if($visorf=="" and $pg>=0){
@include("visor_forum.admiiin.php");
}else{
echo '<META http-equiv="refresh" content="0; URL=../islam.html" ></META>'; 
}
break;
case "pub":
if($pg>=0 and $pub == "" and $topic == 0){
@include("pub.admiiin.php");
}elseif($pg==0 and $pub == "accept" and $topic > 0){
@include("pub.admiiin.php");
}elseif($pg==0 and $pub == "refuse" and $topic > 0){
@include("pub.admiiin.php");
}elseif($pg==0 and $pub == "add" and $topic > 0){
@include("pub.admiiin.php");
}else{
echo '<META http-equiv="refresh" content="0; URL=../islam.html" ></META>'; 
}
break;
default :
echo '<META http-equiv="refresh" content="0; URL=../islam.html" ></META>'; 
}


?>