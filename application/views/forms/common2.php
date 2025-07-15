<!-- Flow :  2 -->
<div class="container h-100">
    <div class="row mt-5 text-end">
        <div class="offset-md-2 col-md-8">
            <p class="text-end"><a href="<?=BASE_URL?>data/sign_in/99"><img src="<?=PUBLIC_URL?>images/vector-2.svg" alt="icon" width="31" height="31" /></a></p>
        </div>
    </div>
    <div class="row  justify-content-center align-items-center">
        <div class="col-md-7 text-center">
            <form id="myForm" action="<?=BASE_URL?>data/sign_in/6" method="POST">
                <div class="firsthalf">
                    <label for="visitor-category" class="form-label label-text-info mb-4"><?= (isset($_SESSION['formdata']['visitor_name']))? $_SESSION['formdata']['visitor_name'] : 'Vedha' ?>, we would like to know<br /><span class="coloured">you</span> better<br />which one describes you best?</label><br />
                    <div class="input-group d-flex justify-content-around align-items-center mb-5">
                        <a class="button bt-type bt-alumnus" data-url="<?=BASE_URL?>data/sign_in/3">Alumnus</a>
                        <a class="button bt-type bt-student" data-url="<?=BASE_URL?>data/sign_in/12">Student</a>
                        <a class="button bt-type bt-faculty" data-url="<?=BASE_URL?>data/sign_in/9">Faculty</a>    
                        <a class="button bt-type bt-staff" data-url="<?=BASE_URL?>data/sign_in/11">Staff</a>        
                        <a class="button bt-type bt-resident mt-1" data-url="<?=BASE_URL?>data/sign_in/10">Resident</a>
                        <!-- <a class="button bt-type bt-other" href="<?=BASE_URL?>data/sign_in/6">Other</a>     -->
                        <div class="bg-label d-flex justify-content-center align-items-center py-1 px-4 rounded mx-1 mb-1">
                            <label for="other_category" class="me-2 mb-0">Other</label>
                            <input type="text" id="other_category" name="other_category" class="form-control border-0 textbox-bg me-2" placeholder="Type your details..." data-url="<?=BASE_URL?>data/sign_in/6">
                        </div>
                        <img src="<?=PUBLIC_URL?>images/vector-7.svg" class="ms-1" alt="icon" width="40" height="40" />    
                    </div>
                </div>    
                <div class="secondhalf my-5">    
                    <div class="form-group">
                        <input type="hidden" id="view_type" name="view_type" value="6">
                        <a href="<?=BASE_URL?>data/sign_in/1" class="btn my-nxt-blue-button">Previous</a>
                        <button type="submit" class="btn my-nxt-blue-button">Next</button>
                    </div>
                </div>            
            </form>
        </div>
    </div>    
</div>

<script>
  document.querySelectorAll('.bt-type').forEach(function(link) {
    link.addEventListener('click', function(event) {
      event.preventDefault(); // prevent <a> from navigating
      removeSelectedBtType('bt-type-selected');
      const newAction = this.getAttribute('data-url');
      this.classList.add('bt-type-selected');
      document.getElementById('myForm').action = newAction;
      const lastSegment = newAction.split('/').filter(Boolean).pop();
      document.getElementById('view_type').value = lastSegment;
      document.getElementById('other_category').value = "";
    });
  });

document.getElementById('other_category').addEventListener('focus', function() {
    removeSelectedBtType('bt-type-selected');
      const newAction = this.getAttribute('data-url');
    document.getElementById('myForm').action = newAction;
  });


function removeSelectedBtType(className) {
  document.querySelectorAll('a.' + className).forEach(anchor => {
    anchor.classList.remove(className);
  });
}
</script>
