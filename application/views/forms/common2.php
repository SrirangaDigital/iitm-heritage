<!-- Flow :  2 -->
<div class="container h-100">
    <div class="row  h-100 justify-content-center align-items-center">
<!--         <div class="col-md-1 text-center">
            <span><a href="<?=BASE_URL?>data/sign_in/1"><i class="bi bi-arrow-left-circle h3"></i></a></span>
        </div>     -->
        <div class="col-md-6 text-center">
            <p class="text-end my-5"><a href="<?=BASE_URL?>data/sign_in/99"><i class="bi bi-x h2"></i></a></p>
            <form id="myForm" action="<?=BASE_URL?>data/sign_in/6" method="POST">
                <label for="visitor-category" class="form-label label-text-info mb-4"><?= (isset($_SESSION['visitor_name']))? $_SESSION['visitor_name'] : 'Vedha' ?>, we would like to know<br /><span class="coloured">you</span> better<br />which one describes you best?</label><br />
                <div class="input-group d-flex justify-content-center align-items-center mb-5">
                    <a class="button bt-type bt-alumnus" data-url="<?=BASE_URL?>data/sign_in/3">Alumnus</a>
                    <a class="button bt-type bt-student" data-url="<?=BASE_URL?>data/sign_in/12">Student</a>
                    <a class="button bt-type bt-faculty" data-url="<?=BASE_URL?>data/sign_in/9">Faculty</a>    
                    <a class="button bt-type bt-staff" data-url="<?=BASE_URL?>data/sign_in/11">Staff</a>        
                    <a class="button bt-type bt-resident" data-url="<?=BASE_URL?>data/sign_in/10">Resident</a>
                    <!-- <a class="button bt-type bt-other" href="<?=BASE_URL?>data/sign_in/6">Other</a>     -->
                    <div class="bg-label d-flex justify-content-center align-items-center py-2 px-5 rounded mx-2">
                        <label for="other_category" class="me-2 mb-0">Other</label>
                        <input type="text" id="other_category" name="other_category" class="form-control border-0 textbox-bg me-2" placeholder="Type your details..." data-url="<?=BASE_URL?>data/sign_in/6">
                    </div>    
                    <i class="bi bi-pencil no-bg fs-5" style="background: none;"></i>
                </div>    
                <div class="form-group my-5">
                    <input type="hidden" id="view_type" name="view_type" value="6">
                    <a href="<?=BASE_URL?>data/sign_in/1" class="btn my-nxt-blue-button">Previous</a>
                    <button type="submit" class="btn my-nxt-blue-button">Next</button>
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
