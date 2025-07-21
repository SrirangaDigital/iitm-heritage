<?php

class data extends Controller {

	public function __construct() {
		
		parent::__construct();
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


			foreach ($cursor as $document) {
				if(isset($document->id))
				    $results[] = (array) $document;
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
				    ['id' => $id],        
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

				$filter = [
				    'sign_out_date' => ['$exists' => true, '$ne' => null, '$ne' => ''],
				    'sign_out_time' => ['$exists' => true, '$ne' => null, '$ne' => '']
				];

				$count = $collection->countDocuments($filter);

			} catch (Exception $e) {

			  $count = 0;	
			}

		return $count;

	}


}

?>
