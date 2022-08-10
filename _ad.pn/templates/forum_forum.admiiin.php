<br/>
<?PHP
#########PAGE ############
if($pg==0 or empty($pg)){
$limit="LIMIT 0,5";
}else{
$x = ($pg * 5);
$limit="LIMIT $x,$x";
}
########## END #############
if($forum=="controle" && $pg>=0){
?>
<table width="65%" cellpadding="2" cellspacing="2"><tr >
<td class="register" width="152px" height="28px"><center>ÎÕÇÆÕ ÚÇãÉ</td>
<td class="regis" ><center>  
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=forum&forum=corbeille"><img title="ãäÊÏíÇÊ ãÍĞæİÉ" src="../<?echo $icons;?>dele.png"/></a>

</td>
</tr>
</table><br /><br />
<?
$selection_forum = @mysql_query("select * from {$prefix_start}forum{$prefix_end} ORDER BY id ASC $limit") ;
if(@mysql_num_rows($selection_forum) == 0){
echo "áÇ ÊæÌÏ ãäÊÏíÇÊ ÍÇáíÇ";
}else{
while($fetch = @mysql_fetch_array($selection_forum)){
?>
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
ÊÍßã İí ÇáãäÊÏíÇÊ
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÇáãäÊÏì</td>
<td class="regis" ><center><? echo protection($fetch['title']);?> &nbsp;&nbsp; || ÑŞã : <? echo intval($fetch['id']); ?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÇáİÆÉ ÇáãÑÈæØ ÈåÇ</td>
<td class="regis" ><center><? echo cat_title($fetch["cat"]);?> &nbsp;&nbsp; || ÑŞã : <? echo intval($fetch["cat"]); ?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ãÑÇŞÈ ÇáãäÊÏì</td>
<td class="regis" ><center>
<?

if(supervisor($fetch["id"],"forum","memberid")){
supervisor($fetch["id"],"forum","");
}else{
echo "ÔÇÛÑ";
}



?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÇáãäÊÏì íÙåÑ Åáì</td>
<td class="regis" ><center>
<?
if(intval($fetch['groupe']) == "0"){
echo "ááßá";
}elseif(intval($fetch['groupe']) == "14"){
echo "ÇáãÔÑİæä";
}elseif(intval($fetch['groupe']) == "27"){
echo "áãÓÄæáí ÇáİÆÉ";
}elseif(intval($fetch['groupe']) == "55"){
echo "ááãÑÇŞÈíä";
}elseif(intval($fetch['groupe']) == "96"){
echo "ááãÏÑÇÁ";
}

?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÎÕÇÆÕ</td>
<td class="regis" ><center>
<a href="admiiin.index.php?admini=cat&cat=add"><img title="ÅÖÇİÉ ãæÖæÚ ÌÏíÏ" src="../<?echo $icons;?>folder.png"/></a>
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=forum&forum=addmoderate&idf=<? echo intval($fetch['id']); ?>"><img title="ÅÖÇİÉ ãÔÑİ ÌÏíÏ ááãäÊÏì" src="../<?echo $icons;?>Add.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=forum&forum=delforum&idf=<? echo intval($fetch['id']); ?>"><img title="ÍĞİ ÇáãäÊÏì" src="../<?echo $icons;?>delet.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=forum&forum=hide&idf=<? echo intval($fetch['id']); ?>"><img title="ÅÎİÇÁ ÇáãäÊÏì" src="../<?echo $icons;?>hide.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=forum&forum=edit&idf=<? echo intval($fetch['id']); ?>"><img title="ÊÚÏíá ÇáãäÊÏì" src="../<?echo $icons;?>edit.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=forum&forum=cntmod&idf=<? echo intval($fetch['id']); ?>"><img title="ÊÍßã İí ÇáãÔÑİæä" src="../<?echo $icons;?>moderator.png"/></a> 
&nbsp;&nbsp;
<?if(supervisor($fetch["id"],"forum","memberid")>0){?>
<a href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo intval($fetch['id']); ?>&sprmem=<? echo supervisor($fetch["id"],"forum","memberid"); ?>"><img title="ÊÍßã İí ãÑÇŞÈ ÇáãäÊÏì" src="../<?echo $icons;?>super.png"/></a> 
<?}else{
?>
<a href="admiiin.index.php?admini=forum&forum=newsprmem&idf=<? echo intval($fetch['id']); ?>"><img title="ÅÖÇİÉ ãÑÇŞÈ ÌÏíÏ" src="../<?echo $icons;?>superadd.png"/></a> 

<?
}?>

</td>
</tr>

</table><br />

<?
}
}
@pg_adm("forum",5,0,"admiiin.index.php?admini=forum&forum=controle");
@mysql_free_result($selection_forum);
}elseif($forum=="corbeille"){
$selection = @mysql_query("select * from {$prefix_start}forum_deleted{$prefix_end} ") ;
if(@mysql_num_rows($selection) == 0){
echo "áÇ ÊæÌÏ ãäÊÏíÇÊ ÍÇáíÇ";
}else{
while($fetch0 = @mysql_fetch_array($selection)){
?>

<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
ÊÍßã İí ÇáãäÊÏíÇÊ
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÇáãäÊÏì</td>
<td class="regis" ><center><? echo protection($fetch0['title']);?> &nbsp;&nbsp; || ÑŞã : <? echo intval($fetch0['id']); ?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÇáİÆÉ ÇáãÑÈæØ ÈåÇ</td>
<td class="regis" ><center><? echo cat_title($fetch0["cat"]);?> &nbsp;&nbsp; || ÑŞã : <? echo intval($fetch0["cat"]); ?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ãÑÇŞÈ ÇáãäÊÏì</td>
<td class="regis" ><center>
<?
supervisor($fetch0["id"],"forum","");
?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÎÕÇÆÕ</td>
<td class="regis" ><center>
<a href="admiiin.index.php?admini=forum&forum=revi&idf=<? echo intval($fetch0['id']); ?>"><img title="ÅÚÇÏÉ ÇáãäÊÏì æ äÒÚå ãä ÇáãÍĞæİÇÊ" src="../<?echo $icons;?>ret.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=forum&forum=delecteds&idf=<? echo intval($fetch0['id']); ?>"><img title="ÍĞİ äåÇÆí" src="../<?echo $icons;?>false.png"/></a> 
&nbsp;&nbsp;
</td>
</tr>

</table><br />

<?
}
}
mysql_free_result($selection_forum);
}elseif($forum=="newsprmem" and $frm_num!="0"){
?>
<form method="post" action="admiiin.index.php?admini=forum&forum=setnewvisor&idf=<? echo $frm_num;?>" >
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
ÅÖÇİÉ ãÑÇŞÈ ÌÏíÏ ááãäÊÏì ÑŞã : <? echo $frm_num;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÑŞã ãÑÇŞÈ ÇáãäÊÏì</td>
<td class="regis" ><center>
<input name="memberid" size="30"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÍÇáÉ ÇáãÑÇŞÈ</td>
<td class="regis" ><center>
<select name="status">
<option value="1">ÚÇÏí</option>
<option value="2">ãÎİí</option>
</select>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="ÅÑÓÇá"/> &nbsp;&nbsp; <input class="buton" type="reset" value="ÊİÑíÛ"/>
</td>
</tr>
</table>
</form>
<?
}elseif($forum=="setnewvisor" and $frm_num!="0"){
$memberid=intval($_POST["memberid"]);
$status=intval($_POST["status"]);
if(member($memberid,"level") == "96" ){
echo "<div class='eroor'>áŞÏ ÃÏÎáÊ ÑŞã ÚÖæ ÑÊÈÊå ãÏíÑ ¡ áÇíãßä ÇÖÇİÊå ãÑÇŞÈ </div>";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}else{
if(empty($memberid) or empty($status)){
echo "<div class='eroor'>ÅÍÏì ÇáÎÇäÇÊ İÇÑÛÉ æ åĞÇ íãäÚ ãä ãæÇÕáÉ ÇáÚãáíÉ ÈäÌÇÍ</div>";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}else{
 @mysql_query("INSERT INTO {$prefix_start}fsupervisor{$prefix_end} VALUES('','$frm_num','$memberid','0','$status')");
  @mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET level = '55' where id='$memberid'");
echo "<div class='yes'>Êã ÅÖÇİÉ ÇáãÑÇŞÈ ÈäÌÇÍ</div>";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}
}

}elseif($forum=="revi" and $frm_num!="0"){
@mysql_query("INSERT INTO {$prefix_start}forum{$prefix_end} select * from {$prefix_start}forum_deleted{$prefix_end} where id='$frm_num'");
@mysql_query("DELETE FROM {$prefix_start}forum_deleted{$prefix_end} where id='$frm_num'");
echo "Êã ÇÍíÇÁ ÇáãäÊÏì ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum=="delecteds" and $frm_num!="0"){
@mysql_query("DELETE FROM {$prefix_start}forum_deleted{$prefix_end} where id='$frm_num'");
@mysql_query("DELETE FROM {$prefix_start}forum_moderate{$prefix_end} where forumid='$frm_num'");
if(supervisor($frm_num,"forum","id")>0){
@mysql_query("DELETE FROM {$prefix_start}fsupervisor{$prefix_end} where reli='$frm_num'");
}
echo "Êã ÍĞİ ÇáãäÊÏì äåÇÆíÇ ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=corbeille");
}elseif($forum=="addmoderate" and $frm_num!="0"){
?>
<form method="post" action="admiiin.index.php?admini=forum&forum=setmoderate&idf=<? echo $frm_num;?>">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
ÅÖÇİÉ ãÔÑİ ÌÏíÏ áãäÊÏì ÑŞã <? echo $frm_num;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÑŞã ÇáãÔÑİ</td>
<td class="regis" ><center>
<input name="id_mem" />
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÍÇáÉ ÇáãÔÑİ</td>
<td class="regis" ><center>
<select name="status_mod">
<option value="1">ÚÇÏí</option>
<option value="2">ãÎİí</option>
</select>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="ÅÑÓÇá"/> &nbsp;&nbsp; <input class="buton" type="reset" value="ÊİÑíÛ"/>
</td>
</tr>
</table></form>
<?
}elseif($forum=="setmoderate" and $frm_num!="0"){
$id_mem = intval($_POST["id_mem"]);
$status_mod = intval($_POST["status_mod"]);
if(empty($id_mem)){
echo "íÌÈ Úáíß ÇÏÎÇá ÑŞã ÇáãÔÑİ Çä ÃÑÏÊ ÇÖÇİÊå ááãäÊÏì";
redirect2("admiiin.index.php?admini=forum&forum=addmoderate&idf=$frm_num");
}else{
if(member($id_mem,"level") =="1" or member($id_mem,"level") =="14"){
 @mysql_query("INSERT INTO {$prefix_start}forum_moderate{$prefix_end} VALUES(NULL,'$frm_num','$id_mem','0','$status_mod')");
 @mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET level = '14' where id='$id_mem'");
 echo"Êã ÇÖÇİÉ ÇáãÔÑİ ÈäÌÇÍ";
 }elseif(member($id_mem,"level") =="27" or member($id_mem,"level") =="55" or member($id_mem,"level") =="96"){
 echo "áÇ íãßäß ÇÖÇİÉ åĞÇ ÇáÚÖæ ãÔÑİ áÃä ÑÊÈÊå ÊİæŞ ÚÖæ Ãæ ãÔÑİ <br />
 ";
 }
redirect2("admiiin.index.php?admini=forum&forum=controle");
 }

}elseif($forum=="cntmod" and $frm_num!="0"){
$select_from = @mysql_query("select * from {$prefix_start}forum_moderate{$prefix_end} where forumid='$frm_num'");
if( @mysql_num_rows($select_from)>0){
?>
<br />
<table width="70%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
ÊÍßã İí ãÔÑİí ãäÊÏì ÑŞã :<? echo $frm_num;?>
</td>
</tr>
<? while($from_fetch = @mysql_fetch_array($select_from) ){?>
<tr >
<td class="regis" ><center>
<? member_inf($from_fetch["memberid"]); ?>
</td>
<td class="regis" ><center>
<a  href="admiiin.index.php?admini=forum&forum=delmode&idf=<? echo $frm_num;?>&moderator=<? echo intval($from_fetch["memberid"]);?>"><img title="ÍĞİÇ ÇáãÔÑİ" src="../<?echo $icons;?>dele.png"/></a>
&nbsp;
<?
if(moderator($frm_num,"status") == "2"){
?>
&nbsp;
<a  href="admiiin.index.php?admini=forum&forum=unhidemode&idf=<? echo $frm_num;?>&moderator=<? echo intval($from_fetch["memberid"]);?>"><img title="ÅÙåÇÑ ÇáãÔÑİ" src="../<?echo $icons;?>unhide.png"/></a>
&nbsp;
<?
}else{
?>
&nbsp;
<a href="admiiin.index.php?admini=forum&forum=hidmode&idf=<? echo $frm_num;?>&moderator=<? echo intval($from_fetch["memberid"]);?>"><img title="ÅÎİÇÁ ÇáãÔÑİ" src="../<?echo $icons;?>hide.png"/></a> 
&nbsp;
<?
}
if(moderator($frm_num,"status") == "3"){
?>
&nbsp;
<a  href="admiiin.index.php?admini=forum&forum=unlockmode&idf=<? echo $frm_num;?>&moderator=<? echo intval($from_fetch["memberid"]);?>"><img title="ÇÒÇáÉ ÇáÊÌãíÏ" src="../<?echo $icons;?>true.png"/></a>
&nbsp;
<?
}else{
?>&nbsp;
<a href="admiiin.index.php?admini=forum&forum=blockmode&idf=<? echo $frm_num;?>&moderator=<? echo intval($from_fetch["memberid"]);?>"><img title="ÊÌãíÏ ÇáãÔÑİ" src="../<?echo $icons;?>Denied.png"/></a> 
&nbsp;
<?}?>
<?
if(moderator($frm_num,"status") == "4"){
?>
<a href="admiiin.index.php?admini=forum&forum=unblhimode&idf=<? echo $frm_num;?>&moderator=<? echo intval($from_fetch["memberid"]);?>"><img title="ÅÎİÇÁ æ ÊÌãíÏ ÇáãÔÑİ" src="../<?echo $icons;?>unhibl.png"/></a> 
<?
}else{
?><a href="admiiin.index.php?admini=forum&forum=blhimode&idf=<? echo $frm_num;?>&moderator=<? echo intval($from_fetch["memberid"]);?>"><img title="ÅÎİÇÁ æ ÊÌãíÏ ÇáãÔÑİ" src="../<?echo $icons;?>hibl.png"/></a> 
<?}
?></td>
</tr><?
}
?>
</table>
<?
}else{
echo "áÇ íæÌÏ ãÔÑİæä ÍÇáíÇ ";
}
mysql_free_result($select_from);
}elseif($forum=="delmode" and $frm_num!="0" and $moderator!="0"){
@mysql_query("DELETE FROM {$prefix_start}forum_moderate{$prefix_end} where forumid='$frm_num' and memberid='$moderator' ");
@mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET level='1' where id='$moderator'");
 echo "Êã ÍĞİ ÇáãÔÑİ ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=cntmod&idf=$frm_num");
}elseif($forum=="hidmode" and $frm_num!="0" and $moderator!="0"){
@mysql_query("UPDATE {$prefix_start}forum_moderate{$prefix_end} SET status='2' where forumid='$frm_num' and memberid='$moderator'"); echo "Êã ÇÎİÇÁ ÇáãÔÑİ ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=cntmod&idf=$frm_num");
}elseif($forum=="blockmode" and $frm_num!="0" and $moderator!="0"){
@mysql_query("UPDATE {$prefix_start}forum_moderate{$prefix_end} SET status='3' where forumid='$frm_num' and memberid='$moderator'");
@mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET status='3' where id='$moderator' ");
 echo "Êã ÊÌãíÏ ÇáãÔÑİ ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=cntmod&idf=$frm_num");
}elseif($forum=="unhidemode" and $frm_num!="0" and $moderator!="0"){
@mysql_query("UPDATE {$prefix_start}forum_moderate{$prefix_end} SET status='1' where forumid='$frm_num' and memberid='$moderator'");
 echo "Êã ÇÒÇáÉ ÇÎİÇÁ ÇáãÔÑİ ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=cntmod&idf=$frm_num");
}elseif($forum=="unlockmode" and $frm_num!="0" and $moderator!="0"){
@mysql_query("UPDATE {$prefix_start}forum_moderate{$prefix_end} SET status='1' where forumid='$frm_num' and memberid='$moderator'");
@mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET status='1' where id='$moderator' ");
 echo "Êã ÇÒÇáÉ ÇáÊÌãíÏ ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=cntmod&idf=$frm_num");
}elseif($forum=="blhimode" and $frm_num!="0" and $moderator!="0"){
@mysql_query("UPDATE {$prefix_start}forum_moderate{$prefix_end} SET status='4' where forumid='$frm_num' and memberid='$moderator'");
@mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET status='4' where id='$moderator' ");
 echo "Êã ÅÎİÇÁ æ ÊÌãíÏ ÇáãÔÑİ ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=cntmod&idf=$frm_num");
}elseif($forum=="unblhimode" and $frm_num!="0" and $moderator!="0"){
@mysql_query("UPDATE {$prefix_start}forum_moderate{$prefix_end} SET status='1' where forumid='$frm_num' and memberid='$moderator'");
@mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET status='1' where id='$moderator' ");
 echo "Êã ÇÒÇáÉ ÇáÇÎİÇÁ æ ÇáÊÌãíÏ Úä ÇáãÔÑİ";
 redirect2("admiiin.index.php?admini=forum&forum=cntmod&idf=$frm_num");
}elseif($forum=="delforum" and $frm_num!="0"){
@mysql_query("INSERT INTO {$prefix_start}forum_deleted{$prefix_end} select * from {$prefix_start}forum{$prefix_end} where id='$frm_num'");
@mysql_query("DELETE FROM {$prefix_start}forum{$prefix_end} where id='$frm_num'");
if(moderator($frm_num,"id")>0){
@mysql_query("DELETE FROM {$prefix_start}forum_moderator{$prefix_end} where forumid='$frm_num'");
}
echo "Êã äŞá ÇáãäÊÏì ááãÍĞæİÇÊ ÈäÌÇÍ .";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum=="hide" and $frm_num!="0"){
?>
<form method="post" action="admiiin.index.php?admini=forum&forum=sethide&idf=<?echo $frm_num;?>">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
ÅÎİÇÁ ãäÊÏì ÑŞã : <?echo $frm_num;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÇáãäÊÏì íÙåÑ ááãÌãæÚÉ</td>
<td class="regis" ><center>
<select name="membn">
<option value="14">ãÔÑİæä</option>
<option value="27">ãÓÄæáæÇ İÆÉ</option>
<option value="55">ãÑÇŞÈæä</option>
<option value="96">ãÏÑÇÁ</option>
<option value="0">ááßá</option>
</select>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="ÅÑÓÇá"/> &nbsp;&nbsp; <input class="buton" type="reset" value="ÊİÑíÛ"/>

</td>
</tr>
</table></form>
<?
}elseif($forum=="sethide" and $frm_num!="0"){
$membn = intval($_POST['membn']);
if($membn == "0"){
@mysql_query("UPDATE {$prefix_start}forum{$prefix_end} SET status='1' where id='$frm_num'");
}else{
@mysql_query("UPDATE {$prefix_start}forum{$prefix_end} SET status='2' where id='$frm_num'");
}
@mysql_query("UPDATE {$prefix_start}forum{$prefix_end} SET groupe='$membn ' where id='$frm_num'");
 echo "Êã ÇÎİÇÁ ÇáãäÊÏì ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum=="edit" and  $frm_num !="0"){
$select_forum = @mysql_query("select * from {$prefix_start}forum{$prefix_end} where id='$frm_num' ") ;
$fetch_forum = @mysql_fetch_array($select_forum);
?>
<form method="post" action="admiiin.index.php?admini=forum&forum=setedit&idf=<?echo $frm_num;?>">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
ÊÍßã İí ÇáãäÊÏíÇÊ
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÑŞã ÇáãäÊÏì</td>
<td class="regis" ><center>
<input name="idforum" value="<? echo intval($fetch_forum["id"]);?>" />
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÃíŞæäÉ ÇáãäÊÏì</td>
<td class="regis" ><center>
<input name="icon" value="<? echo protection($fetch_forum["icon"]);?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÅÓã ÇáãäÊÏì</td>
<td class="regis" ><center>
<input name="title" value="<? echo protection($fetch_forum["title"]);?>"/>
</td>
</tr>

<tr >
<td class="register" width="152px" height="28px"><center>ãÑÈæØ ÈİÆÉ ÑŞã</td>
<td class="regis" ><center>
<input name="cat" value="<? echo intval($fetch_forum["cat"]);?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÚÏÏ ÇáÑÏæÏ</td>
<td class="regis" ><center>
<input name="post" value="<? echo intval($fetch_forum["post"]);?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÚÏÏ ÇáãæÇÖíÚ</td>
<td class="regis" ><center>
<input name="topic" value="<? echo intval($fetch_forum["topic"]);?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÊÚÑíİ Úä ÇáãäÊÏì</td>
<td class="regis" ><center>
<input name="text" value="<? echo protection($fetch_forum["text"]);?>"/>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="ÅÑÓÇá"/> &nbsp;&nbsp; <input class="buton" type="reset" value="ÊİÑíÛ"/>

</td>
</tr>
</table></form>
<?

}elseif($forum="setedit" and $frm_num!="0" and empty($cat) and empty($sprmem) and empty($fun) ){
 $idi =intval($_POST["idforum"]);
 $title =protection($_POST["title"]); 
 $icon =protection($_POST["icon"]);
 $cate =intval($_POST["cat"]);
 $post =intval($_POST["post"]);
 $topic =intval($_POST["topic"]);
 $text =protection($_POST["text"]);
if(empty($idi) or empty($title) or empty($icon) or empty($cate) or empty($text) ){
echo "      
áÇ íãßäß ÇÖÇİÉ ÇáÊÚÏíáÇÊ ÇáÌÏíÏÉ <br />
åäÇß ÇÍÏì ÇáÎÇäÇÊ İÇÑÛÉ Ãæ ÊÓÇæí ÕİÑ.
";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}else{
  @mysql_query("UPDATE {$prefix_start}forum{$prefix_end} SET id='$idi' where id='$frm_num'");
  @mysql_query("UPDATE {$prefix_start}forum{$prefix_end} SET title='$title' where id='$frm_num'");
  @mysql_query("UPDATE {$prefix_start}forum{$prefix_end} SET icon='$icon' where id='$frm_num'");
  @mysql_query("UPDATE {$prefix_start}forum{$prefix_end} SET post='$post' where id='$frm_num'");
  @mysql_query("UPDATE {$prefix_start}forum{$prefix_end} SET topic='$topic' where id='$frm_num'");
  @mysql_query("UPDATE {$prefix_start}forum{$prefix_end} SET text='$text' where id='$frm_num'");
  @mysql_query("UPDATE {$prefix_start}forum{$prefix_end} SET cat='$cate' where id='$frm_num'");
  echo "Êã ÊÚÏíá ÈíÇäÇÊ ÇáãäÊÏì ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}
}elseif($forum="superv" and $frm_num!="0" and empty($fun) and $sprmem!="0" ){
?>
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
ÊÍßã İí ãÑÇŞÈ ãäÊÏì ÑŞã  : <? echo $frm_num;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÇáãÑÇŞÈ</td>
<td class="regis" ><center><? 

if(supervisor($frm_num,"forum","id")){
supervisor($frm_num,"forum","");
}else{
echo "ÔÇÛÑ";
}?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÎÕÇÆÕ</td>
<td class="regis" ><center>
<a href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo $frm_num ;?>&fun=delet&sprmem=<? echo $sprmem; ?>"><img title="ÍĞİ ÇáãÑÇŞÈ" src="../<?echo $icons;?>delet.png"/></a> 
&nbsp;&nbsp;
<?if(supervisor($frm_num,"forum","status") == "1"){?>
<a href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo $frm_num ;?>&fun=hide&sprmem=<? echo $sprmem; ?>"><img title="ÅÎİÇÁ ÇáãÑÇŞÈ" src="../<?echo $icons;?>hide.png"/></a> 
<?}else{
?>
<a href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo $frm_num ;?>&fun=unhide&sprmem=<? echo $sprmem; ?>"><img title="ÅÙåÇÑ ÇáãÑÇŞÈ" src="../<?echo $icons;?>unhide.png"/></a> 
<?
}?>&nbsp;&nbsp;

<?
if(supervisor($frm_num,"forum","status") == "3"){
?>
&nbsp;
<a  href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo $frm_num;?>&fun=unblock&sprmem=<? echo $sprmem;?>"><img title="ÇÒÇáÉ ÇáÊÌãíÏ" src="../<?echo $icons;?>true.png"/></a>
&nbsp;
<?
}else{
?>&nbsp;
<a href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo $frm_num;?>&fun=block&sprmem=<? echo $sprmem;?>"><img title="ÊÌãíÏ ÇÇáãÑÇŞÈ" src="../<?echo $icons;?>Denied.png"/></a> 
&nbsp;
<?}?>
<?
if(supervisor($frm_num,"forum","status") == "4"){
?>
<a href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo $frm_num;?>&fun=unhideunblock&sprmem=<? echo $sprmem;?>"><img title="ÅÒÇáÉ ÅÎİÇÁ æ ÊÌãíÏ ÇáãÑÇŞÈ" src="../<?echo $icons;?>unhibl.png"/></a> 
<?
}else{
?><a href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo $frm_num;?>&fun=hideblock&sprmem=<? echo $sprmem;?>"><img title="ÅÎİÇÁ æ ÊÌãíÏ ÇáãÑÇŞÈ" src="../<?echo $icons;?>hibl.png"/></a> 
<?}
?>

</td>
</tr>
</table>
<?
}elseif($forum="superv" and $frm_num!="0" and $fun=="delet" and  $sprmem!="0" ){
  @mysql_query("DELETE FROM {$prefix_start}fsupervisor{$prefix_end} where reli='$frm_num' and memberid='$sprmem'");
  @mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET level='1' where id='$sprmem'");
echo "Êã ÍĞİ ÇáãÑÇŞÈ ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum="superv" and $frm_num!="0" and $fun=="hide" and  $sprmem!="0" ){
  @mysql_query("UPDATE {$prefix_start}fsupervisor{$prefix_end} SET status='2' where memberid='$sprmem' and reli='$frm_num' ");
echo "Êã ÇÎİÇÁ ÇáãÑÇŞÈ ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum="superv" and $frm_num!="0" and $fun=="unhide" and  $sprmem!="0" ){
  @mysql_query("UPDATE {$prefix_start}fsupervisor{$prefix_end} SET status='1' where memberid='$sprmem' and reli='$frm_num' ");
echo "Êã ÇÒÇáÉ ÇÎİÇÁ ÇáãÑÇŞÈ ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum="superv" and $frm_num!="0" and $fun=="block" and  $sprmem!="0" ){
  @mysql_query("UPDATE {$prefix_start}fsupervisor{$prefix_end} SET status='3' where memberid='$sprmem' and reli='$frm_num' ");
echo "Êã ÊÌãíÏ ÇáãÑÇŞÈ ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum="superv" and $frm_num!="0" and $fun=="unblock" and  $sprmem!="0" ){
  @mysql_query("UPDATE {$prefix_start}fsupervisor{$prefix_end} SET status='1' where memberid='$sprmem' and reli='$frm_num' ");
echo "Êã ÇÒÇáÉ ÊÌãíÏ ÇáãÑÇŞÈ ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum="superv" and $frm_num!="0" and $fun=="hideblock" and  $sprmem!="0" ){
  @mysql_query("UPDATE {$prefix_start}fsupervisor{$prefix_end} SET status='4' where memberid='$sprmem' and reli='$frm_num' ");
echo "ÊÊã ÊÌãíÏ æ ÇÎİÇÁ ÇáãÑÇŞÈ ÈäÌÇÍ";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum="superv" and $frm_num!="0" and $fun=="unhideblock" and  $sprmem!="0" ){
  @mysql_query("UPDATE {$prefix_start}fsupervisor{$prefix_end} SET status='1' where memberid='$sprmem' and reli='$frm_num' ");
echo "Êã ÇÒÇáÉ ÇáÊÌãíÏ æ ÇáÇÎİÇÁ Úä ÇáãÑÇŞÈ";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}else{
echo '<META http-equiv="refresh" content="0; URL=../islam.php" ></META>'; 
}




?>