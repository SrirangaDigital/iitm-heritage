<!-- Flow :  12a-->
<?php

$preselected_value = $_SESSION['formdata']['department'] ?? '';
if(isset($_SESSION['formdata']['department']) && $_SESSION['formdata']['department'] != '')
    $initial_display_text = $_SESSION['formdata']['department'];
else
    $initial_display_text = 'Select Department';
?>

<div class="container h-100">
    <div class="row mt-5 text-end">
        <div class="offset-md-2 col-md-8">
            <p class="text-end"><a href="<?=BASE_URL?>data/sign_in/99"><img src="<?=PUBLIC_URL?>images/vector-2.svg" alt="icon" width="31" height="31" /></a></p>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-7 text-center">
            <form action="<?=BASE_URL?>data/sign_in/13" method="POST">                    
                <div class="firsthalf">
                    <label for="department" class="form-label label-text-info mb-4 mt-5">Select your <span class="coloured">Department</span></label>
                    <div class="form-group d-flex justify-content-center align-items-center mb-5 custom-select">
                        <div class="custom-select-wrapper dropdown" data-target-select-id="department">
                            <select class="d-none" aria-label="Select Department" id="department" name="department">
                              <option class="emptyselect" value="" selected disabled>Select Department</option>
                              <option value="Aerospace Engineering" <?= (isset($_SESSION['formdata']['department']) && $_SESSION['formdata']['department'] == 'Aerospace Engineering') ? 'selected' : '' ?>>Aerospace Engineering</option>
                              <option value="Applied Mechanics" <?= (isset($_SESSION['formdata']['department']) && $_SESSION['formdata']['department'] == 'Applied Mechanics') ? 'selected' : '' ?>>Applied Mechanics</option>
                              <option value="Bio Technology" <?= (isset($_SESSION['formdata']['department']) && $_SESSION['formdata']['department'] == 'Bio Technology') ? 'selected' : '' ?>>Bio Technology</option>
                              <option value="Chemical Engineering" <?= (isset($_SESSION['formdata']['department']) && $_SESSION['formdata']['department'] == 'Chemical Engineering') ? 'selected' : '' ?>>Chemical Engineering</option>
                              <option value="Chemistry" <?= (isset($_SESSION['formdata']['department']) && $_SESSION['formdata']['department'] == 'Chemistry') ? 'selected' : '' ?>>Chemistry</option>
                              <option value="Civil Engineering" <?= (isset($_SESSION['formdata']['department']) && $_SESSION['formdata']['department'] == 'Civil Engineering') ? 'selected' : '' ?>>Civil Engineering</option>
                              <option value="Computer Science &amp; Engineering" <?= $viewHelper->checkValue('department', 'Computer Science & Engineering') ?>>Computer Science &amp; Engineering</option>
                              <option value="Data Science &amp; Artificial Intelligence" <?= $viewHelper->checkValue('department', 'Data Science & Artificial Intelligence') ?>>Data Science &amp; Artificial Intelligence</option>
                              <option value="Electrical Engineering" <?= (isset($_SESSION['formdata']['department']) && $_SESSION['formdata']['department'] == 'Electrical Engineering') ? 'selected' : '' ?>>Electrical Engineering</option>
                              <option value="Engineering Design" <?= (isset($_SESSION['formdata']['department']) && $_SESSION['formdata']['department'] == 'Engineering Design') ? 'selected' : '' ?>>Engineering Design</option>
                              <option value="Medical Sciences and Technology" <?= (isset($_SESSION['formdata']['department']) && $_SESSION['formdata']['department'] == 'Medical Sciences and Technology') ? 'selected' : '' ?>>Medical Sciences and Technology</option>
                              <option value="Humanities &amp; Social Sciences" <?= $viewHelper->checkValue('department', 'Humanities & Social Sciences') ?>>Humanities &amp; Social Sciences</option>
                              <option value="Management Studies" <?= (isset($_SESSION['formdata']['department']) && $_SESSION['formdata']['department'] == 'Management Studies') ? 'selected' : '' ?>>Management Studies</option>
                              <option value="Mathematics" <?= (isset($_SESSION['formdata']['department']) && $_SESSION['formdata']['department'] == 'Mathematics') ? 'selected' : '' ?>>Mathematics</option>
                              <option value="Mechanical Engineering" <?= (isset($_SESSION['formdata']['department']) && $_SESSION['formdata']['department'] == 'Mechanical Engineering') ? 'selected' : '' ?>>Mechanical Engineering</option>
                              <option value="Metallurgical &amp; Materials Eng." <?= $viewHelper->checkValue('department', 'Metallurgical & Materials Eng.') ?>>Metallurgical &amp; Materials Eng.</option>
                              <option value="Ocean Engineering" <?= (isset($_SESSION['formdata']['department']) && $_SESSION['formdata']['department'] == 'Ocean Engineering') ? 'selected' : '' ?>>Ocean Engineering</option>
                              <option value="Physics" <?= (isset($_SESSION['formdata']['department']) && $_SESSION['formdata']['department'] == 'Physics') ? 'selected' : '' ?>>Physics</option>
                            </select>

                            <button class="custom-dropdown-toggle dropdown-toggle d-flex justify-content-between align-items-center px-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="selected-display text-truncate
                    <?= ($preselected_value === '') ? 'placeholder-text' : '' ?>"
                    data-placeholder="Select Department"><?= $initial_display_text ?></span>
                                <span class="dropdown-svg-icons ms-2">
                                    <img src="<?=PUBLIC_URL?>images/vector-6.svg" alt="Down Arrow" class="dropdown-arrow-down active-arrow">
                                    <img src="<?=PUBLIC_URL?>images/vector-5.svg" alt="Up Arrow" class="dropdown-arrow-up">
                                </span>
                            </button>

                            <ul class="custom-dropdown-menu dropdown-menu">
                            </ul>

                        </div>    
                    </div>
                </div>
                <div class="secondhalf my-5">
                    <div class="form-group">
                        <input type="hidden" id="view_type" name="view_type" value="13">
                        <a href="<?=BASE_URL?>data/sign_in/12" class="btn my-nxt-blue-button">Previous</a>
                        <button type="submit" class="btn my-nxt-blue-button">Next</button>
                    </div>
                </div>    
            </form>
        </div>
    </div>    
</div>
<script src="<?=PUBLIC_URL?>js/script.js"></script>

