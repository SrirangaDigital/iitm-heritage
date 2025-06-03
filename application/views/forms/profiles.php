<!-- Flow :  14 -->
<div class="container h-100">
    <div class="row  h-100 justify-content-center align-items-center">
        <div class="col-md-1 text-center">
            <span><i class="bi bi-arrow-left-circle h3"></i></span>
        </div>    
        <div class="col-md-6 text-center">
            <p class="text-end my-5"><a href="<?=BASE_URL?>data/test/99"><i class="bi bi-x h2"></i></a></p>
            <label for="visitor-name" class="form-label label-text-info mb-4"><span class="coloured">Select</span> Profile</label>
            
            <div class="d-flex flex-wrap gap-3 justify-content-start">
              <?php foreach ($data as $row) { ?>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?=$row['visitor_name']?></h5>
                    <h6 class="card-subtitle"><?=(isset($row['visitor_count']))? $row['visitor_count']: '' ?></h6>
                      <a href="<?=BASE_URL?>data/signout/<?=$row['id']?>" class="btn card-select-link">Select</a>
                  </div>
                </div>
              <?php } ?>  
            </div>                

        </div>
    </div>    
</div>