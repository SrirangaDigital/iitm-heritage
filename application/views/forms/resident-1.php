<!-- Flow :  10 -->
<div class="container h-100">
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-1 text-center">
            <span><a href="<?=BASE_URL?>data/sign_in/2"><i class="bi bi-arrow-left-circle h3"></i></span></a>
        </div>    
        <div class="col-md-6 text-center">
            <p class="text-end my-5"><a href="<?=BASE_URL?>data/sign_in/99"><i class="bi bi-x h2"></i></a></p>
            <form action="<?=BASE_URL?>data/sign_in/6" method="POST">
                <label for="relationship" class="form-label label-text-info mb-4">Select your <span class="coloured">Relationship to the<br />IITM Employee</span></label>
                <div class="form-group d-flex justify-content-center align-items-center mb-5 custom-select">
                    <select class="form-select form-select-lg mb-3 w-75 select-branch-box-bg" id="relationship" name="relationship" aria-label="Select Relationship">
                      <option class="emptyselect fst-italic" selected disabled hidden>Select Relationship</option>
                      <option value="Parent" <?= (isset($_SESSION['formdata']['relationship']) && $_SESSION['formdata']['relationship'] == 'Parent') ? 'selected' : '' ?>>Parent</option>
                      <option value="Spouse" <?= (isset($_SESSION['formdata']['relationship']) && $_SESSION['formdata']['relationship'] == 'Spouse') ? 'selected' : '' ?>>Spouse</option>
                      <option value="Child" <?= (isset($_SESSION['formdata']['relationship']) && $_SESSION['formdata']['relationship'] == 'Child') ? 'selected' : '' ?>>Child</option>
                    </select>
                </div>    
                <div class="form-group my-5">
                    <input type="hidden" id="view_type" name="view_type" value="6">
                    <button type="submit" class="btn my-nxt-button">Next</button>
                </div>        
            </form>
        </div>
    </div>    
</div>