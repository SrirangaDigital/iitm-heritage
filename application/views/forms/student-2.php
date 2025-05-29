<!-- Flow :  13 -->
<div class="container h-100">
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-1 text-center">
            <span><a href="<?=BASE_URL?>data/test/12"><i class="bi bi-arrow-left-circle h3"></i></span></a>
        </div>    
        <div class="col-md-6 text-center">
            <p class="text-end my-5"><i class="bi bi-x h2"></i></p>
            <form action="<?=BASE_URL?>data/test/6" method="POST">
                <label for="hostel" class="form-label label-text-info mb-4">Select your <span class="coloured">Hostel</span></label>
                <div class="form-group d-flex justify-content-center align-items-center mb-5 custom-select">
                    <select class="form-select form-select-lg mb-3 w-75 select-branch-box-bg" id="hostel" name="hostel" aria-label="Select hostel">
                      <option class="emptyselect fst-italic" selected disabled hidden>Select Hostel</option>
                      <option value="">Alakananda</option>
                      <option value="">Bhadra</option>
                      <option value="">Brahmaputra</option>
                      <option value="">Cauvery</option>
                      <option value="">Ganga</option>                      
                      <option value="">Godavari</option>                      
                      <option value="">Jamuna</option>                      
                      <option value="">Krishna</option>                      
                      <option value="">Mahanadhi</option>                      
                      <option value="">Mandakini</option>                      
                      <option value="">Narmada</option>                      
                      <option value="">Pampa</option>                      
                      <option value="">Sabarmati</option>                      
                      <option value="">Saraswathi</option>                      
                      <option value="">Sarayu</option>                      
                      <option value="">Sharavathi</option>                      
                      <option value="">Sindhu</option>                      
                      <option value="">Swarnamukhi</option>                      
                      <option value="">Tamiraparani</option>                      
                      <option value="">Tapti</option>                      
                      <option value="">Tunga</option>                      
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