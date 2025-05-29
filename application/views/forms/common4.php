<!-- Flow :  7 -->
<div class="container h-100">
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-1 text-center">
            <span><a href="<?=BASE_URL?>data/test/6"><i class="bi bi-arrow-left-circle h3"></i></span></a>
        </div>    
        <div class="col-md-6 text-center">
            <p class="text-end my-5"><a href="<?=BASE_URL?>data/test/99"><i class="bi bi-x h2"></i></a></p>
            <form action="<?=BASE_URL?>data/test/8" method="POST">
                <label for="sign_in_date" class="form-label label-text-info mb-4">You are <span class="coloured">Done!</span></label>
                <div class="form-group d-flex justify-content-center align-items-center mb-4">
                    <span class="mx-4 fw-bold">Date</span>
                    <input type="text" class="form-control text-center textbox-bg w-50 mx-2" id="sign_in_date" name="sign_in_date" placeholder="22 October 2024">
                    <i class="bi bi-pencil"></i>
                </div>
                <div class="form-group d-flex justify-content-center align-items-center mb-5">
                    <span class="mx-4 fw-bold">Time</span>
                    <input type="text" class="form-control text-center textbox-bg w-50 mx-2" id="sign_in_time" name="sign_in_time" placeholder="18:23">
                    <i class="bi bi-pencil"></i>
                </div>    
                <p class="form-text">Click submit when you are ready to explore.<br />Don't forget to sign out when you leave.</p>
                <div class="form-group my-5">
                    <input type="hidden" id="view_type" name="view_type" value="8">
                    <button type="submit" class="btn my-nxt-button">Next</button>
                </div>        
            </form>
        </div>
    </div>    
</div>

<script>
  window.onload = function() {
    const dateField = document.getElementById('sign_in_date');
    const timeField = document.getElementById('sign_in_time');

    const now = new Date();

    // Format: 23 May 2025
    const options = { day: '2-digit', month: 'short', year: 'numeric' };
    const formattedDate = now.toLocaleDateString('en-GB', options).replace(',', '');

    // Format: 24-hour time like 14:30
    const formattedTime = now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: false });

    dateField.value = formattedDate;
    timeField.value = formattedTime;
  };
</script>