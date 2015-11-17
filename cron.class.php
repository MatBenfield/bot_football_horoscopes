<?php
/**
 * Football horoscopes CRON class.
 *
 * Defines CRON methods.
 *
 * @version     10.0.0
 * @link        http://thecellarroom.uk
 * @author      ChelseaStats
 * @copyright   Copyright (c) 2015 The Cellar Room Limited
 */
class CronDB {

	/**
	 * POST tweet to Twitter.
	 *
	 * Example:
	 *
	 * ```
	 * TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
	 * ```
	 *
	 * @param string $message
	 */
	public function Tweet($message) {
		$connection = new TwitterOAuth(**,**,**,**); // redacted
		$connection->get('account/verify_credentials');
		$connection->post('statuses/update',array('status' => $message));
	}

	public function getValueFromKey(&$array) {
		$rand_key = array_rand($array);
		return array_pop($array);
	}

	public function getValuesFromArray($array, $n) {
		return array_rand(array_flip($array), $n);
	}
}
