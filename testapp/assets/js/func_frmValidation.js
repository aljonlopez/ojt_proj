function postToIframe(data,url,target){
    $('body').append('<form action="'+url+'" method="post" target="'+target+'" id="postToIframe"></form>');
    $.each(data,function(n,v){
        $('#postToIframe').append('<input type="hidden" name="'+n+'" value="'+v+'" />');
    });
    $('#postToIframe').submit().remove();
}


function guestFrmOpen(){
	var fname = document.getElementById('fname').value;
	var mname = document.getElementById('mname').value;
	var lname = document.getElementById('lname').value;
	var address= document.getElementById('address').value;
	var email = document.getElementById('email').value;
	var macid = document.getElementById('macid').value;
	
	
	
}

function validateLoginFrm(){
	var username = document.getElementById('username');
	var password = document.getElementById('password');
	
	if(isEmpty(username, "Please input your username.")){
		return false;
	}else if(isEmpty(password, "Please input your password.")){
		return false;
	}else{
		return true;
	}
		
}
function validateGuestFrm(){
	var fname = document.getElementById('fname');
	var mname = document.getElementById('mname');
	var lname = document.getElementById('lname');
	var address= document.getElementById('address');
	var email = document.getElementById('email');
	
	if(isEmpty(fname, "Please input your Firstname.")){
		return false;
	}else if(isEmpty(mname, "Please input your Middlename.")){
		return false;
	}else if(isEmpty(lname, "Please input your Lastname.")){
		return false;
	}else if(isEmpty(address, "Please input your address.")){
		return false;
	}else if(isEmpty(email, "Please input your email.")){
		return false;
	}else if(emailValidator(email, "Please input a correct email")){
		return false;
	}else{
		guestFrmOpen();
		
	}
}
function isEmpty(elem, helperMsg){
	if(elem.value.length == 0){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return true;
	}
		return false;
}
function chckAgreement(elem, helperMsg){
	if(elem.checked==false){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return true;
	}
		return false;
}
function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphabet(elem, helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphanumeric(elem, helperMsg){
	var alphaExp = /^[0-9a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function lengthRestriction(elem, min, max){
	var uInput = elem.value;
	if(uInput.length >= min && uInput.length <= max){
		return true;
	}else{
		alert("Please enter between " +min+ " and " +max+ " characters");
		elem.focus();
		return false;
	}
}

function madeSelection(elem, helperMsg){
	if(elem.value == "Please Choose"){
		alert(helperMsg);
		elem.focus();
		return false;
	}else{
		return true;
	}
}

function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	 if(elem.value.match(emailExp)){
		return false;
	}else{
		alert(helperMsg);
		elem.focus();
		return true;
	}
	
	if(elem.value.length == 0){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return true;
	}
		return false;
}
