function capt(){
	chaine="";
	for(i=0;i<=8;i++){
		x=Math.floor(Math.random() * (122-65+1))+65 ;//Math.floor(Math.random() * (max - min + 1)) + min
		chaine += String.fromCharCode(x);
	}
	document.f.cap.value=chaine;
    return chaine;
}
function checkEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function verif(){
    if (document.f.cin.value== "") {
                alert("Veuillez entrer votre Nº Carte d'identité nationale");
                return false; // Empêche l'envoi du formulaire
    }
    if (document.f.ps.value== "") {
                alert("Veuillez entrer votre mot de passe.");
                return false; // Empêche l'envoi du formulaire
            }
    if (document.f.cps.value== "") {
                alert("Confirmer votre mot de passe.");
                return false; // Empêche l'envoi du formulaire
            }
    if (!   (document.f.cps.value==document.f.ps.value)) {
                alert("Erreur de confirmation ");
                return false; // Empêche l'envoi du formulaire
            }
            if (checkEmail(document.f.em.value)==false) {
                alert('Adresse e-mail non valide !!!');
                return;
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
function resete(){
    document.f.cin.value="";
    document.f.em.value=""
    document.f.ps.value="";
    document.f.cps.value="";
    document.f.cap.value=capt(chaine);
    document.f.ccap.value="";

}