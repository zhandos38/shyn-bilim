<?php

use yii\helpers\Url;

?>
<!-- Mobile Menu Section -->
<div class="popup-mobile-menu">
    <div class="inner-wrapper">
        <div class="inner-top">
            <div class="content">
                <div class="logo">
                    <a href="/">
                        <img src="/img/bilimshini-logo_reverse.png" alt="logo">
                        <span class="ml--10 fw-bold" style="font-size: 18px; text-transform: uppercase; color: #2dc8bd">Bilim-shini.kz</span>
                    </a>
                </div>
                <div class="rbt-btn-close">
                    <button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                </div>
            </div>
            <p class="description">Білім шыңы, білім сыры</p>
            <ul class="navbar-top-left rbt-information-list justify-content-start">
                <li>
                    <a href="mailto:bilimshini.kz@gmail.com"><i class="fa fa-envelope"></i> bilimshini.kz@gmail.com</a>
                </li>
            </ul>
        </div>

        <?= $this->render('_nav') ?>

        <div class="mobile-menu-bottom">
            <div class="rbt-btn-wrapper mb--20">
                <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center" href="#">
                    <span>Жазылу</span>
                </a>
            </div>

            <div class="social-share-wrapper">
                <span class="rbt-short-title d-block">Бізбен бірге бол</span>
                <ul class="social-icon social-default transparent-with-border justify-content-start mt--20">
                    <li><a href="https://www.facebook.com/profile.php?id=100009917714377&_se_imp=013RoUTUXRDM4XUc6&paipv=0&eav=Afb7V5VR0QCk9ms7t2tkGwlt1LX56AM_a85ywYirohUiYpqyPlWlar0yU3n7F2dP45g&_rdr">
                            <i class="feather-facebook"></i>
                        </a>
                    </li>
                    <li><a href="https://www.instagram.com/shyn.baspahana/?hl=ru">
                            <i class="feather-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- Start Side Vav -->