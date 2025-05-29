<?php

class Database extends PDO {

	public function __construct() {
	
	}

	public function useDB() {

		// Establish connection
		$connection = new MongoDB\Client("mongodb://" . DB_USER . ":" . DB_PASSWORD . "@" . DB_HOST . ":" . DB_PORT . "/" . DB_NAME);

		// Select db
		$db = $connection->{DB_NAME};
		//var_dump($db); exit(0);
		return $db;
	}

	public function createCollection($db, $collectionName) {

		// Drop collection if exists
		$db->dropCollection($collectionName);

		// Create Collection
		$db->createCollection($collectionName);

		// Select collection
		$collection = $this->selectCollection($db, $collectionName);

		//Create fulltext index on every field
		//, ['weights' => ['title'=>12, 'interviewee'=>10, 'people'=>8, 'places'=>6, 'organisations'=>4, 'technicalTerms'=>2 ] ]
		$collection->createIndex(['$**' => 'text'], ['weights' => ['title'=>12, 'interviewee'=>10, 'people'=>8, 'places'=>6, 'organisations'=>4, 'technicalTerms'=>2 ] ], [ 'language_override' => "mylanguage" ]);

		return $collection;
	}

	public function selectCollection($db, $collectionName) {

		// Select collection
		$collection = $db->selectCollection($collectionName);

		return $collection;
	}
}

?>
