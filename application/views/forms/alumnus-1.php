<!-- Flow :  3-->
<div class="container h-100">
    <div class="row  h-100 justify-content-center align-items-center">
<!--         <div class="col-md-1 text-center">
            <span><a href="<?=BASE_URL?>data/sign_in/2"><i class="bi bi-arrow-left-circle h3"></i></a></span>
        </div>     -->
        <div class="col-md-6 text-center">
            <p class="text-end my-5"><a href="<?=BASE_URL?>data/sign_in/99"><i class="bi bi-x h2"></i></a></p>
            <form action="<?=BASE_URL?>data/sign_in/4" method="POST">
                <label for="batch" class="form-label label-text-info mb-4">Enter your <span class="coloured">Batch</span></label>
                <div class="form-group d-flex justify-content-center align-items-center mb-5">
                    <input type="text" class="form-control textbox-bg w-50 mx-2" id="batch" name="batch" value="<?= (isset($_SESSION["formdata"]["batch"]))? $_SESSION["formdata"]["batch"] : "";  ?>" placeholder="Enter batch" required>
                    <i class="bi bi-pencil"></i>                    
                </div>    
                <div class="form-group my-5">
                    <input type="hidden" id="view_type" name="view_type" value="4">
                    <a href="<?=BASE_URL?>data/sign_in/2" class="btn my-nxt-blue-button">Previous</a>
                    <button type="submit" class="btn my-nxt-blue-button">Next</button>
                </div>        
            </form>
        </div>
    </div>    
</div>