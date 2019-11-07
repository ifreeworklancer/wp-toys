<?php
$phone = get_theme_mod('phone');
$phone_link = phone_link($phone);
$instagram = get_theme_mod('instagram');
$viber = get_theme_mod('viber');
$telegram = get_theme_mod('telegram');
?>

<modal-feedback phone="<?= $phone; ?>" phone-link="<?= $phone_link; ?>" instagram="<?= $instagram; ?>"
                viber="<?= $viber; ?>" telegram="<?= $telegram; ?>"/>