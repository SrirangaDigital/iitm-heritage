<!-- Flow :  4-->
<div class="container h-100">
    <div class="row mt-5 text-end">
        <div class="offset-md-2 col-md-8">
            <p class="text-end"><a href="<?=BASE_URL?>data/sign_in/99"><img src="<?=PUBLIC_URL?>images/vector-2.svg" alt="icon" width="31" height="31" /></a></p>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-7 text-center">
            <form action="<?=BASE_URL?>data/sign_in/5" method="POST">                    
                <div class="firsthalf">
                    <label for="branch" class="form-label label-text-info mb-4 mt-5">Select your <span class="coloured">Branch</span></label>
                    <div class="form-group d-flex justify-content-center align-items-center mb-5 custom-select">
                        <select class="form-select form-select-lg mb-3 w-75 select-branch-box-bg" aria-label="Select Branch" id="branch" name="branch">
                          <option class="emptyselect" selected disabled hidden>𝑠𝑒𝑙𝑒𝑐𝑡 𝑏𝑟𝑎𝑛𝑐ℎ</option>
                          <option value="Aerospace Engineering" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Aerospace Engineering') ? 'selected' : '' ?>>Aerospace Engineering</option>
                          <option value="Applied Mechanics" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Applied Mechanics') ? 'selected' : '' ?>>Applied Mechanics</option>
                          <option value="Bio Technology" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Bio Technology') ? 'selected' : '' ?>>Bio Technology</option>
                          <option value="Chemical Engineering" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Chemical Engineering') ? 'selected' : '' ?>>Chemical Engineering</option>
                          <option value="Chemistry" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Chemistry') ? 'selected' : '' ?>>Chemistry</option>
                          <option value="Civil Engineering" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Civil Engineering') ? 'selected' : '' ?>>Civil Engineering</option>
                          <option value="Computer Science &amp; Engineering" <?= $viewHelper->checkValue('branch', 'Computer Science & Engineering') ?>>Computer Science &amp; Engineering</option>
                          <option value="Data Science &amp; Artificial Intelligence" <?= $viewHelper->checkValue('branch', 'Data Science & Artificial Intelligence') ?>>Data Science &amp; Artificial Intelligence</option>
                          <option value="Electrical Engineering" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Electrical Engineering') ? 'selected' : '' ?>>Electrical Engineering</option>
                          <option value="Engineering Design" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Engineering Design') ? 'selected' : '' ?>>Engineering Design</option>
                          <option value="Healthcare Technology" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Healthcare Technology') ? 'selected' : '' ?>>Healthcare Technology</option>
                          <option value="Humanities &amp; Social Sciences" <?= $viewHelper->checkValue('branch', 'Humanities & Social Sciences') ?>>Humanities &amp; Social Sciences</option>
                          <option value="Management Studies" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Management Studies') ? 'selected' : '' ?>>Management Studies</option>
                          <option value="Mathematics" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Mathematics') ? 'selected' : '' ?>>Mathematics</option>
                          <option value="Mechanical Engineering" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Mechanical Engineering') ? 'selected' : '' ?>>Mechanical Engineering</option>
                          <option value="Metallurgical &amp; Materials Eng." <?= $viewHelper->checkValue('branch', 'Metallurgical & Materials Eng.') ?>>Metallurgical &amp; Materials Eng.</option>
                          <option value="Ocean Engineering" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Ocean Engineering') ? 'selected' : '' ?>>Ocean Engineering</option>
                          <option value="Physics" <?= (isset($_SESSION['formdata']['branch']) && $_SESSION['formdata']['branch'] == 'Physics') ? 'selected' : '' ?>>Physics</option>
                        </select>
                    </div>
                </div>
                <div class="secondhalf">
                    <div class="form-group my-5">
                        <input type="hidden" id="view_type" name="view_type" value="5">
                        <a href="<?=BASE_URL?>data/sign_in/3" class="btn my-nxt-blue-button">Previous</a>
                        <button type="submit" class="btn my-nxt-blue-button">Next</button>
                    </div>
                </div>    
            </form>
        </div>
    </div>    
</div>
<script>
  const select = document.getElementById('branch');
  select.addEventListener('change', function () {
    // Remove bold from all options
    Array.from(select.options).forEach(opt => opt.style.fontWeight = 'normal');

    // Apply bold to the selected option
    const selected = select.options[select.selectedIndex];
    console.log(selected)
    selected.style.fontWeight = 'bold';
  });
</script>

