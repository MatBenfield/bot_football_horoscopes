"""
Build
"""
# importing modules
import re
import os
import random
import pathlib
# setup
root = pathlib.Path(__file__).parent.parent.resolve()

# Zodiac signs. https://en.wikipedia.org/wiki/Astrological_sign
signs = ["Aries","Taurus","Gemini","Cancer","Leo","Virgo","Libra", "Scorpio","Sagittarius","Capricorn","Aquarius","Pisces"]

#  Random house number. Low numbers and one silly high one https://en.wikipedia.org/wiki/House_(astrology)
houses  = ["1st","2nd","3rd","4th","5th","6th","7th","8th","9th","10th","11th","12th","853rd"]

# Phases of the moon. https://en.wikipedia.org/wiki/Lunar_phase#The_phases_of_the_moon
adjOrbs = ["first quarter","last quarter","ascending","rising","descending","waxing","waning","gibbous","gibbons"]

# transitive words
gerunds = ["progressing","transitioning","developing","eclipsing","asserting","retrograding","falling","growing","changing","rising"]

# Planets in our solar system. https://en.wikipedia.org/wiki/List_of_gravitationally_rounded_objects_of_the_Solar_System#Planets
planets = ["Moon","Sun","Jupiter","Venus","Mercury","Mars","Neptune","Saturn","Pluto","Uranus"]

# Premier League teams https://en.wikipedia.org/wiki/2015%E2%80%9316_Premier_League
teams = ["Arsenal", "Aston Villa", "Brighton", "Burnley", "Chelsea", "Palace", "Man Utd", "Man City", "Leeds", "Leicester", "Everton", "West Ham", "Liverpool", "Spurs", "West Brom", "Watford", "Southampton", "Newcastle", "Wolves", "Fulham"]

# Suffixes
suffixes = [
            "harness the energy of #club#'s star player",
            "look to #club#'s press conference for guidance",
            "watch out for #club#'s defensive errors",
            "bet on the opposite of Lawro's #club# prediction",
            "rid your team of sideways passing midfielders.",
            "draw strength from #club#'s defensive positioning",
            "consider #club# inverting their fullbacks",
            "consider #club#'s ineffective crossing",
            "consider #club#'s character",
            "worry about #club#'s lack of shots",
            "worry about #club#'s tendency to shoot from range",
            "worry about #club#'s lack of big chances",
            "worry about #club# conceding too many shots",
            "worry about possession based hipsters from North London",
            "worry about #club#'s high number of instagram selfies",
            "worry about #club#'s high intensity runs",
            "worry about #club#'s high profile player unfollowing the club on twitter",
            "worry about #club#'s squad player liking their own transfer rumour on instagram",
            "worry about #club#'s unused player refusing to sit on the bench",
            "worry about #club#'s lack of high intensity runs",
            "worry about #club# qualifying for the Europa League",
            "worry about #club# trying to utilise the double pivot",
            "find #club# will perform for you",
            "find ex-referee is outspoken about #club#'s level of respect",
            "find #club# will disappoint you",
            "find #club# will mostly be drawn offside",
            "find #club# cannot defend effectively",
            "think about #club#'s free-kick routines",
            "think about #club#'s penalty takers",
            "think about #club#'s great show of character",
            "think about #club#'s leadership, character, and experience",
            "think about #club#'s injured, heavy smoking midfielder",
            "think about #club#'s poor disciplinary record",
            "think about #club#'s decision to consider employing Tim Sherwood",
            "think about #club#'s decision to consider employing AVB",
            "worry about Donald Trump wanting to get into football, he is considering #club# or Millwall",
            "worry about #club# wanting to appoint manager's dog as director of football",
 ]

# Main phrases - Some phrases contain suffixes, some do not.
phrasing = [
	    	"Today's #planet#-#planet2# opposition could force you to #suffix#",
	    	"Today's #planet#-#planet2# match-up may remind you to #suffix#",
      		"Today's #planet#-#planet2# conjunction points you to #suffix#",
	    	"Today's #adjOrb# #planet# in #zodiac# suggests you should #suffix#",
	    	"Today's #adjOrb# #planet# on the dark side of #zodiac# suggests you should #suffix#",
	    	"Today's #adjOrb# #planet# in #zodiac# suggests you should avoid the #club# match, there is a wanker with a drum",
	    	"Today's #planet# in #zodiac# aligns so you may #suffix#",
	    	"Today's #adjOrb# #planet# in #zodiac#. don't forget to #suffix#",
	    	"Today's #adjOrb# #planet# in #zodiac# is the clearest indication that red trousers are not for you",
	    	"Today you will find yourself under the cosh as #club# dominates your box",
	    	"Today you will find yourself waving your imaginary card at #club#",
	    	"Today there is a strong indication #club# will be linked to a big money signing. War chest",
	    	"Today there is a strong indication #club# will be sending someone out on loan. when will it end?",
	    	"The #adjOrb# #planet# in your #house# house of full backs means you should #suffix#",
	    	"The #planet#-#planet2# opposition could give rise to a bad moment. You must #suffix#",
	    	"#planet# in your #house# house and #planet2# in the #house2# house brings you to #suffix#",
	    	"#planet#-#planet2# opposition will probably means you #suffix#",
	    	"#planet# in #zodiac# and your #house# house urges for real pace but #suffix#",
	    	"#planet#-#planet2# alignment. You may #suffix#",
	    	"#planet# in #zodiac#. #suffix#",
	    	"#planet# in #zodiac# prompts you to ignore Niall Quinn's unsure and ever changing opinion on #club#'s performance. TV replays notwithstanding",
	    	"#planet#-#planet2# alignment focuses you to #suffix#",
	    	"#planet#-#planet2# alignment gives you motivation to #suffix#",
	    	"#planet# in #zodiac# and your #house# house gives motivation to #suffix#",
	    	"#planet# in #zodiac# makes you come to terms with the excessive cost of televised football",
	    	"#adjOrb# #planet# and #zodiac# in your #house# house. #suffix#",
	    	"#adjOrb# #planet# in #house# house means you must #suffix#",
	    	"#adjOrb# #planet# in #zodiac# and your #house# house. You may #suffix#",
	    	"#gerund# #planet# and your #house# house. You may #suffix#",
	    	"#adjOrb# #planet# in your #house# house #suffix#",
			"#adjOrb# #planet# and your #house# house. You may #suffix#",
			"#gerund# #planet# in your #house# house #suffix#",
	    	"#adjOrb# #planet# in #zodiac#. #suffix#",
	    	"#adjOrb# #planet# in #zodiac#. Life exists outside the virtual waiting room.",
	    	"#adjOrb# #planet# puts you on high alert, consider an appeal to the FA",
	    	"#adjOrb# #planet# as your team heads north, danger comes in the form of a Stanley-knife-wielding trackie-wearing probationer",
	    	"#adjOrb# #planet# puts you in a touchy mood, try to avoid #club#'s medical staff",
	    	"#adjOrb# #planet# in your descendant #house# house. You should #suffix#",
	    	"#adjOrb# #planet# in #zodiac#. You should #suffix#",
	    	"#adjOrb# #planet# puts you in a position of conflict, family or football. Only you can decide",
	    	"#adjOrb# #planet# puts #club# in crisis, there are clear-the-air talks, it's a complete meltdown",
			"your #gerund# #planet# in your #house# house has Martin Keown in your neighbourhood, it's ok to phone the police/zoo",
			"#adjOrb# #planet# in #zodiac# is a gentle reminder keep your Thursdays and Sundays free",
	    	"With the #adjOrb# #planet# in your sleep sector, insomniacs should try watching #club#",
	    	"With the #adjOrb# #planet# in your fitness sector, enjoy two pies at your next game",
	    	"With the #adjOrb# #planet# in your giant hands talking nonsense sector, try to avoid Niall Quinn",
	    	"With the #adjOrb# #planet# in your faith sector, a chance encounter with Glenn Hoddle reminds you how to behave in this life",
	    	"With the #adjOrb# #planet# sparks a lucky streak, Peter Reid is at the bar and he'll get a round in",
	    	"With the #adjOrb# #planet# sparks a cup run. consider booking European tour",
	    	"With the #adjOrb# #planet# is a difficult time, will you turn to Big Sam or Tony Pulis? caution as Pardew lurks!",
	    	"With the #adjOrb# #planet# in your education sector, remember laminated signs of discontent or banter are to be destroyed",
	    	"Don't bother going to see #club#'s next game the bloke next to you will smell like he's shat himself, twice.",
	    	"A defensive minded #planet# in #zodiac# means it's time to #suffix#",
	    	"An attacking focus on this #adjOrb# #planet# in #zodiac# means you could #suffix#",
	    	"A counter-attacking focus on this #adjOrb# #planet# in #zodiac# means you should #suffix#",
	    	"Parked bus on #planet# in #zodiac#. means you should #suffix#",
	    	"Jamie Redknapp and #zodiac# in your #house# house, try to avoid conflict intellectually. Silence",
			"your outer #planet# and #zodiac# in your #house# house means any mention of gegenpressing will make you poop a little",
	    	"Misaligned #planet# makes rising star put in a transfer request at the 11th hour. Rat.",
	    	"Misaligned #planet# appoints Mike Dean in your referee sector. Its all about him.",
	    	"It's a difficult day if you support #club#, try not to burn your own town",
	    	"Opposition between #planet# and #planet2# could result in the need to #suffix#",
	    	"Alignment between #planet# and #planet2# could bring about the need to #suffix#",
	    	"Misplaced passing between #planet# and #planet2# could breed thoughts that forces you to #suffix#",
	    	"Windfall! there is a strong indication #club#'s star player will fall over at the slightest gust of wind",
	    	"You are not alone, there are support charities if you are a fan of #club# and they are getting you down",
	    	"Looks like #planet# in #zodiac# means #club# are on the up.",
	    	"Your long serving captain is leaving the club. You can cry if you want to",
			"With today's #planet# in #zodiac# Robbie Keane's boyhood club is #club#",
			"With today's #planet# in #zodiac# rival fans of #club# are smashing up bathroom sinks in the away end.",
			"Retrograde #planet# in #zodiac# reminds you that your star player is racist but it's ok as he scores goals",
			"Retrograde #planet# in #zodiac# reminds you your team is ageing, you are ageing. everyone is ageing",
			"With today's #planet# in #zodiac# be careful what you say about #club#, their fans get upset easily",
			"With today's #planet# allocated to #zodiac# do question if that is all #club# take away",
			"With today's #planet# in #zodiac# a brief encounter with a youth player from #club# is on the cards"
 ]

# functions
def multiple_replace(dic, text):
    pattern = "|".join(map(re.escape, dic.keys()))
    return re.sub(pattern, lambda m: dic[m.group()], text) 

def replace_chunk(content, marker, chunk):
    replacer =	re.compile(r"<!\-\- {} starts \-\->.*<!\-\- {} ends \-\->".format(marker, marker),
        re.DOTALL,
    )
    chunk = "<!-- {} starts -->\n{}\n<!-- {} ends -->".format(marker, chunk, marker)
    return replacer.sub(chunk, content)

total_output = ""
# processing
for sign in signs :
 dic = {
	    "#zodiac#"  : sign,
	    "#adjOrb#"  : random.choice(adjOrbs),
	    "#suffix#"  : random.choice(suffixes),
		"#gerund#"  : random.choice(gerunds),
		"#house#"   : random.choice(houses),
		"#house2#"  : random.choice(houses),
		"#planet#"  : random.choice(planets),
		"#planet2#" : random.choice(planets),
		}
 output_string = multiple_replace(dic, random.choice(phrasing))
 output_string = output_string.replace("#club#", random.choice(teams))
 total_output += ("<h2>" + sign + "</h2> - <p>" + output_string + "</p>")

print(total_output)

if __name__ == "__main__":
    readme = root / "README.md"
    readme_contents = readme.open().read()
    rewritten = replace_chunk(readme_contents, "horoscopes_item", total_output)
    readme.open("w").write(rewritten)
    print (total_output)
