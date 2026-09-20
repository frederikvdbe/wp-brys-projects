<?php

add_action( 'wp_enqueue_scripts', 'sentry_config');
function sentry_config(){
    // See https://docs.sentry.io/clients/javascript/tips/
    wp_add_inline_script( 'wp-sentry-browser', 'function wp_sentry_hook(options) {
    options.ignoreUrls = [
        /graph\.facebook\.com/i,
        /connect\.facebook\.net\/en_US\/all\.js/i,
        /eatdifferent\.com\.woopra-ns\.com/i,
        /static\.woopra\.com\/js\/woopra\.js/i,
        /extensions\//i,
        /^chrome:\/\//i,
        /127\.0\.0\.1:4001\/isrunning/i, // Cacaoweb
        /webappstoolbarba\.texthelp\.com\//i,
        /metrics\.itunes\.apple\.com\.edgesuite\.net\//i,
    ];
    options.ignoreErrors = [
        "top.GLOBALS",
        "originalCreateNotification",
        "canvas.contentDocument",
        "MyApp_RemoveAllHighlights",
        "http://tt.epicplay.com",
        "jigsaw is not defined",
        "ComboSearch is not defined",
        "http://loading.retry.widdit.com/",
        "atomicFindClose",
        "fb_xd_fragment",
        "bmi_SafeAddOnload",
        "EBCallBackMessageReceived",
        "conduitPage",
    ];
    }', 'before' );
} ;