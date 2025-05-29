<?php

class viewHelper extends View {

    public function __construct() {

    }

    public function getHrefNumber($visitor_type) {

        if($visitor_type == 'alumnus')
            return 5;
        elseif($visitor_type == 'faculty')
            return 9;
        elseif($visitor_type == 'resident')
            return 10;
        elseif($visitor_type == 'staff')
            return 11;
        elseif($visitor_type == 'student')
            return 13;
        else
            return 2; //others category

    }

    public function includeEditButton($albumID) {

        if(isset($_SESSION['login']))
        	echo '<ul class="list-unstyled"><li><a class="editDetails" href="' . BASE_URL . 'edit/archives/' . $albumID . '">Edit Details</a></li></ul>';
    }

    public function disableUnWantedKeys($data){

        unset($data['details']['sutradhar']);
        unset($data['details']['surpriseMe']);
        unset($data['details']['dataUrlhd1']);
        unset($data['details']['dataUrlhd2']);
        unset($data['details']['dataUrlsd1']);
        unset($data['details']['dataUrlsd2']);
        unset($data['details']['dataUrlhls1']);
        unset($data['details']['videoEndPoint']);
        unset($data['details']['videoId']);
        unset($data['details']['policy']);
        unset($data['details']['others']);

        return $data;
    }

    public function displayPeople($key,$value){

        $string = '';
        $normalArray = (array)$value;
        sort($normalArray);
        $value = $normalArray;
        foreach($value as $val)
            $string = $string . ' ' . '<span class="ovalshape"><a href="' . BASE_URL . 'search/field/?term=' . $val . '">' . $val . '</a></span>';
        echo '<li><span class="peoplekey">' . $key . '</span><br /><span class="image-desc-meta">' . $string . '</span></li>';
    }    

    public function displayPlaces($key,$value){

        $string = '';

        $normalArray = (array)$value;
        sort($normalArray);
        $value = $normalArray;

        foreach($value as $val)
            $string = $string . ' ' . '<span class="ovalshape"><a href="' . BASE_URL . 'search/field/?term=' . $val . '">' . $val . '</a></span>';
        echo '<li><span class="placeskey">' . $key . '</span><br /><span class="image-desc-meta">' . $string . '</span></li>';
    }    

    public function displayOrganisations($key,$value){

        $string = '';

        $normalArray = (array)$value;
        sort($normalArray);
        $value = $normalArray;

        foreach($value as $val)
            $string = $string . ' ' . '<span class="ovalshape"><a href="' . BASE_URL . 'search/field/?term=' . urlencode($val) . '">' . $val . '</a></span>';
        echo '<li><span class="orgkey">' . $key . '</span><br /><span class="image-desc-meta">' . $string . '</span></li>';
    }    

    public function displayTechnicalTerms($key,$value){

        $string = '';
        
        $normalArray = (array)$value;
        sort($normalArray);
        $value = $normalArray;

        foreach($value as $val)
            $string = $string . ' ' . '<span class="ovalshape"><a href="' . BASE_URL . 'search/field/?term=' . $val . '">' . $val . '</a></span>';
        echo '<li><span class="techtermskey">TECHNICAL AND OTHER TERMS</span><br /><span class="image-desc-meta">' . $string . '</span></li>';
    }    

    public function displayYear($key,$value){

        $string = '';
        
        $normalArray = (array)$value;
        sort($normalArray);
        $value = $normalArray;

        foreach($value as $val)
            $string = $string . ' ' . "<span class=\"ovalshape\"><a href=\"". BASE_URL . urlencode("listing/artefacts/Multimedia File?referenceYear=") . $val . '">' . $val . '</a></span>';
        echo '<li><span class="yearkey">' . $key . ':</span><br /><span class="image-desc-meta">' . $string . '</span></li>';
    }    

    public function displayTitle($key, $value, $interviewee, $intervieweeValue){

        echo '<li><span class="talktitle">' . $value . '</span><br />';
        if($intervieweeValue === 'TOI')
            echo '<span class="interviewee">' . $intervieweeValue . '</span>&nbsp; &mdash; <small class="text-white">The Times of India Group. © BCCL. All Rights Reserved.</small></li>';
        else
            echo '<span class="interviewee">' . $intervieweeValue . '</span></li>';
    }

    public function formatKeyValuePairs($data){

        $data = $this->disableUnWantedKeys($data);


        foreach ($data['details'] as $key => $value) {

            if($value != '' || (is_array($value) && sizeof($value) > 0)) {   
                if( ($key === 'id') || ($key === 'Type') )
                    continue;
                elseif($key === 'people')
                    $this->displayPeople($key,$value);
                elseif($key === 'places')
                    $this->displayPlaces($key,$value);
                elseif($key === 'organisations')
                    $this->displayOrganisations($key,$value);
                elseif($key === 'year')
                    $this->displayYear($key,$value);
                elseif($key === 'technicalTerms')
                    $this->displayTechnicalTerms($key,$value);                
                elseif($key === 'dataType' || $key === 'publicationDate' || $key === 'referenceYear' || $key === 'interviewee')
                    continue;                
                elseif($key === 'title')
                    $this->displayTitle($key, $value, 'interviewee', $data['details']['interviewee']);
                else{
                    echo '<li><span class="displaykey">' . $key . ':</span><span class="image-desc-meta">' . $this->formatDisplayString($value) . '</span></li>';
                }
            }
        }
    }

    public function formatDisplayString($str){
		
		if(preg_match('/^\d{4}\-/', $str))
			$str = preg_replace('/\b(\d)\b/',"0$1",$str);

        if(preg_match('/^\d{4}\-\d{2}\-\d{2}/', $str)) {

            $dates = array_filter(array_map('trim', preg_split('/,|;/', $str)));
            $data = [];

            foreach ($dates as $date)
                array_push($data, $this->formatDate($date));

            $str = implode(', ', $data);
        }

        return html_entity_decode($str);
    }

    public function formatDate($dateString = '') {

        date_default_timezone_set('Asia/Kolkata');

        $dateStringVars = explode('-', $dateString);

        // Date formatting should include cases like 2105-10-00 and 2015-00-00

        $realDateString = $dateString;
        $realDateString = preg_replace('/\-00/', '-01', $realDateString);
        $timestamp = strtotime($realDateString);

        $dateFormatted = '';

        $dateFormatted = (intval($dateStringVars[2])) ? $dateFormatted . date('j', $timestamp) . '<sup>' . date('S', $timestamp) . '</sup>' : $dateFormatted;
        $dateFormatted = (intval($dateStringVars[1])) ? $dateFormatted . ' ' . date('F', $timestamp) : $dateFormatted;
        $dateFormatted = (intval($dateStringVars[0])) ? $dateFormatted . ' ' . date('Y', $timestamp) : $dateFormatted;

        return $dateFormatted;
    }

    public function linkPDFIfExists($id){

        if(file_exists(PHY_DATA_URL . $id . '/index.pdf')) {

            echo '<li><a href="' . BASE_URL . 'artefact/pdf/' . str_replace('/', '_', $id) . '" target="_blank">Click here to view PDF</a></li>'; 
        }

        if(file_exists(PHY_DATA_URL . $id . '/transcription.pdf')) {

            echo '<li><a href="' . BASE_URL . 'describe/transcription/' . str_replace('/', '_', $id) . '" target="_blank">Transcript (Side-by-side View)</a></li>';
        }

        if(file_exists(PHY_DATA_URL . $id . '/index.mp3')) {

            echo '<li><a href="' . DATA_URL . $id . '/index.mp3' . '" download>Click here to download Audio</a></li>';
        }

        return;
    }

    public function includeAccessionCards($accessionCards){

        if(!$accessionCards) return '';

        $accessionCardsHtml  = '<div id="viewCardImages">';
        foreach (explode(',', $accessionCards) as $card) {
            
            $card = trim($card);
            $cardThumbPath = PUBLIC_URL . 'accessionCards/' . preg_replace('/(\d+)\.(.*)/', "$1/thumbs/$1.$2.jpg", $card);
            $cardPath = str_replace('thumbs', '', $cardThumbPath);
            
            if(file_exists(str_replace(PUBLIC_URL, PHY_PUBLIC_URL, $cardThumbPath)))
                $accessionCardsHtml .= '<img class="img-responsive" data-original="' . $cardPath . '" src="' . $cardThumbPath . '">';
        }
        $accessionCardsHtml .= '</div>';

        return $accessionCardsHtml;
    }

    public function displayToc($toc){

        $tocHtml = '
            <div id="toc"><p><strong>Table of Contents:</strong></p><ul class="toc">';

        foreach ($toc as $row) {

            $page = explode(',', $row['Page'])[0];

            $tocHtml .= '<li><a data-href="image_' . $page . '">' . $row['Title'] . '</a><br />';
            if(isset($row['Author'])) $tocHtml .= '<span class="author">' . $row['Author'] . '</span>';
            $tocHtml .= '</li>';
        }

        $tocHtml .= '</ul></div>';
        return $tocHtml;
    }

    public function getStructurePageTitle($filter){

        $pageTitle = ARCHIVE . ' > ' . NAV_ARCHIVE_VOLUME;

        foreach ($filter as $key => $value) {
                
            $pageTitle .= ' > ' . constant('ARCHIVE_' . strtoupper($key)) . ' ' . $this->roman2Kannada($this->rlZero($value));
        }

        return $pageTitle;
    }

    public function getDisplayName($filter){

        $displayString = '';

        foreach ($filter as $key => $value) {
                
            $displayString .= constant('ARCHIVE_' . strtoupper($key)) . ' ' . $this->roman2Kannada($this->rlZero($value));
        }

        return $displayString;
    }

    public function getCoverPage($filter){

        $coverURL = PHY_DATA_URL . PRASADA .'/'; 
        $coverURL .= (isset($filter['year'])) ? $filter['year'] . '/' : '';

        if (!(isset($filter['month']))) {
            
            $months = glob($coverURL . '*' ,GLOB_ONLYDIR);
            $coverURL .= str_replace($coverURL, '', $months[0]) . '/';
        }
        else{
            $coverURL .= $filter['month'] . '/';
        }

        $coverURL .= 'cover.jpg';
        return (file_exists($coverURL)) ? str_replace(PHY_DATA_URL, DATA_URL, $coverURL) : STOCK_IMAGE_URL . 'generic-cover.jpg'; 
    }

    public function roman2Kannada($str){

        $str = str_replace('0', '೦', $str);
        $str = str_replace('1', '೧', $str);
        $str = str_replace('2', '೨', $str);
        $str = str_replace('3', '೩', $str);
        $str = str_replace('4', '೪', $str);
        $str = str_replace('5', '೫', $str);
        $str = str_replace('6', '೬', $str);
        $str = str_replace('7', '೭', $str);
        $str = str_replace('8', '೮', $str);
        $str = str_replace('9', '೯', $str);
        return $str;
    }

    public function rlZero($term) {

        $term = preg_replace('/^0+/', '', $term);
        $term = preg_replace('/\-0+/', '-', $term);
        return $term;
    }

    public function kannadaMonth($month) {
        # code...

        $month = preg_replace('/01/', 'ಜನವರಿ', $month);
        $month = preg_replace('/02/', 'ಫೆಬ್ರವರಿ', $month);
        $month = preg_replace('/03/', 'ಮಾರ್ಚ್', $month);
        $month = preg_replace('/04/', 'ಏಪ್ರಿಲ್', $month);
        $month = preg_replace('/05/', 'ಮೇ', $month);
        $month = preg_replace('/06/', 'ಜೂನ್', $month);
        $month = preg_replace('/07/', 'ಜುಲೈ', $month);
        $month = preg_replace('/08/', 'ಆಗಸ್ಟ್', $month);
        $month = preg_replace('/09/', 'ಸೆಪ್ಟೆಂಬರ್', $month);
        $month = preg_replace('/10/', 'ಅಕ್ಟೋಬರ್', $month);
        $month = preg_replace('/11/', 'ನವೆಂಬರ್', $month);
        $month = preg_replace('/12/', 'ಡಿಸೆಂಬರ್', $month);
    
        return $month;
    }

    public function displayProfile($interviewee){

        $fileName = PHY_BASE_URL . 'public/bio/' . $interviewee . '.txt';
        $content = file_get_contents($fileName);
        // $content = 'Shivashankar';

        echo '<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
        echo "\t" . '<div class="modal-dialog modal-dialog-centered" role="document">';
        echo "\t\t" .  '<div class="modal-content">';
        echo "\t\t\t" .  '<div class="modal-header">';
        echo "\t\t\t\t" . '<h5 class="modal-title" id="exampleModalLongTitle">'. $interviewee . '</h5>';
        echo "\t\t\t\t\t" . '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo "\t\t\t\t\t\t" .  '<span aria-hidden="true">&times;</span>';
        echo "\t\t\t\t\t" . '</button>';
        echo "\t\t\t" . '</div>';
        echo "\t\t\t" . '<div class="modal-body">';
        echo "\t\t\t\t" .  $content;
        echo "\t\t\t" . '</div>';
        echo "\t\t\t" . '<div class="modal-footer">';
        echo "\t\t\t\t" . '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
        echo "\t\t\t" . '</div>';
        echo "\t\t" . '</div>';
        echo "\t" . '</div>';
        echo '</div>';
    }

}

?>
