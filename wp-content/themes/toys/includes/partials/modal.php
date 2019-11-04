<div class="custom-modal custom-modal--feedback">
    <div class="close-modal">
        <div class="line line--left"></div>
        <div class="line line--right"></div>
    </div>
    <div class="custom-modal-header">
        <h3 class="title">
            Свяжитесь с нами
        </h3>
    </div>
    <div class="custom-modal-body">
        <ul class="contacts-list">
            <li>
                <a href="tel:<?= phone_link($phone) ?>">
                    <svg width="15" height="15">
                        <use xlink:href="#phone-icon"></use>
                    </svg>
                    <?= $phone; ?>
                </a>
            </li>
        </ul>
        <ul class="social-list">
            <li>
                <a href="<?= $instagram; ?>">
                    <svg width="20" height="20">
                        <use xlink:href="#instagram-icon"></use>
                    </svg>
                </a>
            </li>
            <li>
                <a href="<?= $viber; ?>">
                    <svg width="20" height="20">
                        <use xlink:href="#viber-icon"></use>
                    </svg>
                </a>
            </li>
            <li>
                <a href="<?= $telegram; ?>">
                    <svg width="20" height="20">
                        <use xlink:href="#telegram-icon"></use>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="modal-mask"></div>