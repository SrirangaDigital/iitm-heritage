<?php

class data extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function testit($query=[]){
		$data = [];
		$this->view('forms/testit', $data);
	}

	public function sign_in($query=[],$view_type = DEFAULT_TYPE){

		$formData = $this->model->getPostData();

		if(isset($formData) && isset($formData['view_type'])){
			$this->model->processFormData($formData);
			$view_type = $formData['view_type']; 
		}		
		if(isset($formData) && isset($formData['other_category'])){
			$this->model->processFormData($formData);
			$_SESSION['formdata']['visitor_type'] = $formData['other_category']; 
		}
		
		$data = [];
		if($view_type == 1){
			$visitor_count = $this->getVisitorCount();
			$this->view('forms/common1', $visitor_count);
		}
		elseif($view_type == 2){
			$this->view('forms/common2', $data);		
		}
		elseif($view_type == 3){
			$_SESSION['formdata']['visitor_type'] = 'alumnus';
			$this->view('forms/alumnus-1', $data);		
		}
		elseif($view_type == 4){

			$_SESSION['formdata']['visitor_type'] = 'alumnus';			
			$this->view('forms/alumnus-2', $data);
		}
		elseif($view_type == 5){
			$_SESSION['formdata']['visitor_type'] = 'alumnus';			
			$this->view('forms/alumnus-3', $data);		
		}
		elseif($view_type == 6){
			$this->view('forms/common3', $data);
		}
		elseif($view_type == 7){
			$this->view('forms/common4', $data);
		}
		elseif($view_type == 8){
			$data = $this->model->normalizeData();
	
			$result = $this->insertDB($data);
			if($result['result'])
				$this->view('forms/common5', $result);
			else
				$this->view('error/signin',$result);
		}
		elseif($view_type == 9){
			$_SESSION['formdata']['visitor_type'] = 'faculty';
			$this->view('forms/faculty-1', $data);
		}
		elseif($view_type == 10){
			$_SESSION['formdata']['visitor_type'] = 'resident';
			$this->view('forms/resident-1', $data);
		}
		elseif($view_type == 11){
			$_SESSION['formdata']['visitor_type'] = 'staff';
			$this->view('forms/staff-1', $data);
		}
		elseif($view_type == 12){
			$_SESSION['formdata']['visitor_type'] = 'student';
			$this->view('forms/student-1', $data);		
		}		
		elseif($view_type == '12a'){
			$_SESSION['formdata']['visitor_type'] = 'student';
			$this->view('forms/student-1a', $data);		
		}
		elseif($view_type == 13){
			$_SESSION['formdata']['visitor_type'] = 'student';
			$this->view('forms/student-2', $data);
		}
		elseif($view_type == 99){
			if(isset($_SESSION['formdata']))
				unset($_SESSION['formdata']);
			
			@header('Location: ' . BASE_URL );	
		}
	}

	public function profiles(){

		$db = $this->model->db->useDB();

		$collection = $this->model->db->selectCollection($db, VISITOR_COLLECTION);
		$success = false;
		$results = [];

		try {
				$cursor = $collection->find([
				    'sign_out_date' => ['$exists' => false],
				    'sign_out_time' => ['$exists' => false],
				]);

				$visitors = iterator_to_array($cursor);

				usort($visitors, function($a, $b) {
				    
				    // Skip if date fields are missing
				    if (!isset($a['sign_in_date']) || !isset($b['sign_in_date'])) return 0;

				    $timestampA = strtotime($a['sign_in_date'] . ' ' . $a['sign_in_time']);
				    $timestampB = strtotime($b['sign_in_date'] . ' ' . $b['sign_in_time']);
				    
				    return $timestampB - $timestampA; // Sorts descending (Latest first)
				});

				foreach ($visitors as $document) {
					if(isset($document->id))
					    $results[] =  $document;
				}

				$success = true;

			} catch (Exception $e) {
    			$results["msg"] = $e->getMessage();
				$success = false;
			}


		if(empty($results)){
			$this->view('page/noprofiles', $results);
		}
		elseif($success){
			$this->view('forms/profiles', $results);
		} else{
			$this->view('error/profiles', $results);			
		}

	}

	public function dumpData(){
		if(isset($_SESSION['formdata']))
			var_dump($_SESSION['formdata']);
	}

	public function setupdb(){

		$db = $this->model->db->useDB();

		try {
			$collection = $this->model->db->createCollection($db, VISITOR_COLLECTION);
			$data['result'] = true;
			$data['msg'] = "Collection created successfully";
		} catch (Exception $e) {
		    $data['result'] = false;
		    $data['msg'] = $e->getMessage();
		}

		if($data["result"])
			$this->view('page/dbsetup',$data);
		else	
			$this->view('error/dbsetup',$data);
	}

	public function insertDB($data){

		$db = $this->model->db->useDB();
		$collection = $this->model->db->selectCollection($db, VISITOR_COLLECTION);


		try {
			$result = $collection->insertOne($data);
			$data['result'] = true;
		} catch (Exception $e) {
		    $data['result'] = false;
		    $data['msg'] = $e->getMessage();
		}

		return $data;

	}


	public function sign_out($query=[],$id,$view_type = DEFAULT_TYPE){

		$formData = $this->model->getPostData();

		if(isset($formData) && isset($formData['view_type'])){
			$this->model->processFormData($formData);
			$view_type = $formData['view_type']; 
		}		

		$dataFromDB = $this->getVisitorDetails($id);

		if($view_type == 1){
			$this->view('forms/signout-2', $dataFromDB);
		}		
		elseif($view_type == 2){
			$this->view('forms/signout-3', $dataFromDB);
		}		
		elseif($view_type == 3){
			$this->view('forms/signout-4', $dataFromDB);
		}
		elseif($view_type == 4){
			$data = $this->model->normalizeSignOutData();
			$status = $this->updateDB($data,$id);
			if($status['result'])
				$this->view('forms/signout-5');
			else
				$this->view('error/signout',$status);
		}
		elseif($view_type == 99){
			if(isset($_SESSION['formdata']))
				unset($_SESSION['formdata']);
			
			@header('Location: ' . BASE_URL );	
		}
	}


	public function getVisitorDetails($id){

		$db = $this->model->db->useDB();
		$collection = $this->model->db->selectCollection($db, VISITOR_COLLECTION);
		$results = [];

		try {
				$cursor = $collection->findOne([
					'id' => $id,
				    'sign_out_date' => ['$exists' => false],
				    'sign_out_time' => ['$exists' => false]
				]);

				if(isset($cursor->id))
				    $results[] = (array) $cursor;
				
				$success = true;

			} catch (Exception $e) {
    			$results["msg"] = $e->getMessage();
				$success = false;
			}

		return $results;

	}

	public function updateDB($data,$id){

		$db = $this->model->db->useDB();
		$collection = $this->model->db->selectCollection($db, VISITOR_COLLECTION);
		$status = [];

		try {

				$result = $collection->updateOne(
					[
        				'id' => $id, // Your original filter
        				'$or' => [   // The active/logged-in condition
            						['sign_out_date' => ['$exists' => false]],
            						['sign_out_date' => null]
        						 ]
    				],
				    ['$set' => $data]     
				);

				$status['result'] = ($result->getModifiedCount())? true : false;			

			} catch (Exception $e) {
    			
    			$status["msg"] = $e->getMessage();
				$status['result'] = false;
			}

		return $status;
	}

	public function pagetest(){
		$this->view('error/dbsetup');
	}


	public function getVisitorCount(){

		$db = $this->model->db->useDB();
		$collection = $this->model->db->selectCollection($db, VISITOR_COLLECTION);
		$results = [];

		try {

				$count = $collection->countDocuments();

			} catch (Exception $e) {

			  $count = 0;	
			}

		return $count;

	}

	public function report($query=[],$visitor_type = ''){


		$visitorsList = ['alumnus','faculty','student','resident','staff','other'];

		if($visitor_type == '' || !in_array($visitor_type, $visitorsList)) {
			$data['msg'] = 'Visitor type should be either alumnus / faculty / student / resident / staff / other';
			$this->view('error/report', $data);
			return;
		}


		$db = $this->model->db->useDB();
		$collection = $this->model->db->selectCollection($db, VISITOR_COLLECTION);
		$results = [];

		if($visitor_type != 'other')
			$filter = ['visitor_type' => $visitor_type];
		else
			$filter = ['visitor_type' => ['$nin' => ['alumnus','faculty','student','resident','staff']]];

		try {

				$cursor = $collection->find($filter);

				foreach ($cursor as $document) {
					if(isset($document->id)){
						unset($document["_id"]);
						unset($document["id"]);
					    $results[] = (array) $document;
					}
				}


				$csvFile = $this->model->generateReport($visitor_type, $results);
				$data['url'] = PUBLIC_URL . $csvFile;
				$data['msg'] = 'Click here to download the report';
				$this->view('reports/download', $data);

			} catch (Exception $e) {

			  echo "Error in generating report: " . $e;
			}
		
	}

	public function getDuplicates($query=[]){

		try {
		    // 1. Connect to your Local MongoDB instance

			$db = $this->model->db->useDB();
			$collection = $this->model->db->selectCollection($db, VISITOR_COLLECTION);

		    // 2. Define the aggregation pipeline to find stuck duplicates
		    $pipeline = [
		        [
		            '$match' => [
		                '$or' => [
		                    ['sign_out_date' => ['$exists' => false]],
		                    ['sign_out_date' => null]
		                ]
		            ]
		        ],
		        [
		            '$group' => [
		                '_id' => [
		                    'visitor_name' => '$visitor_name',
		                    'sign_in_date' => '$sign_in_date',
		                    'sign_in_time' => '$sign_in_time'
		                ],
		                'count' => ['$sum' => 1]
		            ]
		        ],
		        [
		            '$match' => [
		                'count' => ['$gt' => 1] // Only grab rows repeating more than once
		            ]
		        ]
		    ];

		    $duplicates = $collection->aggregate($pipeline);

		    return $duplicates;

		} catch (Exception $e) {
		    echo "An error occurred: " . $e->getMessage();
		}

	}

	public function listduplicates($query=[]){

		$duplicates = $this->getDuplicates();
		$resultsArray = $duplicates->toArray();
		
		if (empty($resultsArray)) {
 		   echo "No duplicate active visitors found.";
		} else {
			foreach ($resultsArray as $row) {
	    		// Accessing fields from the nested _id object
	    		$name = $row->_id->visitor_name;
	    		$count = $row->count;
	    
	    		echo "<li><strong>Visitor:</strong> {$name} | <strong>Repeats:</strong> {$count} times</li>";
			}
		}

	}

	public function logoutduplicates(){

		try {
		    // 1. Connect to your Local MongoDB instance

			$db = $this->model->db->useDB();
			$collection = $this->model->db->selectCollection($db, VISITOR_COLLECTION);

		    // 2. Generate today's date and time formats dynamically matching your DB structure
		    $currentDateStr = date('d F Y'); // Output format: "24 May 2026"
		    $currentTimeStr = date('H:i');   // Output format: "12:05"

		    $duplicates = $this->getDuplicates();

		    $totalUpdatedGroups = 0;

		    // 3. Loop through the duplicate sets and log them out
		    foreach ($duplicates as $doc) {
		        $updateResult = $collection->updateMany(
		            [
		                'visitor_name' => $doc->_id->visitor_name,
		                'sign_in_date' => $doc->_id->sign_in_date,
		                'sign_in_time' => $doc->_id->sign_in_time,
		                '$or' => [
		                    ['sign_out_date' => ['$exists' => false]],
		                    ['sign_out_date' => null]
		                ]
		            ],
		            [
		                '$set' => [
		                    'sign_out_date' => $currentDateStr,
		                    'sign_out_time' => $currentTimeStr
		                ]
		            ]
		        );

		        echo "Successfully logged out " . $updateResult->getModifiedCount() . " duplicate entries for: " . $doc->_id->visitor_name . "<br>\n";
		        $totalUpdatedGroups++;
		    }

		    if ($totalUpdatedGroups === 0) {
		        echo "No repeating active visitor entries found to log out today.\n";
		    }

		} catch (Exception $e) {
		    echo "An error occurred: " . $e->getMessage();
		}

	}


}

?>
