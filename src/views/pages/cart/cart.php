<?=
    $homeUrl = $data['routes']['GET:Home#index']->getUrl();
    $deleteCart = $data['routes']['GET:Cart#delete']->getUrl();
?>

<section class="cart">
    <div class="cart-items-container">
        <?php

            if (!isset($data['cart'])) {
                echo '<p>' . CART_EMPTY . '</p>';
            } else {
                echo <<<HTML
                <table>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Total</th>
                    </tr>
                HTML;

                foreach ($data['products'] as $product) {
                    
                    $creator = $data['creators'][$product->getCreatorId()];

                    require PATH_COMPONENTS . 'cart.php';
                }

                echo <<<HTML
                </table>
                HTML;
            }
        ?>
    </div>
    <?php if(isset($data['cart'])): ?>
        <section class="info-cart">
            <div class="cart-total">
                <p class="content-page"><?= CART_TOTAL . $data['count']['quantity'] ?></p>
                <p class="content-page"><?= CART_PRICE . $data['total']['cart_price']?> €</p>
                <p class="content-page"><?= CART_PRICE_DISCOUNT . $data['total']['cart_price_discount']?> €</p>   
            </div>
            <div class="cart-buttons">
                <button>
                    <a href="<?= $homeUrl ?>" class="btn btn-primary"><?= CART_CONTINUE ?></a>
                </button>
                <button>
                    <a href="<?= $homeUrl ?>" class="btn btn-primary"><?= CART_CHECKOUT ?></a>
                </button>
                <button>
                    <a href="<?= $deleteCart ?>" class="btn btn-primary"><?= CART_DELETE ?></a>
                </button>
            </div>
        </section>
    <?php endif ?>
</section>