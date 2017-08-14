// JavaScript Document

jQuery(document).ready(function($) {

// ---------------------------------------
//----- START JQUERY READY -----*/

// ----------------------------------------------- BLOG ARTICLE MATCH HEIGHT --
$('.blogListing .views-row h2').matchHeight();
$('.hpCallout').matchHeight();
$('.blogListing .views-row').matchHeight();
$('.blogListing .views-row .views-field-field-article-categories').matchHeight();



//-------------------------------- WAYPOINT JS STICKY TOPNAV -------------
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


// ---------------------------------------------- LAZY LOADING --
$('#webform-client-form-12 .webform-component input').focus(function(){
	var formInput = $(this);
	$('#webform-client-form-12 .webform-component').removeClass("formSelected");
	formInput.parent().addClass("formSelected");
});

$('#webform-client-form-12 .webform-component textarea').focus(function(){
	var formInput = $(this);
	$('#webform-client-form-12 .webform-component').removeClass("formSelected");
	formInput.parents('#webform-client-form-12 .webform-component').addClass("formSelected");
});

$('#webform-client-form-12 .webform-component input, #webform-client-form-12 .webform-component textarea').blur(function(){
	var formInput = $(this);
	$('#webform-client-form-12 .webform-component').removeClass("formSelected");
});


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
	
	
	
	
	
	
	