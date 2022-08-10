<?
if(basename($_SERVER["REQUEST_URI"]) == "IEstyles_blue.php"){
header("HTTP/1.0 404 Not Found");
}else{
header("content-type: application/x-css");
?>
/*
 * PRINT FORUM V 0.1 
 * Powred By MR-O : Abdolahe Ibne Abdel hakime
 * Started At : 18/07/2011 , time -> 10:48
 */

 body{
  scrollbar-3dlight-color:#e0e0e0;
  scrollbar-arrow-color:#252525;
 scrollbar-base-color:#dad9d9;
  scrollbar-darkshadow-color:black;
   scrollbar-face-color:#989898;
  scrollbar-highlight-color:#dad9d9;
   scrollbar-shadow-color:#484646;
 text-decoration:none;
 font-family:arial,tahoma,courier;
 font-size:16px;
 color:black;
background:#FFFFFF;
margin:0px;
 }
 table.headere{
 margin:0px;
 }


div.web{
width:200px;
height:40px;
 text-decoration:none;
 font-family:tahoma,courier;
 font-size:12px;
 font-weight:bold;
 color:black;

text-align:left;
margin-right:755px;

}
.yes{
background-color:#FFFFFF;
border:1px solid #CCCCCC;
color:#0472EC;
font-family:arial;
font-size:15px;
font-weight:bold;
width:532px;
padding-top:3px;
height:24px;
text-align:center;margin-bottom:5px;
}
.error{
background-color:#F3F3F3;
width:500px;
 text-decoration:none;
 font-family:arabic transparent,courier;
 font-size:16px;
 font-weight:bold;
height:50px;
padding-top:13px;
color:#00B0DD;
border:1px solid #CACACA;
margin-bottom:5px;
}
td.header{
border:1px solid #292929;
background-image:url("images/style_image/header3.jpg") ;
background-repeat:repeat-x;
height:196px;

width:100%;
}
td.urlmheader{
border:1px solid #0081A8;
background-image:url("images/style_image/urlheader.jpg") ;
background-repeat:repeat-x;
height:39px;
width:100%;
}
img.header{
border-style:none;
}
td.publi{
color:#CACACA;
width:550px;
height:78px;
border:1px;
background:#FFFFFF;
border-style:solid;
border-color:#EBEBEB;
}
a.urlheader{
 text-decoration:none;
color:#f5f5f5;
font-family:tahoma;
font-size:14px;
}
a:hover.urlheader{
 text-decoration:none;
color:#222222;
font-family:tahoma;
font-size:14px;
}
img{
border-style:none;
}
td.cat{
text-decoration:none;
font-size:14px;
text-align:center;
height:28px;
background-image:url('images/style_image/input.jpg');
background-repeat:repeat-x;
color:#FCFCFC;
background-color:#10BCEB;
border:1px;
border-style:solid;
border-color:#E1E1E1;
}
td.forum{
text-decoration : none;
font-size:10px;
font-family:tahoma;
height:30px;
background-image:url('images/style_image/ca.jpg');
background-repeat:repeat-x;
color:white;
border:1px;
border-style:solid;
border-color:#00B8EA;

}
select{
width:67px;
text-decoration : none;
font-size:12px;
font-family:tahoma;
background-color:#F7F7F7;
color:#222222;
border:1px;
border-style:solid;
border-color:#CACACA;
}
font.tcat{
text-align:right;

}
td.message{
background-color:#EBEBEB;
font-size:12px;
font-family:tahoma;
color:#252525;
}
pre{
font-family:tahoma;
}
.buton{
color:#252525;
height:27px;
width:76px;
border:1px;
border-style:solid;
border-color:#252525;
background-color:#EBEBEB;
}
a.urlforum{
text-decoration:none;
color:#0098C4;
font-family:tahoma;
font-size:12px;
font-weight:bold;
}
a.url_spr,a.url_adm,a.url_mspr,a.url_mod,a.url_mem{
text-decoration:none;
font-family:tahoma;
font-size:12px;
font-weight:bold;
}
a.url_spr{
color:#EB8801;
}
a.url_adm{
color:#0472EC;
}
a.url_mspr{
color:#4DC72E;
}
a.url_mod{
color:#D70000;
}
a.url_mem{
color:#000000;
}
a:hover.urlforum,a:hover.url_mem,a:hover.url_spr,a:hover.url_adm,a:hover.url_mspr,a:hover.url_mod{
font-weight:bold;
text-decoration:none;
color:#333333;
font-family:tahoma;
font-size:12px;
}
a:hover.url_mem{
color:#FF0000;
}
td.info{
background-color:#F6F6F6;
color:#333333;
font-family:tahoma;
font-size:12px;
border:1px;
border-style:solid;
border-color:#EBEBEB;
text-align:center;

font-size:11px;
}
td.infos{
background-color:#FAFAFA;
color:#353535;
font-family:tahoma;
text-align:center;
font-size:11px;
border:1px;
border-style:solid;
border-color:#EBEBEB;
}
td.topictext{
direction:rtl;
background-color:#FAFAFA;
border:1px;
border-style:solid;
border-color:#EBEBEB;
}
td.infosf{
background-color:#FAFAFA;
color:#353535;
font-family:tahoma;
text-align:right;
font-size:11px;
border:1px;
border-style:solid;
border-color:#EBEBEB;
}
div.inftopic{
margin-left:5px;
margin-top:1px;
background-color:#FAFAFA;
color:#353535;
font-family:tahoma;
text-align:center;
float:left;
font-size:11px;
width:150px;
}
input{
background-color:#FFF;
border:1px;
border-style:solid;
border-color:#CACACA;
color:#454545;
font-family:tahoma;
font-size:12px;
font-weight:bold;

}
td.register{

font-family:tahoma;
font-size:12px;
font-weight:bold;
color:#FCFCFC;
background-color:#10BCEB;
border:1px;
border-style:solid;
border-color:#0098C4;

}
td.regis{
background-image:url('images/style_image/input.jpg');
background-repeat:repeat-x;
font-family:tahoma;
font-size:10px;
font-weight:bold;
color:#858585;
border:1px;
border-style:solid;
border-color:#E1E1E1;
}
td.message_ad{
background-color:#F4F4F4;
font-weight:bold;
font-size:12px;
font-family:tahoma;
color:#252525;
border:1px;
border-style:solid;
border-color:#888888;
}

td.forum_ad{
text-decoration : none;
font-weight:bold;
font-size:12px;
font-family:tahoma;
height:31px;
background-image:url('images/style_image/ca.jpg');
background-repeat:repeat-x;
color:white;
border:1px;
border-style:solid;
border-color:#888888;

}
table.admin{
margin-right:21px;
}
table.admin_text{
position:absolute;
left:50px;
top:500px;
}
table.admin_texte{
position:absolute;
left:50px;
top:166px;
}
a.url_admin{
text-decoration:none;
width:155px;
height:22px;
font-family:tahoma;
font-size:12px;
font-weight:bold;
color:#FCFCFC;
background-image:url('images/style_image/ca.jpg');
border:1px;
border-style:solid;
border-color:#0098C4;
margin-bottom:5px;
text-align:center;
}
a:hover.url_admin{
text-decoration:none;
width:155px;
text-align:center;
height:22px;
font-family:tahoma;
font-size:12px;
font-weight:bold;
color:#0098C4;
background-image:url('images/style_image/input.jpg');
border:1px;
border-style:solid;
border-color:#CACACA;
margin-bottom:5px;
}
a.page{
background-image:url("images/style_image/page.jpg") ;
background-repeat:repeat-x;
height:24px;
width:25px;
border:1px solid #B3B3B3;
text-decoration:none;
font-family:tahoma;
font-size:12px;
color:#252525;
text-align:center;
}
a:hover.page{
background-image:url("images/style_image/pghover.jpg") ;
background-repeat:repeat-x;
height:24px;
width:25px;
border:1px solid #005C89;
text-decoration:none;
font-family:tahoma;
font-size:12px;
color:#EBEBEB;
text-align:center;
}
a.inforum{
text-decoration:none;
width:55px;
height:22px;
font-family:tahoma;
font-size:12px;
font-weight:bold;
color:#FCFCFC;
background-image:url('images/style_image/ca.jpg');
border:1px;
border-style:solid;
border-color:#0098C4;
text-align:center;
margin-left:2px;
margin-bottom:5px;
}
a:hover.inforum{
margin-bottom:5px;
text-decoration:none;
margin-left:2px;
text-align:center;
height:22px;
font-family:tahoma;
font-size:12px;
font-weight:bold;
color:#0098C4;
background-image:url('images/style_image/input.jpg');
border:1px;
border-style:solid;
border-color:#CACACA;

}
/* IMAGE ROTATE ÕﬁÊﬁ „Õ›Êÿ… ·„Êﬁ⁄ √Ã‰»Ì  */
    div.rotators {
	height:78px;
	    margin-right:210px;
	margin-bottom:10px;
}

    div.rotator {
	position:relative;
	height:78px;
	display: none;
}
	div.rotator ul li {

	position:absolute;
	list-style: none;
}
	div.rotator ul li img {
	border:1px solid #ccc;
	background: #FFF;
}
    div.rotator ul li.show {
	z-index:500
}
/* END OF IMAGE ROTATE */
.imgpub{
width:550px;
height:78px;
}
div.usert{
background-image:url('images/style_image/urlheader.jpg');
background-repeat:repeat-x;
border:1px solid #0081A8;
position:absolute;
top:68px;
margin-right:708px;
width:241px;
height:22px;
font-family:tahoma;
font-size:12px;
font-weight:bold;
color:#40D5FF;
}
div.usert2{
background-image:url('images/style_image/urlheader.jpg');
background-repeat:repeat-x;
border:1px solid #0081A8;
position:absolute;
top:98px;
margin-right:708px;
width:241px;
height:22px;
font-family:tahoma;
font-size:12px;
font-weight:bold;
color:#40D5FF;
}
div.color{
position:absolute;
top:350px;
right:275px;
background-color:#D5E4EE;
width:500;
height:152px;
border:1px solid #BFD7E6;
}
img.close{
position:absolute;
top:10px;
right:10px;
border:none;
}
input.color{
background-color:#F8F8F8;
border:1px solid #E0E0E0;
position:absolute;
top:35px;
right:120px;
}
font.color{
position:absolute;
top:32px;
right:18px;
}
a.send{
position:absolute;
top:100px;
right:210px;
margin-left:2px;
margin-right:2px;
background-color:#F8F8F8;
border:1px solid #E0E0E0;
width:52px;
height:25px;
text-align:center;
text-decoration:none;
color:#252525;
font-family:tahoma,courier;
font-size:12px;
font-weight:bold;
padding:3px;
}
a.t{
position:absolute;
top:21px;
right:210px;
}
a:hover.send{
background-color:#D5E4EE;

border:1px solid #BFD7E6;
}
#topic{
width:100%;
background-color:#D8D8D8;
border:none;
direction:rtl;
}
fieldset{
border:1px solid #D0D0D0;
float:center;

}

a.editor{
margin-left:2px;
margin-right:2px;
background-color:#F8F8F8;
border:1px solid #E0E0E0;
width:26px;
height:26px;
padding:4px;

}
a:hover.editor{
background-color:#D5E4EE;

border:1px solid #BFD7E6;
width:26px;
height:26px;
padding:4px;

}
td.editor_regis{
font-family:tahoma;
font-size:10px;
font-weight:bold;
color:#858585;
border:1px;
border-style:solid;
border-color:#F4F4F4;
background-color:#F8F8F8;
}
.select{
background-color:#F8F8F8;
border:1px solid #E0E0E0;
width:120px;
padding:4px;
overflow:hidden;
margin-top:3px;
}
#Tforum{
padding-top:7px;
padding-bottom:7px;
float:right;
background-color:#F8F8F8;
border:1px solid #E0E0E0;
width:265px;
height:32px;
margin-right:8px;
margin-bottom:5px;
font-family:tahoma;
text-align:center;
font-size:12px;
font-weight:bold;
color:#858585;
}
#Tmember{
font-family:tahoma;
text-align:center;
font-size:12px;
font-weight:bold;
color:#858585;
/*padding-bottom:670px;*/
}
td.infospin{
background-color:#FEFEFE;
color:#353535;
font-family:tahoma;
text-align:right;
font-size:11px;
border:1px;
border-style:solid;
border-color:#EBEBEB;
}
<?}?>