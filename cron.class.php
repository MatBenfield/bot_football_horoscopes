<?php
	/*
	Plugin Name: TCR Cron Class
	Description: Adds a basic cron methods
	Version: 10.0.0
	Plugin URI: http://thecellarroom.uk
	Author: ChelseaStats
	Author URI: http://thecellarroom.uk
	Copyright (c) 2015 The Cellar Room Limited
	*/
	class CronDB {
	
		public function Tweet($message) {
				$connection = new TwitterOAuth(**,**,**,**); // redacted
				$connection->get('account/verify_credentials');
				$connection->post('statuses/update',array('status' => $message));
		}
		
		public function getValueFromKey(&$array) {
			$rand_key = array_rand($array, 1);
			return = array_pop($rand_key);
		}
		
		public function getValuesFromArray($array, $n) {
			return array_rand(array_flip($array), $n);
		}
	}
