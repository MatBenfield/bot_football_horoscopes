<?php
require_once ('twitteroauth.php');
require_once ('cron.class.php');
/**********************************************************************************************/
$cron 	= new CronDB();
// 12 signs of the zodiac
$zodiac = array("Aries","Taurus","Gemini","Cancer","Leo","Virgo","Libra","Scorpio","Sagittarius","Capricorn","Aquarius","Pisces");
// Some house, low numbers and a silly high one
$house  = array("1st","2nd","3rd","4th","8th","1st","2nd","3rd","4th","8th","9th","10th","7th","4th","853rd");
// Moon types
$adjOrb = array("first quarter","last quarter","ascending","rising","descending","waxing","waning","gibbous","gibbons");
// Planets
$planet = array("Moon","Sun","Jupiter","Venus","Mercury","Mars","Neptune","Saturn","Pluto","Uranus");
// Premier League teams
$team   = array("Arsenal","Bournemouth","Chelsea","Palace","Man Utd","Man City","Villa","Stoke","Norwich","Leicester","Everton",
                "West Ham","Liverpool","Spurs","Sunderland","Newcastle","West Brom","Watford","Southampton","Swansea");
// Suffixes
$suffix = array(
    "harness the energy of #team#'s star player",
    "look to #team#'s press conference for guidance",
    "watch out for #team#'s defensive errors",
    "bet on the opposite of Lawro's #team# prediction",
    "rid your team of sideways passing midfielders",
    "draw strength from #team#'s defensive positioning",
    "consider #team# inverting their fullbacks",
    "consider #team#'s ineffective crossing",
    "consider #team#'s character",
    "worry about #team#'s lack of shots",
    "worry about #team#'s tendency to shoot from range",
    "worry about #team#'s lack of big chances",
    "worry about #team# conceding too many shots",
    "worry about possession based hipsters from North London",
    "worry about #team#'s high number of instagram selfies",
    "worry about #team#'s high intensity runs",
    "worry about #team#'s high profile player unfollowing the club on twitter",
    "worry about #team#'s lack of high intensity runs",
    "worry about #team# qualifying for the Europa League",
    "worry about #team# trying to utilise the douple pivot",
    "find #team# will perform for you",
    "find #team# will disappoint you",
    "find #team# will mostly be drawn offside",
    "find #team# cannot defend effectively",
    "think about #team#'s free-kick routines",
    "think about #team#'s penalty takers",
    "think about #team#'s great show of character",
    "think about #team#'s leadership, character, and experience",
    "think about #team#'s injured, heavy smoking midfielder",
    "think about #team#'s poor disciplinary record",
);
// Main Phrases, some with suffixes some without
$phrasing = array (
    "Today's #planet#-#planet2# opposition could force you to #suffix#",
    "Today's #planet#-#planet2# match-up may remind you to #suffix#",
    "Today's #adjOrb# #planet# in #zodiac# suggests you should #suffix#",
    "Today's #adjOrb# #planet# in #zodiac# suggests you should avoid the #team# match, there is a wanker with a drum",
    "Today's #planet# in #zodiac# aligns so you may #suffix#",
    "Today's #adjOrb# #planet# in #zodiac#. don't forget to #suffix#",
    "Today's #adjOrb# #planet# in #zodiac# is the clearest indication that red trousers are not for you",
    "Today you will find yourself under the cosh as #team# dominates your box",
    "Today there is a strong indication #team# will be linked to a big money signing. War chest",
    "The #adjOrb# #planet# in your #house# house of full backs means you should #suffix#",
    "The #planet#-#planet2# opposition could give rise to a bad moment. You must #suffix#",
    "#planet# in your #house# house and #planet2# in the #house2# house brings you to #suffix#",
    "#planet#-#planet2# opposition will probably means you #suffix#",
    "#planet# in #zodiac# and your #house# house urges for real pace but #suffix#",
    "#planet#-#planet2# alignment. You may #suffix#",
    "#planet# in #zodiac#. #suffix#",
    "#planet# in #zodia# prompts you to ignore Niall Quinn's unsure and ever changing opinion on #team#'s performance. TV replays notwithstanding",
    "#planet#-#planet2# alignment focuses you to #suffix#",
    "#planet#-#planet2# alignment gives you motivation to #suffix#",
    "#planet# in #zodiac# and your #house# house gives motivation to #suffix#",
    "#planet# in #zodiac# makes you come to terms with the excessive cost of televised football",
    "#adjOrb# #planet# and #zodiac# in your #house# house. #suffix#",
    "#adjOrb# #planet# in #house# house means you must #suffix#",
    "#adjOrb# #planet# in #zodiac# and your #house# house. You may #suffix#",
    "#adjOrb# #planet# in your #house# house #suffix#",
    "#adjOrb# #planet# in #zodiac#. #suffix#",
    "#adjOrb# #planet# puts you on high alert, consider an appeal to the FA",
    "#adjOrb# #planet# as your team heads north, danger comes in the form of a Stanley-knife-wielding trackie-wearing probationer",
    "#adjOrb# #planet# puts you in a touchy mood, try to avoid #team#'s medical staff",
    "#adjOrb# #planet# in #house# house. You should #suffix#",
    "#adjOrb# #planet# in #zodiac#. You should #suffix#",
    "#adjOrb# #planet# puts you in a position of conflict, family or football. Only you can decide",
    "#adjOrb# #planet# puts #team# in crisis, there are clear-the-air talks, it's a complete meltdown",
    "#adjOrb# #planet# in your #house# house has Martin Keown in your neighbourhood, it's ok to phone the police/zoo",
    "#adjOrb# #planet# in #zodiac# is a gentle reminder keep your Thursdays and Sundays free",
    "With the #adjOrb# #planet# in your fitness sector, enjoy two pies at your next game",
    "With the #adjOrb# #planet# in your faith sector, a chance encounter with Glenn Hoddle reminds you how to behave in this life",
    "With the #adjOrb# #planet# sparks a lucky streak, Peter Reid is at the bar and he'll get a round in",
    "With the #adjOrb# #planet# in your education sector, remember laminated signs of discontent or banter are to be destroyed",
    "Don't bother going to see #team#'s next game the bloke next to you will smell like he's shat himself, twice.",
    "A defensive minded #planet# in #zodiac# means it's time to #suffix#",
    "An attacking focus on this #adjOrb# #planet# in #zodiac# means you could #suffix#",
    "A counter-attacking focus on this #adjOrb# #planet# in #zodiac# means you should #suffix#",
    "Parked bus on #planet# in #zodiac#. means you should #suffix#",
    "Jamie Redknapp and #zodiac# in your #house# house, try to avoid conflict intellectually. Silence",
    "Misaligned #planet# makes rising star put in a transfer request at the 11th hour. Rat.",
    "It's a difficult day if you support #team#, try not to burn your own town",
    "Opposition between #planet# and #planet2# could result in the need to #suffix#",
    "Alignment between #planet# and #planet2# could bring about the need to #suffix#",
    "Misplaced passing between #planet# and #planet2# could breed thoughts that forces you to #suffix#",
    "Windfall! there is a strong indication #team#'s star player will fall over at the slightest gust of wind",
    "You are not alone, there are support charities if you are a fan of #team# and they are getting you down",
    "Looks like #planet# in #zodiac# means #team# are on the up."
);

foreach($zodiac as $sign) {

    $key    = array_rand( $phrasing, 1 );
    $string = $phrasing[$key];
    $string = str_replace( '#zodiac#'  , $cron->getValueFromKey( $zodiac ) , $string );
    $string = str_replace( '#team#'    , $cron->getValueFromKey( $team   ) , $string );
    $string = str_replace( '#adjOrb#'  , $cron->getValueFromKey( $adjOrb ) , $string );
    $string = str_replace( '#house#'   , $cron->getValueFromKey( $house  ) , $string );
    $string = str_replace( '#house2#'  , $cron->getValueFromKey( $house  ) , $string );
    $string = str_replace( '#planet#'  , $cron->getValueFromKey( $planet ) , $string );
    $string = str_replace( '#planet2#' , $cron->getValueFromKey( $planet ) , $string );
    $string = str_replace( '#suffix#'  , $cron->getValueFromKey( $suffix ) , $string );
    $string = str_replace( '#team#'    , $cron->getValueFromKey( $team   ) , $string );
    $cron->goTweet( $sign .' - '. $string ,'horo' );
    $cron->slack( $sign .' - '. $string ,'HoroBot','sun_with_face');
    sleep (60);
}
