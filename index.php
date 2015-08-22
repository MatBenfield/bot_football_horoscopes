<?php
	require_once ('twitteroauth.php');
	require_once( 'cron.class.php' );
	/**********************************************************************************************/
	$pdo = new CronDB();
	$pdo->query("SELECT count(*) as counter FROM table WHERE counter = 0");
	$row = $pdo->row();
	if(isset($row['counter']) && $row['counter'] > 1) {
		FootballHoroscopes();
	} else {
		$pdo->query("UPDATE table SET counter='0' WHERE ID > 0 ");
		$pdo->execute();
		FootballHoroscopes();
	}
	function FootballHoroscopes() {
		$pdo->query("SELECT ID, field FROM table WHERE counter = 0 ORDER BY RAND() LIMIT 1");
		$row 		= $pdo->row();
    
    $zodiacsign = array("Aries","Taurus","Gemini","Cancer","Leo","Virgo","Libra","Scorpio","Sagittarius","Capricorn","Aquarius","Pisces");
    $house      = array("1st","10th","7th","4th");
    $adjOrb     = array("first quarter","last quarter","ascending","rising","descending","waxing","waning","gibbous","gibbons");
    $planet     = array("moon","sun","Jupiter","Venus","Mercury","Mars","Neptune","Saturn","Pluto","Uranus");
    $suffix     = array("look to #player# for guidance",
                        "watch out for #player#",
                        "Rid yourself of #player#",
                        "your mum needs help with #player#",
                        "draw strength from #player#'s positioning",
                        "harness the energy of #player#",
                        "do not trust #player#'s agent",
                        "worry about #player#'s playing minutes",
                        "worry about #player#'s high intensity runs",
                        "#player# will please you",
                        "#player# will dissappoint you",
                        "#player# will be drawn offside",
                        "#player# cannot defend effectively",
                        "#player# passes sideways and maybe backwards"
                      );
  $phrasing = array (
"#zodiacsign# - The #adjorb# #orb# in your #house# house of closure finds you ready to let go of #noun#. #quicksuffix#",
"#zodiacsign# - Today's #adjorb# #orb# in #zodiacsign# helps you cut out #noun#. #quicksuffix#",
"#zodiacsign# - #adjorb.capitalize# #orb#. The more you share #noun# with others, the more #noun# they share. #quicksuffix#",
"#zodiacsign# - Today’s #orb#-#orb# opposition could #energyverb# your #noun#. #quicksuffix#",
"#zodiacsign# - With the #adjorb# #orb# in your friendship sector forms a supportive angle to #orb#. #quicksuffix#",
"#zodiacsign# - #orb.capitalize# in your #house# house and #orb# in #house# house brings #noun.s# around you. #quicksuffix#",
"#zodiacsign# - The #orb#-#orb# opposition could give rise to a bad #noun#. #quicksuffix#",
"#zodiacsign# - #orb.capitalize#-#orb# opposition will #energyverb# your #noun#. #quicksuffix#",
"#zodiacsign# - #orb.capitalize#-#orb# opposition will #energyverb# your #bodypart#. #quicksuffix#",
"#zodiacsign# - #adjorb.capitalize# #orb# in your #house# house. #quicksuffix#",
"#zodiacsign# - #adjorb.capitalize# #orb# in #zodiacsign#. #quicksuffix#",
"#zodiacsign# - Opposition between #orb# and #orb# could #energyverb# your vital #noun# energy. #quicksuffix#",
"#zodiacsign# - #orb.capitalize# in #zodiacsign# and your #house# house urges for new #noun.s#. #quicksuffix#",
"#zodiacsign# - #adjorb.capitalize# #orb# and #zodiacsign# in your #house# house. #quicksuffix#",
"#zodiacsign# - #orb.capitalize# in #zodiacsign#. #quicksuffix#",
"#zodiacsign# - #adjective.capitalize# #orb# in #zodiacsign#. #quicksuffix#",
"#zodiacsign# - A #adjective# #orb# in #zodiacsign# could #energyverb# your #bodypart#. #quicksuffix#",
"#zodiacsign# - #adjective.capitalize# #orb# in #house# house may #energyverb# your #bodypart#. #quicksuffix#",
"#zodiacsign# - #adjective.capitalize# #orb# in #zodiacsign# and your #house# house. #quicksuffix#",
"#zodiacsign# - #orb.capitalize#-#orb# alignment #energyverb.s# your #noun#. #quicksuffix#",
"#zodiacsign# - Today's #orb# in #zodiacsign# #energyverb.s# your #noun#. #quicksuffix#",
"#zodiacsign# - Today's #adjorb# #orb# in #zodiacsign# #energyverb.s# your #bodypart#. #quicksuffix#",
"#zodiacsign# - A #adjective# #orb# in #zodiacsign# #energyverb.s# your #noun#. #quicksuffix#",
"#zodiacsign# - A #adjective# #adjorb# #orb# in #zodiacsign# could #energyverb# your #bodypart#. #quicksuffix#",
"#zodiacsign# - #adjective.capitalize# #orb# in #house# house #energyverb.s# your #noun#. #quicksuffix#",
"#zodiacsign# - #adjective.capitalize# #orb# in #zodiacsign# #energyverb.s# your #noun#. #quicksuffix#",
"#zodiacsign# - #orb.capitalize#-#orb# alignment #energyverb.s# your #noun#. #quicksuffix#"
);
                        
		$player 		= str_replace($vowels, "", $row['field']);
		$length 	= strlen($name);
		$random 	= rand(1,$length);
		$mssngVwls 	= strrev(chunk_split(strrev($name), $random,' '));
		$answer 	= $pdo->_V($row['field']);
		$id 		= $row['ID'];
		$pdo->Tweet("Missng vowels game : {$mssngVwls}");
		$pdo->query("UPDATE table SET counter='1' WHERE ID = :id ");
		$pdo->bind(':id',$id);
		$pdo->execute();
		sleep(1200);
		$pdo->Tweet("Answer was : {$answer}. Congratulations if you got it.");
	}
