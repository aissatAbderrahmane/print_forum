<br/><br/>
<?
#########PAGE ############
if($pg==0 or empty($pg)){
$limit="LIMIT 0,5";
}else{
$x = ($pg * 5);
$limit="LIMIT $x,$x";
}
########## END #############
if($cat=="controle" && $pg>=0){?>
<table width="65%" cellpadding="2" cellspacing="2"><tr >
<td class="register" width="152px" height="28px"><center>����� ����</td>
<td class="regis" ><center>  
<a href="admiiin.index.php?admini=cat&cat=add"><img title="����� ��� �����" src="../<?echo $icons;?>Add.png"/></a>
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=cat&cat=corbeille"><img title="���� ������" src="../<?echo $icons;?>dele.png"/></a>

</td>
</tr>
</table><br /><br />
<?
$sql = @mysql_query("select * from {$prefix_start}cat{$prefix_end} ORDER BY id ASC $limit");
while($fetch= mysql_fetch_array($sql)){?>
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
���� �� ������
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>�����</td>
<td class="regis" ><center><? echo protection($fetch['title']);?> &nbsp;&nbsp; || ��� : <? echo intval($fetch['id']); ?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>����� �����</td>
<td class="regis" ><center>
<?
if(supervisor($fetch["id"],"cat","memberid")){
supervisor($fetch["id"],"cat","");
}else{
echo "����";
}
?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>����� ���� ���</td>
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
<td class="register" width="152px" height="28px"><center>���� �� �����</td>
<td class="regis" ><center>
<a href="admiiin.index.php?admini=cat&cat=forum&idc=<? echo intval($fetch['id']); ?>&forum=add"><img title="����� ����� ���� �����" src="../<?echo $icons;?>Add.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=cat&idc=<? echo intval($fetch['id']); ?>&cat=suprime"><img title="��� �����" src="../<?echo $icons;?>delet.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=cat&idc=<? echo intval($fetch['id']); ?>&cat=hide"><img title="����� �����" src="../<?echo $icons;?>hide.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=cat&idc=<? echo intval($fetch['id']); ?>&cat=edit"><img title="����� �����" src="../<?echo $icons;?>edit.png"/></a> 
<?
if(supervisor($fetch["id"],"cat","id") > 0){
?>
<a href="admiiin.index.php?admini=cat&idc=<? echo intval($fetch['id']); ?>&cat=sprmem"><img title="���� �� �������" src="../<?echo $icons;?>super.png"/></a> 
<?
}else{
?>
<a href="admiiin.index.php?admini=cat&idc=<? echo intval($fetch['id']); ?>&cat=newsprmem"><img title="����� ����� ����" src="../<?echo $icons;?>superadd.png"/></a> 

<?
}?>
</td>
</tr>
</table><br />
<?}?>
<?}elseif($cat=="add"){
?>
<form method="post" action="admiiin.index.php?admini=cat&cat=new">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
����� ��� �����
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>���� ���� �����</td>
<td class="regis" ><center><input type="text" name="icn_cat" size="30"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>��� �����</td>
<td class="regis" ><center><input type="text" name="tit_cat" size="30"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>������ �����</td>
<td class="regis" ><center>
<select name="sit_cat"  >
<option value="1" >������� ������</option>
<option value="2">������� ��������</option>
<option value="3">��� ����</option>
<option value="4">��� ����</option>
</select>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>����� ���� �����</td>
<td class="regis" ><center><input type="text" name="txt_cat" size="30"/>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="�����"/> &nbsp;&nbsp; <input class="buton" type="reset" value="�����"/>

</td>
</tr>
</table></form>
<?
@pg_adm("cat",5,0,"admiiin.index.php?admini=cat&cat=controle");
}elseif($cat=="new"){
$cat_icn = $system->_simple($_POST['icn_cat']);
$cat_name = $system->_simple($_POST['tit_cat']);
$cat_site = $system->_simple($_POST['sit_cat']);
$cat_txt = $system->_simple($_POST['txt_cat']);
if(empty($cat_icn) or empty($cat_name) or empty($cat_txt)){
echo "���� ��� �������� ����� � ������ ����� ��� �����";
redirect2("admiiin.index.php?admini=cat&cat=add");
}else{
 $system->insert("{$prefix_start}cat{$prefix_end}","","'','$cat_name','$cat_icn','0','$cat_site','0','0','$cat_txt','1','0'");
echo "�� ����� ����� �����";
redirect2("admiiin.index.php?admini=cat&cat=add");
}
}elseif($cat=="forum" and $cat_num !="0" and  $forum=="add"){?>
<form method="post" action="admiiin.index.php?admini=cat&cat=forum&idc=<?echo $cat_num;?>&forum=new">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
����� ����� ���� ����� ��� : <? echo $cat_num;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>���� ������ �������</td>
<td class="regis" ><center><input name="icn_frm" size="30"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>��� �������</td>
<td class="regis" ><center><input name="tit_frm" size="30"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>����� �������</td>
<td class="regis" ><center><input name="spr_frm" size="30"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>������ �������</td>
<td class="regis" ><center><input name="txt_frm" size="30"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>����� �������</td>
<td class="regis" ><center>
<select name="sts_frm">
<option value='0'>�����</option>
<option value='1'>�����</option>
<option value='2'>����</option>
<option value='3'>���� � �����</option>
</select>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="�����"/> &nbsp;&nbsp; <input class="buton" type="reset" value="�����"/>

</td>
</tr>
</table></form>
<?}elseif($cat=="forum" and $cat_num !="0" and  $forum=="new"){
$ic_frm=@protection_simple($_POST['icn_frm']);
$tit_frm=@protection_simple($_POST['tit_frm']);
$spr_frm=@protection_simple($_POST['spr_frm']);
$txt_frm=@protection_simple($_POST['txt_frm']);
$sts_frm=@protection_simple($_POST['sts_frm']);
if(empty($ic_frm) or empty($tit_frm) or empty($txt_frm)){
echo "���� ��� ���� �������� ��� ����� � ���� \n
����� ������� �����
";
redirect2("admiiin.index.php?admini=cat&cat=forum&idc=".$cat_num."&forum=add");
}else{
 @mysql_query("INSERT INTO {$prefix_start}forum{$prefix_end} VALUES ('','$tit_frm','$ic_frm','$spr_frm','$cat_num','0','0','$txt_frm','$sts_frm','0')");
echo "�� ����� ������� �����";
redirect2("admiiin.index.php?admini=cat&cat=controle");
}
}elseif($cat_num !="0" and $cat=="suprime"  ){
@mysql_query("INSERT INTO {$prefix_start}cat_deleted{$prefix_end} select * from {$prefix_start}cat{$prefix_end} where id='$cat_num'");
@mysql_query("DELETE FROM {$prefix_start}cat{$prefix_end} where id='$cat_num'");
echo "�� ��� ����� ����� ��������� �����";
redirect2("admiiin.index.php?admini=cat&cat=controle");
}elseif($cat=="corbeille"){
echo"������ : ��� �� ������ �������� �� ���� ��������� ��� �������� ������� ";
$sql_delcat= @mysql_query("select * from {$prefix_start}cat_deleted{$prefix_end}");
if(@mysql_num_rows($sql_delcat)){
while($fetch=@mysql_fetch_array($sql_delcat)){
?>
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
���� �� ������
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>�����</td>
<td class="regis" ><center><? echo protection($fetch['title']);?> &nbsp;&nbsp; || ��� : <? echo intval($fetch['id']); ?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>����� �����</td>
<td class="regis" ><center>
<?
if(supervisor($fetch["id"],"cat","memberid")){
supervisor($fetch["id"],"cat","");
}else{
echo "����";
}
?>
?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>���� �� �����</td>
<td class="regis" ><center>
<a href="admiiin.index.php?admini=cat&cat=revi&idc=<? echo intval($fetch['id']); ?>"><img title="����� ����� �� ���� ���������" src="../<?echo $icons;?>ret.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=cat&idc=<? echo intval($fetch['id']); ?>&cat=delecteds"><img title="��� ����� �����" src="../<?echo $icons;?>false.png"/></a> 
&nbsp;&nbsp; 
</td>
</tr>

</table><br /><br />
<?
}}else{
echo "<br />
<br />�� ���� ���� �� ���� ��������� ������";
}
}elseif($cat=="delecteds" and $cat_num!="0"){
@mysql_query("DELETE FROM {$prefix_start}cat_deleted{$prefix_end} where id='$cat_num'");
echo "�� ��� ����� ������ �����";
redirect2("admiiin.index.php?admini=cat&cat=corbeille");
}elseif($cat_num!="0" and $cat=="newsprmem" and $fun=="" and $forum==""){
?>
<form method="post" action="admiiin.index.php?admini=cat&idc=<?echo $cat_num;?>&cat=setsprmem">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
����� ����� ���� ����� ��� : <? echo $catnum;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>��� �������</td>
<td class="regis" ><center>
<input name="memberid"/>
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
}elseif($cat_num!="0" and $cat=="setsprmem" and $fun=="" ){
$memberid=intval($_POST["memberid"]);
if(empty($memberid)){
echo "�� ��� ������ ��� �������";
redirect2("admiiin.index.php?admini=cat&idc=$cat_num&cat=newsprmem");
}else{
if(member($memberid,"level") == "96"){
echo "�� ���� ����� ��� ����� ����� ��� ����� ���� ���� �����";
redirect2("admiiin.index.php?admini=cat&idc=$cat_num&cat=newsprmem");
}else{
 @mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET level='55' where id='$memberid'");
 @mysql_query("INSERT INTO {$prefix_start}supervisor{$prefix_end} VALUES('','$cat_num','$memberid','0','1')");
echo "�� ����� ������� ������ �����";
redirect2("admiiin.index.php?admini=cat&cat=controle");
}
}
}elseif($cat=="revi" and $cat_num!="0"){
@mysql_query("INSERT INTO {$prefix_start}cat{$prefix_end} select * from {$prefix_start}cat_deleted{$prefix_end} where id='$cat_num'");
@mysql_query("DELETE FROM {$prefix_start}cat_deleted{$prefix_end} where id='$cat_num'");
echo "��� ����� ����� �����";
redirect2("admiiin.index.php?admini=cat&cat=corbeille");

}elseif($cat_num!="0" and $cat=="edit"){
$sql_edit = @mysql_query("select * from {$prefix_start}cat{$prefix_end} where id='$cat_num'");
$fetch_edit = @mysql_fetch_array($sql_edit);
?>
<form method="post" action="admiiin.index.php?admini=cat&idc=<? echo $cat_num;?>&cat=setedit">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
����� ��� ��� : <? echo $cat_num;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>��� �����</td>
<td class="regis" ><center>
<input name="cat_name" value="<? echo protection($fetch_edit["title"]) ;?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>������ �����</td>
<td class="regis" ><center>
<input name="cat_icon" value="<? echo protection($fetch_edit["icon"]) ;?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>��� ����</td>
<td class="regis" ><center>
<input name="cat_post" value="<? echo intval($fetch_edit["post"]) ;?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>��� ������</td>
<td class="regis" ><center>
<input name="cat_topic" value="<? echo intval($fetch_edit["topic"]) ;?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>��� �������</td>
<td class="regis" ><center>
<input name="cat_membersup" value="<? echo supervisor($cat_num,"cat","memberid") ;?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>������ �������� ��</td>
<td class="regis" ><center>
<input name="cat_site" value="<? echo intval($fetch_edit["site"]) ;?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>���� �����</td>
<td class="regis" ><center>
<select name="cat_status" >
<option value="1">������</option>
<option value="2">�����</option>
<option value="3">�����</option>
<option value="4">����� & �����</option>
</select>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>����� �� �����</td>
<td class="regis" ><center>
<input name="cat_text" value="<? echo protection($fetch_edit["text"]) ;?>"/>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="�����"/> &nbsp;&nbsp; <input class="buton" type="reset" value="�����"/>

</td>
</tr>
</table>
<?
}elseif($cat_num!="0" and $cat=="setedit"){
$cat_name = protection($_POST["cat_name"]);
$cat_icon = protection($_POST["cat_icon"]);
$cat_post = intval($_POST["cat_post"]);
$cat_topic = intval($_POST["cat_topic"]);
$cat_membersup = intval($_POST["cat_membersup"]);
$cat_site  = intval($_POST["cat_site"]);
$cat_status = intval($_POST["cat_status"]);
$cat_text= protection($_POST["cat_text"]);
if(member($cat_membersup,"level") == "96"){
echo "�� ��� ����� ����� � �����:<br />
��� ����� ���� ����� ����� ���� �� �����
";
 redirect2("admiiin.index.php?admini=cat&cat=controle");
}else{
 @mysql_query("UPDATE {$prefix_start}cat{$prefix_end} SET title='$cat_name' where id='$cat_num'");
 @mysql_query("UPDATE {$prefix_start}cat{$prefix_end} SET icon='$cat_icon' where id='$cat_num'");
 @mysql_query("UPDATE {$prefix_start}cat{$prefix_end} SET post='$cat_post' where id='$cat_num'");
 @mysql_query("UPDATE {$prefix_start}cat{$prefix_end} SET topic='$cat_topic' where id='$cat_num'");
 @mysql_query("UPDATE {$prefix_start}supervisor{$prefix_end} SET memberid='$cat_membersup' where reli='$cat_num'");
 @mysql_query("UPDATE {$prefix_start}cat{$prefix_end} SET site='$cat_site' where id='$cat_num'");
 @mysql_query("UPDATE {$prefix_start}cat{$prefix_end} SET status='$cat_status' where id='$cat_num'");
 @mysql_query("UPDATE {$prefix_start}cat{$prefix_end} SET text='$cat_text' where id='$cat_num'");	
 if(!isset($cat_membersup)){
 @mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET level='55' where id='$cat_membersup'");
 }
echo "�� ����� ��� ����� ����� �����";
 redirect2("admiiin.index.php?admini=cat&cat=controle");
}



}elseif($cat_num!="0" and $cat=="hide"){
?>
<form method="post" action="admiiin.index.php?admini=cat&idc=<?echo $cat_num;?>&cat=hideit">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
����� ��� ��� : <? echo $cat_num;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>����� ���� ������</td>
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
}elseif($cat_num!="0" and $cat=="hideit"){
$groupe = intval($_POST['membn']); 
echo "�� ����� ����� � ������� �������� ������� �����";
if($groupe != "0"){
 @mysql_query("UPDATE {$prefix_start}cat{$prefix_end} SET groupe='$groupe' where id='$cat_num'");
 @mysql_query("UPDATE {$prefix_start}cat{$prefix_end} SET status='2' where id='$cat_num'");
 }else{
 @mysql_query("UPDATE {$prefix_start}cat{$prefix_end} SET groupe='$groupe' where id='$cat_num'");
 @mysql_query("UPDATE {$prefix_start}cat{$prefix_end} SET status='1' where id='$cat_num'");
 }
 redirect2("admiiin.index.php?admini=cat&cat=controle");
}elseif($cat_num!="0" and $cat=="sprmem" and $fun==""){
$super = @mysql_query("select * from {$prefix_start}supervisor{$prefix_end} where reli='$cat_num' ");
if( @mysql_num_rows($super)>0){
?>

<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
���� �� ����� ��� ��� : <? echo $cat_num;?>
</td>
</tr>
<?
while($super_fetch = @mysql_fetch_array($super) ){
?>
<tr >
<td class="register" width="152px" height="28px"><center>�������</td>
<td class="regis" ><center>
<? 
member_inf($super_fetch["memberid"]);
?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>�����</td>
<td class="regis" ><center>
<a href="admiiin.index.php?admini=cat&idc=<? echo $cat_num ?>&cat=sprmem&fun=delet&sprmem=<? echo intval($super_fetch["memberid"]); ?>"><img title="��� �������" src="../<?echo $icons;?>delet.png"/></a> 
&nbsp;&nbsp;
<?if($super_fetch["status"] =="1" ){?>
<a href="admiiin.index.php?admini=cat&idc=<? echo $cat_num; ?>&cat=sprmem&fun=hide&sprmem=<? echo intval($super_fetch["memberid"]); ?>"><img title="����� �������" src="../<?echo $icons;?>hide.png"/></a> 
<?}elseif($super_fetch["status"] =="2" ){
?>
<a href="admiiin.index.php?admini=cat&idc=<? echo $cat_num; ?>&cat=sprmem&fun=unhide&sprmem=<? echo intval($super_fetch["memberid"]); ?>"><img title="����� �������" src="../<?echo $icons;?>unhide.png"/></a> 
<?
}?>&nbsp;&nbsp;
</td>
</tr>
<tr>
<?}

?>
</table>
<?
}else{
echo "�� ���� ������� �����";
}
}elseif($cat_num!="0" and $cat=="sprmem" and $fun=="delet" and $sprmem!="0"){
@mysql_query("DELETE FROM {$prefix_start}supervisor{$prefix_end} where reli='$cat_num' and memberid='$sprmem' ");
 @mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET level='1' where id='$sprmem'");
echo "�� ��� ������� �����<br /> ��� �� ����� ����� ��� ��� �����������";
 redirect2("admiiin.index.php?admini=cat&cat=controle");
}elseif($cat_num!="0" and $cat=="sprmem" and $fun=="hide" and $sprmem!="0"){
 @mysql_query("UPDATE {$prefix_start}supervisor{$prefix_end} SET status='2' where reli='$cat_num' and memberid='$sprmem'");

 echo "�� ����� ������� �����";
 redirect2("admiiin.index.php?admini=cat&cat=controle");
}elseif($cat_num!="0" and $cat=="sprmem" and $fun=="unhide" and $sprmem!="0"){
 
 @mysql_query("UPDATE {$prefix_start}supervisor{$prefix_end} SET status='1' where reli='$cat_num' and memberid='$sprmem'");
echo "�� ����� ������� �����";
 redirect2("admiiin.index.php?admini=cat&cat=controle");
}?>
<br/><br/><br/><br/><br/><br/>