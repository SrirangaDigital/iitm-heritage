<!-- Flow :  6 -->
<div class="container h-100">
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-1 text-center">
            <!-- <span><i class="bi bi-arrow-left-circle h3"></i></span> -->
            <span><a href="<?=BASE_URL?>data/sign_in/<?=$viewHelper->getHrefNumber($_SESSION['formdata']['visitor_type'])?>"><i class="bi bi-arrow-left-circle h3"></i></span></a>
        </div>    
        <div class="col-md-6 text-center">
            <p class="text-end my-5"><a href="<?=BASE_URL?>data/sign_in/99"><i class="bi bi-x h2"></i></a></p>
            <form action="<?=BASE_URL?>data/sign_in/7" method="POST">                    
                <label for="email" class="form-label label-text-info mb-4">Sign-up for our <span class="coloured">Email &amp;<br />Whatsapp group</span></label>
                <div class="form-group d-flex justify-content-center align-items-center mb-4">
                    <i class="bi bi-envelope"></i>
                    <input type="email" class="form-control textbox-bg w-50 mx-2" id="email" name="email" value="<?= (isset($_SESSION["formdata"]["email"]))? $_SESSION["formdata"]["email"] : "";  ?>" placeholder="Type email address...">
                    <i class="bi bi-pencil"></i>                    
                </div>                    
                <div class="form-group d-flex justify-content-center align-items-center mb-5">
                    <i class="bi bi-telephone"></i>
                    <input type="text"  class="form-control textbox-bg w-50 mx-2" id="phonenumber" name="phonenumber" value="<?= (isset($_SESSION["formdata"]["phonenumber"]))? $_SESSION["formdata"]["phonenumber"] : "";  ?>" placeholder="Type phone number...">
                    <i class="bi bi-pencil"></i>                    
                </div>    
                <div class="form-group my-5">
                    <input type="hidden" id="view_type" name="view_type" value="7">
                    <button type="submit" class="btn my-nxt-button">Next</button>
                </div>        
            </form>
        </div>
    </div>    
</div>