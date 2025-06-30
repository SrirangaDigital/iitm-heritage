<!-- Flow :  3 -->
<div class="container h-100">
    <div class="row  h-100 justify-content-center align-items-center">
        <!-- <div class="col-md-1 text-center"> -->
            <!-- <span><a href="<?=BASE_URL?>data/sign_out/<?=$data[0]['id']?>/2"><i class="bi bi-arrow-left-circle h3"></i></a></span> -->
        <!-- </div> -->
        <div class="col-md-6 text-center">
            <p class="text-end my-5"><a href="<?=BASE_URL?>data/sign_out/<?=$data[0]['id']?>/99"><i class="bi bi-x h2"></i></a></p>
            <form action="<?=BASE_URL?>data/sign_out/<?=$data[0]['id']?>/4" method="POST">
                <label for="sign_out_date" class="form-label label-text-info mb-4"><?= (isset($data[0]['visitor_name']))? $data[0]['visitor_name'] : 'Vedha' ?>, <span class="coloured">thank you for visiting</span><br /><span class="coloured">the Heritage Centre!</span></label>
                <div class="form-group d-flex justify-content-center align-items-center mb-4">
                    <span class="mx-4 fw-bold">Date</span>
                    <input type="text" class="form-control text-center textbox-bg w-50 mx-2" id="sign_out_date" name="sign_out_date" placeholder="22 October 2024">
                    <i class="bi bi-pencil"></i>                    
                </div>
                <div class="form-group d-flex justify-content-center align-items-center mb-5">
                    <span class="mx-4 fw-bold">Time</span>
                    <input type="text" class="form-control text-center textbox-bg w-50 mx-2" id="sign_out_time" name="sign_out_time" placeholder="18:23">
                    <i class="bi bi-pencil"></i>                    
                </div>
                <p>We look forward to seeing you again!</p>
                <div class="form-group my-5">
                    <input type="hidden" id="view_type" name="view_type" value="4">
                    <a href="<?=BASE_URL?>data/sign_out/<?=$data[0]['id']?>/2" class="btn my-nxt-red-button">Previous</a>
                    <button type="submit" class="button my-nxt-red-button">Sign Out</button>
                </div>        
            </form>
        </div>
    </div>    
</div>

<script>
  window.onload = function() {
    const dateField = document.getElementById('sign_out_date');
    const timeField = document.getElementById('sign_out_time');

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