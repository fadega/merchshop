
<!-- Single product loops -->
<div class="featured-item">
    <a href="<?=ROOT?>singleproduct/<?=$data['slug']?>">
    
        <div style="overflow: hidden;"> <img class="product-image" src="<?=ROOT . $data['image1']?>" alt="product image"></div>
        <h4><?=$data['name']?></h4>
        <h6>$<?=$data['price']?></h6>
        <p><?=$data['description']?></p>
        <?php if($data['quantity']<=1):?>
        <p class="form-text text-danger fw-bold" ><?=$data['quantity']?> in stock</p>

        <?php endif;?>
 
        <button class="btn add-to-cart my-2 py-2">View item</button>  
        
        </a>   
        <!-- <br/>
      <div > <a  href="<?//=ROOT?>Adtocart/<?//=$data['id']?>" class="add-to-cart mt-2 py-2 rounded"> Add to cart</a></div>  -->

</div>


 



<!-- End Single product loops -->