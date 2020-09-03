# Football Horoscopes

![Daily Build](https://github.com/MatBenfield/bot_football_horoscopes/workflows/Daily%20Build/badge.svg) ![Pylint](https://github.com/MatBenfield/bot_football_horoscopes/workflows/Pylint/badge.svg)

A Twitter bot that tweets 12 times per day, once for each star sign, and uses a handful of arrays to generate random football horoscopes.

<!-- horoscopes_item starts -->
<h2>Aries</h2> - <p>Pluto in Aries and your 2nd house gives motivation to find Newcastle will mostly be drawn offside</p><h2>Taurus</h2> - <p>your outer Mars and Taurus in your 6th house means any mention of gegenpressing will make you poop a little</p><h2>Gemini</h2> - <p>A counter-attacking focus on this last quarter Uranus in Gemini means you should consider Arsenal's ineffective crossing</p><h2>Cancer</h2> - <p>An attacking focus on this first quarter Neptune in Cancer means you could think about Watford's penalty takers</p><h2>Leo</h2> - <p>Don't bother going to see Chelsea's next game the bloke next to you will smell like he's shat himself, twice.</p><h2>Virgo</h2> - <p>Looks like Pluto in Virgo means Liverpool are on the up.</p><h2>Libra</h2> - <p>Mars in Libra and your 1st house gives motivation to consider Chelsea inverting their fullbacks</p><h2>Scorpio</h2> - <p>gibbous Pluto puts Wolves in crisis, there are clear-the-air talks, it's a complete meltdown</p><h2>Sagittarius</h2> - <p>It's a difficult day if you support Chelsea, try not to burn your own town</p><h2>Capricorn</h2> - <p>last quarter Sun in Capricorn. bet on the opposite of Lawro's Leeds prediction</p><h2>Aquarius</h2> - <p>gibbons Mercury in Aquarius is a gentle reminder keep your Thursdays and Sundays free</p><h2>Pisces</h2> - <p>Parked bus on Sun in Pisces. means you should bet on the opposite of Lawro's Newcastle prediction</p>
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
