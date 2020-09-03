# Football Horoscopes

![Daily Build](https://github.com/MatBenfield/bot_football_horoscopes/workflows/Daily%20Build/badge.svg) ![Pylint](https://github.com/MatBenfield/bot_football_horoscopes/workflows/Pylint/badge.svg)

A Twitter bot that tweets 12 times per day, once for each star sign, and uses a handful of arrays to generate random football horoscopes.

<!-- horoscopes_item starts -->
<h2>Aries</h2> - <p>Retrograde Moon in Aries reminds you your team is ageing, you are ageing. everyone is ageing</p><h2>Taurus</h2> - <p>Sun-Moon alignment. You may worry about Palace qualifying for the Europa League</p><h2>Gemini</h2> - <p>Today's Moon-Pluto conjunction points you to consider West Brom inverting their fullbacks</p><h2>Cancer</h2> - <p>The descending Pluto in your 10th house of full backs means you should consider Aston Villa's ineffective crossing</p><h2>Leo</h2> - <p>last quarter Venus puts you on high alert, consider an appeal to the FA</p><h2>Virgo</h2> - <p>last quarter Moon in your 9th house find Fulham will mostly be drawn offside</p><h2>Libra</h2> - <p>rising Saturn in Libra. rid your team of sideways passing midfielders.</p><h2>Scorpio</h2> - <p>Retrograde Venus in Scorpio reminds you that your star player is racist but it's ok as he scores goals</p><h2>Sagittarius</h2> - <p>Saturn in Sagittarius prompts you to ignore Niall Quinn's unsure and ever changing opinion on Arsenal's performance. TV replays notwithstanding</p><h2>Capricorn</h2> - <p>A defensive minded Mars in Capricorn means it's time to worry about Newcastle's lack of high intensity runs</p><h2>Aquarius</h2> - <p>waning Mercury in your 853rd house find Liverpool will perform for you</p><h2>Pisces</h2> - <p>Today's Saturn-Pluto conjunction points you to worry about Aston Villa's high number of instagram selfies</p>
<!-- horoscopes_item ends -->

## How It Works

 Definitions of the following arrays:

* `zodiac` — the 12 astrological signs.
* `house` —  houses, whose positions depend on time and location rather than on date.
* `adjOrb` — the phases of the moon.
* `planet` — planets in our solar system.
* `team` — Premier League clubs.
* `suffix` — a list of suffix phrases.
* `phrasing` — a list of phrases.

Some items are intended to be constant and immutable. Example: there are only 12 astrological signs. Also, words surrounded by hashtags (`#`) are replaced by a random value from one of the other arrays.

## Contributing

Feel free to add new strings to the arrays. Focus on the `$phrases` and `$suffix` arrays initially.

Add a new line within quotes with a comma at the end.

Try writing in the style of other horoscopes - a quick google search should give you the idea.

Phrases are tweeted, so consider the string length.

[Read more](CONTRIBUTING.MD) about contributing to this project.
