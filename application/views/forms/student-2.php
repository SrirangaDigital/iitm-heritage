<!-- Flow :  13 -->
<?php

$preselected_value = $_SESSION['formdata']['hostel'] ?? '';
if(isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] != '')
    $initial_display_text = $_SESSION['formdata']['hostel'];
else
    $initial_display_text = 'Select Hostel';
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
                    <label for="hostel" class="form-label label-text-info mb-4 mt-5">Select your <span class="coloured">Hostel</span></label>
                    <div class="form-group d-flex justify-content-center align-items-center mb-5 custom-select">
                        <div class="custom-select-wrapper dropdown" data-target-select-id="hostel">
                            <select class="d-none" id="hostel" name="hostel" aria-label="Select hostel">
                              <option value="" class="emptyselect" selected disabled>Select Hostel</option>
                              <option value="Alakananda" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Alakananda') ? 'selected' : '' ?>>Alakananda</option>
                              <option value="Bhadra" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Bhadra') ? 'selected' : '' ?>>Bhadra</option>
                              <option value="Brahmaputra" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Brahmaputra') ? 'selected' : '' ?>>Brahmaputra</option>
                              <option value="Cauvery" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Cauvery') ? 'selected' : '' ?>>Cauvery</option>
                              <option value="Ganga" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Ganga') ? 'selected' : '' ?>>Ganga</option>
                              <option value="Godavari" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Godavari') ? 'selected' : '' ?>>Godavari</option>
                              <option value="Jamuna" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Jamuna') ? 'selected' : '' ?>>Jamuna</option>
                              <option value="Krishna" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Krishna') ? 'selected' : '' ?>>Krishna</option>
                              <option value="Mahanadhi" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Mahanadhi') ? 'selected' : '' ?>>Mahanadhi</option>
                              <option value="Mandakini" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Mandakini') ? 'selected' : '' ?>>Mandakini</option>
                              <option value="Narmada" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Narmada') ? 'selected' : '' ?>>Narmada</option>
                              <option value="Pampa" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Pampa') ? 'selected' : '' ?>>Pampa</option>
                              <option value="Sabarmati" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Sabarmati') ? 'selected' : '' ?>>Sabarmati</option>
                              <option value="Saraswathi" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Saraswathi') ? 'selected' : '' ?>>Saraswathi</option>
                              <option value="Sarayu" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Sarayu') ? 'selected' : '' ?>>Sarayu</option>
                              <option value="Sharavathi" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Sharavathi') ? 'selected' : '' ?>>Sharavathi</option>
                              <option value="Sindhu" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Sindhu') ? 'selected' : '' ?>>Sindhu</option>
                              <option value="Swarnamukhi" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Swarnamukhi') ? 'selected' : '' ?>>Swarnamukhi</option>
                              <option value="Tamiraparani" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Tamiraparani') ? 'selected' : '' ?>>Tamiraparani</option>
                              <option value="Tapti" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Tapti') ? 'selected' : '' ?>>Tapti</option>
                              <option value="Tunga" <?= (isset($_SESSION['formdata']['hostel']) && $_SESSION['formdata']['hostel'] == 'Tunga') ? 'selected' : '' ?>>Tunga</option>
                            </select>
                            <button class="custom-dropdown-toggle dropdown-toggle d-flex justify-content-between align-items-center px-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="selected-display text-truncate
                    <?= ($preselected_value === '') ? 'placeholder-text' : '' ?>"
                    data-placeholder="Select Hostel"><?= $initial_display_text ?></span>
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
                        <a href="<?=BASE_URL?>data/sign_in/12a" class="btn my-nxt-blue-button">Previous</a>
                        <button type="submit" class="btn my-nxt-blue-button">Next</button>
                    </div>
                </div>            
            </form>
        </div>
    </div>    
</div>
<script src="<?=PUBLIC_URL?>js/script.js"></script>