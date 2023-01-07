<section class="cart">
    <h1><?= NAV_CART ?></h1>

    <div class="cart-items-container">
        <?php

            if ($data['cart'] === false) {
                echo '<p>Cart is empty</p>';
            } else {
                foreach ($data['products'] as $product) {
                    
                    $creator = $data['creators'][$product->getCreatorId()];
                    
                    require PATH_COMPONENTS . 'product.php';
                }
            }
        ?>
    </div>
</section>