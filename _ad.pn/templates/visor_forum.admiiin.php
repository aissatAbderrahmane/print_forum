<?
#########PAGE ############
if($pg==0 or empty($pg)){
$limit="LIMIT 0,20";
}else{
$x = ($pg * 20);
$limit="LIMIT $x,$x";
}

##########END PAGE#########
$select_vis= @mysql_query("select * from {$prefix_start}members{$prefix_end} where level >'13' ORDER BY id ASC $limit");
?>
<table width="65%" cellpadding="2" cellspacing="2" style="border:1px solid #999999;">
<tr >
<td class="register" height="28px" ><center>
ÇáÚÖæíÉ
</td>
<td class="register" height="28px"  ><center>
ÇáÎÕÇÆÕ
</td>
</tr>
<?
while($fetch_vis = @mysql_fetch_array($select_vis)){
/*
?>

<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="regis" height="28px" colspan="2" ><center>
ÈÑäÇãÌ ÇáãÑÇŞÈÉ áäÔÇØ ÇáÌÏíÏ áÜ <?=member_inf($fetch_vis["id"]);?>
</td>
</tr>
<tr >
<td class="register"  ><center>
ÇáäÔÇØ
</td>
<td class="register"  ><center>
ÇáÎÕÇÆÕ
</td>
</tr>
<?
/*<?
if(@mysql_num_rows($select_v)>5){?>
<tr >
<td class="regis" colspan="2" height="28px"><center>
<?@pg_adm("viseadmin",5,"admiiin.index.php?admiiin=visorf");?></td>
</tr><?}?>
$select_v= @mysql_query("select * from {$prefix_start}viseadmin{$prefix_end} where memberid='".intval($fetch_vis["id"])."' ORDER BY id DESC,date DESC,time DESC $limit");

if(@mysql_num_rows($select_v)>0 OR @mysql_num_rows($select_v)>5){
while($fetch_v = @mysql_fetch_array($select_v)){?>
<tr >
<td class="regis" width="210px" height="28px"><center><?=$fetch_v["txt"];?></td>
<td class="regis" ><center>
<a class="urlforum" href="index"><img title="ÇÖÇİÉ äŞÇØ áÑÕíÏ äÔÇØ ÇáÚÖæ" src="../edicons/php/plus.png" /></a>
<a class="urlforum" href="index"><img title="ÍĞİ äŞÇØ ãä ÑÕíÏ  äÔÇØ ÇáÚÖæ" src="../edicons/php/minus.png" /></a>
<a class="urlforum" href="index"><img title="ÍĞİ åĞÇ ÇáäÔÇØ" src="../<?echo $icons;?>dele.png" /></a>
</td>
</tr>
<?}
echo'<tr >
<td class="regis" colspan="2" height="28px"><center>';
@pg_adm("viseadmin",5,$fetch_vis["id"],"admiiin.index.php?admini=vismem");
echo"&nbsp;</td>
</tr>";
}else{?>
<tr >
<td class="regis" colspan="2" height="28px"><center><FONT COLOR="RED">áÇ íæÌÏ äÔÇØ áåÏÇ ÇáÚÖæ ÍÇáíÇ</FONT></td>
</tr>
<?}?>
</table><hr /><?}?>

<?@pg_adm("members",5,0,"admiiin.index.php?admini=visorf");?>

<?/*
<table width="65%" cellpadding="2" cellspacing="2">
<tr >
<td class="register" colspan="2" ><center>
ÈÑäÇãÌ ÇáãÑÇŞÈÉ 
</td>
</tr>
<tr >
<td class="register" width="152px" height="28px"><center>ÇáİÆÉ</td>
<td class="regis" ><center><? echo protection($fetch['title']);?> &nbsp;&nbsp; || ÑŞã : <? echo intval($fetch['id']); ?>
</td>
</tr>
</table>

*/
?>

<tr >
<td class="regis" width="210px" height="28px"><center><?=member_inf($fetch_vis["id"]);?></td>
<td class="regis" ><center>
<a class="urlforum" href="index"><img title="ÇÖÇİÉ äŞÇØ áÑÕíÏ äÔÇØ ÇáÚÖæ" src="../edicons/php/plus.png" /></a>
<a class="urlforum" href="index"><img title="ÍĞİ äŞÇØ ãä ÑÕíÏ  äÔÇØ ÇáÚÖæ" src="../edicons/php/minus.png" /></a>
<a class="urlforum" href="index"><img title="ÍĞİ åĞÇ ÇáäÔÇØ" src="../<?echo $icons;?>dele.png" /></a>
</td>
</tr>

<?}?>
<?if(@mysql_num_rows($select_vis)>=20){?>
<tr >
<td class="regis" colspan="2"><center>&nbsp;
<?@pg_adm("members",20,"admiiin.index.php?admini=visorf");?>
</td>
</tr>
<?}?>
</table>