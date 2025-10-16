<!-- Flow :  2 -->
<div class="container h-100">
    <div class="row mt-5 text-end">
        <div class="offset-md-2 col-md-8">
            <p class="text-end"><a href="<?=BASE_URL?>data/sign_in/99"><img src="<?=PUBLIC_URL?>images/vector-2.svg" alt="icon" width="31" height="31" /></a></p>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-7 text-center">
            <form action="<?=BASE_URL?>data/sign_out/<?=$data[0]['id']?>/3" method="POST">
                <div class="firsthalf">
                    <label for="feedback" class="form-label label-text-info mb-4"><?= (isset($data[0]['visitor_name']))? $data[0]['visitor_name'] : 'Vedha' ?>, do you have<br />any <span class="coloured">feedback</span> for us?</label>
                    <div class="form-group d-flex justify-content-center align-items-center mb-5">
                        <input type="text" class="form-control textbox-bg w-75 mx-2" id="feedback" name="feedback" value="<?= (isset($_SESSION["formdata"]["feedback"]))? $_SESSION["formdata"]["feedback"] : "";  ?>" placeholder="Type feedback">
                        <img src="<?=PUBLIC_URL?>images/vector-7.svg" class="ms-1" alt="icon" width="40" height="40" />                    
                    </div>
                </div>
                <div class="secondhalf my-5">
                    <div class="form-group">
                        <input type="hidden" id="view_type" name="view_type" value="3">
                        <a href="<?=BASE_URL?>data/sign_out/<?=$data[0]['id']?>/1" class="btn my-nxt-red-button">Previous</a>
                        <button type="submit" class="btn my-nxt-red-button">Next</button>
                    </div>
                </div>            
            </form>
        </div>
    </div>    
</div>