<?php
	$contact = $data['routes']['GET:Info#contact']->getUrl();
    $shipreturn = $data['routes']['GET:Info#shippingReturn']->getUrl();
    $legalnotice = $data['routes']['GET:Info#legalNotice']->getUrl();
    $termscondition = $data['routes']['GET:Info#termsCondition']->getUrl();;
?>
<section class="container">
<div class="clientsupp">
    <h1>Client support</h1>
    <p><?= TEXT_TERMS_NOTICE ?></p>
    <a href="<?= $termscondition ?>"><button><?= LINK__TERMS_CONDITION ?></button></a>
    <a href="<?= $legalnotice ?>"><button><?= LINK_LEGAL_NOTICE ?></button></a>
    <p><?= TEXT_SHIPPING_RETURN ?></p> 
    <a href="<?= $shipreturn ?>"><button><?= LINK_SHIPPING_RETURN ?></button></a>
    <p><?= TEXT_CONTACT ?></p>
    <a href="<?= $contact ?>"><button><?= TERMS_CONDITIONS_LINK_CONTACT_US ?></button></a>

</div>
</section>