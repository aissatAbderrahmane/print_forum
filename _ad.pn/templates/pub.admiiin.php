<?
#########PAGE ############
if($pg>=0 and $pub == "" and $topic == 0){
if($pg==0 or empty($pg)){
$limit="LIMIT 0,10";
}else{
$x = ($pg * 10);
$limit="LIMIT $x,$x";
}
$topico = $system->select($prefix_start."topic".$prefix_end,"*"," WHERE status ='3' ",$limit);
$nums_topic = $system->num($topico);

?>
<table width="65%" cellpadding="2" cellspacing="2" style="border:1px solid #999999;">
<tr >
<td class="register" height="28px" ><center>
ÇáØáÈ
</td>
<td class="register" height="28px"  ><center>
ÇáÎÕÇÆÕ
</td>
</tr>
<?
if($nums_topic>0){
while($fetch = @mysql_fetch_array($topico)){
?>
<tr >
<td class="regis" width="410px" height="28px"><center><?=$fetch["title"]?></td>
<td class="regis" ><center>
<a class="urlforum" href="admiiin.index.php?admini=pub&pub=accept&topic=<?=$fetch["id"]?>"><img title="ÇÚÏÇÏ ÇáÅÚáÇä" src="../<?echo $icons;?>unhide.png" /></a>
<a class="urlforum" href="admiiin.index.php?admini=pub&pub=refuse&topic=<?=$fetch["id"]?>"><img title="ÑİÖ ÇáØáÈ" src="../<?echo $icons;?>del.png" /></a>
</td>
</tr><?}
}else{?>
<tr >
<td class="regis"  height="28px" colspan="2"><center><font color="red"><b>áÇ íæÌÏ ØáÈÇÊ ÍÇáíÇ .</b></font></td>
</tr>
<?}?>
<?
if($nums_topic>=10){?>
<tr >
<td class="regis" colspan="2"><center>
<?@pg_adm("topics",20,"admiiin.index.php?admini=pub"," where status='3'");?>
</td>
</tr>
<?}?>
</table>
<?}elseif($pg==0 and $pub == "accept" and $topic > 0){?>
<form method="post" action="admiiin.index.php?admini=pub&pub=add&topic=<?=$topic;?>">
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
ÅÚÏÇÏ ÅÚáÇä ÌÏíÏ
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÑÇÈØ ÇáÅÚáÇä</td>
<td class="regis" ><center><input name="href_pub" size="30" value="topic<?=topic("id",$topic);?>.html"  disabled="disabled" />
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÕæÑÉ ÇáÅÚáÇä</td>
<td class="regis" ><center><input name="pub_img" size="30"/>
</td>
</tr><tr >
<td class="register" width="152px" height="28px"><center>ÊÇÑíÎ ÇáÅäÊåÇÁ</td>
<td class="regis" ><center>
<select name="pub_expire"   >
<option value="1" >ÈÚÏ íæã</option>
<option value="7" >ÈÚÏ ÃÓÈæÚ</option>
<option value="15">ÈÚÏ ÃÓÈæÚíä</option>
<option value="21">ÈÚÏ ËáÇË ÃÓÇÈíÚ</option>
<option value="30">ÈÚÏ ÔåÑ</option>
</select>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ãÑÈæØ ÈãæŞÚ</td>
<td class="regis" ><center>
<select name="site_pub"  >
<option value="1" >ÅÚáÇä İí ãäÊÏíÇÊ ÇáÚÇãÉ</option>
<option value="2">ÅÚáÇä İí ãäÊÏíÇÊ ÇáÑíÇÖíÉ</option>
<option value="3">ÅÚáÇä ÚÇã</option>
</select>
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÍÇáÉ ÇáÅÚáÇä</td>
<td class="regis" ><center>
<select name="status_pub"  >
<option value="1" >ãİÊæÍ ááÌãíÚ</option>
<option value="2"> ãÎİí Úä ÇáÒæÇÑ</option>
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
}elseif($pg==0 and $pub == "refuse" and $topic > 0){
$system->update($prefix_start."topic".$prefix_end," status='1' "," where id='".$topic."' ");
echo "Êã ÇáÑİÖ ÈäÌÇÍ";
redirect2("admiiin.index.php?admini=pub");
}elseif($pg==0 and $pub == "add" and $topic > 0){
	define("href","topic".$topic.".html");
	define("pimg",$system->_define_input("pub_img"));  
	define("expire",$system->_define_input("pub_expire")); 
	define("pstatus",$system->_define_input("status_pub")); 
	define("psite",$system->_define_input("site_pub"));
	if(href == "" or pimg == "" or expire == "" or pstatus == "" or psite == "" ){
		echo "Úáíß ãáÃ ÇáÈíÇäÇÊ ßãÇ íäÈÛí áÊÊã ÚãáíÉ ÇÖÇİÉ ÇáÅÚáÇä.";
	}else{
	$system->insert($prefix_start."publicitie".$prefix_end,"id,alt,href,src,date,expire,status","'','".psite."','".href."','".pimg."','".$date."','".expire."','".pstatus."'");
	$system->update($prefix_start."topic".$prefix_end," status='1' "," WHERE id='".$topic."' ");
	echo "Êã ÅÖÇİÉ ÇáÅÚáÇä ÈäÌÇÍ";
	}
redirect2("admiiin.index.php?admini=pub");
}else{
echo '<META http-equiv="refresh" content="0; URL=../islam.html" ></META>'; 
}
?>