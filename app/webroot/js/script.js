//	Script pout :hover non pris en charge par le navigateur 
sfHover = function() {
				var sfEls = document.getElementById("menu").getElementsByTagName("LI");
				for (var i=0; i<sfEls.length; i++) {
					sfEls[i].onmouseover=function() {
											this.className+=" sfhover";
										}
					sfEls[i].onmouseout=function() {
											this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
										}
				}
			}
if (window.attachEvent) {
	window.attachEvent("onload", sfHover);
}


//	Faire défiler les images de la page d'accueil
I = 0 ;
Imax = document.images.length - 1 ;
setTimeout(suivante, 4000) ;
function suivante() {
	document.images[I].style.display = "none" ;
	if ( I < Imax ){
		I++;
	} else {
		I=0;
	}    
	document.images[I].style.display = "block";
	setTimeout(suivante, 4000) ;
}




