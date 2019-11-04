<?php

get_header();


$sections = [
    'intro',
    'catalog'
];

foreach ($sections as $section) {
    include(__DIR__ . '../includes/template-parts/' . $section . '.php');
}

get_footer();