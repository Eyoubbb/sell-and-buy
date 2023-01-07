<?=
    $homeUrl = $data['routes']['GET:Home#index']->getUrl();
?>

<section class="cart">
    <h1 class="page-title" ><?= NAV_CART ?></h1>

    <div class="cart-items-container">
        <?php

            if ($data['cart'] === false) {
                echo <<<HTML
                    <p><?= CART_EMPTY ?></p>
                HTML;
            } else {
                foreach ($data['products'] as $product) {
                    
                    $creator = $data['creators'][$product->getCreatorId()];
                    
                    require PATH_COMPONENTS . 'product.php';
                }
            }
        ?>
    </div>
    <section class="info-cart">
        <div class="cart-total">
            <p class="content-page"><?= CART_PRICE ?></p>
        </div>
        <div class="cart-buttons">
            <button>
                <a href="<?= $homeUrl ?>" class="btn btn-primary"><?= CART_CONTINUE ?></a>
            </button>
            <button>
                <a href="<?= $homeUrl ?>" class="btn btn-primary"><?= CART_CHECKOUT ?></a>
            </button>
            <button>
                <a href="<?= $homeUrl ?>" class="btn btn-primary"><?= CART_DELETE ?></a>
            </button>
    </section>
    
</section>