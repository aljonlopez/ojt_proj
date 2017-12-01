String.prototype.replaceAll = function(pcFrom, pcTo){
	var i = this.indexOf(pcFrom);
	var c = this;
	
	while (i > -1){
		c = c.replace(pcFrom, pcTo); 
		i = c.indexOf(pcFrom);
	}
	return c;
}
String.prototype.trim = function() {
a = this.replace(/^\s+/, '');
return a.replace(/\s+$/, '');
};
function submitReq(ob,rtype){
	var obj = ob;
	var inputType = Array("hidden","text","password","checkbox","radio","file");
	var reqtype = rtype;
	var paramstr = "";	
	for (i=0; i<obj.elements.length; i++){
		if (obj.elements[i].tagName == "INPUT"){
			for (var x=0;x<inputType.length;x++){
				if(obj.elements[i].type == inputType[x]){
				   elmval = obj.elements[i].value.replaceAll("\"","\''");
				   elmval = elmval.replaceAll("&ndash;","<*dash*>");
				   elmval = elmval.replaceAll("&nbsp;","<*nbspace*>");
				   paramstr += obj.elements[i].name + "=" + 
							   (reqtype=="POST"?encodeURI(elmval.replaceAll("\&","<*ampersand*>")):elmval.replaceAll("\&","<*ampersand*>")) + "&";
				}
			}
		}
		
		if(obj.elements[i].tagName == "TEXTAREA"){
			   elmval = obj.elements[i].value.replaceAll("\"","''");
			   elmval = elmval.replaceAll("&ndash;","<*dash*>");
			   elmval = elmval.replaceAll("&nbsp;","<*nbspace*>");
			   paramstr += obj.elements[i].name + "=" + 
						   (reqtype=="POST"?encodeURI(elmval.replaceAll("\&","&amp;")):elmval.replaceAll("\&","&amp;")) + "&";
		}   
		if (obj.elements[i].tagName == "SELECT") {
			var sel = obj.elements[i];
			paramstr += sel.name + "="+ 
						(reqtype=="POST"?encodeURI(sel.options[sel.selectedIndex].value.replaceAll("\"","''")):sel.options[sel.selectedIndex].value.replaceAll("\"","''"))+"&";
		}
	}
	return paramstr;
}