var $= jQuery.noConflict();

$( document ).ready(function() {

	$("#addPlayerLink").fancybox({
		'scrolling'		: 'no',
		'titleShow'		: false,
		'onClosed'		: function() {
		    $("#add_error").hide();
		}
	});
	
	$(".editPlayerLink").fancybox({
		'scrolling'		: 'no',
		'titleShow'		: false,
		'onClosed'		: function() {
		}


	});	
	
});
    function changeBackground() {
        var BackgroundColorRank = document.getElementById("ClassementBackgroundColor").value; // cached
        var BackgroundColorName = document.getElementById("NomBackgroundColor").value; // cached
        var BackgroundColorScore = document.getElementById("ScoreBackgroundColor").value; // cached
        var FontColorRank = document.getElementById("ClassementFontColor").value; // cached
        var FontColorName = document.getElementById("NomFontColor").value; // cached
        var FontColorScore = document.getElementById("ScoreFontColor").value; // cached
        var TitleColor = document.getElementById("TitleColor").value; // cached
        console.log(TitleColor);
                       
        // The code I'd like to use for changing the text simultaneously - however it does not work.
        document.getElementById("parametre-preview-rank").style.background = BackgroundColorRank;
        document.getElementById("parametre-preview-name").style.background = BackgroundColorName;
        document.getElementById("parametre-preview-score").style.background = BackgroundColorScore;
        document.getElementById("parametre-preview-rank").style.color = FontColorRank;
        document.getElementById("parametre-preview-name").style.color = FontColorName;
        document.getElementById("parametre-preview-score").style.color = FontColorScore;
        document.getElementById("EventTitle").style.color = TitleColor;
    }
//window.onload=function(){
//
//    
//
//    document.getElementById("ClassementBackgroundColor").addEventListener("input", changeBackground, false);
//    document.getElementById("NomBackgroundColor").addEventListener("input", changeBackground, false);
//    document.getElementById("ScoreBackgroundColor").addEventListener("input", changeBackground, false);
//    document.getElementById("ClassementFontColor").addEventListener("input", changeBackground, false);
//    document.getElementById("NomFontColor").addEventListener("input", changeBackground, false);
//    document.getElementById("ScoreFontColor").addEventListener("input", changeBackground, false);
//
//}
