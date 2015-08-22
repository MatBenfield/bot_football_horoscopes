<?php
	require_once ('twitteroauth.php');
	require_once( 'cron.class.php' );
	/**********************************************************************************************/
	$CronDB = new CronDB();

    $zodiac     = array("Aries","Taurus","Gemini","Cancer","Leo","Virgo","Libra","Scorpio","Sagittarius","Capricorn","Aquarius","Pisces");
    $house      = array("1st","10th","7th","4th");
    $adjOrb     = array("first quarter","last quarter","ascending","rising","descending","waxing","waning","gibbous","gibbons");
    $planet     = array("Moon","Sun","Jupiter","Venus","Mercury","Mars","Neptune","Saturn","Pluto","Uranus");
    $team       = array("Arsenal","Bournemouth","Chelsea","Palace","Man Utd","Man City","Villa","Stoke","Norwich","Leicester",
			"Everton","West Ham","Liverpool","Spurs","Sunderland","Newcastle","West Brom","Watford","Southampton","Swansea");
    $suffix     = array(
	                "look to #team#'s press conference for guidance",
                        "watch out for #team#'s defensive errors",
	                "consider betting on the opposite of Lawro's #team# prediction",
                        "rid yourself of sideways passing midfielders",
                        "draw strength from #team#'s defensive positioning",
	                "consider #team# inverting their fullbacks",
	                "consider #team#'s ineffective crossing",
                        "harness the energy of #team#'s star player",
                        "worry about #team#'s lack of shots",
	                "worry about #team#'s lack of lack of big chances",
	                "think about #team#'s free-kick routines",
	                "think about #team#'s penalty takers",
                        "worry about #team#'s high intensity runs",
	                "worry about #team#'s lack of high intensity runs",
                        "find #team# will perform for you",
                        "find #team# will disappoint you",
                        "find #team# will mostly be drawn offside",
                        "find #team# cannot defend effectively" );
    $phrasing = array (
	               "The #adjOrb# #planet# in your #house# house of full backs means you should. #suffix#",
	                "Today’s #planet#-#planet2# opposition could force you to #suffix#",
			"Today's #adjOrb# #planet# in #zodiac# suggests you should #suffix#",
			"Today's #planet# in #zodiac# aligns so you may #suffix#",
			"Today's #adjOrb# #planet# in #zodiac#. don't forget to. #suffix#",
			"With the #adjOrb# #planet# in your fitness sector forms a supportive angle to #suffix#",
			"#planet# in your #house# house and #planet2# in the #house2# house brings you to #suffix#",
			"The #planet#-#planet2# opposition could give rise to a bad moment. You must #suffix#",
			"#planet#-#planet2# opposition will probably means you #suffix#",
			"#adjOrb# #planet# in your #house# house. #suffix#",
			"#adjOrb# #planet# in #zodiac#. #suffix#",
			"Opposition between #planet# and #planet2# could result in the need to #suffix#",
	                "Alignment between #planet# and #planet2# could result in the need to #suffix#",
			"#planet# in #zodiac# and your #house# house urges for real pace but #suffix#",
			"#adjOrb# #planet# and #zodiac# in your #house# house. #suffix#",
			"#planet# in #zodiac#. #suffix#",
			"parked bus on #planet# in #zodiac#. means you should #suffix#",
			"#adjOrb# #planet# in #house# house means you muse #suffix#",
			"#adjOrb# #planet# in #zodiac# and your #house# house. You may #suffix#",
			"#planet#-#planet2# alignment. You may #suffix#",
			"A defensive minded #planet# in #zodiac# means it's time to #suffix#",
			"An attacking focus on this #adjOrb# #planet# in #zodiac# means you could #suffix#",
	                "A counter-attacking focus on this #adjOrb# #planet# in #zodiac# means you should #suffix#",
			"#adjOrb# #planet# in #house# house. You should #suffix#",
			"#adjOrb# #planet# in #zodiac#. You should #suffix#",
			"#planet#-#planet2# alignment focuses you to #suffix#" );

	foreach($zodiac as $sign) {

		$key        = array_rand( $phrasing, 1 );
		$string   = $phrasing[$key];

		$string = str_replace( '#zodiac#'  , $CronDB->getValueFromKey( $zodiac ) , $string );
		$string = str_replace( '#team#'    , $CronDB->getValueFromKey( $team   ) , $string );
		$string = str_replace( '#adjOrb#'  , $CronDB->getValueFromKey( $adjOrb ) , $string );
		$string = str_replace( '#house#'   , $CronDB->getValueFromKey( $house  ) , $string );
		$string = str_replace( '#house2#'  , $CronDB->getValueFromKey( $house  ) , $string );
		$string = str_replace( '#planet#'  , $CronDB->getValueFromKey( $planet ) , $string );
		$string = str_replace( '#planet2#' , $CronDB->getValueFromKey( $planet ) , $string );
		$string = str_replace( '#suffix#'  , $CronDB->getValueFromKey( $suffix ) , $string );
		$string = str_replace( '#team#'    , $CronDB->getValueFromKey( $team   ) , $string );

		$CronDB->Tweet( $sign .' - '. $string );

		sleep (120);

	}
