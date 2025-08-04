<?php

class dataModel extends Model {

	public function __construct() {

		parent::__construct();
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
			'student'=>['rollnumber','department','hostel'],
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


	public function generateReport($visitor_type, $results){

		$today = date("Ymd"); // e.g., 20250731
		$fileName = PHY_REPORTS_URL . "visitors_" . $visitor_type . "_" . $today . ".csv";
		$csv = fopen($fileName, "w");
		$headers = $this->getHeadersForReport($visitor_type);
		fputcsv($csv, $headers); // headers

		foreach ($results as $doc) {
			$data = $this->getDataFromDoc($headers,$doc);
		    fputcsv($csv, $data);
		}

		fclose($csv);

		return str_replace(PHY_PUBLIC_URL, '', $fileName);
	}

	public function getHeadersForReport($visitor_type){

		$visitors = [
			'alumnus' => ['visitor_type', 'visitor_name', 'visitor_count', 'email', 'phonenumber', 'batch', 'branch', 'hostel', 'sign_in_date', 'sign_in_time', 'exhibits', 'otherexhibit', 'feedback', 'sign_out_date', 'sign_out_time'],
			'faculty' => ['visitor_type', 'visitor_name', 'visitor_count', 'email', 'phonenumber', 'department', 'sign_in_date', 'sign_in_time', 'exhibits', 'otherexhibit', 'feedback', 'sign_out_date', 'sign_out_time'],
			'student' => ['visitor_type', 'visitor_name', 'visitor_count', 'email', 'phonenumber', 'rollnumber', 'department', 'hostel', 'sign_in_date', 'sign_in_time', 'exhibits', 'otherexhibit', 'feedback', 'sign_out_date', 'sign_out_time'],
			'resident' => ['visitor_type', 'visitor_name', 'visitor_count', 'email', 'phonenumber', 'relationship', 'sign_in_date', 'sign_in_time', 'exhibits', 'otherexhibit', 'feedback', 'sign_out_date', 'sign_out_time'],
	   		'staff' => ['visitor_type', 'visitor_name', 'visitor_count', 'email', 'phonenumber', 'designation', 'sign_in_date', 'sign_in_time', 'exhibits', 'otherexhibit', 'feedback', 'sign_out_date', 'sign_out_time'],
	   		'other' => ['visitor_type', 'visitor_name', 'visitor_count', 'email', 'phonenumber', 'sign_in_date', 'sign_in_time', 'exhibits', 'otherexhibit', 'feedback', 'sign_out_date', 'sign_out_time'],
		];

		return $visitors[$visitor_type];

	}

	public function getDataFromDoc($headers, $doc){

		$data = [];

		for($i=0;$i<sizeof($headers);$i++){

			if($headers[$i] == 'exhibits'){
				if(isset($doc["exhibits"]))	
					$csvString = implode(',', iterator_to_array($doc["exhibits"]));
				else 
					$csvString = '';

				$data[$i] = html_entity_decode($csvString);
			}
			else{
				$data[$i] = $doc[$headers[$i]] ?? '';
				$data[$i] = html_entity_decode($data[$i]);
			}
		}

		return $data;
	}

	
}

?>
