<?php
	/*
	Plugin Name: TCR database PDO Class
	Description: Adds a basic PDO database abstraction layer for custom queries
	Version: 10.0.0
	Plugin URI: http://thecellarroom.uk
	Author: ChelseaStats
	Author URI: http://thecellarroom.uk
	Copyright (c) 2015 The Cellar Room Limited
	*/

	class CronDB {
		// use WordPress Configs DB defines
		private $host   = '**';
		private $user   = '**';
		private $pass   = '**';
		private $dbname = '**';
		private $dbh;
		private $error;
		private $stmt;
		public function __construct() {
			// Set DSN
			$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
			// Set options
			$options = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);
			// Create a new PDO instance
			try {
				$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
			}
				// Catch any errors
			catch (PDOException $e) {
				$this->error = $e->getMessage();
			}
		}
		public function query($query) {
			$this->stmt = $this->dbh->prepare($query);
		}
		public function bind($param, $value, $type = null) {
			if (is_null($type)) {
				switch (true) {
					case is_int($value):
						$type = PDO::PARAM_INT;
						break;
					case is_bool($value):
						$type = PDO::PARAM_BOOL;
						break;
					case is_null($value):
						$type = PDO::PARAM_NULL;
						break;
					default:
						$type = PDO::PARAM_STR;
				}
			}
			$this->stmt->bindValue($param, $value, $type);
		}
		public function execute() {
			return $this->stmt->execute();
		}
		public function rows() {
			$this->execute();
			return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		public function row() {
			$this->execute();
			return $this->stmt->fetch(PDO::FETCH_ASSOC);
		}
		public function rowCount() {
			return $this->stmt->rowCount();
		}
		public function lastInsertId() {
			return $this->dbh->lastInsertId();
		}
		public function beginTransaction(){
			return $this->dbh->beginTransaction();
		}
		public function endTransaction(){
			return $this->dbh->commit();
		}
		public function cancelTransaction() {
			return $this->dbh->rollBack();
		}
		public function __destruct() {
			$this->dbh;
		}
		public function closeDbConnection($dbh) {
			register_shutdown_function($dbh);
		}

		public function Tweet($message) {
				$connection = new TwitterOAuth(**,**,**,**);
				$connection->get('account/verify_credentials');
				$connection->post('statuses/update',array('status' => $message));
			}

		public function _V($value) {
				// this is for displaying match event images
				$value2=  trim($this->titleCase(strtolower(str_replace('_'," ",$value))));
				return $value2;
			}

		public function titleCase($string) {
			$word_splitters = array(' ', '-', "O'", "L'", "D'", 'St.', 'Mc','Mac');
			$lowercase_exceptions = array('the', 'van', 'den', 'von', 'und', 'der', 'de', 'di', 'da', 'of', 'and', "l'", "d'");
			$uppercase_exceptions = array('III', 'IV', 'VI', 'VII', 'VIII', 'IX');
		 
			$string = strtolower($string);
			foreach ($word_splitters as $delimiter)
			{ 
				$words = explode($delimiter, $string); 
				$newwords = array(); 
				foreach ($words as $word)
				{ 
					if (in_array(strtoupper($word), $uppercase_exceptions))
						$word = strtoupper($word);
					else
					if (!in_array($word, $lowercase_exceptions))
						$word = ucfirst($word); 
		 
					$newwords[] = $word;
				}
		 
				if (in_array(strtolower($delimiter), $lowercase_exceptions))
					$delimiter = strtolower($delimiter);
		 
				$string = join($delimiter, $newwords); 
			} 
			return $string; 
		}

	}
