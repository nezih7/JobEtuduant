function enab() {
	if (document.f.rg.value != "") {
		document.f.vl.disabled = false;
		return;
	}
	if (document.f.rg.value == "") {
		document.f.vl.disabled = true;
		return;
	}
}
function capt(){
	chaine="";
	for(i=0;i<=8;i++){
		x=Math.floor(Math.random() * (122-65+1))+65 ;//Math.floor(Math.random() * (max - min + 1)) + min
		chaine += String.fromCharCode(x);
	}
	document.getElementById('cap').value=chaine;
	return chaine;
}
function checkEmail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}
async function verif() {
	if (document.f.nm.value == "") {
		alert("name field is empty !!!!");
		return;
	}
	if (document.f.pr.value == "") {
		alert("prenom field is empty !!!");
		return;
	}
	if (document.f.dn.value == "") {
		alert("Date de naissance field is empty !!!");
		return;
	}
	if (document.f.nv.value == "") {
		alert("Niveau field is empty !!!");
		return;
	}
	if (document.f.rg.value == "") {
		alert("region field is empty !!");
		return;
	}
	if (document.f.vl.value == "") {
		alert("ville field is empty !!!");
		return;
	}
	if (checkEmail(document.f.em.value) == false) {
		alert('Adresse e-mail non valide !!!');
		return;
	}
	if (document.f.ps.value == "") {
		alert("password field is empty !!");
		return;
	}
	if (document.f.ps.value.length < 8) {
		alert("password doit contenir au moins 8 caractere !!!!");
		return;
	}
	if (document.f.cps.value != document.f.ps.value) {
		alert("incorrect confirmation password !!!");
		return;
	}
	if ((document.f.cin.value == "") || (isNaN(document.f.cin.value)) || (document.f.cin.value.length != 8)) {
		alert("incorrect cin field !!! ");
		return;
	}
	if ((document.f.tel.value == "") || (isNaN(document.f.tel.value)) || (document.f.tel.value.length != 8)) {
		alert("incorrect tel field !!! ");
		return;
	}
	if ((document.f.tel.value.charAt(0) != "9") && (document.f.tel.value.charAt(0) != "2") && (document.f.tel.value.charAt(0) != "5")) {
		alert("incorrect tel field !!! ");
		return;
	}
	if (document.f.fc.value == "") {
		alert("faculte field is empty !!!");
		return;
	}
	if (document.getElementById("pic").value=="") {
		alert("pick an image for your student card");
		return;
	}
	x = 0;
	captcha = document.getElementById("cap").value;
	for (i = 0; i <= 8; i++) {
		if (captcha.charCodeAt(i) <= 90) {
			x = x + 1;
		}
	}
	if (document.getElementById("ccap").value != x) {
		alert("wrong captcha answer");
		return;
	}

document.f.submit();
	
}
function resete(){
	document.f.nm.value="";
	document.f.pr.value="";
	document.f.dn.value="";
	document.f.rg.value="";
	document.f.vl.value="";
	document.f.em.value="";
	document.f.ps.value=""
	document.f.cps.value="";
	document.f.cin.value="";
	document.f.tel.value="";
	document.getElementById("cap").value=capt(chaine);
	document.getElementById("ccap").value="";
}