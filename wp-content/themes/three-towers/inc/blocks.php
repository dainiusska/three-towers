<?php

foreach ( glob( get_template_directory() . '/inc/blocks/*.php' ) as $file ) {
    include_once $file;
}