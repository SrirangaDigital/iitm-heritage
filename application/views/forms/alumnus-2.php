<!-- Flow :  4-->
<div class="container h-100">
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-1 text-center">
            <span><a href="<?=BASE_URL?>data/test/3"><i class="bi bi-arrow-left-circle h3"></i></span></a>
        </div>    
        <div class="col-md-6 text-center">
            <p class="text-end my-5"><a href="<?=BASE_URL?>data/test/99"><i class="bi bi-x h2"></i></a></p>
            <form action="<?=BASE_URL?>data/test/5" method="POST">                    
                <label for="branch" class="form-label label-text-info mb-4">Select your <span class="coloured">Branch</span></label>
                <div class="form-group d-flex justify-content-center align-items-center mb-5 custom-select">
                    <select class="form-select form-select-lg mb-3 w-75 select-branch-box-bg" aria-label="Select Branch" id="branch" name="branch">
                      <option class="emptyselect fst-italic" selected disabled hidden>Select Branch</option>
                      <option value="Aerospace Engineering" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Aerospace Engineering') ? 'selected' : '' ?>>Aerospace Engineering</option>
                      <option value="Applied Mechanics" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Applied Mechanics') ? 'selected' : '' ?>>Applied Mechanics</option>
                      <option value="Bio Technology" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Bio Technology') ? 'selected' : '' ?>>Bio Technology</option>
                      <option value="Chemical Engineering" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Chemical Engineering') ? 'selected' : '' ?>>Chemical Engineering</option>
                      <option value="Chemistry" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Chemistry') ? 'selected' : '' ?>>Chemistry</option>
                      <option value="Civil Engineering" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Civil Engineering') ? 'selected' : '' ?>>Civil Engineering</option>
                      <option value="Computer Science &amp; Engineering" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Computer Science & Engineering') ? 'selected' : '' ?>>Computer Science &amp; Engineering</option>
                      <option value="Data Science &amp; Artificial Intelligence" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Data Science & Artificial Intelligence') ? 'selected' : '' ?>>Data Science &amp; Artificial Intelligence</option>
                      <option value="Electrical Engineering" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Electrical Engineering') ? 'selected' : '' ?>>Electrical Engineering</option>
                      <option value="Engineering Design" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Engineering Design') ? 'selected' : '' ?>>Engineering Design</option>
                      <option value="Healthcare Technology" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Healthcare Technology') ? 'selected' : '' ?>>Healthcare Technology</option>
                      <option value="Humanities &amp; Social Sciences" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Humanities & Social Sciences') ? 'selected' : '' ?>>Humanities &amp; Social Sciences</option>
                      <option value="Management Studies" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Management Studies') ? 'selected' : '' ?>>Management Studies</option>
                      <option value="Mathematics" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Mathematics') ? 'selected' : '' ?>>Mathematics</option>
                      <option value="Mechanical Engineering" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Mechanical Engineering') ? 'selected' : '' ?>>Mechanical Engineering</option>
                      <option value="Metallurgical &amp; Materials Eng." <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Metallurgical & Materials Eng.') ? 'selected' : '' ?>>Metallurgical &amp; Materials Eng.</option>
                      <option value="Ocean Engineering" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Ocean Engineering') ? 'selected' : '' ?>>Ocean Engineering</option>
                      <option value="Physics" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Physics') ? 'selected' : '' ?>>Physics</option>
                    </select>
                </div>
                <div class="form-group my-5">
                    <input type="hidden" id="view_type" name="view_type" value="5">
                    <button type="submit" class="btn my-nxt-button">Next</button>
                </div>
            </form>
        </div>
    </div>    
</div>