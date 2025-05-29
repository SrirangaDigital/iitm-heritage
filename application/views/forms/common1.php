<!-- Flow :  1 -->
<div class="container h-100">
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-1 text-center">
            <span><a href="<?=BASE_URL?>"><i class="bi bi-arrow-left-circle h3"></i></span></a>
        </div>    
        <div class="col-md-6 text-center">
            <p class="text-end my-5"><a href="<?=BASE_URL?>data/test/99"><i class="bi bi-x h2"></i></a></p>
            <form action="<?=BASE_URL?>data/test/2" method="POST">
                <div class="input-group d-flex justify-content-center align-items-center mb-5">
                    <label for="visitor-name" class="form-label label-text-info mb-4">Please Enter your <span class="coloured">name</span></label>
                    <input type="text" class="form-control textbox-bg w-50 mx-2" id="visitor_name" name="visitor_name" value="<?= (isset($_SESSION["formdata"]["visitor_name"]))? $_SESSION["formdata"]["visitor_name"] : "";  ?>" placeholder="Type your name" required>
                    <i class="bi bi-pencil"></i>                    
                </div>    
                <div class="input-group d-flex justify-content-center align-items-center">
                    <label for="visitor-count" class="form-label d-inline-block label-text-info-small mb-4">How many people are visiting with you?</label>
                    <div class="input-group d-flex justify-content-center align-items-center">
                        <a class="button mybutton-incr" id="decrementBtn">-</a>
                        <input type="text" class="form-control text-center textbox-outline txtbox-small mx-2" id="visitor_count" name="visitor_count"  value="<?= (isset($_SESSION["formdata"]["visitor_count"]))? $_SESSION["formdata"]["visitor_count"] : 0;  ?>" placeholder="0">
                        <a class="button mybutton-incr active" id="incrementBtn">+</a>
                    </div>
                </div>    
                <div class="form-group my-5">
                    <input type="hidden" id="view_type" name="view_type" value="2">
                    <button type="submit" class="btn my-nxt-button">Next</button>
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