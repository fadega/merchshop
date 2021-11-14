<div class="featured-page">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <?php if(isset($item_searched)):?>
                 <h1>Search Results </h1>
              <?php else:?>
                <h1>Featured Merches</h1>
              <?php endif;?>
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
            <div id="filters" class="button-group">
              <a href="<?=ROOT?>shop" class="btn btn-primary active" data-filter="*">All Products</a>
              <?php if(is_array($categories)):?>
                  <?php foreach($categories as $category): ?>
                                  
                      <a href="<?=ROOT . $category['categoryName']?>" class="btn btn-primary"> <?=$category['categoryName']?> </a>
 
                    <?php endforeach;?>
                <?php endif;?>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="featured container no-gutter">

        <div class="row products ">
            <!-- Magic loop to bring products to product page -->
        <?php if(is_array($items_inshop)):?>
            <?php foreach($items_inshop as $item):?>
            <div id="1" class="item new col-md-4">
              <?php $this->view("zac/productloop",$item);?>
            </div>
            <?php endforeach;?>
            <?php endif;?>

       </div>
    </div>
    <!-- show pagination if products exist and they are more than 9 -->
    <?php if($data['items_inshop']>0):?>
      <?php if(count($items_inshop)>9):?>
      <div class="page-navigation">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <ul>
                <li class="current-page"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php endif;?>
    <?php endif;?>