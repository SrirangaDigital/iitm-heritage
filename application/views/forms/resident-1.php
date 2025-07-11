<!-- Flow :  10 -->
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
                        <select class="form-select form-select-lg mb-3 w-75 select-branch-box-bg" id="relationship" name="relationship" aria-label="Select Relationship">
                          <option class="emptyselect fst-italic" selected disabled hidden>𝑠𝑒𝑙𝑒𝑐𝑡 𝑟𝑒𝑙𝑎𝑡𝑖𝑜𝑛𝑠ℎ𝑖𝑝</option>
                          <option value="Parent" <?= (isset($_SESSION['formdata']['relationship']) && $_SESSION['formdata']['relationship'] == 'Parent') ? 'selected' : '' ?>>Parent</option>
                          <option value="Spouse" <?= (isset($_SESSION['formdata']['relationship']) && $_SESSION['formdata']['relationship'] == 'Spouse') ? 'selected' : '' ?>>Spouse</option>
                          <option value="Child" <?= (isset($_SESSION['formdata']['relationship']) && $_SESSION['formdata']['relationship'] == 'Child') ? 'selected' : '' ?>>Child</option>
                        </select>
                    </div>
                </div>
                <div class="secondhalf">
                    <div class="form-group my-5">
                        <input type="hidden" id="view_type" name="view_type" value="6">
                        <a href="<?=BASE_URL?>data/sign_in/2" class="btn my-nxt-blue-button">Previous</a>
                        <button type="submit" class="btn my-nxt-blue-button">Next</button>
                    </div>
                </div>            
            </form>
        </div>
    </div>    
</div>