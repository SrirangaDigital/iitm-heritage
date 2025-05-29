<?php 
    $term = htmlspecialchars($data['displayString'],ENT_QUOTES); 
    unset($data['displayString']);
?>
<script>
$(document).ready(function(){

    $('.post.no-border').prepend('<div class="albumTitle Search"><i class="fa fa-search"></i>' + '<br /><br /><span class="select"><?=$term?>' + '</span></div>');

    $(window).scroll(function(){

        if ($(window).scrollTop() >= ($(document).height() - $(window).height())* 0.75){

            if($('#grid').attr('data-go') == '1') {

                var pagenum = parseInt($('#grid').attr('data-page')) + 1;
                $('#grid').attr('data-page', pagenum);

                var nextURL = window.location.href + '&page=' + pagenum;
                getresult(nextURL);
            }
        }
    });
});     
</script>


<div id="grid" class="container-fluid" data-page="1" data-go="1">
    <div class="row justify-content-around" id="posts">
<?php foreach ($data as $row) { ?>
        <div class="col-sm-12 col-md-5 col-lg-6">
            <div class="item clearfix ">
                <div class="item_thumb">
                    <div class="thumb_hover">
                        <a href="<?=$row['link']?>" title="View Details" target="_blank">
                            <?php if($row['dataType'] == 'video') {?>
                                <img src="<?=BASE_URL?>public/images/stock/people/play.png" class="fa-play" style="width:30%">
                            <?php } elseif($row['dataType'] == 'pdf') {?>
                            <?php } else {?>                                  
                                <img src="<?=BASE_URL?>public/images/stock/people/doc.jpg" class="fa-play" style="width:30%">
                            <?php } ?>    
                            <?php echo "<img src=\"". BASE_URL . "public/images/stock/people/". $row['interviewee'] . ".png\" class=\"visible animated\" />"; ?>
                        </a>
                    </div>
                </div>
                <div class="item_content">
                    <div class="item_meta clearfix">
                        <span class="meta_date"><?=$row['referenceYear']?></span>
                    </div>
                    <p><a href="<?=$row['link']?>" title="View Details" target="_blank"><?=$row['title']?></a></p>
                </div>
            </div>
        </div>
<?php } ?>
    </div>
</div>
<div id="loader-icon">
    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><br />
    Loading more items
</div>
