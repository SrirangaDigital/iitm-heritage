<!-- Flow :  3-->
<div class="container h-100">
    <div class="row mt-5 text-end">
        <div class="offset-md-2 col-md-8">
            <p class="text-end"><a href="<?=BASE_URL?>data/sign_in/99"><img src="<?=PUBLIC_URL?>images/vector-2.svg" alt="icon" width="31" height="31" /></a></p>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-7 text-center">
            <form action="<?=BASE_URL?>data/sign_in/4" method="POST">
                <div class="firsthalf">
                    <label for="batch" class="form-label label-text-info mb-4 mt-5">Enter your <span class="coloured">Batch</span></label>
                    <div class="form-group d-flex justify-content-center align-items-center mb-5">
                        <input type="text" class="form-control textbox-bg w-75 mx-2" id="batch" name="batch" value="<?= (isset($_SESSION["formdata"]["batch"]))? $_SESSION["formdata"]["batch"] : "";  ?>" placeholder="Enter batch" required>
                        <img src="<?=PUBLIC_URL?>images/vector-7.svg" class="ms-1" alt="icon" width="40" height="40" />
                    </div>
                </div>
                <div class="secondhalf my-5">
                    <div class="form-group">
                        <input type="hidden" id="view_type" name="view_type" value="4">
                        <a href="<?=BASE_URL?>data/sign_in/2" class="btn my-nxt-blue-button">Previous</a>
                        <button type="submit" class="btn my-nxt-blue-button">Next</button>
                    </div>
                </div>            
            </form>
        </div>
    </div>    
</div>