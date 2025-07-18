<!-- Flow :  14 -->
<div class="container h-100">
    <div class="row mt-5 text-end">
        <div class="offset-md-2 col-md-9">
            <p class="text-end"><a href="<?=BASE_URL?>data/sign_in/99"><img src="<?=PUBLIC_URL?>images/vector-2.svg" alt="icon" width="31" height="31" /></a></p>
        </div>
    </div>
    <div class="row  justify-content-center align-items-center">
        <div class="col-md-9 text-center">
            <label for="visitor-name" class="form-label label-text-info mb-4"><span class="coloured">Select</span> Profile</label>
            <div class="firsthalfpr my-5">
              <div class="d-flex flex-wrap gap-3 justify-content-start">
                <?php foreach ($data as $row) { ?>
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><?=$row['visitor_name']?></h5>
                      <h6 class="card-subtitle"><?=(isset($row['visitor_count']))? $row['visitor_count']: '&nbsp;' ?></h6>
                    </div>
                    <div class="card-footer">
                      <a data-url="<?=BASE_URL?>data/sign_out/<?=$row['id']?>/1" class="btn card-select-link">Select</a>
                    </div>  
                  </div>
                <?php } ?>  
              </div>
            </div>  
            <div class="secondhalf">
              <div class="m-5">
                <a href="<?=BASE_URL?>" class="btn my-nxt-red-button">Previous</a>
                <a href="#" class="btn my-nxt-red-button" id="nextbtn">Next</a>
              </div>
            </div>
        </div>
    </div>    
</div>

<script>
  document.querySelectorAll('.card-select-link').forEach(link => {
    link.addEventListener('click', function(event) {
      event.preventDefault();

      // Reset all links to "Select"
      document.querySelectorAll('.card-select-link').forEach(el => {
        el.textContent = 'Select';
        el.classList.remove('card-select-link-selected');
      });

      const selectedUrl = this.getAttribute('data-url');
      // Set clicked one to "Selected"
      this.textContent = 'Selected';
      this.classList.add('card-select-link-selected');
      document.getElementById('nextbtn').href = selectedUrl;
    });
  });
</script>
