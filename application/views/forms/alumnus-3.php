<!-- Flow :  5-->
<div class="container h-100">
    <div class="row  h-100 justify-content-center align-items-center">
<!--         <div class="col-md-1 text-center">
            <span><a href="<?=BASE_URL?>data/sign_in/4"><i class="bi bi-arrow-left-circle h3"></i></a></span>
        </div>     -->
        <div class="col-md-6 text-center">
            <p class="text-end my-5"><a href="<?=BASE_URL?>data/sign_in/99"><i class="bi bi-x h2"></i></a></p>
            <form action="<?=BASE_URL?>data/sign_in/6" method="POST">                    
                <label for="hostel" class="form-label label-text-info mb-4">Select your <span class="coloured">Hostel</span></label>
                <div class="form-group d-flex justify-content-center align-items-center mb-5 custom-select">
                    <select class="form-select form-select-lg mb-3 w-75 select-branch-box-bg" id="hostel" name="hostel" aria-label="Select Hostel">
                      <option class="emptyselect fst-italic" selected disabled hidden>𝑠𝑒𝑙𝑒𝑐𝑡 𝘩𝑜𝑠𝑡𝑒𝑙</option>
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
                </div>    
                <div class="form-group my-5">
                    <input type="hidden" id="view_type" name="view_type" value="6">
                    <a href="<?=BASE_URL?>data/sign_in/4" class="btn my-nxt-blue-button">Previous</a>
                    <button type="submit" class="btn my-nxt-blue-button">Next</button>
                </div>        
            </form>
        </div>
    </div>    
</div>