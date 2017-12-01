function normalPost(page,formid,loaderid){

	try{
	var rmodule = useXMLHTTPRequest();
	var obj = document.getElementById(formid);
	var loadedmodulecontainer = document.getElementById(loaderid);
	
	var param = submitReq(obj,"Post");
	var contObj = document.getElementById('pagewrapper');
	
	
	/*if(document.getElementById('waiting')==null){
	
		waitObj = document.createElement("DIV");
		
		waitObj.setAttribute("id","waiting");
		
		contObj.appendChild(waitObj);
		
		waitObj.innerHTML = "<iframe src=\"\" frameborder=\"0\" scrolling=\"no\" id=\"waitingOverlay\" oncontextmenu=\"return false;\" style=\"width: 100%; height: 100%;\"></iframe>"+
						"<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"  style=\"width: 100%; height: 100%; position:relative; z-index:100\">"+
								"<tr>"+
									"<td align=\"center\" valign=\"middle\">Loading<br><img src=\"assets/ajax-loader.gif\"></td>"+
								"</tr>"+
							"</table>";
							
	}*/
	
	if(rmodule){
		rmodule.onreadystatechange = function () {
			if(rmodule.readyState==4){
				if(rmodule.status==200){
					waitObj = document.getElementById('waiting');
					if(waitObj!=null){
						waitObj.parentNode.removeChild(waitObj);
					}
					var responseData = eval("(" + rmodule.responseText + ")");
					
					if(responseData.value=='twice'){
						alert('Your Device is already registered twice.');
						document.location='http://wapog.linkodkabitenyo.gov.ph/';
					}else if(responseData.value=='direct'){
						alert('Please connect to LINKOdKabitenyo Wifi.');
						document.location='http://wapog.linkodkabitenyo.gov.ph/';
					}else if(responseData.value=='true'){
						document.getElementById('guestform').style.display = "none";
						document.getElementById('welcomeguest').style.display = "block";
					}else if(responseData.value=='duplicate'){
						alert('The email address you are trying to used is already registered.');
						document.getElementById('guestform').style.display = "block";

					}
					//loadedmodulecontainer.innerHTML = rmodule.responseText;
					
				}
			}
		}
		
		rmodule.open("POST", page, true);
		rmodule.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		rmodule.setRequestHeader("Content-length", param.length);
		rmodule.setRequestHeader("Connection", "close");
		rmodule.send(param);
	}	
	}catch(e) {}
}
function searchInvoice(page,formid,loaderid){
	try{
	var rmodule = useXMLHTTPRequest();
	var obj = document.getElementById(formid);
	var loadedmodulecontainer = document.getElementById(loaderid);
	var param = submitReq(obj,"Post");
	var contObj = document.getElementById('mainbody');
	if(document.getElementById('waiting')==null){
		waitObj = document.createElement("DIV");
		waitObj.setAttribute("id","waiting");
		contObj.appendChild(waitObj);
		waitObj.innerHTML = "<iframe src=\"\" frameborder=\"0\" scrolling=\"no\" id=\"waitingOverlay\" oncontextmenu=\"return false;\" style=\"width: 100%; height: 100%;\">						                      </iframe>"+
						"<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"  style=\"width: 100%; height: 100%; position:relative; z-index:100\">"+
								"<tr>"+
									"<td align=\"center\" valign=\"middle\">Loading<br><img src=\"assets/ajax-loader.gif\"></td>"+
								"</tr>"+
							"</table>";
	}
	if(rmodule){
		rmodule.onreadystatechange = function () {
			if(rmodule.readyState==4){
				if(rmodule.status==200){
					waitObj = document.getElementById('waiting');
					if(waitObj!=null){
						waitObj.parentNode.removeChild(waitObj);
					}
					loadedmodulecontainer.innerHTML = rmodule.responseText;
				}
			}
		}
		
		rmodule.open("POST", page, true);
		rmodule.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		rmodule.setRequestHeader("Content-length", param.length);
		rmodule.setRequestHeader("Connection", "close");
		rmodule.send(param);
	}	
	}catch(e) {}
}

function addNewCustomer(page,formid){
	try{

	var rmodule = useXMLHTTPRequest();
	var obj = document.getElementById(formid);
	//var loadedmodulecontainer = document.getElementById(loaderid);
	var param = submitReq(obj,"Post");
	var contObj = document.getElementById('mainbody');
	if(document.getElementById('waiting')==null){
		waitObj = document.createElement("DIV");
		waitObj.setAttribute("id","waiting");
		contObj.appendChild(waitObj);
		waitObj.innerHTML = "<iframe src=\"\" frameborder=\"0\" scrolling=\"no\" id=\"waitingOverlay\" oncontextmenu=\"return false;\" style=\"width: 100%; height: 100%;\">						                      </iframe>"+
						"<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"  style=\"width: 100%; height: 100%; position:relative; z-index:100\">"+
								"<tr>"+
									"<td align=\"center\" valign=\"middle\">Loading<br><img src=\"assets/ajax-loader.gif\"></td>"+
								"</tr>"+
							"</table>";
	}
	if(rmodule){
		rmodule.onreadystatechange = function () {
			if(rmodule.readyState==4){
				if(rmodule.status==200){
					waitObj = document.getElementById('waiting');
					if(waitObj!=null){
						waitObj.parentNode.removeChild(waitObj);
					}
					var responseData = eval("(" + rmodule.responseText + ")");
					if(responseData.result==true){
						//alert(responseData.msg);
						if(responseData.action=='createnewticket'){
							document.location = responseData.page;
							//getLinkObj(responseData.page,'newcustomer');
							//document.getElementById('btnsave').disabled=true;
						}else if(responseData.action=='addnewcustomer'){
							document.location = responseData.page;
							//alert(responseData.page);
						}else if(responseData.action=='updatecustomer'){
							//document.location = responseData.page;
							return false;
						}else if(responseData.action=='addnewpromo'){
							alert(responseData.msg);
							//document.location = responseData.page;
						}else if(responseData.action=='createnewticket2'){
							//alert(responseData.msg);
							getLinkObj(responseData.page,'summarylist');
							//getLinkObj(responseData.page,'newcustomer');
							//document.getElementById('btnsave').disabled=true;
						}else if(responseData.action=='UpdateCPE'){
							alert(responseData.msg);
							getLinkObj(responseData.page,'viewsummary');
						}else if(responseData.action=='addnewticket'){
							document.location = responseData.page;
						}
							
					}else{
						alert(responseData.msg);
						
					}
				}
			}
		}
		
		rmodule.open("POST", page, true);
		rmodule.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		rmodule.setRequestHeader("Content-length", param.length);
		rmodule.setRequestHeader("Connection", "close");
		rmodule.send(param);
	}	
	}catch(e) {}
}
function addComments(page,formid){
	try{

	var rmodule = useXMLHTTPRequest();
	var obj = document.getElementById(formid);
	//var loadedmodulecontainer = document.getElementById(loaderid);
	var param = submitReq(obj,"Post");
	var contObj = document.getElementById('mainbody');
	if(document.getElementById('waiting')==null){
		waitObj = document.createElement("DIV");
		waitObj.setAttribute("id","waiting");
		contObj.appendChild(waitObj);
		waitObj.innerHTML = "<iframe src=\"\" frameborder=\"0\" scrolling=\"no\" id=\"waitingOverlay\" oncontextmenu=\"return false;\" style=\"width: 100%; height: 100%;\">						                      </iframe>"+
						"<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"  style=\"width: 100%; height: 100%; position:relative; z-index:100\">"+
								"<tr>"+
									"<td align=\"center\" valign=\"middle\">Loading<br><img src=\"assets/ajax-loader.gif\"></td>"+
								"</tr>"+
							"</table>";
	}
	if(rmodule){
		rmodule.onreadystatechange = function () {
			if(rmodule.readyState==4){
				if(rmodule.status==200){
					waitObj = document.getElementById('waiting');
					if(waitObj!=null){
						waitObj.parentNode.removeChild(waitObj);
					}
				//	loadedmodulecontainer.innerHTML = rmodule.responseText;
					var responseData = eval("(" + rmodule.responseText + ")");
					if(responseData.result==true){
						alert(responseData.msg);	
						getLink(responseData.page,'summarylist');
					}else{
						alert("Error! Please try again!");
						
					}
				}
			}
		}
		
		rmodule.open("POST", page, true);
		rmodule.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		rmodule.setRequestHeader("Content-length", param.length);
		rmodule.setRequestHeader("Connection", "close");
		rmodule.send(param);
	}	
	}catch(e) {}
}
function insertUpdate(page,formid){
	try{
	var rmodule = useXMLHTTPRequest();
	var obj = document.getElementById(formid);
	//var loadedmodulecontainer = document.getElementById(loaderid);
	var param = submitReq(obj,"Post");
	var contObj = document.getElementById('mainbody');
	if(document.getElementById('waiting')==null){
		waitObj = document.createElement("DIV");
		waitObj.setAttribute("id","waiting");
		contObj.appendChild(waitObj);
		waitObj.innerHTML = "<iframe src=\"\" frameborder=\"0\" scrolling=\"no\" id=\"waitingOverlay\" oncontextmenu=\"return false;\" style=\"width: 100%; height: 100%;\">						                      </iframe>"+
						"<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"  style=\"width: 100%; height: 100%; position:relative; z-index:100\">"+
								"<tr>"+
									"<td align=\"center\" valign=\"middle\">Loading<br><img src=\"assets/ajax-loader.gif\"></td>"+
								"</tr>"+
							"</table>";
	}
	if(rmodule){
		rmodule.onreadystatechange = function () {
			if(rmodule.readyState==4){
				if(rmodule.status==200){
					waitObj = document.getElementById('waiting');
					if(waitObj!=null){
						waitObj.parentNode.removeChild(waitObj);
					}
				//loadedmodulecontainer.innerHTML = rmodule.responseText;
					var responseData = eval("(" + rmodule.responseText + ")");
					if(responseData.result==true){
						alert(responseData.msg);	
					}else{
						alert("Error! Please try again!");	
					}
				}
			}
		}
		
		rmodule.open("POST", page, true);
		rmodule.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		rmodule.setRequestHeader("Content-length", param.length);
		rmodule.setRequestHeader("Connection", "close");
		rmodule.send(param);
	}	
	}catch(e) {}
}
function getLink(page,loaderid){
	try{
		var rmodule = useXMLHTTPRequest();
		var loadedmodulecontainer = document.getElementById(loaderid);
		var contObj = document.getElementById('mainbody');
		if(document.getElementById('waiting')==null){
			waitObj = document.createElement("DIV");
			waitObj.setAttribute("id","waiting");
			contObj.appendChild(waitObj);
			waitObj.innerHTML = "<iframe src=\"\" frameborder=\"0\" scrolling=\"no\" id=\"waitingOverlay\" oncontextmenu=\"return false;\" style=\"width: 100%; height: 100%;\">						                      </iframe>"+
							"<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"  style=\"width: 100%; height: 100%; position:relative; z-index:100\">"+
									"<tr>"+
										"<td align=\"center\" valign=\"middle\">Loading<br><img src=\"assets/ajax-loader.gif\"></td>"+
									"</tr>"+
								"</table>";
		}
		if(rmodule){
			rmodule.onreadystatechange = function () {
				if(rmodule.readyState==4){
					if(rmodule.status==200){
						waitObj = document.getElementById('waiting');
						if(waitObj!=null){
							waitObj.parentNode.removeChild(waitObj);
						}
						loadedmodulecontainer.innerHTML = rmodule.responseText;
						
					}
				}
			}
			
			rmodule.open("GET", page, true);
			rmodule.send(null);
		}	
	}catch(e) {}
}
function actionSelected(page,loaderid){
	try{
		var confrm = confirm("Are you sure you want to do this action?");
		if(confrm==true){
			var rmodule = useXMLHTTPRequest();
			var loadedmodulecontainer = document.getElementById(loaderid);
			var contObj = document.getElementById('mainbody');
			if(document.getElementById('waiting')==null){
				waitObj = document.createElement("DIV");
				waitObj.setAttribute("id","waiting");
				contObj.appendChild(waitObj);
				waitObj.innerHTML = "<iframe src=\"\" frameborder=\"0\" scrolling=\"no\" id=\"waitingOverlay\" oncontextmenu=\"return false;\" style=\"width: 100%; height: 100%;\">						                      </iframe>"+
								"<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"  style=\"width: 100%; height: 100%; position:relative; z-index:100\">"+
										"<tr>"+
											"<td align=\"center\" valign=\"middle\">Loading<br><img src=\"assets/ajax-loader.gif\"></td>"+
										"</tr>"+
									"</table>";
			}
			if(rmodule){
				rmodule.onreadystatechange = function () {
					if(rmodule.readyState==4){
						if(rmodule.status==200){
							waitObj = document.getElementById('waiting');
							if(waitObj!=null){
								waitObj.parentNode.removeChild(waitObj);
							}
							
							var responseData = eval("(" + rmodule.responseText + ")");
							if(responseData.result==true){
								if(responseData.action=='remove'){
									getLink(responseData.pagelink,'customerlist');
								}else if(responseData.action=='removeticket'){
									getLink(responseData.pagelink,'customerlist');
								}
							}else{
								alert("Error! Please try again!");	
							}
							
						}
					}
				}
				
				rmodule.open("GET", page, true);
				rmodule.send(null);
			}
		}else{
			return false;
		}
	}catch(e) {}
}