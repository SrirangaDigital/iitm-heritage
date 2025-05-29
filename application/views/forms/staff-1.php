<!-- Flow :  11 -->
<div class="container h-100">
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-1 text-center">
            <span><a href="<?=BASE_URL?>data/test/2"><i class="bi bi-arrow-left-circle h3"></i></span></a>
        </div>    
        <div class="col-md-6 text-center">
            <p class="text-end my-5"><i class="bi bi-x h2"></i></p>
            <form action="<?=BASE_URL?>data/test/6" method="POST">
                <label for="designation" class="form-label label-text-info mb-4">Enter your <span class="coloured">Designation</span></label>
                <div class="form-group d-flex justify-content-center align-items-center mb-5">
                    <input type="text" class="form-control textbox-bg w-50 mx-2" id="designation" name="designation" placeholder="Type your Designation">
                    <i class="bi bi-pencil"></i>                    
                </div>    
                <div class="form-group my-5">
                    <input type="hidden" id="view_type" name="view_type" value="6">
                    <button type="submit" class="btn my-nxt-button">Next</button>
                </div>        
            </form>
        </div>
    </div>    
</div>