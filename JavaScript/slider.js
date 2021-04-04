var slideIndex = 1; //Para mostrar la primera imagen
showDivs(slideIndex); //Mostramos la primera imagen


/*Este Script permite mostrar un grupo de imagenes deslizantes en la web*/

function plusDivs(n) { //Esta función suma o resta el slideIndex
  showDivs(slideIndex += n);
}

//Esta función esconde todos los elementos con display="none" con la clase mySlides y muestra el elemento con display=block para el slideIndex dado.
function showDivs(n) {
	//Si una imagen esta con posición absolute, la vuelve relative y si no, la deja como esta.
    slider=document.getElementById("posicionresto1");
	if(slider.style.position="absolute"){
	slider.style.position="relative";
	}
	else {slider.style.position="relative";}
    slider=document.getElementById("posicionresto2");
	
	if(slider.style.position="absolute"){
	slider.style.position="relative";
	}
	else {slider.style.position="relative";}
	
	slider=document.getElementById("posicionresto3");
	if(slider.style.position="absolute"){
	slider.style.position="relative";
	}
	else {slider.style.position="relative";}
	
//Si el slideIndex es mayor que el numero de elementos el slideIndex se pone a 0. Pero si el slideIndex es menor que 1, 
//el slideIndex le igualamanos al número de elementos.
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}