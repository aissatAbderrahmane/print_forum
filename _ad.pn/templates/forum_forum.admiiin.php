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
<td class="register" width="152px" height="28px"><center>����� ����</td>
<td class="regis" ><center>  
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=forum&forum=corbeille"><img title="������� ������" src="../<?echo $icons;?>dele.png"/></a>

</td>
</tr>
</table><br /><br />
<?
$selection_forum = @mysql_query("select * from {$prefix_start}forum{$prefix_end} ORDER BY id ASC $limit") ;
if(@mysql_num_rows($selection_forum) == 0){
echo "�� ���� ������� �����";
}else{
while($fetch = @mysql_fetch_array($selection_forum)){
?>
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
���� �� ���������
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>�������</td>
<td class="regis" ><center><? echo protection($fetch['title']);?> &nbsp;&nbsp; || ��� : <? echo intval($fetch['id']); ?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>����� ������� ���</td>
<td class="regis" ><center><? echo cat_title($fetch["cat"]);?> &nbsp;&nbsp; || ��� : <? echo intval($fetch["cat"]); ?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>����� �������</td>
<td class="regis" ><center>
<?

if(supervisor($fetch["id"],"forum","memberid")){
supervisor($fetch["id"],"forum","");
}else{
echo "����";
}



?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>������� ���� ���</td>
<td class="regis" ><center>
<?
if(intval($fetch['groupe']) == "0"){
echo "����";
}elseif(intval($fetch['groupe']) == "14"){
echo "��������";
}elseif(intval($fetch['groupe']) == "27"){
echo "������� �����";
}elseif(intval($fetch['groupe']) == "55"){
echo "���������";
}elseif(intval($fetch['groupe']) == "96"){
echo "�������";
}

?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>�����</td>
<td class="regis" ><center>
<a href="admiiin.index.php?admini=cat&cat=add"><img title="����� ����� ����" src="../<?echo $icons;?>folder.png"/></a>
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=forum&forum=addmoderate&idf=<? echo intval($fetch['id']); ?>"><img title="����� ���� ���� �������" src="../<?echo $icons;?>Add.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=forum&forum=delforum&idf=<? echo intval($fetch['id']); ?>"><img title="��� �������" src="../<?echo $icons;?>delet.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=forum&forum=hide&idf=<? echo intval($fetch['id']); ?>"><img title="����� �������" src="../<?echo $icons;?>hide.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=forum&forum=edit&idf=<? echo intval($fetch['id']); ?>"><img title="����� �������" src="../<?echo $icons;?>edit.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=forum&forum=cntmod&idf=<? echo intval($fetch['id']); ?>"><img title="���� �� ��������" src="../<?echo $icons;?>moderator.png"/></a> 
&nbsp;&nbsp;
<?if(supervisor($fetch["id"],"forum","memberid")>0){?>
<a href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo intval($fetch['id']); ?>&sprmem=<? echo supervisor($fetch["id"],"forum","memberid"); ?>"><img title="���� �� ����� �������" src="../<?echo $icons;?>super.png"/></a> 
<?}else{
?>
<a href="admiiin.index.php?admini=forum&forum=newsprmem&idf=<? echo intval($fetch['id']); ?>"><img title="����� ����� ����" src="../<?echo $icons;?>superadd.png"/></a> 

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
echo "�� ���� ������� �����";
}else{
while($fetch0 = @mysql_fetch_array($selection)){
?>

<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
���� �� ���������
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>�������</td>
<td class="regis" ><center><? echo protection($fetch0['title']);?> &nbsp;&nbsp; || ��� : <? echo intval($fetch0['id']); ?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>����� ������� ���</td>
<td class="regis" ><center><? echo cat_title($fetch0["cat"]);?> &nbsp;&nbsp; || ��� : <? echo intval($fetch0["cat"]); ?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>����� �������</td>
<td class="regis" ><center>
<?
supervisor($fetch0["id"],"forum","");
?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>�����</td>
<td class="regis" ><center>
<a href="admiiin.index.php?admini=forum&forum=revi&idf=<? echo intval($fetch0['id']); ?>"><img title="����� ������� � ���� �� ���������" src="../<?echo $icons;?>ret.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=forum&forum=delecteds&idf=<? echo intval($fetch0['id']); ?>"><img title="��� �����" src="../<?echo $icons;?>false.png"/></a> 
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
����� ����� ���� ������� ��� : <? echo $frm_num;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>��� ����� �������</td>
<td class="regis" ><center>
<input name="memberid" size="30"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>���� �������</td>
<td class="regis" ><center>
<select name="status">
<option value="1">����</option>
<option value="2">����</option>
</select>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="�����"/> &nbsp;&nbsp; <input class="buton" type="reset" value="�����"/>
</td>
</tr>
</table>
</form>
<?
}elseif($forum=="setnewvisor" and $frm_num!="0"){
$memberid=intval($_POST["memberid"]);
$status=intval($_POST["status"]);
if(member($memberid,"level") == "96" ){
echo "<div class='eroor'>��� ����� ��� ��� ����� ���� � ������ ������ ����� </div>";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}else{
if(empty($memberid) or empty($status)){
echo "<div class='eroor'>���� ������� ����� � ��� ���� �� ������ ������� �����</div>";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}else{
 @mysql_query("INSERT INTO {$prefix_start}fsupervisor{$prefix_end} VALUES('','$frm_num','$memberid','0','$status')");
  @mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET level = '55' where id='$memberid'");
echo "<div class='yes'>�� ����� ������� �����</div>";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}
}

}elseif($forum=="revi" and $frm_num!="0"){
@mysql_query("INSERT INTO {$prefix_start}forum{$prefix_end} select * from {$prefix_start}forum_deleted{$prefix_end} where id='$frm_num'");
@mysql_query("DELETE FROM {$prefix_start}forum_deleted{$prefix_end} where id='$frm_num'");
echo "�� ����� ������� �����";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum=="delecteds" and $frm_num!="0"){
@mysql_query("DELETE FROM {$prefix_start}forum_deleted{$prefix_end} where id='$frm_num'");
@mysql_query("DELETE FROM {$prefix_start}forum_moderate{$prefix_end} where forumid='$frm_num'");
if(supervisor($frm_num,"forum","id")>0){
@mysql_query("DELETE FROM {$prefix_start}fsupervisor{$prefix_end} where reli='$frm_num'");
}
echo "�� ��� ������� ������ �����";
 redirect2("admiiin.index.php?admini=forum&forum=corbeille");
}elseif($forum=="addmoderate" and $frm_num!="0"){
?>
<form method="post" action="admiiin.index.php?admini=forum&forum=setmoderate&idf=<? echo $frm_num;?>">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
����� ���� ���� ������ ��� <? echo $frm_num;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>��� ������</td>
<td class="regis" ><center>
<input name="id_mem" />
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>���� ������</td>
<td class="regis" ><center>
<select name="status_mod">
<option value="1">����</option>
<option value="2">����</option>
</select>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="�����"/> &nbsp;&nbsp; <input class="buton" type="reset" value="�����"/>
</td>
</tr>
</table></form>
<?
}elseif($forum=="setmoderate" and $frm_num!="0"){
$id_mem = intval($_POST["id_mem"]);
$status_mod = intval($_POST["status_mod"]);
if(empty($id_mem)){
echo "��� ���� ����� ��� ������ �� ���� ������ �������";
redirect2("admiiin.index.php?admini=forum&forum=addmoderate&idf=$frm_num");
}else{
if(member($id_mem,"level") =="1" or member($id_mem,"level") =="14"){
 @mysql_query("INSERT INTO {$prefix_start}forum_moderate{$prefix_end} VALUES(NULL,'$frm_num','$id_mem','0','$status_mod')");
 @mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET level = '14' where id='$id_mem'");
 echo"�� ����� ������ �����";
 }elseif(member($id_mem,"level") =="27" or member($id_mem,"level") =="55" or member($id_mem,"level") =="96"){
 echo "�� ����� ����� ��� ����� ���� ��� ����� ���� ��� �� ���� <br />
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
���� �� ����� ����� ��� :<? echo $frm_num;?>
</td>
</tr>
<? while($from_fetch = @mysql_fetch_array($select_from) ){?>
<tr >
<td class="regis" ><center>
<? member_inf($from_fetch["memberid"]); ?>
</td>
<td class="regis" ><center>
<a  href="admiiin.index.php?admini=forum&forum=delmode&idf=<? echo $frm_num;?>&moderator=<? echo intval($from_fetch["memberid"]);?>"><img title="���� ������" src="../<?echo $icons;?>dele.png"/></a>
&nbsp;
<?
if(moderator($frm_num,"status") == "2"){
?>
&nbsp;
<a  href="admiiin.index.php?admini=forum&forum=unhidemode&idf=<? echo $frm_num;?>&moderator=<? echo intval($from_fetch["memberid"]);?>"><img title="����� ������" src="../<?echo $icons;?>unhide.png"/></a>
&nbsp;
<?
}else{
?>
&nbsp;
<a href="admiiin.index.php?admini=forum&forum=hidmode&idf=<? echo $frm_num;?>&moderator=<? echo intval($from_fetch["memberid"]);?>"><img title="����� ������" src="../<?echo $icons;?>hide.png"/></a> 
&nbsp;
<?
}
if(moderator($frm_num,"status") == "3"){
?>
&nbsp;
<a  href="admiiin.index.php?admini=forum&forum=unlockmode&idf=<? echo $frm_num;?>&moderator=<? echo intval($from_fetch["memberid"]);?>"><img title="����� �������" src="../<?echo $icons;?>true.png"/></a>
&nbsp;
<?
}else{
?>&nbsp;
<a href="admiiin.index.php?admini=forum&forum=blockmode&idf=<? echo $frm_num;?>&moderator=<? echo intval($from_fetch["memberid"]);?>"><img title="����� ������" src="../<?echo $icons;?>Denied.png"/></a> 
&nbsp;
<?}?>
<?
if(moderator($frm_num,"status") == "4"){
?>
<a href="admiiin.index.php?admini=forum&forum=unblhimode&idf=<? echo $frm_num;?>&moderator=<? echo intval($from_fetch["memberid"]);?>"><img title="����� � ����� ������" src="../<?echo $icons;?>unhibl.png"/></a> 
<?
}else{
?><a href="admiiin.index.php?admini=forum&forum=blhimode&idf=<? echo $frm_num;?>&moderator=<? echo intval($from_fetch["memberid"]);?>"><img title="����� � ����� ������" src="../<?echo $icons;?>hibl.png"/></a> 
<?}
?></td>
</tr><?
}
?>
</table>
<?
}else{
echo "�� ���� ������ ����� ";
}
mysql_free_result($select_from);
}elseif($forum=="delmode" and $frm_num!="0" and $moderator!="0"){
@mysql_query("DELETE FROM {$prefix_start}forum_moderate{$prefix_end} where forumid='$frm_num' and memberid='$moderator' ");
@mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET level='1' where id='$moderator'");
 echo "�� ��� ������ �����";
 redirect2("admiiin.index.php?admini=forum&forum=cntmod&idf=$frm_num");
}elseif($forum=="hidmode" and $frm_num!="0" and $moderator!="0"){
@mysql_query("UPDATE {$prefix_start}forum_moderate{$prefix_end} SET status='2' where forumid='$frm_num' and memberid='$moderator'"); echo "�� ����� ������ �����";
 redirect2("admiiin.index.php?admini=forum&forum=cntmod&idf=$frm_num");
}elseif($forum=="blockmode" and $frm_num!="0" and $moderator!="0"){
@mysql_query("UPDATE {$prefix_start}forum_moderate{$prefix_end} SET status='3' where forumid='$frm_num' and memberid='$moderator'");
@mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET status='3' where id='$moderator' ");
 echo "�� ����� ������ �����";
 redirect2("admiiin.index.php?admini=forum&forum=cntmod&idf=$frm_num");
}elseif($forum=="unhidemode" and $frm_num!="0" and $moderator!="0"){
@mysql_query("UPDATE {$prefix_start}forum_moderate{$prefix_end} SET status='1' where forumid='$frm_num' and memberid='$moderator'");
 echo "�� ����� ����� ������ �����";
 redirect2("admiiin.index.php?admini=forum&forum=cntmod&idf=$frm_num");
}elseif($forum=="unlockmode" and $frm_num!="0" and $moderator!="0"){
@mysql_query("UPDATE {$prefix_start}forum_moderate{$prefix_end} SET status='1' where forumid='$frm_num' and memberid='$moderator'");
@mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET status='1' where id='$moderator' ");
 echo "�� ����� ������� �����";
 redirect2("admiiin.index.php?admini=forum&forum=cntmod&idf=$frm_num");
}elseif($forum=="blhimode" and $frm_num!="0" and $moderator!="0"){
@mysql_query("UPDATE {$prefix_start}forum_moderate{$prefix_end} SET status='4' where forumid='$frm_num' and memberid='$moderator'");
@mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET status='4' where id='$moderator' ");
 echo "�� ����� � ����� ������ �����";
 redirect2("admiiin.index.php?admini=forum&forum=cntmod&idf=$frm_num");
}elseif($forum=="unblhimode" and $frm_num!="0" and $moderator!="0"){
@mysql_query("UPDATE {$prefix_start}forum_moderate{$prefix_end} SET status='1' where forumid='$frm_num' and memberid='$moderator'");
@mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET status='1' where id='$moderator' ");
 echo "�� ����� ������� � ������� �� ������";
 redirect2("admiiin.index.php?admini=forum&forum=cntmod&idf=$frm_num");
}elseif($forum=="delforum" and $frm_num!="0"){
@mysql_query("INSERT INTO {$prefix_start}forum_deleted{$prefix_end} select * from {$prefix_start}forum{$prefix_end} where id='$frm_num'");
@mysql_query("DELETE FROM {$prefix_start}forum{$prefix_end} where id='$frm_num'");
if(moderator($frm_num,"id")>0){
@mysql_query("DELETE FROM {$prefix_start}forum_moderator{$prefix_end} where forumid='$frm_num'");
}
echo "�� ��� ������� ��������� ����� .";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum=="hide" and $frm_num!="0"){
?>
<form method="post" action="admiiin.index.php?admini=forum&forum=sethide&idf=<?echo $frm_num;?>">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
����� ����� ��� : <?echo $frm_num;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>������� ���� ��������</td>
<td class="regis" ><center>
<select name="membn">
<option value="14">������</option>
<option value="27">������� ���</option>
<option value="55">�������</option>
<option value="96">�����</option>
<option value="0">����</option>
</select>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="�����"/> &nbsp;&nbsp; <input class="buton" type="reset" value="�����"/>

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
 echo "�� ����� ������� �����";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum=="edit" and  $frm_num !="0"){
$select_forum = @mysql_query("select * from {$prefix_start}forum{$prefix_end} where id='$frm_num' ") ;
$fetch_forum = @mysql_fetch_array($select_forum);
?>
<form method="post" action="admiiin.index.php?admini=forum&forum=setedit&idf=<?echo $frm_num;?>">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
���� �� ���������
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>��� �������</td>
<td class="regis" ><center>
<input name="idforum" value="<? echo intval($fetch_forum["id"]);?>" />
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>������ �������</td>
<td class="regis" ><center>
<input name="icon" value="<? echo protection($fetch_forum["icon"]);?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>��� �������</td>
<td class="regis" ><center>
<input name="title" value="<? echo protection($fetch_forum["title"]);?>"/>
</td>
</tr>

<tr >
<td class="register" width="152px" height="28px"><center>����� ���� ���</td>
<td class="regis" ><center>
<input name="cat" value="<? echo intval($fetch_forum["cat"]);?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>��� ������</td>
<td class="regis" ><center>
<input name="post" value="<? echo intval($fetch_forum["post"]);?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>��� ��������</td>
<td class="regis" ><center>
<input name="topic" value="<? echo intval($fetch_forum["topic"]);?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>����� �� �������</td>
<td class="regis" ><center>
<input name="text" value="<? echo protection($fetch_forum["text"]);?>"/>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="�����"/> &nbsp;&nbsp; <input class="buton" type="reset" value="�����"/>

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
�� ����� ����� ��������� ������� <br />
���� ���� ������� ����� �� ����� ���.
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
  echo "�� ����� ������ ������� �����";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}
}elseif($forum="superv" and $frm_num!="0" and empty($fun) and $sprmem!="0" ){
?>
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
���� �� ����� ����� ���  : <? echo $frm_num;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>�������</td>
<td class="regis" ><center><? 

if(supervisor($frm_num,"forum","id")){
supervisor($frm_num,"forum","");
}else{
echo "����";
}?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>�����</td>
<td class="regis" ><center>
<a href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo $frm_num ;?>&fun=delet&sprmem=<? echo $sprmem; ?>"><img title="��� �������" src="../<?echo $icons;?>delet.png"/></a> 
&nbsp;&nbsp;
<?if(supervisor($frm_num,"forum","status") == "1"){?>
<a href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo $frm_num ;?>&fun=hide&sprmem=<? echo $sprmem; ?>"><img title="����� �������" src="../<?echo $icons;?>hide.png"/></a> 
<?}else{
?>
<a href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo $frm_num ;?>&fun=unhide&sprmem=<? echo $sprmem; ?>"><img title="����� �������" src="../<?echo $icons;?>unhide.png"/></a> 
<?
}?>&nbsp;&nbsp;

<?
if(supervisor($frm_num,"forum","status") == "3"){
?>
&nbsp;
<a  href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo $frm_num;?>&fun=unblock&sprmem=<? echo $sprmem;?>"><img title="����� �������" src="../<?echo $icons;?>true.png"/></a>
&nbsp;
<?
}else{
?>&nbsp;
<a href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo $frm_num;?>&fun=block&sprmem=<? echo $sprmem;?>"><img title="����� ��������" src="../<?echo $icons;?>Denied.png"/></a> 
&nbsp;
<?}?>
<?
if(supervisor($frm_num,"forum","status") == "4"){
?>
<a href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo $frm_num;?>&fun=unhideunblock&sprmem=<? echo $sprmem;?>"><img title="����� ����� � ����� �������" src="../<?echo $icons;?>unhibl.png"/></a> 
<?
}else{
?><a href="admiiin.index.php?admini=forum&forum=superv&idf=<? echo $frm_num;?>&fun=hideblock&sprmem=<? echo $sprmem;?>"><img title="����� � ����� �������" src="../<?echo $icons;?>hibl.png"/></a> 
<?}
?>

</td>
</tr>
</table>
<?
}elseif($forum="superv" and $frm_num!="0" and $fun=="delet" and  $sprmem!="0" ){
  @mysql_query("DELETE FROM {$prefix_start}fsupervisor{$prefix_end} where reli='$frm_num' and memberid='$sprmem'");
  @mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET level='1' where id='$sprmem'");
echo "�� ��� ������� �����";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum="superv" and $frm_num!="0" and $fun=="hide" and  $sprmem!="0" ){
  @mysql_query("UPDATE {$prefix_start}fsupervisor{$prefix_end} SET status='2' where memberid='$sprmem' and reli='$frm_num' ");
echo "�� ����� ������� �����";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum="superv" and $frm_num!="0" and $fun=="unhide" and  $sprmem!="0" ){
  @mysql_query("UPDATE {$prefix_start}fsupervisor{$prefix_end} SET status='1' where memberid='$sprmem' and reli='$frm_num' ");
echo "�� ����� ����� ������� �����";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum="superv" and $frm_num!="0" and $fun=="block" and  $sprmem!="0" ){
  @mysql_query("UPDATE {$prefix_start}fsupervisor{$prefix_end} SET status='3' where memberid='$sprmem' and reli='$frm_num' ");
echo "�� ����� ������� �����";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum="superv" and $frm_num!="0" and $fun=="unblock" and  $sprmem!="0" ){
  @mysql_query("UPDATE {$prefix_start}fsupervisor{$prefix_end} SET status='1' where memberid='$sprmem' and reli='$frm_num' ");
echo "�� ����� ����� ������� �����";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum="superv" and $frm_num!="0" and $fun=="hideblock" and  $sprmem!="0" ){
  @mysql_query("UPDATE {$prefix_start}fsupervisor{$prefix_end} SET status='4' where memberid='$sprmem' and reli='$frm_num' ");
echo "��� ����� � ����� ������� �����";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}elseif($forum="superv" and $frm_num!="0" and $fun=="unhideblock" and  $sprmem!="0" ){
  @mysql_query("UPDATE {$prefix_start}fsupervisor{$prefix_end} SET status='1' where memberid='$sprmem' and reli='$frm_num' ");
echo "�� ����� ������� � ������� �� �������";
 redirect2("admiiin.index.php?admini=forum&forum=controle");
}else{
echo '<META http-equiv="refresh" content="0; URL=../islam.php" ></META>'; 
}




?>