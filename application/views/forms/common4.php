<!-- Flow :  7 -->
<div class="container h-100">
    <div class="row mt-5 text-end">
        <div class="offset-md-2 col-md-8">
            <p class="text-end"><a href="<?=BASE_URL?>data/sign_in/99"><img src="<?=PUBLIC_URL?>images/vector-2.svg" alt="icon" width="31" height="31" /></a></p>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-7 text-center">
            <form action="<?=BASE_URL?>data/sign_in/8" method="POST" id="myForm">
                <div class="firsthalf">
                    <label for="sign_in_date" class="form-label label-text-info mb-4 mt-5">You are <span class="coloured">Done!</span></label>
                    <div class="form-group d-flex justify-content-center align-items-center mb-4">
                        <span class="datetimelabel">Date</span>
                        <input type="text" class="form-control text-center textbox-bg w-50 mx-3" id="sign_in_date" name="sign_in_date" placeholder="22 October 2024" required>
                        <img src="<?=PUBLIC_URL?>images/vector-7.svg" class="ms-1" alt="icon" width="40" height="40" />                    
                    </div>
                    <div class="form-group d-flex justify-content-center align-items-center mb-5">
                        <span class="datetimelabel">Time</span>
                        <input type="text" class="form-control text-center textbox-bg w-50 mx-3" id="sign_in_time" name="sign_in_time" placeholder="18:23" required>
                        <img src="<?=PUBLIC_URL?>images/vector-7.svg" class="ms-1" alt="icon" width="40" height="40" />                    
                    </div>    
                    <p class="form-text">Click submit when you are ready to explore.<br />Don't forget to sign out when you leave.</p>
                </div>
                <div class="secondhalf">
                    <div class="form-group my-5">
                        <input type="hidden" id="view_type" name="view_type" value="8">
                        <input type="hidden" id="timestamp" name="timestamp" value="">
                        <a href="<?=BASE_URL?>data/sign_in/6" class="btn my-nxt-blue-button">Previous</a>
                        <button type="submit" class="btn my-nxt-blue-button my-nxt-blue-button-selected">Submit</button>
                    </div>
                </div>    
            </form>
        </div>
    </div>    
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
  flatpickr("#sign_in_date", {
    dateFormat: "d F Y", // e.g., 21 July 2025
  });

  flatpickr("#sign_in_time", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i", // e.g., 5:32 PM
    time_24hr: false
  });

  window.onload = function() {
    const dateField = document.getElementById('sign_in_date');
    const timeField = document.getElementById('sign_in_time');
    const timestamp = document.getElementById('timestamp');

    const now = new Date();

    // Format: 23 May 2025
    const options = { day: '2-digit', month: 'long', year: 'numeric' };
    const formattedDate = now.toLocaleDateString('en-GB', options).replace(',', '');

    // Format: 24-hour time like 14:30
    const formattedTime = now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: false });

    dateField.value = formattedDate;
    timeField.value = formattedTime;
    timestamp.value = Date.now();
  };

 document.getElementById("myForm").addEventListener("submit", function(e) {
    const dateVal = document.getElementById("sign_in_date").value.trim();
    const timeVal = document.getElementById("sign_in_time").value.trim();

    if (!dateVal || !timeVal) {
      e.preventDefault(); // stop form submit
      alert("Please select both date and time.");
      
      // Optional: show red border
      if (!dateVal) document.getElementById("sign_in_date").style.border = "2px solid #2196F3";
      if (!timeVal) document.getElementById("sign_in_time").style.border = "2px solid #2196F3";
    }
  });


</script>