var lods;

function lod() {
  lods = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("new").style.display = "block";
}



function openNav() {
  document.getElementById("mySidepanel").style.width = "300px";
}
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}



window.onscroll = function() {scrollFunction()};

function scrollFunction() {

  	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
	    document.getElementById("navbar").style.backgroundColor ="#fff";
	    document.getElementById("button-nev").style.color ="#000000";
	    document.getElementById("logo").style.display ="none";
	    document.getElementById("logo1").style.display ="block";
	    
	    document.getElementById("navbarjs1").style.color ="#000";
	    document.getElementById("navbarjs2").style.color ="#000";
	    document.getElementById("navbarjs3").style.color ="#000";
	    document.getElementById("navbarjs4").style.color ="#000";
	    document.getElementById("navbarjs5").style.color ="#000";
	    document.getElementById("navbarjs6").style.color ="#000";
	    document.getElementById("navbarjs7").style.color ="#000";
  	}
	else{
	    document.getElementById("navbar").style.backgroundColor ="rgba(0,0,0,0.7)";
	    document.getElementById("logo1").style.display ="none";
	    document.getElementById("logo").style.display ="block";
	    document.getElementById("button-nev").style.color ="#ffffff";

	    document.getElementById("navbarjs1").style.color ="#c5c5c5";
	    document.getElementById("navbarjs2").style.color ="#c5c5c5";
	    document.getElementById("navbarjs3").style.color ="#c5c5c5";
	    document.getElementById("navbarjs4").style.color ="#c5c5c5";
	    document.getElementById("navbarjs5").style.color ="#c5c5c5";
	    document.getElementById("navbarjs6").style.color ="#c5c5c5";
	    document.getElementById("navbarjs7").style.color ="#c5c5c5";
	}
}



var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 2}    
  if (n < 2) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i =i+2) {
      slides[i].style.display = "block";  
  }
  slides[slideIndex-2].style.display = "none";  
}

