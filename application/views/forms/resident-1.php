<!-- Flow :  10 -->
<?php

$preselected_value = $_SESSION['formdata']['relationship'] ?? '';
if(isset($_SESSION['formdata']['relationship']) && $_SESSION['formdata']['relationship'] != '')
    $initial_display_text = $_SESSION['formdata']['relationship'];
else
    $initial_display_text = 'Select Relationship';
?>
<div class="container h-100">
    <div class="row mt-5 text-end">
        <div class="offset-md-2 col-md-8">
            <p class="text-end"><a href="<?=BASE_URL?>data/sign_in/99"><img src="<?=PUBLIC_URL?>images/vector-2.svg" alt="icon" width="31" height="31" /></a></p>
        </div>
    </div>    
    <div class="row justify-content-center align-items-center">
        <div class="col-md-7 text-center">
            <form action="<?=BASE_URL?>data/sign_in/6" method="POST">
                <div class="firsthalf">
                    <label for="relationship" class="form-label label-text-info mb-4">Select your <span class="coloured">Relationship to the<br />IITM Employee</span></label>
                    <div class="form-group d-flex justify-content-center align-items-center mb-5 custom-select">
                        <div class="custom-select-wrapper dropdown" data-target-select-id="relationship">
                            <select class="d-none" id="relationship" name="relationship" aria-label="Select Relationship">
                              <option value="" class="emptyselect" selected disabled>Select Relationship</option>
                              <option value="Parent" <?= (isset($_SESSION['formdata']['relationship']) && $_SESSION['formdata']['relationship'] == 'Parent') ? 'selected' : '' ?>>Parent</option>
                              <option value="Spouse" <?= (isset($_SESSION['formdata']['relationship']) && $_SESSION['formdata']['relationship'] == 'Spouse') ? 'selected' : '' ?>>Spouse</option>
                              <option value="Child" <?= (isset($_SESSION['formdata']['relationship']) && $_SESSION['formdata']['relationship'] == 'Child') ? 'selected' : '' ?>>Child</option>
                            </select>
                            <button class="custom-dropdown-toggle dropdown-toggle d-flex justify-content-between align-items-center px-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="selected-display text-truncate
                    <?= ($preselected_value === '') ? 'placeholder-text' : '' ?>"
                    data-placeholder="Select Relationship"><?= $initial_display_text ?></span>
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
                        <input type="hidden" id="view_type" name="view_type" value="6">
                        <a href="<?=BASE_URL?>data/sign_in/2" class="btn my-nxt-blue-button">Previous</a>
                        <button type="submit" class="btn my-nxt-blue-button">Next</button>
                    </div>
                </div>            
            </form>
        </div>
    </div>    
</div>
<script src="<?=PUBLIC_URL?>js/script.js"></script>