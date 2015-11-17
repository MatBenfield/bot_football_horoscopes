<?php
require __DIR__ . '/vendor/autoload.php';
require_once ('cron.class.php');

/**********************************************************************************************/

$cron 	= new CronDB();

/**
 * Zodiac signs.
 *
 * https://en.wikipedia.org/wiki/Astrological_sign
 *
 * @var array
 */
$zodiac = array("Aries","Taurus","Gemini","Cancer","Leo","Virgo","Libra",
                "Scorpio","Sagittarius","Capricorn","Aquarius","Pisces");

/**
 * Random house number. Low numbers and one silly high one.
 *
 * https://en.wikipedia.org/wiki/House_(astrology)
 *
 * @var array
 */
$house  = array("1st","2nd","3rd","4th","5th","6th","7th","8th","9th",
                "10th","11th","12th","853rd");

/**
 * Phases of the moon.
 *
 * https://en.wikipedia.org/wiki/Lunar_phase#The_phases_of_the_moon
 *
 * @var array
 */
$adjOrb = array("first quarter","last quarter","ascending","rising",
                "descending","waxing","waning","gibbous","gibbons");

/**
 * Planets in our solar system.
 *
 * https://en.wikipedia.org/wiki/List_of_gravitationally_rounded_objects_of_the_Solar_System#Planets
 *
 * @var array
 */
$planet = array("Moon","Sun","Jupiter","Venus","Mercury","Mars","Neptune",
                "Saturn","Pluto","Uranus");

/**
 * Premier League clubs.
 *
 * https://en.wikipedia.org/wiki/2015%E2%80%9316_Premier_League
 *
 * @var array
 */
$team   = array("Arsenal","Bournemouth","Chelsea","Palace","Man Utd","Man City","Villa","Stoke",
                "Norwich","Leicester","Everton", "West Ham","Liverpool","Spurs","Sunderland",
                "Newcastle","West Brom","Watford","Southampton","Swansea");
/**
 * Suffixes.
 *
 * @var array
 */
$suffix = array(
    "harness the energy of #team#'s star player.",
    "look to #team#'s press conference for guidance.",
    "watch out for #team#'s defensive errors.",
    "bet on the opposite of Lawro's #team# prediction.",
    "rid your team of sideways passing midfielders.",
    "draw strength from #team#'s defensive positioning.",
    "consider #team# inverting their fullbacks.",
    "consider #team#'s ineffective crossing.",
    "consider #team#'s character.",
    "worry about #team#'s lack of shots.",
    "worry about #team#'s tendency to shoot from range.",
    "worry about #team#'s lack of big chances.",
    "worry about #team# conceding too many shots.",
    "worry about possession based hipsters from North London.",
    "worry about #team#'s high number of instagram selfies.",
    "worry about #team#'s high intensity runs.",
    "worry about #team#'s high profile player unfollowing the club on twitter.",
    "worry about #team#'s squad player liking their own transfer rumour on instagram.",
    "worry about #team#'s unused player refusing to sit on the bench.",
    "worry about #team#'s lack of high intensity runs.",
    "worry about #team# qualifying for the Europa League.",
    "worry about #team# trying to utilise the douple pivot.",
    "find #team# will perform for you.",
    "find ex-referee is outspoken about #team#'s level of respect.",
    "find #team# will disappoint you.",
    "find #team# will mostly be drawn offside.",
    "find #team# cannot defend effectively.",
    "think about #team#'s free-kick routines.",
    "think about #team#'s penalty takers.",
    "think about #team#'s great show of character.",
    "think about #team#'s leadership, character, and experience.",
    "think about #team#'s injured, heavy smoking midfielder.",
    "think about #team#'s poor disciplinary record.",
    "think about #team#'s decision to consider employing Tim Sherwood.",
    "think about #team#'s decision to consider employing AVB.",
);

/**
 * Main phrases.
 *
 * Some phrases contain suffixes, some do not.
 *
 * @var array
 */
$phrasing = array (
    "Today's #planet#-#planet2# opposition should force you to #suffix#",
    "Today's #planet#-#planet2# match-up may remind you to #suffix#",
    "Today's #adjOrb# #planet# in #zodiac# suggests you should #suffix#",
    "Today's #adjOrb# #planet# on the dark side of #zodiac# suggests you should #suffix#",
    "Today's #adjOrb# #planet# in #zodiac# suggests you should avoid the #team# match, there is a wanker with a drum.",
    "Today's #planet# in #zodiac# aligns so you may #suffix#",
    "Today's #adjOrb# #planet# in #zodiac#. don't forget to #suffix#",
    "Today's #adjOrb# #planet# in #zodiac# is the clearest indication that red trousers are not for you.",
    "Today you will find yourself under the cosh as #team# dominates your box",
    "Today you will find yourself waving your imaginary card at #team#.",
    "Today there is a strong indication #team# will be linked to a big money signing. War chest!",
    "Today there is a strong indication #team# will be sending someone out on loan. when will it end?",
    "The #adjOrb# #planet# in your #house# house of full backs means you should #suffix#",
    "The #planet#-#planet2# opposition could give rise to a bad moment. You must #suffix#",
    "#planet# in your #house# house and #planet2# in the #house2# house brings you to #suffix#",
    "#planet#-#planet2# opposition will probably means you #suffix#",
    "#planet# in #zodiac# and your #house# house urges for real pace but #suffix#",
    "#planet#-#planet2# are in alignment. You may #suffix#",
    "#planet# in #zodiac#. #suffix#",
    "#planet# in #zodiac# prompts you to ignore Niall Quinn's unsure and ever changing opinion on #team#'s performance. TV replays notwithstanding",
    "#planet#-#planet2# alignment focuses you to #suffix#",
    "#planet#-#planet2# alignment gives you motivation to #suffix#",
    "#planet# in #zodiac# and your #house# house gives motivation to #suffix#",
    "#planet# in #zodiac# makes you come to terms with the excessive cost of televised football.",
    "#adjOrb# #planet# and #zodiac# in your #house# house. #suffix#",
    "#adjOrb# #planet# in #house# house means you must #suffix#",
    "#adjOrb# #planet# in #zodiac# and your #house# house. You may #suffix#",
    "#adjOrb# #planet# and your #house# house. You may #suffix#",
    "#adjOrb# #planet# in your #house# house #suffix#",
    "#adjOrb# #planet# in #zodiac#. #suffix#",
    "#adjOrb# #planet# puts you on high alert, consider an appeal to the FA.",
    "#adjOrb# #planet# as your team heads north, danger comes in the form of a Stanley-knife-wielding trackie-wearing probationer.",
    "#adjOrb# #planet# puts you in a touchy mood. Try to avoid #team#'s medical staff.",
    "#adjOrb# #planet# in #house# house. You should #suffix#",
    "#adjOrb# #planet# in #zodiac#. You should #suffix#",
    "#adjOrb# #planet# puts you in a position of conflict, family or football. Only you can decide.",
    "#adjOrb# #planet# puts #team# in crisis. There are clear-the-air talks. It's a complete meltdown.",
    "#adjOrb# #planet# in your #house# house has Martin Keown in your neighbourhood, it's ok to phone the police/zoo.",
    "#adjOrb# #planet# in #zodiac# is a gentle reminder keep your Thursdays and Sundays free.",
    "With the #adjOrb# #planet# in your sleep sector, insomniacs should try watching #team#.",
    "With the #adjOrb# #planet# in your fitness sector, enjoy two pies at your next game.",
    "With the #adjOrb# #planet# in your giant hands talking nonsense sector. Try to avoid Niall Quinn.",
    "With the #adjOrb# #planet# in your faith sector, a chance encounter with Glenn Hoddle reminds you how to behave in this life",
    "With the #adjOrb# #planet# sparks a lucky streak, Peter Reid is at the bar and he'll get a round in.",
    "With the #adjOrb# #planet# in your education sector, remember laminated signs of discontent or banter are to be destroyed",
    "Don't bother going to see #team#'s next game. The bloke next to you will smell like he shat himself, twice.",
    "A defensive minded #planet# in #zodiac# means it's time to #suffix#",
    "An attacking focus on this #adjOrb# #planet# in #zodiac# means you could #suffix#",
    "A counter-attacking focus on this #adjOrb# #planet# in #zodiac# means you should #suffix#",
    "Parked bus on #planet# in #zodiac#. means you should #suffix#",
    "Jamie Redknapp and #zodiac# in your #house# house, try to avoid conflict intellectually. **Silence.**",
    "Misaligned #planet# makes rising star put in a transfer request at the 11th hour.",
    "It's a difficult day if you support #team#. Try not to burn your own town.",
    "Opposition between #planet# and #planet2# could result in the need to #suffix#",
    "Alignment between #planet# and #planet2# could bring about the need to #suffix#",
    "Misplaced passing between #planet# and #planet2# could breed thoughts that forces you to #suffix#",
    "Windfall! There is a strong indication #team#'s star player will fall over at the slightest gust of wind.",
    "You are not alone. There are support charities, in case you are a fan of #team# and they are getting you down.",
    "Looks like #planet# in #zodiac# means #team# are on the up."
);

// iterate through zodiac signs
foreach($zodiac as $sign) {
    $key    = array_rand($phrasing);
    $string = $phrasing[$key];

	$randHouses  = $cron->getValuesFromArray( $house  , 2);
	$randPlanets = $cron->getValuesFromArray( $planet , 2);

    $string = str_replace( '#zodiac#'  , $cron->getValueFromKey( $zodiac ) , $string );
    $string = str_replace( '#team#'    , $cron->getValueFromKey( $team   ) , $string );
    $string = str_replace( '#adjOrb#'  , $cron->getValueFromKey( $adjOrb ) , $string );
    $string = str_replace( '#suffix#'  , $cron->getValueFromKey( $suffix ) , $string );
    if (preg_match('/#team#/', $string)) {
        $string = str_replace( '#team#'    , $cron->getValueFromKey( $team   ) , $string );
    }
    $string = str_replace( '#house#'   , $randHouses[0]  , $string );
	$string = str_replace( '#house2#'  , $randHouses[1]  , $string );
	$string = str_replace( '#planet#'  , $randPlanets[0] , $string );
	$string = str_replace( '#planet2#' , $randPlanets[1] , $string );

    $cron->Tweet($sign . " &#8212; " . ucfirst($string), 'horo');
    sleep (60);
}
