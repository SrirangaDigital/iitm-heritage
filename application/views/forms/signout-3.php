<!-- Flow :  2 -->
<div class="container h-100">
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-1 text-center">
            <span><a href="<?=BASE_URL?>data/sign_out/<?=$data[0]['id']?>/1"><i class="bi bi-arrow-left-circle h3"></i></a></span>
        </div>    
        <div class="col-md-6 text-center">
            <p class="text-end my-5"><a href="<?=BASE_URL?>data/sign_out/<?=$data[0]['id']?>/99"><i class="bi bi-x h2"></i></a></p>
            <form action="<?=BASE_URL?>data/sign_out/<?=$data[0]['id']?>/3" method="POST">
                <label for="feedback" class="form-label label-text-info mb-4"><?= (isset($data[0]['visitor_name']))? $data[0]['visitor_name'] : 'Vedha' ?>, do you have<br />any <span class="coloured">feedback</span> for us?</label>
                <div class="form-group d-flex justify-content-center align-items-center mb-5">
                    <input type="text" class="form-control fst-italic textbox-bg w-50 mx-2" id="feedback" name="feedback" value="<?= (isset($_SESSION["formdata"]["feedback"]))? $_SESSION["formdata"]["feedback"] : "";  ?>" placeholder="Type feedback">
                    <i class="bi bi-pencil"></i>                    
                </div>    
                <div class="form-group my-5">
                    <input type="hidden" id="view_type" name="view_type" value="3">
                    <button type="submit" class="btn my-nxt-button">Next</button>
                </div>        
            </form>
        </div>
    </div>    
</div>