<!-- Flow :  8 -->
<div class="container h-100">
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-7 text-center">
            <label for="visitor-name" class="form-label label-text-info mb-4 fw-bold"><?= (isset($_SESSION['formdata']['visitor_name']))? $_SESSION['formdata']['visitor_name'] : 'Vedha' ?>,<br />your registration is complete!</label>
            <div class="form-group d-flex justify-content-center align-items-center mb-4">
                <span class="big-icon"><i class="bi bi-check-circle"></i></span>
            </div>                            
        </div>
    </div>    
</div>

<script>
  // Works if JavaScript is enabled
  setTimeout(function() {
   window.location.href = base_url;
  }, 2000);
</script>