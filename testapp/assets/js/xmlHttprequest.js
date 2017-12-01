// JavaScript Document
function useXMLHTTPRequest(){
	if(window.XMLHttpRequest) {
		return new XMLHttpRequest();
	}else if(window.ActiveXObject) {
		try{
			return new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			try{
				return new ActiveXObject("Microsoft.XMLHTTP");		
			}catch(e) {}
		}
	}else {
		 alert("This browser lacks Ajax support!");
		return false;
	}
}