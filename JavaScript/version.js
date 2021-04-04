window.onload = setTimeout("mostrarVersion();",1000);
var inicio=true;
/*Esta función detecta que navegador se usa y la versión, permitiendo advertir si este esta desactualizado a su
usuario*/
function versionNav(){	
    var nav = navigator.userAgent.toLowerCase();

    if(nav.indexOf("msie") != -1){/*Si el navegador es Internet Explorer*/
        alert("Estas usando InternetExplorer");
		var version = parseInt(ie.split('msie')[1]);
		switch(version){
            case 6:
                alert("Estás usando Internet Explorer 6. Esta versi\u00F3n esta obsoleta, se le recomienda que actualice el navegador.");
				return("Internet Explorer 6");
                break;
            case 7:
                 alert("Estás usando Internet Explorer 7. Esta versi\u00F3n esta obsoleta, se le recomienda que actualice el navegador."); 
				 return("Internet Explorer 7");
                break;
            case 8:
                alert("Estás usando Internet Explorer 8. Esta versi\u00F3n esta obsoleta, se le recomienda que actualice el navegador.");
				return("Internet Explorer 8");
                break;
            case 9:
               return("Internet Explorer 9");
                break;
        }
    } else if(nav.indexOf("firefox") != -1){/*Si el navegador es firefox*/
        var version = navigator.userAgent;
		version=version.substring(version.length-4);
		if (version<49)
			alert("Estás usando Firefox versi\u00F3n" + version + ". Esta versi\u00F3n esta obsoleta, se le recomienda que actualice el navegador.")
		return "Firefox. Versi\u00F3n: " + version;
	} 
     else if(nav.indexOf("chrome") != -1){/*Si el navegador es Chrome o algun deribado como chromium*/
		version = navigator.userAgent.match(/Chrom(e|ium)\/([0-9]+)\./);
		version = parseInt(version[2], 10);
		if (version<54)
			alert("Estás usando Chrome versi\u00F3n " + version + ". Esta versi\u00F3n esta obsoleta, se le recomienda que actualice el navegador.")
		return("Chrome. Versi\u00F3n: " + version);
    }
	else {
        alert("Navegador no reconocido.");
    }
	
}

/*Esta función llama a la anterior para obtener la version que usa tu navegador 
y mostrarla*/
function mostrarVersion(){
    if (inicio==true)
		version=versionNav();
	
	cadena= "Navegador: " + version + ".";
	document.getElementById("version").innerHTML=cadena;
	inicio=false;
	setTimeout("mostrarVersion();",1000);
}

