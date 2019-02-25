$(document).ready(function() {

//==============================================Calculator==================================================//

//$('#calculator-holder #thumbox-close').

$("#l-amount").keyup(emi);
$("#l-interest").keyup(emi); 
$("#l-period").keyup(emi); 

 
function emi() {
	var p = parseFloat($('#l-amount').val());
	//alert(p);
	var r = parseFloat($("#l-interest").val());
	var n = parseFloat($('#l-period').val());
	r = r/100;
	var rp = r/12;
	var ac = p * rp ;
	var power = Math.pow((1 + rp), n);
	var oneby = 1/power;
	var result_emi = (ac /(1 - oneby)).toFixed(2);
	if(!isNaN(p) && !isNaN(r) && !isNaN(n)) {
		$('#emi').val(result_emi);
	}
}


$("#d-amount").keyup(aps);
$("#aps-interest").keyup(aps); 
function aps() {
	var p = parseFloat($('#d-amount').val());
	var r = parseFloat($("#aps-interest").val());
	r = r/100;
	var result_aps = (p*r).toFixed(2);
	if(!isNaN(p) && !isNaN(r)) {
		$('#an-int').val(result_aps);
	}
}
$("#d-amountq").keyup(qps);
$("#qps-interest").keyup(qps); 
function qps() {
	var p = parseFloat($('#d-amountq').val());
	var r = parseFloat($("#qps-interest").val());
	r = r/100;
	var result_qps = ((p*r)/4).toFixed(2);	
	if(!isNaN(p) && !isNaN(r)) {
  		$('#qu-int').val(result_qps);
	}
}
$("#d-amountm").keyup(mps);
$("#mps-interest").keyup(mps); 
function mps() {
	var p = parseFloat($('#d-amountm').val());
	var r = parseFloat($("#mps-interest").val());
	r = r/100;
	var result_mps = ((p*r)/12).toFixed(2);	
	if(!isNaN(p) && !isNaN(r)) {
  		$('#mo-int').val(result_mps);
	}
}
$("#d-amountc").keyup(cps);
$("#cps-interest").keyup(cps); 
$("#term").keyup(cps);  
function cps() {
	var p = parseFloat($('#d-amountc').val());
	var r = parseFloat($("#cps-interest").val());
	var n = parseFloat($('#term').val());
	r = r/100;
	var power = Math.pow((1 + r), n);
	var result_cps = (p*power).toFixed(2);
	if(!isNaN(p) && !isNaN(r) && !isNaN(n)) {
  		$('#tmv').val(result_cps);
	}
}
$("#d-amountf").keyup(fdr);
$("#fdr-interest").keyup(fdr); 
$("#fdr-term").keyup(fdr);  
function fdr() {
	var p = parseFloat($('#d-amountf').val());
	var r = parseFloat($("#fdr-interest").val());
	var n = parseFloat($('#fdr-term').val());
	r = r/100;
	var result_fdr = (p*r*n).toFixed(2);
	if(!isNaN(p) && !isNaN(r) && !isNaN(n)) {
  		$('#bti').val(result_fdr);
	}
}

//==============================================End of Calculator==================================================//
//==============================================End of Verticle Scroll=================================================//

// End jQuery
});

/*var isIE8 = $.browser.msie && +$.browser.version === 8;
if ( isIE8 ) {
	curvyCorners.addEvent(window, 'load', initCorners);
	function initCorners() {
		var settings = {
		  tl: { radius: 3 },
		  tr: { radius: 3 },
		  bl: { radius: 3 },
		  br: { radius: 3 },
		  antiAlias: true
		}
	curvyCorners(settings, ".search-holder");
	}
}*/