### Football Horoscopes

> Football Horoscopes

A twitterbot that runs off a cron job, utilising Abraham's twitter oauth library. It tweets 12 times a day, once for each star sign and uses a bunch of arrays to come up with semi-unique tweets.

> Help

The index.php file contains a bunch of arrays, some of these are fixed/complete as they, for example, contain signs of the zodiac and as there are only 12 these don't need to be edited.

Words within `#hashtags#` in the arrays get replaced by a random value from one of the other arrays using a basic str_replace call.

Feel free to go ahead and add new strings to the arrays, perhaps focus on the `$phrases` and `$suffix` arrays first.
Add a new line within quotes with a comma at the end.

Try writing in the style of other horoscopes - a quick google search should give you the idea.

Phrases are tweeted so consider the string length.
