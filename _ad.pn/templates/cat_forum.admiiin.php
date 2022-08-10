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
<td class="register" width="152px" height="28px"><center>־ױֶַױ Úַדֹ</td>
<td class="regis" ><center>  
<a href="admiiin.index.php?admini=cat&cat=add"><img title="ֵײַÝֹ Ýֶֹ ּֿםֹֿ" src="../<?echo $icons;?>Add.png"/></a>
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=cat&cat=corbeille"><img title="ÝֶַÊ דֽ׀זÝֹ" src="../<?echo $icons;?>dele.png"/></a>

</td>
</tr>
</table><br /><br />
<?
$sql = @mysql_query("select * from {$prefix_start}cat{$prefix_end} ORDER BY id ASC $limit");
while($fetch= mysql_fetch_array($sql)){?>
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
Êֽßד Ýם ַבÝֶַÊ
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ַבÝֶֹ</td>
<td class="regis" ><center><? echo protection($fetch['title']);?> &nbsp;&nbsp; || ׁÞד : <? echo intval($fetch['id']); ?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>דַׁÞָ ַבÝֶֹ</td>
<td class="regis" ><center>
<?
if(supervisor($fetch["id"],"cat","memberid")){
supervisor($fetch["id"],"cat","");
}else{
echo "װַÛׁ";
}
?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ַבÝֶֹ ÊÙוׁ ֵבל</td>
<td class="regis" ><center>
<?
if(intval($fetch['groupe']) == "0"){
echo "בבßב";
}elseif(intval($fetch['groupe']) == "14"){
echo "ַבדװׁÝזה";
}elseif(intval($fetch['groupe']) == "27"){
echo "בד׃ִזבם ַבÝֶֹ";
}elseif(intval($fetch['groupe']) == "55"){
echo "בבדַׁÞָםה";
}elseif(intval($fetch['groupe']) == "96"){
echo "בבדֱַֿׁ";
}

?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>Êֽßד Ýם ַבÝֶֹ</td>
<td class="regis" ><center>
<a href="admiiin.index.php?admini=cat&cat=forum&idc=<? echo intval($fetch['id']); ?>&forum=add"><img title="ֵײַÝֹ דהÊֿל ּֿםֿ בבÝֶֹ" src="../<?echo $icons;?>Add.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=cat&idc=<? echo intval($fetch['id']); ?>&cat=suprime"><img title="ֽ׀Ý ַבÝֶֹ" src="../<?echo $icons;?>delet.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=cat&idc=<? echo intval($fetch['id']); ?>&cat=hide"><img title="ֵ־Ýֱַ ַבÝֶֹ" src="../<?echo $icons;?>hide.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=cat&idc=<? echo intval($fetch['id']); ?>&cat=edit"><img title="ÊÚֿםב ַבÝֶֹ" src="../<?echo $icons;?>edit.png"/></a> 
<?
if(supervisor($fetch["id"],"cat","id") > 0){
?>
<a href="admiiin.index.php?admini=cat&idc=<? echo intval($fetch['id']); ?>&cat=sprmem"><img title="Êֽßד Ýם ַבדַׁÞָ" src="../<?echo $icons;?>super.png"/></a> 
<?
}else{
?>
<a href="admiiin.index.php?admini=cat&idc=<? echo intval($fetch['id']); ?>&cat=newsprmem"><img title="ֵײַÝֹ דַׁÞָ ּֿםֿ" src="../<?echo $icons;?>superadd.png"/></a> 

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
ֵײַÝֹ Ýֶֹ ּֿםֹֿ
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ַָׁ״ װÚַׁ ַבÝֶֹ</td>
<td class="regis" ><center><input type="text" name="icn_cat" size="30"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ַ׃ד ַבÝֶֹ</td>
<td class="regis" ><center><input type="text" name="tit_cat" size="30"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>דָׁז״ֹ ָדזÞÚ</td>
<td class="regis" ><center>
<select name="sit_cat"  >
<option value="1" >דהÊֿםַÊ ַבÚַדֹ</option>
<option value="2">דהÊֿםַÊ ַבׁםַײםֹ</option>
<option value="3">Ýֶֹ Úַדֹ</option>
<option value="4">Ýֶֹ ־ַױֹ</option>
</select>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÊÚׁםÝ ָ׃ם״ בבÝֶֹ</td>
<td class="regis" ><center><input type="text" name="txt_cat" size="30"/>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="ֵׁ׃ַב"/> &nbsp;&nbsp; <input class="buton" type="reset" value="ÊÝׁםÛ"/>

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
echo "םּׁל דבֳ ַבָםַהַÊ ßַדבֹ ¡ בֵֿ־ַב ַבÝֶֹ ßדַ םהָÛם";
redirect2("admiiin.index.php?admini=cat&cat=add");
}else{
 $system->insert("{$prefix_start}cat{$prefix_end}","","'','$cat_name','$cat_icn','0','$cat_site','0','0','$cat_txt','1','0'");
echo "Êד ֵײַÝֹ ַבÝֶֹ ָהַּֽ";
redirect2("admiiin.index.php?admini=cat&cat=add");
}
}elseif($cat=="forum" and $cat_num !="0" and  $forum=="add"){?>
<form method="post" action="admiiin.index.php?admini=cat&cat=forum&idc=<?echo $cat_num;?>&forum=new">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
ֵײַÝֹ דהÊֿל ּֿםֿ בבÝֶֹ ׁÞד : <? echo $cat_num;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ַָׁ״ ֳםÞזהֹ ַבדהÊֿל</td>
<td class="regis" ><center><input name="icn_frm" size="30"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ֵ׃ד ַבדהÊֿל</td>
<td class="regis" ><center><input name="tit_frm" size="30"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>דַׁÞָ ַבדהÊֿל</td>
<td class="regis" ><center><input name="spr_frm" size="30"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ַ־Êױַױ ַבדהÊֿל</td>
<td class="regis" ><center><input name="txt_frm" size="30"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>הזÚםֹ ַבדהÊֿל</td>
<td class="regis" ><center>
<select name="sts_frm">
<option value='0'>דÞÝזב</option>
<option value='1'>דÝÊזֽ</option>
<option value='2'>ד־Ýם</option>
<option value='3'>ד־Ýם ז דÞÝזב</option>
</select>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="ֵׁ׃ַב"/> &nbsp;&nbsp; <input class="buton" type="reset" value="ÊÝׁםÛ"/>

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
echo "םּׁל דבֳ ּדםÚ ַבָםַהַÊ ßדַ םהָÛם ¡ בםÊד \n
ֵײַÝֹ ַבדהÊֿל ָהַּֽ
";
redirect2("admiiin.index.php?admini=cat&cat=forum&idc=".$cat_num."&forum=add");
}else{
 @mysql_query("INSERT INTO {$prefix_start}forum{$prefix_end} VALUES ('','$tit_frm','$ic_frm','$spr_frm','$cat_num','0','0','$txt_frm','$sts_frm','0')");
echo "Êד ֵײַÝֹ ַבדהÊֿל ָהַּֽ";
redirect2("admiiin.index.php?admini=cat&cat=controle");
}
}elseif($cat_num !="0" and $cat=="suprime"  ){
@mysql_query("INSERT INTO {$prefix_start}cat_deleted{$prefix_end} select * from {$prefix_start}cat{$prefix_end} where id='$cat_num'");
@mysql_query("DELETE FROM {$prefix_start}cat{$prefix_end} where id='$cat_num'");
echo "Êד הÞב ַבÝֶֹ בּֿזב ַבדֽ׀זÝַÊ ָהַּֽ";
redirect2("admiiin.index.php?admini=cat&cat=controle");
}elseif($cat=="corbeille"){
echo"דבַֽÙֹ : וÊו ום ַבÝֶַÊ ַבדזּזֹֿ Ýם ּֿזב ַבדֽ׀זÝַÊ ָßב ַבָםַהַÊ ַבֳ־םֹׁ ";
$sql_delcat= @mysql_query("select * from {$prefix_start}cat_deleted{$prefix_end}");
if(@mysql_num_rows($sql_delcat)){
while($fetch=@mysql_fetch_array($sql_delcat)){
?>
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
Êֽßד Ýם ַבÝֶַÊ
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ַבÝֶֹ</td>
<td class="regis" ><center><? echo protection($fetch['title']);?> &nbsp;&nbsp; || ׁÞד : <? echo intval($fetch['id']); ?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>דַׁÞָ ַבÝֶֹ</td>
<td class="regis" ><center>
<?
if(supervisor($fetch["id"],"cat","memberid")){
supervisor($fetch["id"],"cat","");
}else{
echo "װַÛׁ";
}
?>
?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>Êֽßד Ýם ַבÝֶֹ</td>
<td class="regis" ><center>
<a href="admiiin.index.php?admini=cat&cat=revi&idc=<? echo intval($fetch['id']); ?>"><img title="ֵÚַֹֿ ַבÝֶֹ דה ּֿזב ַבדֽ׀זÝַÊ" src="../<?echo $icons;?>ret.png"/></a> 
&nbsp;&nbsp;
<a href="admiiin.index.php?admini=cat&idc=<? echo intval($fetch['id']); ?>&cat=delecteds"><img title="ֽ׀Ý הוֶַם בבÝֶֹ" src="../<?echo $icons;?>false.png"/></a> 
&nbsp;&nbsp; 
</td>
</tr>

</table><br /><br />
<?
}}else{
echo "<br />
<br />בַ Êזּֿ ÝֶַÊ Ýם דּבֿ ַבדֽ׀זÝַÊ בבÝֶַÊ";
}
}elseif($cat=="delecteds" and $cat_num!="0"){
@mysql_query("DELETE FROM {$prefix_start}cat_deleted{$prefix_end} where id='$cat_num'");
echo "Êד ֽ׀Ý ַבÝֶֹ הוֶַםַ ָהַּֽ";
redirect2("admiiin.index.php?admini=cat&cat=corbeille");
}elseif($cat_num!="0" and $cat=="newsprmem" and $fun=="" and $forum==""){
?>
<form method="post" action="admiiin.index.php?admini=cat&idc=<?echo $cat_num;?>&cat=setsprmem">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
ֵײַÝֹ דַׁÞָ ּֿםֿ בבÝֶֹ ׁÞד : <? echo $catnum;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ׁÞד ַבדַׁÞָ</td>
<td class="regis" ><center>
<input name="memberid"/>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="ֵׁ׃ַב"/> &nbsp;&nbsp; <input class="buton" type="reset" value="ÊÝׁםÛ"/>

</td>
</tr>
</table>
</form>

<?
}elseif($cat_num!="0" and $cat=="setsprmem" and $fun=="" ){
$memberid=intval($_POST["memberid"]);
if(empty($memberid)){
echo "בד ÊÞד ַָײַÝֹ ׁÞד ַבדַׁÞָ";
redirect2("admiiin.index.php?admini=cat&idc=$cat_num&cat=newsprmem");
}else{
if(member($memberid,"level") == "96"){
echo "בַ םדßה ַײַÝֹ ו׀ַ ַבÚײז דַׁÞָ בֳה ׁÊָÊו ÊÝזÞ ׁÊָֹ דַׁÞָ";
redirect2("admiiin.index.php?admini=cat&idc=$cat_num&cat=newsprmem");
}else{
 @mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET level='55' where id='$memberid'");
 @mysql_query("INSERT INTO {$prefix_start}supervisor{$prefix_end} VALUES('','$cat_num','$memberid','0','1')");
echo "Êד ַײַÝֹ ַבדַׁÞָ ַבּֿםֿ ָהַּֽ";
redirect2("admiiin.index.php?admini=cat&cat=controle");
}
}
}elseif($cat=="revi" and $cat_num!="0"){
@mysql_query("INSERT INTO {$prefix_start}cat{$prefix_end} select * from {$prefix_start}cat_deleted{$prefix_end} where id='$cat_num'");
@mysql_query("DELETE FROM {$prefix_start}cat_deleted{$prefix_end} where id='$cat_num'");
echo "ÊÊד ֵֽםֱַ ַבÝֶֹ ָהַּֽ";
redirect2("admiiin.index.php?admini=cat&cat=corbeille");

}elseif($cat_num!="0" and $cat=="edit"){
$sql_edit = @mysql_query("select * from {$prefix_start}cat{$prefix_end} where id='$cat_num'");
$fetch_edit = @mysql_fetch_array($sql_edit);
?>
<form method="post" action="admiiin.index.php?admini=cat&idc=<? echo $cat_num;?>&cat=setedit">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
ÊÚֿםב Ýֶֹ ׁÞד : <? echo $cat_num;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ֵ׃ד ַבÝֶֹ</td>
<td class="regis" ><center>
<input name="cat_name" value="<? echo protection($fetch_edit["title"]) ;?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ֳםÞזהֹ ַבÝֶֹ</td>
<td class="regis" ><center>
<input name="cat_icon" value="<? echo protection($fetch_edit["icon"]) ;?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>Úֿֿ ֿׁזֿ</td>
<td class="regis" ><center>
<input name="cat_post" value="<? echo intval($fetch_edit["post"]) ;?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>Úֿֿ דזַײםÚ</td>
<td class="regis" ><center>
<input name="cat_topic" value="<? echo intval($fetch_edit["topic"]) ;?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ׁÞד ַבדַׁÞָ</td>
<td class="regis" ><center>
<input name="cat_membersup" value="<? echo supervisor($cat_num,"cat","memberid") ;?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ַבדזÞÚ ַבדָׁז״ֹ ָו</td>
<td class="regis" ><center>
<input name="cat_site" value="<? echo intval($fetch_edit["site"]) ;?>"/>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ַֽבֹ ַבÝֶֹ</td>
<td class="regis" ><center>
<select name="cat_status" >
<option value="1">דÝÊזֹֽ</option>
<option value="2">ד־Ýםֹ</option>
<option value="3">דÞÝבֹ</option>
<option value="4">ד־Ýםֹ & דÞÝבֹ</option>
</select>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÊÚׁםÝ Úה ַבÝֶֹ</td>
<td class="regis" ><center>
<input name="cat_text" value="<? echo protection($fetch_edit["text"]) ;?>"/>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="ֵׁ׃ַב"/> &nbsp;&nbsp; <input class="buton" type="reset" value="ÊÝׁםÛ"/>

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
echo "בד םÊד ÊÚֿםב ַבÝֶֹ ¡ ַב׃ָָ:<br />
ׁÞד ַבÚײז ַב׀ם ֳײÝÊו ׁÊָÊו ֳßָׁ דה דַׁÞָ
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
echo "Êד ÊÚֿםב Úבל ָםהַÊ ַבÝֶֹ ָהַּֽ";
 redirect2("admiiin.index.php?admini=cat&cat=controle");
}



}elseif($cat_num!="0" and $cat=="hide"){
?>
<form method="post" action="admiiin.index.php?admini=cat&idc=<?echo $cat_num;?>&cat=hideit">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
ֵ־Ýֱַ Ýֶֹ ׁÞד : <? echo $cat_num;?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ַבÝֶֹ ÊÙוׁ בדּזÚֹ</td>
<td class="regis" ><center>
<select name="membn">
<option value="14">דװׁÝזה</option>
<option value="27">ד׃ִזבזַ Ýֶֹ</option>
<option value="55">דַׁÞָזה</option>
<option value="96">דֱַֿׁ</option>
<option value="0">בבßב</option>
</select>
</td>
</tr>
<tr >
<td class="register" colspan="2" ><center>
<input class="buton" type="submit" value="ֵׁ׃ַב"/> &nbsp;&nbsp; <input class="buton" type="reset" value="ÊÝׁםÛ"/>

</td>
</tr>
</table></form>
<?
}elseif($cat_num!="0" and $cat=="hideit"){
$groupe = intval($_POST['membn']); 
echo "Êד ַ־Ýֱַ ַבÝֶֹ ז ַÙוַׁוַ בבדּדזÚֹ ַבדֹֽֿֿ ָהַּֽ";
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
Êֽßד Ýם דַׁÞָ Ýֶֹ ׁÞד : <? echo $cat_num;?>
</td>
</tr>
<?
while($super_fetch = @mysql_fetch_array($super) ){
?>
<tr >
<td class="register" width="152px" height="28px"><center>ַבדַׁÞָ</td>
<td class="regis" ><center>
<? 
member_inf($super_fetch["memberid"]);
?>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>־ױֶַױ</td>
<td class="regis" ><center>
<a href="admiiin.index.php?admini=cat&idc=<? echo $cat_num ?>&cat=sprmem&fun=delet&sprmem=<? echo intval($super_fetch["memberid"]); ?>"><img title="ֽ׀Ý ַבדַׁÞָ" src="../<?echo $icons;?>delet.png"/></a> 
&nbsp;&nbsp;
<?if($super_fetch["status"] =="1" ){?>
<a href="admiiin.index.php?admini=cat&idc=<? echo $cat_num; ?>&cat=sprmem&fun=hide&sprmem=<? echo intval($super_fetch["memberid"]); ?>"><img title="ֵ־Ýֱַ ַבדַׁÞָ" src="../<?echo $icons;?>hide.png"/></a> 
<?}elseif($super_fetch["status"] =="2" ){
?>
<a href="admiiin.index.php?admini=cat&idc=<? echo $cat_num; ?>&cat=sprmem&fun=unhide&sprmem=<? echo intval($super_fetch["memberid"]); ?>"><img title="ֵÙוַׁ ַבדַׁÞָ" src="../<?echo $icons;?>unhide.png"/></a> 
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
echo "בַ םזּֿ דַׁÞָםה ַֽבםַ";
}
}elseif($cat_num!="0" and $cat=="sprmem" and $fun=="delet" and $sprmem!="0"){
@mysql_query("DELETE FROM {$prefix_start}supervisor{$prefix_end} where reli='$cat_num' and memberid='$sprmem' ");
 @mysql_query("UPDATE {$prefix_start}members{$prefix_end} SET level='1' where id='$sprmem'");
echo "Êד ֽ׀Ý ַבדַׁÞָ ָהַּֽ<br /> ßדַ Êד ַÚַֹֿ ׁÊָÊו ֵבל Úײז ֳזÊזדַÊםßםַ";
 redirect2("admiiin.index.php?admini=cat&cat=controle");
}elseif($cat_num!="0" and $cat=="sprmem" and $fun=="hide" and $sprmem!="0"){
 @mysql_query("UPDATE {$prefix_start}supervisor{$prefix_end} SET status='2' where reli='$cat_num' and memberid='$sprmem'");

 echo "Êד ַ־Ýֱַ ַבדַׁÞָ ָהַּֽ";
 redirect2("admiiin.index.php?admini=cat&cat=controle");
}elseif($cat_num!="0" and $cat=="sprmem" and $fun=="unhide" and $sprmem!="0"){
 
 @mysql_query("UPDATE {$prefix_start}supervisor{$prefix_end} SET status='1' where reli='$cat_num' and memberid='$sprmem'");
echo "Êד ַÙוַׁ ַבדַׁÞָ ָהַּֽ";
 redirect2("admiiin.index.php?admini=cat&cat=controle");
}?>
<br/><br/><br/><br/><br/><br/>