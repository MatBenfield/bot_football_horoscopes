<?php	
require_once ('twitteroauth.php');	
require_once( 'cron.class.php' );
/**********************************************************************************************/	
$pdo 	= new CronDB();
$zodiac = array("Aries","Taurus","Gemini","Cancer","Leo","Virgo","Libra","Scorpio","Sagittarius","Capricorn","Aquarius","Pisces");
$house  = array("1st",",2nd","8th","9th","10th","7th","4th","853rd");
$adjOrb = array("first quarter","second quarter","last quarter","ascending","rising","descending","waxing","waning","gibbous","gibbons");
$planet = array("Moon","Sun","Jupiter","Venus","Mercury","Mars","Neptune","Saturn","Pluto","Uranus");
$team   = array("Arsenal","Bournemouth","Chelsea","Palace","Man Utd","Man City","Villa","Stoke","Norwich","Leicester","Everton","West Ham","Liverpool","Spurs","Sunderland","Newcastle","West Brom","Watford","Southampton","Swansea");
$suffix = array(
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
	"think about #team#'s great show of character",
	"think about #team#'s leadership, character, and experience",
	"think about #team#'s injured, heavy smoking midfielder",
	"worry about #team#'s high number of instagram selfies",
        "worry about #team#'s high intensity runs",
	"worry about #team#'s lack of high intensity runs",
        "find #team# will perform for you",
        "find #team# will disappoint you",
        "find #team# will mostly be drawn offside",
        "find #team# cannot defend effectively"
);
$phrasing = array (
	"The #adjOrb# #planet# in your #house# house of full backs means you should. #suffix#",
	"Today's #planet#-#planet2# opposition could force you to #suffix#",
	"Today's #planet#-#planet2# match-up may remind you to #suffix#",
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
	"#adjOrb# #planet# in #house# house means you must #suffix#",
	"#adjOrb# #planet# in #zodiac# and your #house# house. You may #suffix#",
	"#planet#-#planet2# alignment. You may #suffix#",
	"A defensive minded #planet# in #zodiac# means it's time to #suffix#",
	"An attacking focus on this #adjOrb# #planet# in #zodiac# means you could #suffix#",
	"A counter-attacking focus on this #adjOrb# #planet# in #zodiac# means you should #suffix#",
	"#adjOrb# #planet# in #house# house. You should #suffix#",
	"#adjOrb# #planet# in #zodiac#. You should #suffix#",
	"#planet#-#planet2# alignment focuses you to #suffix#"
);
foreach($zodiac as $sign) {
	$key    = array_rand( $phrasing, 1 );
	$string = $phrasing[$key];
	$string = str_replace( '#zodiac#'  , $pdo->getValueFromKey( $zodiac ) , $string );
	$string = str_replace( '#team#'    , $pdo->getValueFromKey( $team   ) , $string );
	$string = str_replace( '#adjOrb#'  , $pdo->getValueFromKey( $adjOrb ) , $string );
	$string = str_replace( '#house#'   , $pdo->getValueFromKey( $house  ) , $string );
	$string = str_replace( '#house2#'  , $pdo->getValueFromKey( $house  ) , $string );
	$string = str_replace( '#planet#'  , $pdo->getValueFromKey( $planet ) , $string );
	$string = str_replace( '#planet2#' , $pdo->getValueFromKey( $planet ) , $string );
	$string = str_replace( '#suffix#'  , $pdo->getValueFromKey( $suffix ) , $string );
	$string = str_replace( '#team#'    , $pdo->getValueFromKey( $team   ) , $string );
	$pdo->Tweet( $sign .' - '. $string );
	sleep (120);
}
