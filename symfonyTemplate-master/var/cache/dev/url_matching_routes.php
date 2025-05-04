<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin/dashborad' => [[['_route' => 'app_admin_dashborad', '_controller' => 'App\\Controller\\AdminDashboradController::index'], null, null, null, false, false, null]],
        '/admin/dashborad/profile' => [[['_route' => 'app_admin_dashborad_profile', '_controller' => 'App\\Controller\\AdminDashboradController::profile'], null, null, null, false, false, null]],
        '/admin/dashborad/tables' => [[['_route' => 'app_admin_dashborad_tables', '_controller' => 'App\\Controller\\AdminDashboradController::tables'], null, null, null, false, false, null]],
        '/admin/dashborad/virtual-reality' => [[['_route' => 'app_admin_dashborad_virtual_reality', '_controller' => 'App\\Controller\\AdminDashboradController::virtual_reality'], null, null, null, false, false, null]],
        '/admin/dashborad/sign-in' => [[['_route' => 'app_admin_dashborad_sign_in', '_controller' => 'App\\Controller\\AdminDashboradController::sign_in'], null, null, null, false, false, null]],
        '/admin/dashborad/sign-up' => [[['_route' => 'app_admin_dashborad_sign_up', '_controller' => 'App\\Controller\\AdminDashboradController::sign_up'], null, null, null, false, false, null]],
        '/admin/dashborad/rtl' => [[['_route' => 'app_admin_dashborad_rtl', '_controller' => 'App\\Controller\\AdminDashboradController::rtl'], null, null, null, false, false, null]],
        '/admin/dashborad/billing' => [[['_route' => 'app_admin_dashborad_billing', '_controller' => 'App\\Controller\\AdminDashboradController::billing'], null, null, null, false, false, null]],
        '/matches' => [[['_route' => 'app_matches', '_controller' => 'App\\Controller\\HomeController::matches'], null, null, null, false, false, null]],
        '/players' => [[['_route' => 'app_players', '_controller' => 'App\\Controller\\HomeController::players'], null, null, null, false, false, null]],
        '/blog' => [[['_route' => 'app_blog', '_controller' => 'App\\Controller\\HomeController::blog'], null, null, null, false, false, null]],
        '/contact' => [[['_route' => 'app_contact', '_controller' => 'App\\Controller\\HomeController::contact'], null, null, null, false, false, null]],
        '/single' => [[['_route' => 'app_single', '_controller' => 'App\\Controller\\HomeController::single'], null, null, null, false, false, null]],
        '/order' => [[['_route' => 'order_index', '_controller' => 'App\\Controller\\OrderController::index'], null, null, null, false, false, null]],
        '/order/new' => [[['_route' => 'order_new', '_controller' => 'App\\Controller\\OrderController::new'], null, null, null, false, false, null]],
        '/admin/product' => [[['_route' => 'product_index', '_controller' => 'App\\Controller\\ProductController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/product/new' => [[['_route' => 'product_new', '_controller' => 'App\\Controller\\ProductController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/shop' => [[['_route' => 'app_shop', '_controller' => 'App\\Controller\\ShopController::index'], null, null, null, true, false, null]],
        '/shop/cart' => [[['_route' => 'app_shop_cart', '_controller' => 'App\\Controller\\ShopController::cart'], null, null, null, false, false, null]],
        '/Teamhome' => [[['_route' => 'app_home_Team', '_controller' => 'App\\Controller\\TeamHomeController::index'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'homepage_redirect', 'route' => 'app_home', 'permanent' => true, '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction'], null, null, null, false, false, null]],
        '/home' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/tournois' => [[['_route' => 'app_tournois_list', '_controller' => 'App\\Controller\\TournoisController::index'], null, ['GET' => 0], null, false, false, null]],
        '/tournois/new' => [[['_route' => 'app_tournois_new', '_controller' => 'App\\Controller\\TournoisController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/order/(?'
                    .'|edit/([^/]++)(*:30)'
                    .'|delete/([^/]++)(*:52)'
                .')'
                .'|/admin/product/([^/]++)(?'
                    .'|/edit(*:91)'
                    .'|(*:98)'
                .')'
                .'|/shop/(?'
                    .'|cart/remove/([^/]++)(*:135)'
                    .'|add\\-to\\-cart/([^/]++)(*:165)'
                    .'|([^/]++)(*:181)'
                    .'|log(?'
                        .'|in(*:197)'
                        .'|out(*:208)'
                    .')'
                    .'|register(*:225)'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:265)'
                    .'|wdt/([^/]++)(*:285)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:327)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:364)'
                                .'|router(*:378)'
                                .'|exception(?'
                                    .'|(*:398)'
                                    .'|\\.css(*:411)'
                                .')'
                            .')'
                            .'|(*:421)'
                        .')'
                    .')'
                .')'
                .'|/tournois/(?'
                    .'|edit/([^/]++)(*:458)'
                    .'|delete/([^/]++)(*:481)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        30 => [[['_route' => 'order_edit', '_controller' => 'App\\Controller\\OrderController::edit'], ['id'], null, null, false, true, null]],
        52 => [[['_route' => 'order_delete', '_controller' => 'App\\Controller\\OrderController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        91 => [[['_route' => 'product_edit', '_controller' => 'App\\Controller\\ProductController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        98 => [[['_route' => 'product_delete', '_controller' => 'App\\Controller\\ProductController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        135 => [[['_route' => 'app_shop_cart_remove', '_controller' => 'App\\Controller\\ShopController::removeFromCart'], ['id'], null, null, false, true, null]],
        165 => [[['_route' => 'app_shop_add_to_cart', '_controller' => 'App\\Controller\\ShopController::addToCart'], ['id'], null, null, false, true, null]],
        181 => [[['_route' => 'app_shop_product', '_controller' => 'App\\Controller\\ShopController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        197 => [[['_route' => 'app_shop_login', '_controller' => 'App\\Controller\\ShopLoginController::login'], [], null, null, false, false, null]],
        208 => [[['_route' => 'app_shop_logout', '_controller' => 'App\\Controller\\ShopLoginController::logout'], [], null, null, false, false, null]],
        225 => [[['_route' => 'app_shop_register', '_controller' => 'App\\Controller\\ShopLoginController::register'], [], null, null, false, false, null]],
        265 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        285 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        327 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        364 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        378 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        398 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        411 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        421 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        458 => [[['_route' => 'app_tournois_edit', '_controller' => 'App\\Controller\\TournoisController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        481 => [
            [['_route' => 'app_tournois_delete', '_controller' => 'App\\Controller\\TournoisController::delete'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
