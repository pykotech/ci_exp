<!doctype html>
<html>
    <head><title><?php if(empty($title)) { echo "Pitchapie | A portal for #startup_pitch pitches for pitchers in Startup Weekend | Formerly known as Startup Weekend Online";
} else { echo $title . " | Pitchapie.com";}?></title>
            <meta charset="utf-8" />
	    <meta name="description" content="Pitchapie is about displaying startup pitches on this page so everyone can talk about it">
	  <meta name="keywords" content="#startup_pitch, pitches, startup pitches, startup weekend">
	     <link rel="stylesheet" href="assets/css/styles.css" />

	     <link rel="stylesheet" href="assets/css/speech_bubbles.css" />

<style type="text/javascript">
div#friends { 
max-height:200px;
}
</style>
         <!--[if lt IE 9]>
         <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
         <![endif]-->
     
     <!-- now for some jquery -->
    <script language="Javascript" type="text/javascript" src="jquery-1.6.4.min.js"></script>
       
    <script language="Javascript" type="text/javascript">
    //<![CDATA[
		// Function name
jQuery.fn.sbTooltip = function() {

			// For each instance of this element
			return this.each(function(){

				// Add the new attribute with title's current value and then remove the title attribute
				jQuery(this).attr({'data-sbtooltip': jQuery(this).attr("title")}).removeAttr("title");

			});

		};


      jQuery(document).ready(function(){


	//alert('hi loaded');

   
		   var user = '<?php if(isset($_SESSION['id'])) { echo $_SESSION['id']; } else { echo 'unknown'; }?>';
		
		jQuery.get('findfriends.php', 
			{username: user}
			,function(data) {
		
					jQuery("div#friends").html(data);
					});
	
		
		// $("select#so").change(function () {});



$("a.sbtooltip").sbTooltip();

     });


    </script>
		
          </head>
<body>
<a href="http://www.pitchapie.com" title="Go back to Home page"><h1>Pitchapie!</h1></a>
