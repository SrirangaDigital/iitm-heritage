<?php unset($_SESSION['formdata']); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>

    <div class="container h-100">
      
        <div class="row  h-100 justify-content-center align-items-center">
            <div class="col-md-7 text-center">
                <div class="firsthalf">
                    <h1 class="landing-page-heading mb-5"><span style="font-size: 48px;line-height: 2;">Hi!</span><br /><span style="font-size: 40px;font-weight: 300;">Welcome to the <span style="font-weight: 700;">Heritage Center!</span></span></h1>
                    <div class="d-flex gap-3 justify-content-center align-items-center">
                        <a class="button bluebutton" href="<?= BASE_URL?>data/sign_in/1">Sign In</a>
                        <a class="button redbutton active" href="<?= BASE_URL?>data/profiles">Sign Out</a>
                    </div>
                </div> 
                <div class="secondhalf">   
                    <p class="text-center"><img class="h-image" src="<?=PUBLIC_URL?>/images/home-footer.png" alt="" /></p>
                </div>
            </div>
        </div>    

    </div>

