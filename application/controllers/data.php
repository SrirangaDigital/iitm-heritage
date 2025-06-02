<?php

class data extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function test($query=[],$view_type = DEFAULT_TYPE){

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
			$this->dumpData();
			$this->view('forms/common1', $data);
		}
		elseif($view_type == 2){
			$this->dumpData();
			$this->view('forms/common2', $data);		
		}
		elseif($view_type == 3){
			$_SESSION['formdata']['visitor_type'] = 'alumnus';
			$this->dumpData();
			$this->view('forms/alumnus-1', $data);		
		}
		elseif($view_type == 4){
			$_SESSION['formdata']['visitor_type'] = 'alumnus';			
			$this->dumpData();
			$this->view('forms/alumnus-2', $data);		
		}
		elseif($view_type == 5){
			$_SESSION['formdata']['visitor_type'] = 'alumnus';			
			$this->dumpData();
			$this->view('forms/alumnus-3', $data);		
		}
		elseif($view_type == 6){
			$this->dumpData();
			$this->view('forms/common3', $data);
		}
		elseif($view_type == 7){
			$this->dumpData();
			$this->view('forms/common4', $data);
		}
		elseif($view_type == 8){
			$data = $this->model->normalizeData();
			//$jsonData = json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
			//$this->dumpData();
			$result = $this->insertDB($data);
			if($result['result'])
				$this->view('forms/common5', $result);
			else
				$this->view('error/signin',$result);
		}
		elseif($view_type == 9){
			$_SESSION['formdata']['visitor_type'] = 'faculty';
			$this->dumpData();
			$this->view('forms/faculty-1', $data);
		}
		elseif($view_type == 10){
			$_SESSION['formdata']['visitor_type'] = 'resident';
			$this->dumpData();
			$this->view('forms/resident-1', $data);
		}
		elseif($view_type == 11){
			$_SESSION['formdata']['visitor_type'] = 'staff';
			$this->dumpData();
			$this->view('forms/staff-1', $data);
		}
		elseif($view_type == 12){
			$_SESSION['formdata']['visitor_type'] = 'student';
			$this->dumpData();
			$this->view('forms/student-1', $data);		
		}
		elseif($view_type == 13){
			$_SESSION['formdata']['visitor_type'] = 'student';
			$this->dumpData();
			$this->view('forms/student-2', $data);
		}
		elseif($view_type == 14)
			$this->view('forms/signout-1', $data);
		elseif($view_type == 15)
			$this->view('forms/signout-2', $data);
		elseif($view_type == 16)
			$this->view('forms/signout-3', $data);
		elseif($view_type == 17)
			$this->view('forms/signout-4', $data);
		elseif($view_type == 18)
			$this->view('forms/signout-5', $data);
		elseif($view_type == 99){
			if(isset($_SESSION['formdata']))
				unset($_SESSION['formdata']);
			
			@header('Location: ' . BASE_URL );	
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

	public function pagetest(){
		$this->view('error/dbsetup');
	}

}

?>
