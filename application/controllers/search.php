<?php

class search extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function field($query = []) {
		
		if(empty($query)) {

			$this->view('error/index');
			return;
		}

		$page = 1;

		if(isset($query['page'])) {

			$page = $query['page'];
			unset($query['page']);
		}

		$result = $this->model->getSearchResults($query, $page);

		if($page == '1')
			($result != 'noData') ? $this->view('search/result', $result) : $this->view('error/noResults', 'search/index/');
		else
			echo json_encode($result);
	}

	public function fulltext($query = []) {
		
		if(!(isset($query['term']))) {

			$this->view('error/index');
			return;
		}

		$data['term'] = $query['term'];
		$page = (isset($query['page'])) ? $query['page'] : "1";

		$result = $this->model->getFullTextSearchResults($data, $page);

		if($page == '1')
			($result != 'noData') ? $this->view('search/fulltextResult', $result) : $this->view('error/noResults', 'search/index/');
		else
			echo json_encode($result);
	}

	public function advanced(){

		$arrayOfKeys = $this->model->getUniqueKeys();
		($arrayOfKeys)? $this->view('search/advanced', $arrayOfKeys) : $this->view('error/noResults', 'search/index/');
	}

	public function journal(){

		$this->view('search/page');	
	}

	public function searchWords() {

		//Right now not needed for itihaasa project 
		//$this->insertForeignKeys();

		$contents = file_get_contents("/Users/sriranga/Documents/projects/jain-work/dbscripts/all_words_from_db.txt");
		$lines = preg_split("/\n/", $contents);
	
		
		$db = $this->model->db->useDB();


		// $count = $this->model->checkWordExistence('ಯುವೆನ್​ಚ್ವಾಂಗ್');
		// var_dump($count);
		// exit(0);
		foreach ($lines as $line) {

			$wordsList = preg_split("/,/",$line);
			$idword = $wordsList[0];
			if(trim($wordsList[1]) != "")
				$separateWords = preg_split("/;/",trim($wordsList[1]));
			else
				$separateWords[0] = $wordsList[0];

			foreach($separateWords as $wordToSearch){

				$count = $this->model->checkWordExistence($wordToSearch);

				if(!$count)
					$content[$wordToSearch] = $count;				
			}
		}

		print_r($content);

	}

}

?>
