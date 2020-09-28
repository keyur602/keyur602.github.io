var lods;

function lod() {
  lods = setTimeout(showPage, 500);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("new").style.display = "block";
}



function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}



window.onscroll = function() {scrollFunction()};

function scrollFunction() {

  	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
	    document.getElementById("navbar").style.backgroundColor ="#000";
  	}
	else{
	    document.getElementById("navbar").style.backgroundColor ="rgba(0,0,0,0.7)";
	}
}


