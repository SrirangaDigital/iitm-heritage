<!-- Flow :  2 -->
<div class="container h-100">
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-1 text-center">
            <span><a href="<?=BASE_URL?>data/test/1"><i class="bi bi-arrow-left-circle h3"></i></span></a>
        </div>    
        <div class="col-md-6 text-center">
            <p class="text-end my-5"><a href="<?=BASE_URL?>data/test/99"><i class="bi bi-x h2"></i></a></p>
            <form action="<?=BASE_URL?>data/test/6" method="POST">
                <div class="input-group d-flex justify-content-center align-items-center mb-5">
                    <label for="visitor-category" class="form-label label-text-info mb-4"><?= (isset($_SESSION['visitor_name']))? $_SESSION['visitor_name'] : 'Vedha' ?>, we would like to know<br /><span class="coloured">you</span> better<br />which one describes you best?</label>
                    <a class="button bt-type bt-alumnus" href="<?=BASE_URL?>data/test/3">Alumnus</a>
                    <a class="button bt-type bt-student" href="<?=BASE_URL?>data/test/12">Student</a>
                    <a class="button bt-type bt-faculty" href="<?=BASE_URL?>data/test/9">Faculty</a>    
                    <a class="button bt-type bt-staff" href="<?=BASE_URL?>data/test/11">Staff</a>        
                    <a class="button bt-type bt-resident" href="<?=BASE_URL?>data/test/10">Resident</a>
                    <!-- <a class="button bt-type bt-other" href="<?=BASE_URL?>data/test/6">Other</a>     -->
                </div>    
                <div class="input-group justify-content-center align-items-center bg-light p-2 rounded">
                    <label for="other_category" class="me-2 mb-0">Other</label>
                    <input type="text" id="other_category" name="other_category" class="form-control border-0 bg-light me-2" placeholder="Type your details...">
                    <i class="bi bi-pencil fs-5" style="background: none;"></i>
                </div>    
                <div class="form-group my-5">
                    <input type="hidden" id="view_type" name="view_type" value="6">
                    <button type="submit" class="btn my-nxt-button">Next</button>
                </div>        
            </form>
        </div>
    </div>    
</div>