<?php
/*
Plugin Name:  Development Tweaks
Plugin URI:   https://github.com/thinknathan/
Description:  Minor visual changes to differentiate development version of site.
Version:      1.0.1
Author:       Think_Nathan
Author URI:   https://thinknathan.ca/
License:      MIT License
*/

/**
 * Custom development message on dev environment
 * Adds a red box to the top-left of all pages with the word "DEV"
 */
function n_dev_styles() {
  if (WP_ENV === 'development') {
    $output = "<style>html::before { content: 'DEV'; font-weight: 700; letter-spacing: 1px; line-height: 3; text-align: center; width: 3rem; height: 3rem; background: red; display: block; position: fixed; top: 0; left: 0; z-index: 999999; pointer-events: none; opacity: .5; }</style>";
    echo $output;
  }
}
add_action( 'wp_head',    'n_dev_styles' );
add_action( 'admin_head', 'n_dev_styles' );


/**
 * Custom development favicon
 * Adds the letter D on top of the existing favicon
 * Credit: http://www.totallycommunications.com/latest/dynamic-favicons-step-by-step-guide/
 */
function n_dev_favicon() {
  if (WP_ENV === 'development') {
    $output = '<script>(function(c){var b=c.createElement("canvas"),d=c.createElement("img"),e=c.querySelector("link[rel=icon]"),f=e.cloneNode(!0);if("function"==typeof b.getContext){b.width=16;b.height=16;var a=b.getContext("2d");d.onload=function(){a.drawImage(this,0,0,16,16);a.font="bold 12px Arial";a.fillStyle="red";a.strokeStyle="white";a.lineWidth=2;a.textAlign="center";a.strokeText("D",8,13);a.fillText("D",8,13);f.href=b.toDataURL("image/png");c.head.appendChild(f)};d.src=e.href}})(document);</script>';
    echo $output;
  }
}
add_action( 'wp_footer',    'n_dev_favicon', 100 );
add_action( 'admin_footer', 'n_dev_favicon', 100 );
