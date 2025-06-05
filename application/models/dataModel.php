<?php

class dataModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	public function getFilesIteratively($dir, $pattern = '/*/'){

		$files = [];
	    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(rtrim($dir, "/")));
		$regex = new RegexIterator($iterator, $pattern, RecursiveRegexIterator::GET_MATCH);

	    foreach($regex as $file => $object) {
	        
			array_push($files, $file);
	    }

	    sort($files);
	    return ($files);
	}

	public function processFormData($formData){
		
		if(!isset($_SESSION['formdata']))
			$_SESSION['formdata'] = [];

		foreach ($formData as $key => $value) {
			if($key != 'view_type')
	        	$_SESSION['formdata'][$key] = $value;
    	}

	}


	public function normalizeData(){

		$data = [];

		$visitorTypeFields = [
			'alumnus'=>['batch','branch','hostel'],
			'faculty'=>['department'],
			'student'=>['rollnumber','hostel'],
			'resident'=>['relationship'],
			'staff'=>['designation']
		];
	
		$commonFormFields = [
			'visitor_name',
			'visitor_count',
			'email',
			'phonenumber',
			'sign_in_date',
			'sign_in_time',
			'visitor_type'
		];

		$data["id"] = $_SESSION['formdata']["timestamp"];

		//push all common fileds to data array
		foreach($commonFormFields as $formField){
			if(isset($_SESSION['formdata'][$formField]))
				$data[$formField] = $_SESSION['formdata'][$formField];
		}

		$visitorType = $_SESSION['formdata']['visitor_type'];
		
		if(array_key_exists($visitorType, $visitorTypeFields)){
			foreach($visitorTypeFields[$visitorType] as $field){
				if(isset($_SESSION['formdata'][$field]))
					$data[$field] = $_SESSION['formdata'][$field];			
			}
		}

		return $data;

	}

	public function normalizeSignOutData(){

		$data = [];
		$commonFormFields = [
			'exhibits',
			'otherexhibit',
			'feedback',
			'sign_out_date',
			'sign_out_time'
		];

		//push all common fileds to data array
		foreach($commonFormFields as $formField){
			if(isset($_SESSION['formdata'][$formField]))
				$data[$formField] = $_SESSION['formdata'][$formField];
		}

		return $data;

	}

	public function getIdFromPath($path){

		$id = str_replace(PHY_METADATA_URL, '', $path);
		$id = str_replace('/index.json', '', $id);
		// $id = str_replace('/', '_', $id);
		return $id;
	}

	public function processFulltext($text){

		$text = preg_replace('/\s+/', ' ', $text);
		//~ $text = $this->praja2Unicode($text);
		return $text;
	}

	public function xml2Json() {

		$xml = simplexml_load_file(PHY_METADATA_URL . PRASADA . '/prasada.xml');

		foreach ($xml->issue as $issue) {
			
			$completeIssue = [];
	
			foreach ($issue->entry as $entry) {

				$completeIssue['volume'] = (string)$issue['vnum'];
				$completeIssue['issue'] = (string)$issue['inum'];
				$completeIssue['year'] = (string)$issue['year'];
				$completeIssue['month'] = (string)$issue['month'];
				$completeIssue['mname'] = (string)$issue['mname'];
				$completeIssue['id'] = PRASADA . '/' . $completeIssue['year'] . '/' . $completeIssue['month'];
				
				$array = [];
				$array['title'] = $entry->title->__toString();
				$array['page'] = $entry->page->__toString();
				$jsonFilePath = PHY_METADATA_URL . PRASADA . '/' . $completeIssue['year'] . '/' . $completeIssue['month'] . '/';
				
				if(preg_match('/0.*\-0.*/', $array['page'], $matches)){

					$splitPage = explode('-', $array['page']);
					$files = glob($jsonFilePath . "text/*.txt");
					$articleStartOffset = array_search($jsonFilePath . 'text/' . $splitPage[0] . '.txt', $files);
					$articleEndOffset = array_search($jsonFilePath . 'text/' . $splitPage[1] . '.txt', $files) + 1;
					$textFiles = array_slice($files, $articleStartOffset, $articleEndOffset - $articleStartOffset);
					$array['relativePageNumber'] = (array_search($jsonFilePath . 'text/' . $splitPage[0] . '.txt', $files)) ? array_search($jsonFilePath . 'text/' . $splitPage[0] . '.txt', $files)+1 : 1;
					$array['relativePageRange'] = $array['relativePageNumber'] . '-' . (array_search($jsonFilePath . 'text/' . $splitPage[1] . '.txt', $files)+1);
						
					$textArray = [];
					$array['fullText'] = [];
					foreach ($textFiles as $textFile) {

						preg_match('/(.*)\/text\/(.*)\.txt/', $textFile, $matches);
						$textArray['page'] = $matches[2];
						$textArray['text'] = trim(file_get_contents($textFile));
						array_push($array['fullText'], $textArray);
					}
				}

				if($entry->author != ''){
					foreach ($entry->author as $author) {

						$arrayArthor = [];
						$arrayArthor['name'] = $author->__toString();
						$array['author'][] = $arrayArthor;
					}
				}

				$completeIssue['toc'][] = $array;
			}
			
			exec("mkdir -p " . $jsonFilePath);
			$json = json_encode($completeIssue, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
			file_put_contents($jsonFilePath . 'issue.json' , $json);
		}
	}

	public function insertEntries($collection) {

		$titleAlphabet = [];
		$authorAlphabet = [];
		$jsonFiles = $this->getFilesIteratively(PHY_METADATA_URL , $pattern = '/issue.json$/i');

		foreach ($jsonFiles as $jsonFile) {

			$contentString = file_get_contents($jsonFile);
			$content = json_decode($contentString, true);

			foreach ($content['toc'] as $article) {

				$data = $content;
				$data['Type'] = 'Journal';
				if(isset($data['toc']))	unset($data['toc']);
				$data = $data + $article;
				$data['id'] = $data['id'];
				$data = array_filter($data);
				$result = $collection->insertOne($data);

				// fetching initial letter from author
				if(isset($article['author'])) {

					foreach ($article['author'] as $author) 
					array_push($authorAlphabet, preg_replace('/(^.).*/u', '$1', $author['name']));
				}

				// fetching initial letter from title
				array_push($titleAlphabet, preg_replace('/(^.).*/u', '$1', $article['title']));
			}
		}

		sort($titleAlphabet); sort($authorAlphabet);
		$this->insertAlphabet(array_unique($titleAlphabet), array_unique($authorAlphabet));
	}

	public function insertAlphabet($titleAlphabet, $authorAlphabet) {

		$data = [];
		$db = $this->db->useDB();
		$collection = $this->db->createCollection($db, ALPHABET_COLLECTION);
		$data['title'] = array_values($titleAlphabet);
		$data['author'] = array_values($authorAlphabet);

		$result = $collection->insertOne($data);
	}
	
}

?>
