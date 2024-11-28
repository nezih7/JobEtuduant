function capt(){
	chaine="";
	for(i=0;i<=8;i++){
		x=Math.floor(Math.random() * (122-65+1))+65 ;//Math.floor(Math.random() * (max - min + 1)) + min
		chaine += String.fromCharCode(x);
	}
	document.f.cap.value=chaine;
	return chaine;
}
function verif(){
    var cin = document.getElementById("cin").value;
    var password = document.getElementById("password").value;

            if (cin== "") {
                alert("Veuillez entrer votre Nº Carte d'identité nationale");
                return false;
            }

            if (password== "") {
                alert("Veuillez entrer votre mot de passe.");
                return false;
            }

    x=0;
	captcha=document.f.cap.value;
	for(i=0;i<=8;i++){
		if(captcha.charCodeAt(i)<=90){
			x=x+1;
		}
	}
	if (document.f.ccap.value!=x) {
		alert("wrong captcha answer");
		return;
	}

	document.f.submit();
}
function checkEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function resete(){
	cin = document.getElementById("cin").value="";
	password = document.getElementById("password").value="";
	ccap=document.f.ccap.value="";
	document.f.cap.value=capt(chaine);

}