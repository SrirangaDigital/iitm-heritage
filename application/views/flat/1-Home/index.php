<?php unset($_SESSION['formdata']); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>

    <div class="container h-100">
      
        <div class="row  h-100 justify-content-center align-items-center">
            <div class="col-md-7 text-center">
                <h1 class="landing-page-heading mb-5">Hi!<br />Welcome to the <strong>Heritage Center!</strong></h1>
                <div class="d-flex gap-3 justify-content-center align-items-center">
                    <a class="button mybutton" href="<?= BASE_URL?>data/sign_in/1">Sign In</a>
                    <a class="button mybutton active" href="<?= BASE_URL?>data/profiles">Sign Out</a>
                </div>
                <p class="text-center"><img class="h-image" src="<?=PUBLIC_URL?>/images/home-footer.png" alt="" /></p>
            </div>
        </div>    

    </div>

