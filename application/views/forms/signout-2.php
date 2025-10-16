<!-- Flow :  1 -->
<div class="container h-100">
    <div class="row mt-5 text-end">
        <div class="offset-md-2 col-md-8">
            <p class="text-end"><a href="<?=BASE_URL?>data/sign_in/99"><img src="<?=PUBLIC_URL?>images/vector-2.svg" alt="icon" width="31" height="31" /></a></p>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-7 text-center">
            <form action="<?=BASE_URL?>data/sign_out/<?=$data[0]['id']?>/2" method="POST">
              <label for="visitor-name" class="form-label label-text-info mb-4"><?= (isset($data[0]['visitor_name']))? $data[0]['visitor_name'] : 'Vedha' ?> before you go,<br />we were curious..<br /><span class="coloured">Which exhibits did you find</span><br /><span class="coloured">most interesting?</span></label>

<div class="firsthalfpr">

    <div class="exhibits-list">              
        <div class="checkbox-wrapper">
          <input type="checkbox" id="check1" name="exhibits[]" value="Early History Section" <?= (isset($_SESSION['formdata']['exhibits']) && in_array('Early History Section', $_SESSION['formdata']['exhibits'])) ? 'checked' : '' ?> class="checkbox-input">
          <label for="check1" class="checkbox-label">
            <span class="checkbox-text">Early History Section</span>
            <span class="checkbox-tick"></span>
          </label>
        </div>
        <div class="checkbox-wrapper">
          <input type="checkbox" id="check2" name="exhibits[]" value="Mural" <?= (isset($_SESSION['formdata']['exhibits']) && in_array('Mural', $_SESSION['formdata']['exhibits'])) ? 'checked' : '' ?> class="checkbox-input">
          <label for="check2" class="checkbox-label">
            <span class="checkbox-text">Mural</span>
            <span class="checkbox-tick"></span>
          </label>
        </div>
      <div class="checkbox-wrapper">
          <input type="checkbox" id="check4" name="exhibits[]" value="Autograph Book" <?= (isset($_SESSION['formdata']['exhibits']) && in_array('Autograph Book', $_SESSION['formdata']['exhibits'])) ? 'checked' : '' ?> class="checkbox-input">
          <label for="check4" class="checkbox-label">
            <span class="checkbox-text">Autograph Book</span>
            <span class="checkbox-tick"></span>
          </label>
        </div>
      <div class="checkbox-wrapper">
          <input type="checkbox" id="check5" name="exhibits[]" value="Workshop Bench/Assignments &amp; Tools" <?= (isset($_SESSION['formdata']['exhibits']) && in_array('Workshop Bench/Assignments & Tools', $_SESSION['formdata']['exhibits'])) ? 'checked' : '' ?> class="checkbox-input">
          <label for="check5" class="checkbox-label">
            <span class="checkbox-text">Workshop Bench/Assignments &amp; Tools</span>
            <span class="checkbox-tick"></span>
          </label>
        </div>
      <div class="checkbox-wrapper">
          <input type="checkbox" id="check6" name="exhibits[]" value="NIRF/Awards Wall" <?= (isset($_SESSION['formdata']['exhibits']) && in_array('NIRF/Awards Wall', $_SESSION['formdata']['exhibits'])) ? 'checked' : '' ?> class="checkbox-input">
          <label for="check6" class="checkbox-label">
            <span class="checkbox-text">NIRF/Awards Wall</span>
            <span class="checkbox-tick"></span>
          </label>
        </div>
      <div class="checkbox-wrapper">
          <input type="checkbox" id="check7" name="exhibits[]" value="Hornet Nest" <?= (isset($_SESSION['formdata']['exhibits']) && in_array('Hornet Nest', $_SESSION['formdata']['exhibits'])) ? 'checked' : '' ?> class="checkbox-input">
          <label for="check7" class="checkbox-label">
            <span class="checkbox-text">Hornet Nest</span>
            <span class="checkbox-tick"></span>
          </label>
        </div>
      <div class="checkbox-wrapper">
          <input type="checkbox" id="check8" name="exhibits[]" value="Butterfly Exhibit" <?= (isset($_SESSION['formdata']['exhibits']) && in_array('Butterfly Exhibit', $_SESSION['formdata']['exhibits'])) ? 'checked' : '' ?> class="checkbox-input">
          <label for="check8" class="checkbox-label">
            <span class="checkbox-text">Butterfly Exhibit</span>
            <span class="checkbox-tick"></span>
          </label>
        </div>
      <div class="checkbox-wrapper">
          <input type="checkbox" id="check9" name="exhibits[]" value="Gajendra Circle Model" <?= (isset($_SESSION['formdata']['exhibits']) && in_array('Gajendra Circle Model', $_SESSION['formdata']['exhibits'])) ? 'checked' : '' ?> class="checkbox-input">
          <label for="check9" class="checkbox-label">
            <span class="checkbox-text">Gajendra Circle Model</span>
            <span class="checkbox-tick"></span>
          </label>
        </div>
      <div class="checkbox-wrapper">
          <input type="checkbox" id="check10" name="exhibits[]" value="IIT Madras: Journey to Eminence (Movie)" <?= (isset($_SESSION['formdata']['exhibits']) && in_array('IIT Madras: Journey to Eminence (Movie)', $_SESSION['formdata']['exhibits'])) ? 'checked' : '' ?> class="checkbox-input">
          <label for="check10" class="checkbox-label">
            <span class="checkbox-text">IIT Madras: Journey to Eminence (Movie)</span>
            <span class="checkbox-tick"></span>
          </label>
        </div>
      <div class="checkbox-wrapper">
          <input type="checkbox" id="check11" name="exhibits[]" value="Dome Exhibition" <?= (isset($_SESSION['formdata']['exhibits']) && in_array('Dome Exhibition', $_SESSION['formdata']['exhibits'])) ? 'checked' : '' ?> class="checkbox-input">
          <label for="check11" class="checkbox-label">
            <span class="checkbox-text">Dome Exhibition</span>
            <span class="checkbox-tick"></span>
          </label>
        </div>
    </div>    

    <div class="input-group d-flex justify-content-center align-items-center mb-5">
      <div class="d-flex align-items-center bg-label px-3 px-5 me-1" style="width: 93%; border-radius: 20px">
        <label for="otherexhibit" class="me-2 mb-0">Other</label>
        <input type="text" id="otherexhibit" name="otherexhibit" value="<?= (isset($_SESSION["formdata"]["otherexhibit"]))? $_SESSION["formdata"]["otherexhibit"] : "";  ?>" class="form-control border-0 textbox-bg me-2" placeholder="Type specific exhibit">
      </div>
      <img src="<?=PUBLIC_URL?>images/vector-7.svg" class="ms-1" alt="icon" width="40" height="40" />    
    </div>  

</div>

<div class="secondhalfpr my-5">
  <div class="form-group">
      <input type="hidden" id="view_type" name="view_type" value="2">
      <a href="<?=BASE_URL?>data/profiles" class="btn my-nxt-red-button">Previous</a>
      <button type="submit" class="btn my-nxt-red-button">Next</button>
  </div>  
</div>

            </form>    
        </div>
    </div>    
</div>