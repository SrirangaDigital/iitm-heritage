<!-- Flow :  1 -->
<div class="container h-100">
    <div class="row mt-5 text-end">
        <div class="offset-md-2 col-md-8">
            <p class="text-end"><a href="<?=BASE_URL?>data/sign_in/99"><img src="<?=PUBLIC_URL?>images/vector-2.svg" alt="icon" width="31" height="31" /></a></p>
        </div>
    </div>
    <div class="row  justify-content-center align-items-center">
        <div class="col-md-7 text-center">            
            <form action="<?=BASE_URL?>data/sign_in/2" method="POST">
                <div class="firsthalf">
                    <div class="input-group d-flex justify-content-center align-items-center mb-5">
                        <label for="visitor-name" class="form-label label-text-info mb-4">Please Enter your <span class="coloured">name</span></label>
                        <input type="text" class="form-control textbox-bg w-75 mx-2" id="visitor_name" name="visitor_name" value="<?= (isset($_SESSION["formdata"]["visitor_name"]))? $_SESSION["formdata"]["visitor_name"] : "";  ?>" placeholder="Type your name" required>
                        <img src="<?=PUBLIC_URL?>images/vector-7.svg" class="ms-1" alt="icon" width="40" height="40" />
                    </div>    
                    <div class="input-group d-flex justify-content-center align-items-center">
                        <label for="visitor-count" class="form-label d-inline-block label-text-info-small mb-4">How many people are visiting with you?</label>
                        <div class="input-group d-flex justify-content-center align-items-center">
                            <a class="button mybutton-incr" id="decrementBtn">-</a>
                            <input type="text" class="form-control text-center mx-4" style="flex: 0 0 auto;" id="visitor_count" name="visitor_count"  value="<?= (isset($_SESSION["formdata"]["visitor_count"]))? $_SESSION["formdata"]["visitor_count"] : 0;  ?>" placeholder="0">
                            <a class="button mybutton-incr active" id="incrementBtn">+</a>
                        </div>
                    </div>
                </div>
                <div class="secondhalf my-5">
                    <div class="form-group my-5">
                        <input type="hidden" id="view_type" name="view_type" value="2">
                        <a href="<?=BASE_URL?>" class="btn my-nxt-blue-button">Previous</a>
                        <button type="submit" class="btn my-nxt-blue-button">Next</button>
                    </div>
                </div>            
            </form>
        </div>    
    </div>    
</div>

<script>
    const visitor_count = document.getElementById('visitor_count');
    const incrementBtn = document.getElementById('incrementBtn');
    const decrementBtn = document.getElementById('decrementBtn');

    incrementBtn.addEventListener('click', () => {
      visitor_count.value = parseInt(visitor_count.value) + 1;
    });

    decrementBtn.addEventListener('click', () => {        
        visitor_count.value = ( (parseInt(visitor_count.value) - 1) < 0 )? 0 : parseInt(visitor_count.value) - 1;
    });
</script>