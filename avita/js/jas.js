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

function slicbtn(btuvel){

	var z = btuvel.value;
	var i;
	if (z == "all") {
		var all = document.getElementById("all");
  		all.classList.add("Portfolio-btn-actve");

		    var DESIGN = document.getElementById("DESIGN");
  			DESIGN.classList.remove("Portfolio-btn-actve");

			  		var DEVEL = document.getElementById("DEVELOPMENT");
			  		DEVEL.classList.remove("Portfolio-btn-actve");

						var PLUG = document.getElementById("PLUGIN");
			  			PLUG.classList.remove("Portfolio-btn-actve");

			  				var PHOTOG = document.getElementById("PHOTOGRAPHY");
			  				PHOTOG.classList.remove("Portfolio-btn-actve");

	for (i = 0; i <= 1; i++) {
		var di = document.getElementsByClassName("disi");
		di[i].style.display = "block";
		var de = document.getElementsByClassName("DEVEL");
		de[i].style.display = "block";
		var pl = document.getElementsByClassName("PLUG");
		pl[0].style.display = "block";
		var ph = document.getElementsByClassName("PHOTOG");
		ph[0].style.display = "block";
	}

	}
	else if(z == "DESIGN"){
		var all = document.getElementById("all");
  		all.classList.remove("Portfolio-btn-actve");

		    var DESIGN = document.getElementById("DESIGN");
  			DESIGN.classList.add("Portfolio-btn-actve");

			  		var DEVEL = document.getElementById("DEVELOPMENT");
			  		DEVEL.classList.remove("Portfolio-btn-actve");

						var PLUG = document.getElementById("PLUGIN");
			  			PLUG.classList.remove("Portfolio-btn-actve");

			  				var PHOTOG = document.getElementById("PHOTOGRAPHY");
			  				PHOTOG.classList.remove("Portfolio-btn-actve");

	for (i = 0; i <= 1; i++) {
		var di = document.getElementsByClassName("disi");
		di[i].style.display = "block";
		var de = document.getElementsByClassName("DEVEL");
		de[i].style.display = "none";
		var pl = document.getElementsByClassName("PLUG");
		pl[0].style.display = "none";
		var ph = document.getElementsByClassName("PHOTOG");
		ph[0].style.display = "none";
	}
	}
	else if(z == "DEVELOPMENT"){
		var all = document.getElementById("all");
  		all.classList.remove("Portfolio-btn-actve");

		    var DESIGN = document.getElementById("DESIGN");
  			DESIGN.classList.remove("Portfolio-btn-actve");

			  		var DEVEL = document.getElementById("DEVELOPMENT");
			  		DEVEL.classList.add("Portfolio-btn-actve");

						var PLUG = document.getElementById("PLUGIN");
			  			PLUG.classList.remove("Portfolio-btn-actve");

			  				var PHOTOG = document.getElementById("PHOTOGRAPHY");
			  				PHOTOG.classList.remove("Portfolio-btn-actve");


		for (i = 0; i <= 1; i++) {
		var di = document.getElementsByClassName("disi");
		di[i].style.display = "none";
		var de = document.getElementsByClassName("DEVEL");
		de[i].style.display = "block";
		var pl = document.getElementsByClassName("PLUG");
		pl[0].style.display = "none";
		var ph = document.getElementsByClassName("PHOTOG");
		ph[0].style.display = "none";
		}

	}
	else if(z == "PLUGIN"){
		var all = document.getElementById("all");
  		all.classList.remove("Portfolio-btn-actve");

		    var DESIGN = document.getElementById("DESIGN");
  			DESIGN.classList.remove("Portfolio-btn-actve");

			  		var DEVEL = document.getElementById("DEVELOPMENT");
			  		DEVEL.classList.remove("Portfolio-btn-actve");

						var PLUG = document.getElementById("PLUGIN");
			  			PLUG.classList.add("Portfolio-btn-actve");

			  				var PHOTOG = document.getElementById("PHOTOGRAPHY");
			  				PHOTOG.classList.remove("Portfolio-btn-actve");


		for (i = 0; i <= 1; i++) {
		var di = document.getElementsByClassName("disi");
		di[i].style.display = "none";
		var de = document.getElementsByClassName("DEVEL");
		de[i].style.display = "none";
		var pl = document.getElementsByClassName("PLUG");
		pl[0].style.display = "block";
		var ph = document.getElementsByClassName("PHOTOG");
		ph[0].style.display = "none";
		}
	}
	else if(z == "PHOTOGRAPHY"){
		var all = document.getElementById("all");
  		all.classList.remove("Portfolio-btn-actve");

		    var DESIGN = document.getElementById("DESIGN");
  			DESIGN.classList.remove("Portfolio-btn-actve");

			  		var DEVEL = document.getElementById("DEVELOPMENT");
			  		DEVEL.classList.remove("Portfolio-btn-actve");

						var PLUG = document.getElementById("PLUGIN");
			  			PLUG.classList.remove("Portfolio-btn-actve");

			  				var PHOTOG = document.getElementById("PHOTOGRAPHY");
			  				PHOTOG.classList.add("Portfolio-btn-actve");


		for (i = 0; i <= 1; i++) {
		var di = document.getElementsByClassName("disi");
		di[i].style.display = "none";
		var de = document.getElementsByClassName("DEVEL");
		de[i].style.display = "none";
		var pl = document.getElementsByClassName("PLUG");
		pl[0].style.display = "none";
		var ph = document.getElementsByClassName("PHOTOG");
		ph[0].style.display = "block";
		}
	}

}

