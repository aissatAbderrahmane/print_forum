var TabA ;
var IE  = window.ActiveXObject ? true : false; 
var MOZ = window.sidebar       ? true : false;
var isEditable= false;
var ht = document.getElementsByTagName("html")[0];
var a = document.createElement("a");
var Memberalign,Memberfont , Membercolor, Memberbold, Memberitalic , Memberunderlign, Memberfontsize, MenusN , TopicTy;
function displayEditor(editor, txt, width, height)
{

       if (document.getElementById && isEditable==false) 
       {
                  isEditable= true;
        }
       if(isEditable)
       {
                document.write('<iframe  id="' + editor + '" name="' + editor + '" width="' + width + 'px" height="' + height + 'px"></iframe>');
                designer(editor, txt);
				}

 }

function designer(editor, txt) 
{
      var edit = '';
	  
	 edit = window.frames[editor].document; 

	edit.designMode = "On" ;
	edit.open();
      edit.write(txt);
      edit.close();
      edit.body.setAttribute("dir","rtl");	  
	  editorCommand(editor, 'justify'+Memberalign, '');
	  editorCommand(editor, 'FontSize', Memberfontsize);
      editorCommand(editor, 'Fontname', Memberfont);
	  editorCommand(editor, 'ForeColor', Membercolor);
 if(Memberbold)  editorCommand(editor, 'bold', '');
 if(Memberitalic)  editorCommand(editor, 'italic', '');
 if(Memberunderlign)  editorCommand(editor, 'underlign', '');
 }
 function dir(editor ,dr){
 var edDir ;
 	 if(IE)  edDir = window.frames[editor].document; 
    if(MOZ) edDir = document.getElementById(editor).contentDocument;
 edDir.body.setAttribute("dir",dr);
 }
function editorCommand(editor, command, option)
{
var txtarea ;
	 if(IE)  txtarea = window.frames[editor].document; 
    if(MOZ)  txtarea = document.getElementById(editor).contentDocument;
          txtarea.execCommand(command, false, option);
          txtarea.focus();
 }
function InsertImage(editor, scr){
var bodyEditor;
   var Img = document.createElement("img");
   Img.src = scr ;
	 if(IE)  bodyEditor = window.frames[editor].document.body; 
    if(MOZ)  bodyEditor = document.getElementById(editor).contentDocument.body;
	bodyEditor.appendChild(Img);
	a.onclick();
}

function sendvalue(editor,ix) 
{ 
var edoc ;
    if(IE)  edoc = window.frames[editor].document; 
    if(MOZ) edoc = document.getElementById(editor).contentDocument; 
    document.getElementById(ix).value = edoc.body.innerHTML; 
	
}
function CofiRm(ed,id){
var conf = confirm("Â· √‰  „ √ﬂœ „‰ «·‰’ «·–Ì  —Ìœ ≈÷«› Â ø");
var FOrm = document.getElementById("FormTopic");
if(conf){
sendvalue(ed,id);
FOrm.submit() ;
}else{
return 0;
}
}
function color(){
var color = prompt("Ì—ÃÏ ﬂ «»… ﬂÊœ «··Ê‰ »‘ﬂ· ’ÕÌÕ .");
var regex_color = /^\#[a-zA-Z0-9]/;
if(regex_color.test(color) == "" || color.length != 7 ){
alert("√‰   Õ «Ã ·ﬂ «»… ﬂÊœ «··Ê‰ »‘ﬂ· ’ÕÌÕ");
}else{
return editorCommand('topic', 'ForeColor',color);
}
}

function createtable(editor){
		                var row_val = document.getElementsByName("rows")[0].value;
		                var cell_val = document.getElementsByName("cells")[0].value;
		                var back_val = document.getElementsByName("backtab")[0].value;
		                var border_stylxe = document.getElementsByName("border_style")[0].value;
		                var border_size =  document.getElementsByName("bordersize")[0].value;
		                var border_color =  document.getElementsByName("bordercolor")[0].value;
		                var boregexcolor = /^\#[a-zA-Z0-9]/ ;
					  var regexi = /^[0-9]/ ;
		                var cell_pading =  document.getElementsByName("cellpading")[0].value;
		                var cell_spacing =  document.getElementsByName("cellspacing")[0].value;
if( boregexcolor.test(border_color) =="" || border_color.length != 7 || back_val =="" || regexi.test(row_val) =="" || regexi.test(cell_val) ==""  || regexi.test(border_size) =="" || regexi.test(cell_spacing) ==""  || regexi.test(cell_pading) =="" ){
alert(" Œÿ√ ›Ì «·ﬁÌ„… .");
}else{
	 if(IE)  wybod = window.frames[editor].document.body; 
    if(MOZ) wybod = document.getElementById(editor).contentDocument.body;
          var table = document.createElement("table");
          var tbody = document.createElement("tbody");
		             for (var r=1; r <= row_val; r++){
					            var row = document.createElement("tr");
					          for(var c=1; c <= cell_val; c++){
							            var cell = document.createElement("td");
							           cell.innerHTML = "&nbsp;";
									   cell.style.border= border_size+" "+border_stylxe+" "+border_color ;
									   row.appendChild(cell);
									  
							  }
							  tbody.appendChild(row);
					 } 
             table.appendChild(tbody);
               wybod.appendChild(table);
			  table.setAttribute("cellpading",cell_pading);
			  table.setAttribute("cellspacing",cell_spacing);
			  }
			  
table.style.background = back_val;
table.style.border= border_size+" "+border_stylxe+" "+border_color ;
TabA = true ;
}
function appendtext(editor,txt){
var body_text ;
    if(IE)  body_text = window.frames[editor].document.body; 
    if(MOZ) body_text = document.getElementById(editor).contentDocument.body; 
    var textnode = document.createTextNode(txt);
    body_text.appendChild(textnode);
a.onclick();
}


function showSmilleDiv(editor){

return '<center><br /><a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/plus.png\');" class="editor"><img src=\'edicons/smille/plus.png\'/></a>'+
 '<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/close.png\');" class="editor"><img src=\'edicons/smille/close.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/infoo.png\');" class="editor"><img src=\'edicons/smille/infoo.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/minus.png\');" class="editor"><img src=\'edicons/smille/minus.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/question.png\');" class="editor"><img src=\'edicons/smille/question.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley.png\');" class="editor"><img src=\'edicons/smille/smiley.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-confuse.png\');" class="editor"><img src=\'edicons/smille/smiley-confuse.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-cool.png\');" class="editor"><img src=\'edicons/smille/smiley-cool.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-cry.png\');" class="editor"><img src=\'edicons/smille/smiley-cry.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-draw.png\');" class="editor"><img src=\'edicons/smille/smiley-draw.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-slim.png\');" class="editor"><img src=\'edicons/smille/smiley-slim.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-small.png\');" class="editor"><img src=\'edicons/smille/smiley-small.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-surprise.png\');" class="editor"><img src=\'edicons/smille/smiley-surprise.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/snowman-hat.png\');" class="editor"><img src=\'edicons/smille/snowman-hat.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/tick.png\');" class="editor"><img src=\'edicons/smille/tick.png\'/></a>'+
'<br />'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-eek.png\');" class="editor"><img src=\'edicons/smille/smiley-eek.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-eek-blue.png\');" class="editor"><img src=\'edicons/smille/smiley-eek-blue.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-evil.png\');" class="editor"><img src=\'edicons/smille/smiley-evil.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-fat.png\');" class="editor"><img src=\'edicons/smille/smiley-fat.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-grin.png\');" class="editor"><img src=\'edicons/smille/smiley-grin.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-kiss.png\');" class="editor"><img src=\'edicons/smille/smiley-kiss.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-kitty.png\');" class="editor"><img src=\'edicons/smille/smiley-kitty.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-lol.png\');" class="editor"><img src=\'edicons/smille/smiley-lol.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-mad.png\');" class="editor"><img src=\'edicons/smille/smiley-mad.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-money.png\');" class="editor"><img src=\'edicons/smille/smiley-money.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-sweat.png\');" class="editor"><img src=\'edicons/smille/smiley-sweat.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-twist.png\');" class="editor"><img src=\'edicons/smille/smiley-twist.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-yell.png\');" class="editor"><img src=\'edicons/smille/smiley-yell.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/socket.png\');" class="editor"><img src=\'edicons/smille/socket.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/system-monitor.png\');" class="editor"><img src=\'edicons/smille/system-monitor.png\'/></a>'+
'<br />'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-mr-green.png\');" class="editor"><img src=\'edicons/smille/smiley-mr-green.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-neutral.png\');" class="editor"><img src=\'edicons/smille/smiley-neutral.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-razz.png\');" class="editor"><img src=\'edicons/smille/smiley-razz.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-red.png\');" class="editor"><img src=\'edicons/smille/smiley-red.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-roll.png\');" class="editor"><img src=\'edicons/smille/smiley-roll.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-roll-blue.png\');" class="editor"><img src=\'edicons/smille/smiley-roll-blue.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-roll-sweat.png\');" class="editor"><img src=\'edicons/smille/smiley-roll-sweat.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-sad.png\');" class="editor"><img src=\'edicons/smille/smiley-sad.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-sad-blue.png\');" class="editor"><img src=\'edicons/smille/smiley-sad-blue.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-sleep.png\');" class="editor"><img src=\'edicons/smille/smiley-sleep.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-wink.png\');" class="editor"><img src=\'edicons/smille/smiley-wink.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/smiley-zipper.png\');" class="editor"><img src=\'edicons/smille/smiley-zipper.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/snowman.png\');" class="editor"><img src=\'edicons/smille/snowman.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/sofa.png\');" class="editor"><img src=\'edicons/smille/sofa.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/switch.png\');" class="editor"><img src=\'edicons/smille/switch.png\'/></a>'+
'<br />'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/target.png\');" class="editor"><img src=\'edicons/smille/target.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/television.png\');" class="editor"><img src=\'edicons/smille/television.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/terminal.png\');" class="editor"><img src=\'edicons/smille/terminal.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/thumb.png\');" class="editor"><img src=\'edicons/smille/thumb.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/thumb-up.png\');" class="editor"><img src=\'edicons/smille/thumb-up.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/toilet.png\');" class="editor"><img src=\'edicons/smille/toilet.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/toilet-female.png\');" class="editor"><img src=\'edicons/smille/toilet-female.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/toilet-male.png\');" class="editor"><img src=\'edicons/smille/toilet-male.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/trophy.png\');" class="editor"><img src=\'edicons/smille/trophy.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/trophy-bronze.png\');" class="editor"><img src=\'edicons/smille/trophy-bronze.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/trophy-silver.png\');" class="editor"><img src=\'edicons/smille/trophy-silver.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/truck.png\');" class="editor"><img src=\'edicons/smille/truck.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/t-shirt.png\');" class="editor"><img src=\'edicons/smille/t-shirt.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/t-shirt-gray.png\');" class="editor"><img src=\'edicons/smille/t-shirt-gray.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/umbrella.png\');" class="editor"><img src=\'edicons/smille/umbrella.png\'/></a>'+
'<br />'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/user.png\');" class="editor"><img src=\'edicons/smille/user.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/user-black.png\');" class="editor"><img src=\'edicons/smille/user-black.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/user-black-female.png\');" class="editor"><img src=\'edicons/smille/user-black-female.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/user-business-boss.png\');" class="editor"><img src=\'edicons/smille/user-business-boss.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/user-detective.png\');" class="editor"><img src=\'edicons/smille/user-detective.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/users.png\');" class="editor"><img src=\'edicons/smille/users.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/user-silhouette.png\');" class="editor"><img src=\'edicons/smille/user-silhouette.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/user-silhouette-question.png\');" class="editor"><img src=\'edicons/smille/user-silhouette-question.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/user-thief.png\');" class="editor"><img src=\'edicons/smille/user-thief.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/water.png\');" class="editor"><img src=\'edicons/smille/water.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/weather-cloud.png\');" class="editor"><img src=\'edicons/smille/weather-cloud.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/weather-clouds.png\');" class="editor"><img src=\'edicons/smille/weather-clouds.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/weather-cloudy.png\');" class="editor"><img src=\'edicons/smille/weather-cloudy.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/weather-fog.png\');" class="editor"><img src=\'edicons/smille/weather-fog.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/weather-lightning.png\');" class="editor"><img src=\'edicons/smille/weather-lightning.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/weather-rain.png\');" class="editor"><img src=\'edicons/smille/weather-rain.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/weather-snow.png\');" class="editor"><img src=\'edicons/smille/weather-snow.png\'/></a>'+
'<a href="javascript:InsertImage(\''+editor+'\',\'edicons/smille/webcam.png\');" class="editor"><img src=\'edicons/smille/webcam.png\'/></a>';
var bot ;
    if(IE)  bot = document.getElementById(editor).contentWindow.document; 
    if(MOZ) bot = document.getElementById(editor).contentDocument; 
 var body = document.getElementsByTagName("body")[0];
 var PrintForum = document.getElementById("printForum");
 body.appendChild(divx);
 
 var bodyC = document.getElementById("closetabwind");
 PrintForum.onmouseover = function (){
 PrintForum.onclick = function (){
 divx.removeNode(true);
 };
  bot.body.onclick = function (){
 divx.removeNode(true);
 };

 };

 
 bodyC.onclick = function (){
 divx.removeNode(true);
 }

}


function showTableDiv(editor){
return '<table width="678px" align="center">'+
'<tr >'+
'<td class="register" colspan="2" height="28px"><center>ÃœÊ· ÃœÌœ</td></tr>'+
'<tr >'+
'<td class="register"  height="28px"><center>⁄œœ «·ÕﬁÊ· : </td>'+
'<td class="regis"  height="28px"><center><input name="rows" size="55"/></td>'+
'</tr>'+
'<tr >'+
'<td class="register"  height="28px"><center>⁄œœ «·√”ÿ— : </td>'+
'<td class="regis"  height="28px"><center><input name="cells" size="55"/></td>'+
'</tr>'+
'<tr >'+
'<td class="register" colspan="2" height="28px"><center>«·” «Ì·</td></tr>'+
'<tr >'+
'<td class="register"  height="28px"><center>·Ê‰ «·Œ·›Ì…  : </td>'+
'<td class="regis"  height="28px"><center><input name="backtab" size="55"/></td>'+
'</tr>'+
'<tr >'+
'<td class="register"  height="28px"><center>” «Ì· «·Õ«‘Ì…  : </td>'+
'<td class="regis"  height="28px"><center>'+
'<select name=\'border_style\'>'+
'<option value=\'none\'>none</option>'+
'<option value="dotted" >dotted</option>'+
'<option value="dashed">dashed</option>'+
'<option value="solid">solid</option>'+
'<option value="double">double</option>'+
'<option value="dot-dash">dot-dash</option>'+
'<option value="groove">groove</option>'+
'<option value="ridge">ridge</option>'+
'<option value="inset">inset</option>'+
'<option value="outset">outset</option>'+
'<option value="wave">wave</option>'+
'<option value="dot-dot-dash">dot-dot-dash</option>'+
'</select>'+
'</td>'+
'</tr>'+
'<tr >'+
'<td class="register"  height="28px"><center>ÕÃ„ «·Õ«‘Ì…  : </td>'+
'<td class="regis"  height="28px"><center><input name="bordersize" size="55"/></td>'+
'</tr>'+
'<tr >'+
'<td class="register"  height="28px"><center>·Ê‰ «·Õ«‘Ì…  : </td>'+
'<td class="regis"  height="28px"><center><input name="bordercolor" size="55"/></td>'+
'</tr>'+
'<tr >'+
'<td class="register"  height="28px"><center>«·„”«›… »Ì‰ «·Œ«‰«   : </td>'+
'<td class="regis"  height="28px"><center><input name="cellpading" size="55"/></td>'+
'</tr>'+
'<tr >'+
'<td class="register"  height="28px"><center>«·„”«›… »Ì‰ «·√”ÿ— : </td>'+
'<td class="regis"  height="28px"><center><input name="cellspacing" size="55"/></td>'+
'</tr>'+
'<tr>'+
'<td class="regis"  height="28px" colspan="2"><center>'+
'<button  class="buton"  Onclick="createtable(\'\''+editor+'\'\');a.onclick();" type="button"  >≈‰‘«¡</button>'+
'</td>'+
'</tr></table>';

}

function ColorTab(editor,i,col){
var ido = document.getElementById(i);
         ido.style.background = "#"+col ;
		 ido.style.border = "1px solid #141414";
		 ido.style.display = "block";
		 ido.style.padding = "5px 5px 8px 5px";
		 document.getElementById(i).onclick = function(){
           a.onclick(),editorCommand(editor, "ForeColor",col);
			};
}
function ObC(editor){
	           try{
ColorTab(editor,"fr","993300");
ColorTab(editor,"fr2","800000");
ColorTab(editor,"fr3","FF00FF");
ColorTab(editor,"fr4","FF99CC");
ColorTab(editor,"fr5","FF6600");
ColorTab(editor,"fr6","FF9900");
ColorTab(editor,"fr7","FFCC00");
ColorTab(editor,"fr8","FFCC99");
ColorTab(editor,"fr9","333300");
ColorTab(editor,"er","003366");
ColorTab(editor,"er2","008080");
ColorTab(editor,"er3","33CCCC");
ColorTab(editor,"er4","00FFFF");
ColorTab(editor,"er5","CCFFFF");
ColorTab(editor,"er6","000080");
ColorTab(editor,"er7","0000FF");
ColorTab(editor,"er8","3366FF");
ColorTab(editor,"er9","00CCFF");
ColorTab(editor,"ir","808000");
ColorTab(editor,"ir2","99CC00");
ColorTab(editor,"ir3","FFFF00");
ColorTab(editor,"ir4","FFFF99");
ColorTab(editor,"ir5","003300");
ColorTab(editor,"ir6","008000");
ColorTab(editor,"ir7","339966");
ColorTab(editor,"ir8","00FF00");
ColorTab(editor,"ir9","CCFFCC");
ColorTab(editor,"or","99CCFF");
ColorTab(editor,"or2","333399");
ColorTab(editor,"or3","666699");
ColorTab(editor,"or4","800080");
ColorTab(editor,"or5","993366");
ColorTab(editor,"or6","CC99FF");
ColorTab(editor,"or7","333333");
ColorTab(editor,"or8","808080");
ColorTab(editor,"or9","969696"); 
ColorTab(editor,"fr10","C0C0C0");
ColorTab(editor,"er10","FFFFFF");
ColorTab(editor,"or10","F7F7F7");
ColorTab(editor,"ir10","EBEBEB");
           } catch(err){
           	color();
           }
 }
function FenColor(editor){
var con = '<center><br /><p>'+
'<a class="editor" id="color" href=\'#\'><b id="fr"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="fr2"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="fr3"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="fr4"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="fr5"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="fr6"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="fr7"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="fr8"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="fr9"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="fr10"></b></a>'+
'<br />'+
'<a class="editor" id="color" href=\'#\'><b id="ir"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="ir2"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="ir3"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="ir4"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="ir5"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="ir6"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="ir7"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="ir8"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="ir9"></b></a>'+
'<a class="editor" id="color"  href=\'#\'><b id="ir10"></b></a>'+
'<br />'+
'<a class="editor" id="color" href=\'#\'><b id="er"></b></a>'+
'<a class="editor" id="color" href=\'#\'><b id="er2"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="er3"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="er4"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="er5"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="er6"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="er7"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="er8"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="er9"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="er10"></b></a>'+
'<br />'+ 
'<a class="editor" id="color"href=\'#\'><b id="or"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="or2"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="or3"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="or4"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="or5"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="or6"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="or7"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="or8"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="or9"></b></a>'+
'<a class="editor" id="color"href=\'#\'><b id="or10"></b></a></p></center>';  
  return con;
 }
 function FenSymBoll(editor){
return '<center><a class="editor" href="javascript:appendtext(\''+editor+'\',\'±\');">±</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&cong;\');">&cong;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'∞\');">∞</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'≤\');">≤</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'≥\');">≥</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'¥\');">¥</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'µ\');">µ</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'∂\');">∂</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'∑\');">∑</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'∏\');">∏</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'π\');">π</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'∫\');">∫</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'ª\');">ª</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'º\');">º</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'æ\');">æ</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'Ω\');">Ω</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'ø\');">ø</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'°\');">°</a><br />'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'¢\');">¢</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'£\');">£</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'§\');">§</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'•\');">•</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'¶\');">¶</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'ß\');">ß</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'®\');">®</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'©\');">©</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'™\');">™</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'´\');">´</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'¨\');">¨</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'Æ\');">Æ</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'Ø\');">Ø</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&forall;\');">&forall;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&part;\');">&part;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&exist;\');">&exist;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&empty;\');">&empty;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&nabla;\');">&nabla;</a><br />'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&isin;\');">&isin;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&notin;\');">&notin;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&ni;\');">&ni;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&prod;\');">&prod;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&sum;\');">&sum;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&minus;\');">&minus;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&lowast;\');">&lowast;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&radic;\');">&radic;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&prop;\');">&prop;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&infin;\');">&infin;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&ang;\');">&ang;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&and;\');">&and;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&or;\');">&or;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&cap;\');">&cap;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&cup;\');">&cup;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&int;\');">&int;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&there4;\');">&there4;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&sim;\');">&sim;</a><br />'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&asymp;\');">&asymp;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&ne;\');">&ne;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&equiv;\');">&equiv;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&le;\');">&le;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&ge;\');">&ge;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&sub;\');">&sub;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&sup;\');">&sup;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&nsub;\');">&nsub;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&sube;\');">&sube;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&supe;\');">&supe;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&oplus;\');">&oplus;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&otimes;\');">&otimes;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&perp;\');">&perp;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&sdot;\');">&sdot;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&bull;\');">&bull;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&spades;\');">&spades;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&clubs;\');">&clubs;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&hearts;\');">&hearts;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&diams;\');">&diams;</a>'+
'<a class="editor" href="javascript:appendtext(\''+editor+'\',\'&loz;\');">&loz;</a>';

  
 }
function NewWindow(cont){
	var body = document.getElementsByTagName("body")[0];
		var div = document.createElement("div"),
		Text = cont.text,
		Width = cont.width,
		Height = cont.height,
		Call = cont.Call,
		divb = document.createElement("div");
		a.style.top = "2px";
		a.style.right = "2px";
		a.style.position = "absolute";
		a.style.textAlign = "center";
		a.href = "#";
		a.innerHTML = '<img src="edicons/php/close.png"/>';
		if(Call){
			Text = Text+Call;
		}
		div.innerHTML = Text;
		div.style.width = Width+"px";
		div.style.height = Height+"px";
			div.appendChild(a);
			body.appendChild(divb);
			body.appendChild(div);
			divb.setAttribute("id","Box");
			div.setAttribute("id","Boxmes");
		a.onclick = function (){
		var timer = 0.7;
		body.removeChild(div);
			var show = setInterval( function(){
			divb.style.opacity = timer;
			timer -= 0.1;
			if(timer == 0.10000000000000003){
				clearInterval(show);
				body.removeChild(divb);
			}
			},20);
						
			};
}
function BigWin(editor){
	//<a class="special" href="javascript:SpecialFunct(\'\''+editor+'\'\');"><img src="edicons/sfun.png"/> Œ’«∆’ Œ«’…</a>
	// <a class="special" href="#"><img src="edicons/pluses.png"/> „—›ﬁ« </a> <a class="special" href="javascript:CodeTab(\'\''+editor+'\'\');"><img src="edicons/code.png"/> √÷› ﬂÊœ</a>
return ""+
' <a class="special" href="javascript:FieldTab(\''+editor+'\');"><img src="edicons/groupf.png"/> ‰’ „„Ì“</a>  <a class="special" href="javascript:MenusTab(\''+editor+'\');"><img src="edicons/menu.png"/> √÷› ﬁÊ«∆„</a> '+
' <a class="special" href="javascript:ImgTab(\''+editor+'\');"><img src="edicons/tab.png"/>’Ê—…</a>'+
'<br /><br />'+
'<div id="contentspe"><center>'+
'<font color="#0000CC"><b>'+
'»”„ «··Â «·—Õ„‰ «·—ÕÌ„°°<br />'+
'«·”·«„ ⁄·Ìﬂ„ Ê —Õ„… «··Â  ⁄«·Ï Ê»—ﬂ« Â °°<br />'+
'√ŒÌ . √Œ Ì »≈Œ Ì«—ﬂ ·≈ÕœÏ Â–Â «·ŒÊ«’ °<br />'+
'›≈‰ „Ê÷Ê⁄ﬂ ”Ì‰ Ÿ— „Ê«›ﬁ… «·≈‘—«› „Â„« ﬂ«‰  „‘«—ﬂ« ﬂ °  ÕÌ… ÿÌ»….<br />'+
'«·≈œ«—… .'+
'</b></font>'+
'</center>'+
'</div>';
}

function FieldTab(editor){
document.getElementById("contentspe").innerHTML = '<br /><br />'+
'<table width="678px" align="center">'+
'<tr >'+
'<td class="register"  height="28px"><center>«·⁄‰Ê«‰  : </td>'+
'<td class="regis"  height="28px"><center><input name="titlefiel" size="55"/></td>'+
'</tr>'+
'<tr >'+
'<td class="register"  height="28px"><center>«·„Õ ÊÏ  : </td>'+
'<td class="info"  height="28px"><center><div style="width:100%;"><textarea name="fielcont" cols="45" rows="7"></textarea></div></td>'+
'</tr>'+
'<tr>'+
'<td class="info" colspan="2" height="32px" style="padding:2px;"><center><input class="buton" Onclick ="javascript:CreatField(\''+editor+'\');" value="≈‰‘«¡" type="button"/></td></tr>'+
'</table>';
}
 /**function CodeTab(editor){
document.getElementById("contentspe").innerHTML = '<br /><br />'+
'<table width="678px" align="center">'+
'<tr >'+
'<td class="register"  height="28px"><center>«·‰Ê⁄  : </td>'+
'<td class="regis"  height="28px"><center><select name="CodeType">'+
'<option value="html">HTML</option>'+
'<option value="php">PHP</option>'+
'<option value="css">CSS</option>'+
'<option value="javascript">JAVASCRIPT</option>'+
'</select></td>'+
'</tr>'+
'<tr >'+
'<td class="register"  height="28px"><center>«·„Õ ÊÏ  : </td>'+
'<td class="info"  height="28px"><center><div style="width:100%;"><textarea dir="ltr" name="Codecont" cols="45" rows="7"></textarea></div></td>'+
'</tr>'+
'<tr>'+
'<td class="info" colspan="2" height="32px" style="padding:2px;"><center><input class="buton" Onclick ="javascript:CreateCode(\'\''+editor+'\'\');" value="≈‰‘«¡" type="button"/></td></tr>'+
'</table>';
}
function CreateCode(editor){
TopicTy = 1;
  	 if(IE)  bodyE = window.frames[editor].document.body; 
    if(MOZ)  bodyE = document.getElementById(editor).contentDocument.body;
	var Code = document.createElement("iframe");
	var Field = document.createElement("fieldset");
	var Legend = document.createElement("legend");
	var P = document.createElement("p");
	Legend.innerHTML = document.getElementsByName("CodeType")[0].value;
	Code.innerHTML = document.getElementsByName("Codecont")[0].value;
	 Code.style.background = "#CACACA";
	 Code.style.border = "1px solid #353535";
	 Code.style.width = "564px";
	 Code.style.height = "234px";
	 P.appendChild(Code);
	 Field.appendChild(Legend);
	 Field.appendChild(P);
	 bodyE.appendChild(Field);
	 	 Code.setAttribute("dir","ltr");
	 Field.setAttribute("dir","ltr");
	 a.onclick();
}*/
function MenusTab(editor){
document.getElementById("contentspe").innerHTML = '<table width="678px" align="center">'+
'<tr >'+
'<td class="register"  height="28px"><center>«·⁄‰Ê«‰  : </td>'+
'<td class="regis"  height="28px"><center><input name="TMenu1" size="55"/></td>'+
'</tr>'+
'<tr >'+
'<td class="register"  height="28px"><center>«·—«»ÿ  : </td>'+
'<td class="regis"  height="28px"><center><input name="CMenu1" size="55"/></td>'+
'</tr>'+
'</table>'+
'<center><input align="center" Onclick ="javascript:CreatMenu(\''+editor+'\');"class="buton" type="button" value="≈‰‘«¡"/></center>';
}
function ImgTab(editor){
document.getElementById("contentspe").innerHTML = '<table width="678px" align="center">'+
'<tr >'+
'<td class="register"  height="28px"><center>«·⁄‰Ê«‰  : </td>'+
'<td class="regis"  height="28px"><center><input name="Tmg" size="55"/></td>'+
'</tr>'+
'<tr >'+
'<td class="register"  height="28px"><center>«·—«»ÿ  : </td>'+
'<td class="regis"  height="28px"><center><input name="Hmg" size="55"/></td>'+
'</tr>'+
'<tr >'+
'<td class="register"  height="28px"><center>«·ÿÊ· : </td>'+
'<td class="regis"  height="28px"><center><input name="Wmg" size="55"/></td>'+
'</tr>'+
'<tr >'+
'<td class="register"  height="28px"><center>«·⁄—÷ :</td>'+
'<td class="regis"  height="28px"><center><input name="Hemg" size="55"/></td>'+
'</tr>'+
'</table>'+
'<center><input align="center" id="ImgTab" class="buton" type="button" value="≈‰‘«¡"/></center>';
document.getElementById("ImgTab").onclick = function(){
TopicTy = 1;
   var Img = document.createElement("img");
   Img.src = document.getElementsByName("Hmg")[0].value ;
	 if(IE)  bodyE = window.frames[editor].document.body; 
    if(MOZ)  bodyE = document.getElementById(editor).contentDocument.body;
	bodyE.appendChild(Img);
	Img.setAttribute("width",document.getElementsByName("Wmg")[0].value);
	Img.setAttribute("height",document.getElementsByName("Hemg")[0].value);
	Img.setAttribute("title",document.getElementsByName("Tmg")[0].value);
	a.onclick();
};
}

function SpecialFunct(editor){
document.getElementById("contentspe").innerHTML =  '<br /><br /><center>'+
' <fieldset style="text-align:right;width:654px;">'+
'<legend><font color="#CC0000" face="tahoma" size="2"><b> ≈Œ — ≈ÕœÏ «·Œ’«∆’ </b></font></legend>'+
'<b><font color="#6BC9DD">'+
'<input type="radio" name="functionTopic[]"  value="1"></input>„Õ ÊÏ ÌŸÂ— ··Ã„Ì⁄<br />'+
'<input type="radio" name="functionTopic[]" value="2"></input>‰’› «·„Õ ÊÏ ÌŸÂ— Ê ‰’› «·¬Œ— ·« ÌŸÂ— Õ Ï Ì „ ⁄„· —œ ›Ì «·„Ê÷Ê⁄<br />'+
'<input type="radio" name="functionTopic[]" value="3" ></input>·«  ŸÂ— «·—Ê«»ÿ Õ Ï Ì „ «·—œ ⁄·Ï «·„Ê÷Ê⁄<br /></b></font>'+
' </fieldset>'+
' <fieldset style="text-align:right;width:654px;">'+
'<legend><font color="#CC0000" face="tahoma" size="2"><b> ≈Œ — ≈ÕœÏ «·„„Ì“«  </b></font></legend>'+
'<b><font color="#6BC9DD">'+
'<input type="radio" name="statusTopic[]"  value="1"></input>„Ê÷Ê⁄ „—‘Õ ··À»Ì <br />'+
'<input type="radio" name="statusTopic[]" value="2"></input>„Ê÷Ê⁄ „—‘Õ ·· ‰ÃÌ„<br />'+
'<input type="radio" name="statusTopic[]" value="3" ></input>„Ê÷Ê⁄ ⁄«œÌ<br /></b></font>'+
' </fieldset><br />'+
' <input class="buton" Onclick ="javascript:CreatField(\'\''+editor+'\'\');" value="≈‰‘«¡" type="button"/></center>  ';
}
function CreatField(editor){
TopicTy = 1;
	 if(IE)  e = window.frames[editor].document.body; 
    if(MOZ) e = document.getElementById(editor).contentDocument.body;
	var TitleField = document.getElementsByName("titlefiel")[0].value ;
	var ContenuField = document.getElementsByName("fielcont")[0].value;
	if(TitleField && ContenuField){
var FieldList = document.createElement("fieldset");
var Legend = document.createElement("legend");
var p = document.createElement("p");
Legend.innerHTML = TitleField;
p.innerHTML = ContenuField;
FieldList.appendChild(Legend);
FieldList.appendChild(p);
	e.appendChild(FieldList);
	a.onclick();
	}else{
	a.onclick();
	alert("·„  ﬁ„ »„·√ «·»Ì«‰«  ° ·‰ Ì „ ≈÷«›… √Ì ‘Ì¡ .");
	}
}
function CreatMenu(editor){
TopicTy = 1;
	 if(IE)  edit = window.frames[editor].document.body; 
     if(MOZ) edit = document.getElementById(editor).contentDocument.body;
	           var Ma = document.createElement("a");
			   Ma.href = document.getElementsByName("CMenu1")[0].value;
			   Ma.innerHTML = document.getElementsByName("TMenu1")[0].value;
			   Ma.setAttribute("class","UrlM");
	 edit.appendChild(Ma);
	 a.onclick();
}
function titles(n,tl){
		with(document){
				var book = getElementById("book"+n), titles = getElementById("titles"+n), text = "";
						book.onmouseover = function(){ 
							for(var i=0; i < tl.length; i++){
								text += tl[i]+" <br />";
							}
							titles.innerHTML = text;
							titles.style.display = "block";	
						}
						book.onmouseout = function(){
							titles.style.display = "none";
						}
			}
}
/**
----------------------------------
<div id="MenuTop">
<div id="UrlMenu">
<a class="UrlM" href="#">ﬁ«∆„… «·√Ê·Ï</a>
<a class="UrlM" href="#">ﬁ«∆„… «·√Ê·Ï</a>
<a class="UrlM" href="#">ﬁ«∆„… «·√Ê·Ï</a>
<a class="UrlM" href="#">ﬁ«∆„… «·√Ê·Ï</a>
<a class="UrlM" href="#">ﬁ«∆„… «·√Ê·Ï</a>
<a class="UrlM" href="#">ﬁ«∆„… «·√Ê·Ï</a>
<a class="UrlM" href="#">ﬁ«∆„… «·√Ê·Ï</a>
<a class="UrlM" href="#">ﬁ«∆„… «·√Ê·Ï</a>
<a class="UrlM" href="#">ﬁ«∆„… «·√Ê·Ï</a>
</div>
<div id="ContentMenu">„Õ ÊÏ «·ﬁ«∆„… </div>
</div>
|
----------------------------------
 function addfieldset(legtext,fieltext,styfiel){
 var body = document.getElementsByTagName("body")[0];
 var creatfield = document.createElement("fieldset");
 var creatlegen = document.createElement("legend");
 creatlegen.innerHTML = legtext;
 creatfield.appendChild(creatlegen);
 creatfield.innerHTML = fieltext;
 body.appendChild(creatfield);
 creatfield.setAttribute(styfiel);
 }
*/

/*
 function resize(){
var sk = document.getElementsByTagName('table');
for(var i = 0; i<sk.length;i++){
var tg = document.getElementsByTagName('table')[i];
var width_table = tg.clientWidth;
if(width_table >1000){
tg.style.width = "100%";
 
} 
}
}


for(var i=0;i<=51;i++){
var x = 0;

  Div.style.position = "absolute";
 Div.style.width = "1px";
 Div.style.height = "35px";
 Div.style.background = "rgb(255,0,"+(i*5)+")";
 Div.style.left = (51+i)+"px";
 Div.style.top = "0px";
  body.appendChild(Div);
}
*/






