// JavaScript Document

jQuery(document).ready(function($) {

// ---------------------------------------
//----- START JQUERY READY -----*/


//-------------------------------- WAYPOINT JS STICKY TOPNAV -------------
/*
$('.myTag').waypoint(function() {
		$('.headerFixedOuter').toggleClass( 'visible' );
	},
	{
		offset: '12%'
	});

// ----------------------------------------------- ABOUT PG MAGIC --
$('.toolsDesc.toolsRwd, .toolsCms.robust, .sectSkillsFirst').css("opacity","0");
$('.toolsDesc.toolsRwd, .toolsCms.robust, .sectSkillsFirst').waypoint(function(){
	var el = $(this),
		t = Math.round(Math.random() * 400);
	setTimeout(function(){ el.addClass("animated slideInLeft").css("opacity","1"); }, t);
}, { offset: 'bottom-in-view' });

$('.toolsImg.toolsRwd, .toolsCms.scalability, .toolsImg.toolsCoding, .sectSkillsSecond').css("opacity","0");
$('.toolsImg.toolsRwd, .toolsCms.scalability, .toolsImg.toolsCoding, .sectSkillsSecond').waypoint(function(){
	var el = $(this),
		t = Math.round(Math.random() * 400);
	setTimeout(function(){ el.addClass("animated slideInRight").css("opacity","1"); }, t);
}, { offset: 'bottom-in-view' });


$('.toolsImg.toolsCms, .toolsDesc.toolsCms h2, .toolsDesc.toolsCoding h2, .toolsSkillset h2').css("opacity","0");
$('.toolsImg.toolsCms, .toolsDesc.toolsCms h2, .toolsDesc.toolsCoding h2,  .toolsSkillset h2').waypoint(function(){
	var el = $(this),
		t = Math.round(Math.random() * 400);
	setTimeout(function(){ el.addClass("animated slideInDown").css("opacity","1"); }, t);
}, { offset: 'bottom-in-view' });

$('.toolsDesc.toolsCms p, .toolsDesc.toolsCoding p').css("opacity","0");
$('.toolsDesc.toolsCms p, .toolsDesc.toolsCoding p').waypoint(function(){
	var el = $(this),
		t = Math.round(Math.random() * 400);
	setTimeout(function(){ el.addClass("animated fadeInUp").css("opacity","1"); }, t);
}, { offset: 'bottom-in-view' });
*/


// ---------------------------------------------- PROJECT NODE SLIDER --
$('.projSlider .view-content').slick({
	dots: true
});


// ---------------------------------------------- WILLOW SCROLL TO --
$("#about").click(function() {
    $('html, body').animate({
        scrollTop: $(".about-sect").offset().top
    }, 500);
});

$("#header").click(function() {
    $('html, body').animate({
        scrollTop: $(".header-sect").offset().top
    }, 500);
});

$("#product").click(function() {
    $('html, body').animate({
        scrollTop: $(".prod-sect").offset().top
    }, 500);
});

$("#contact").click(function() {
    $('html, body').animate({
        scrollTop: $(".prefooter-sect").offset().top
    }, 500);
});


//------------------------------------------------
//----- END JQUERY READY -----*/
	});
	
	
	
	
	
	
	