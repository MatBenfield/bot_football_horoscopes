# Football Horoscopes

A Twitterbot that runs off a Cron job and utilizes the [abraham/twitteroauth](https://github.com/abraham/twitteroauth) library. It tweets 12 times per day, once for each star sign, and uses a handful of arrays to generate random football horoscopes.

### How It Works

The index.php file defines the follow arrays:

* `zodiac` — the 12 astrological signs.
* `house` —  houses, whose positions depend on time and location rather than on date.
* `adjOrb` — the phases of the moon.
* `planet` — planets in our solar system.
* `team` — Premier League clubs.
* `suffix` — a list of suffex phrases.
* `phrasing` — a list of phrases.

Some items are intended to be constant and immutable. Example: there are only 12 astrological signs. Also, words surrounded by hashtags (`#`) are replaced by a random value from one of the other arrays.

### Contributing

Feel free to add new strings to the arrays. Focus on the `$phrases` and `$suffix` arrays initially.

Add a new line within quotes with a comma at the end.

Try writing in the style of other horoscopes - a quick google search should give you the idea.

Phrases are tweeted, so consider the string length.

[Read more](CONTRIBUTING.MD) about contributing to this project.

### License

The [Unlicense](UNLICENSE).

This is free and unencumbered software released into the public domain.

Anyone is free to copy, modify, publish, use, compile, sell, or
distribute this software, either in source code form or as a compiled
binary, for any purpose, commercial or non-commercial, and by any
means.
