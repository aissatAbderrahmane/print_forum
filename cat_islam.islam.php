<?

$query = @mysql_query("select * from {$prefix_start}cat{$prefix_end} where status='2' or status='4' or status='0' and groupe > '0'  ORDER BY id ASC");
while($fets = @mysql_fetch_array($query)){
$group = intval($fets['groupe']);
if(level_is() >= $group){
$forum_sqle = @mysql_query("select * from {$prefix_start}forum{$prefix_end} where cat='".intval($fets['id'])."' and status='2' or status='4' or status='0' and groupe>'0'  ORDER BY id ASC");
?>
<table  width="100%" cellpadding="0" cellspacing="0">
<tr>
<td   class="cat" >
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="<? echo protection($fets['icon']);?>" title="<? echo protection($fets['text']);?>" />
&nbsp;&nbsp;&nbsp;
<font class="tcat" face="tahoma" color="#13BCEA" size="2"><? echo $fets['title']; ?>
</td>
</tr>
<tr >
<td  class="forum">
<table  width="100%">
<tr>
<td width="40%">
<center><font face="tahoma" color="white" size="2">
ÇáãäÊÏì
</td>
<td width="13%" >
<center><font face="tahoma" color="white" size="2">
ÂÎÑ ãÔÇÑßÉ

</td>
<td width="7.5%" >
<center><font face="tahoma" color="white" size="2">
ÇáãæÇÖíÚ
</td>
<td width="7.5%" >
<center><font face="tahoma" color="white" size="2">
ÇáÑÏæÏ
</td>
<td width="32%" >
<center><font face="tahoma" color="white" size="2">
ÇáÅÏÇÑÉ
</td>
</tr>
</table>
</td>
</tr>
<?
if(@mysql_num_rows($forum_sqle)>0){
while($forum_fetche=@mysql_fetch_array($forum_sqle)){
$groupe_frm = intval($forum_fetche['groupe']);
if(level_is()>= $groupe_frm){
?>
<tr>
<td class="infos">
<table  width="100%">
<tr  height="38px">
<td class="infos"  width="7%">
<img src="<? echo protection($forum_fetche['icon']) ;?>"/>
</td>
<td class="infos" style="text-align:right;" width="33%">
<pre>
&nbsp;&nbsp;&nbsp;&nbsp;<a class="urlforum" href="forum<? echo intval($forum_fetche['id']) ;?>.html"><? echo protection($forum_fetche['title']) ;?></a>
&nbsp;&nbsp;<div style="width:100%;"><?=protection($forum_fetche['text']);?></div>
</pre>
</td>
<td class="infos" width="13%" >
<? @lastPost($forum_fetche['id']);?>
</td>
<td class="info" width="7.5%" >
<? echo intval($forum_fetche['topic']) ;?>
</td>
<td width="7.5%" class="info" >
<? echo intval($forum_fetche['post']) ;?>
</td>
<td  class="infos" width="32%" >
<table>
<tr height="10px" ><td >
<font face="tahoma" color="red" size="2">ÈãÑÇŞÈÉ : </font>
<font face="tahoma" color="#C0C0C0" size="2">
<? 
supervisor($fets["id"],"cat","");
if(supervisor($forum_fetche["id"],"forum","id")>0 and supervisor($fets["id"],"cat","id")>0){
echo "+"; supervisor($forum_fetche["id"],"forum","");
}elseif(supervisor($forum_fetche["id"],"forum","id")>0 and supervisor($fets["id"],"cat","id")<=0){
supervisor($forum_fetche["id"],"forum","");
}
?>
</td></tr>


<tr height="30px">
<td>
<font face="tahoma" color="222222" size="2">ÇáãÔÑİæä:
<?
$sql_moderatee = @mysql_query("SELECT * FROM {$prefix_start}forum_moderate{$prefix_end} where forumid='".intval($forum_fetche['id'])."' and status='1'  ORDER BY id ASC");

if (@mysql_num_rows($sql_moderatee)>0){
while($fetch_moderatore = @mysql_fetch_array($sql_moderatee)){
if(@mysql_num_rows($sql_moderatee) >1){
member_inf($fetch_moderatore["memberid"]) ;echo "+"; 
}else{
member_inf($fetch_moderatore["memberid"]);
}
}
}else{
echo"";
}
mysql_free_result($sql_moderatee);
?>
</td></tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
<?
}elseif(@mysql_num_rows($forum_sqle)<=0 and level_is() < $groupe_frm){
?>
<tr>
<td class="infos" height="35px"><center>
<font face="tahoma" color="222222" size="2">åÊå ÇáİÆÉ áÇ ÊÍÊæí Úáì ãäÊÏíÇÊ ÍÇáíÇ
</td>
</tr>
<?
}
}
}else{
?>
<tr>
<td class="infos" height="35px"><center>
<font face="tahoma" color="222222" size="2">åÊå ÇáİÆÉ áÇ ÊÍÊæí Úáì ãäÊÏíÇÊ ÍÇáíÇ
</td>
</tr>
<?
}
?>
</table>

<br />
<?
mysql_free_result($forum_sqle);
}
}
?>