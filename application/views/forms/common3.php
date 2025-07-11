<!-- Flow :  6 -->
<div class="container h-100">
    <div class="row mt-5 text-end">
        <div class="offset-md-2 col-md-8">
            <p class="text-end"><a href="<?=BASE_URL?>data/sign_in/99"><img src="<?=PUBLIC_URL?>images/vector-2.svg" alt="icon" width="31" height="31" /></a></p>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-7 text-center">
            <form action="<?=BASE_URL?>data/sign_in/7" method="POST">                    
                <div class="firsthalf">
                    <label for="email" class="form-label label-text-info mb-4 mt-5">Sign-up for our <span class="coloured">Email &amp;<br />Whatsapp group</span></label>
                    <div class="form-group d-flex justify-content-center align-items-center mb-4">
                        <img src="<?=PUBLIC_URL?>images/vector-9.svg" class="ms-1" alt="icon" width="55" height="43" />
                        <input type="email" class="form-control textbox-bg w-50 mx-3" id="email" name="email" value="<?= (isset($_SESSION["formdata"]["email"]))? $_SESSION["formdata"]["email"] : "";  ?>" placeholder="Type email address...">
                        <img src="<?=PUBLIC_URL?>images/vector-7.svg" class="ms-1" alt="icon" width="40" height="40" />                    
                    </div>                    
                    <div class="form-group d-flex justify-content-center align-items-center mb-5">
                        <img src="<?=PUBLIC_URL?>images/vector-10.svg" class="ms-1" alt="icon" width="51" height="51" />
                        <input type="text"  class="form-control textbox-bg w-50 mx-3" id="phonenumber" name="phonenumber" value="<?= (isset($_SESSION["formdata"]["phonenumber"]))? $_SESSION["formdata"]["phonenumber"] : "";  ?>" placeholder="Type phone number...">
                        <img src="<?=PUBLIC_URL?>images/vector-7.svg" class="ms-1" alt="icon" width="40" height="40" />                    
                    </div>
                </div>
                <div class="secondhalf">
                    <div class="form-group my-5">
                        <input type="hidden" id="view_type" name="view_type" value="7">
                        <a href="<?=BASE_URL?>data/sign_in/<?=$viewHelper->getHrefNumber($_SESSION['formdata']['visitor_type'])?>" class="btn my-nxt-blue-button">Previous</a>
                        <button type="submit" class="btn my-nxt-blue-button">Next</button>
                    </div>
                </div>            
            </form>
        </div>
    </div>    
</div>