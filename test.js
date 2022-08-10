	 	function test(abdo){
 		 var _array = new Array();
 		 _array.push(abdo);
	 		for(var i=0; i < abdo.length; i++){
	 			alert(abdo[i]);
	 		}
 		
 	}
		function forum(cats,forums){
			var table = document.createElement("table"),
				tbody = document.createElement("tbody"),
				Body  = document.getElementsByTagName("body")[0];
					for(i=0;i<cats.length;i++){
						var tr   = document.createElement("tr");
						var cat  = document.createElement("td"); // colspan="2"
						cat.innerHTML = '<font class="tcat" face="tahoma" color="#13BCEA" size="2">'+cats[i];
						tr.appendChild(cat);
						cat.setAttribute("colspan","6");
						cat.setAttribute("class","cat");
						tbody.appendChild(tr);
							var tra   = document.createElement("tr");
						for(a=0;a<5;a++){
						var tda   = document.createElement("td"), Width = tda.style.width;
						switch(a){
							case 0: Width = "40%"; tda.setAttribute("colspan","2"); tda.innerHTML = '<center><font face="tahoma" color="white" size="2">«·„‰ œÏ';break;
							case 1: Width = "13%"; tda.innerHTML = '<center><font face="tahoma" color="white" size="2">¬Œ— „‘«—ﬂ…';break;
							case 2: Width = "7.5%"; tda.innerHTML = '<center><font face="tahoma" color="white" size="2">«·„Ê«÷Ì⁄';break;
							case 3: Width = "7.5%"; tda.innerHTML = '<center><font face="tahoma" color="white" size="2">«·—œÊœ';break;
							case 4: Width = "32%"; tda.innerHTML = '<center><font face="tahoma" color="white" size="2">«·≈œ«—…';break;
											}
						tra.appendChild(tda);
						tda.setAttribute("class","forum");
					}
						tbody.appendChild(tra);
							for(j=0;j<forums.length;j++){
							if(forums[j].reli == i){
								var tr2   = document.createElement("tr");
									for(x=0; x<6; x++){
										var forum = document.createElement("td");
											var widthf = forum.style.width;
											switch(x){
												case 0: widthf = "7%"; forum.innerHTML = '<center><font face="tahoma" color="white" size="2"><img class="imf" src="iconsf/star.png"/>';break;
												case 1: widthf = "33%"; forum.innerHTML = '<center><font face="tahoma" color="white" size="2">¬Œ— „‘«—ﬂ…';break;
												case 2: widthf = "13"; forum.innerHTML = '<center><font face="tahoma" color="white" size="2">«·„Ê«÷Ì⁄';break;
												case 3: widthf = "7.5%"; forum.innerHTML = '<center><font face="tahoma" color="white" size="2">«·—œÊœ';break;
												case 4: widthf = "7.5%"; forum.innerHTML = '<center><font face="tahoma" color="white" size="2">«·≈œ«—…';break;
												case 5: widthf = "32%"; forum.innerHTML = '<center><font face="tahoma" color="white" size="2">«·≈œ«—…';break;
											}
											forum.setAttribute("class","infos");
										tr2.appendChild(forum);
									}
									tbody.appendChild(tr2);
								}else continue;
							}
					}
					
						table.appendChild(tbody);
						Body.appendChild(table);
						table.setAttribute("cellspacing","0");
						table.setAttribute("cellpadding","0");
						table.setAttribute("width","100%");
		
		}