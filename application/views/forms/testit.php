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
                    <div class="form-group d-flex justify-content-center align-items-center mb-5">

        <div class="custom-select-wrapper dropdown">
            <select id="myActualSelect" class="d-none">
                <option value="" selected disabled>Select Branch</option>
                <option value="branch1">Main Branch</option>
                <option value="branch2">City Center Branch</option>
                <option value="branch3">North Side Outlet</option>
                <option value="branch4">South District Office</option>
                <option value="branch5">Online Operations</option>
                <option value="branch6">Global Headquarters (Very Long Text Example)</option>
            </select>

            <button class="custom-dropdown-toggle dropdown-toggle d-flex justify-content-between align-items-center px-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="selected-display text-truncate placeholder-text" data-placeholder="Select Branch">Select Branch</span>
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
<script src="<?=PUBLIC_URL?>js/script.js"></script>


