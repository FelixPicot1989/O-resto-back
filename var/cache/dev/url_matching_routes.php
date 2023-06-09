<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/categories' => [[['_route' => 'app_api_categories_browse', '_controller' => 'App\\Controller\\Api\\CategoryController::browse'], null, ['GET' => 0], null, false, false, null]],
        '/api/drinks' => [[['_route' => 'app_api_drinks_browse', '_controller' => 'App\\Controller\\Api\\DrinkController::browse'], null, ['GET' => 0], null, false, false, null]],
        '/api/eats' => [[['_route' => 'app_api_eats_browse', '_controller' => 'App\\Controller\\Api\\EatController::browse'], null, ['GET' => 0], null, false, false, null]],
        '/api/images' => [[['_route' => 'app_api_images_browse', '_controller' => 'App\\Controller\\Api\\ImageController::browse'], null, ['GET' => 0], null, false, false, null]],
        '/api/menus' => [[['_route' => 'app_api_menus_browse', '_controller' => 'App\\Controller\\Api\\MenuController::browse'], null, ['GET' => 0], null, false, false, null]],
        '/api/restaurants' => [[['_route' => 'app_api_restaurants_browse', '_controller' => 'App\\Controller\\Api\\RestaurantController::browse'], null, ['GET' => 0], null, false, false, null]],
        '/api/reviews' => [
            [['_route' => 'app_api_review_browse', '_controller' => 'App\\Controller\\Api\\ReviewController::browse'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_api_review_add', '_controller' => 'App\\Controller\\Api\\ReviewController::add'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/users' => [[['_route' => 'app_api_users_browse', '_controller' => 'App\\Controller\\Api\\UserController::browse'], null, ['GET' => 0], null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/(?'
                    .'|categories/(\\d+)(*:31)'
                    .'|drinks/(\\d+)(*:50)'
                    .'|eats/(\\d+)(*:67)'
                    .'|images/(\\d+)(*:86)'
                    .'|menus/(\\d+)(*:104)'
                    .'|re(?'
                        .'|staurants/(\\d+)(*:132)'
                        .'|views/(\\d+)(*:151)'
                    .')'
                    .'|users/(\\d+)(*:171)'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:211)'
                    .'|wdt/([^/]++)(*:231)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:277)'
                            .'|router(*:291)'
                            .'|exception(?'
                                .'|(*:311)'
                                .'|\\.css(*:324)'
                            .')'
                        .')'
                        .'|(*:334)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        31 => [[['_route' => 'app_api_categories_read', '_controller' => 'App\\Controller\\Api\\CategoryController::read'], ['id'], ['GET' => 0], null, false, true, null]],
        50 => [[['_route' => 'app_api_drinks_read', '_controller' => 'App\\Controller\\Api\\DrinkController::read'], ['id'], ['GET' => 0], null, false, true, null]],
        67 => [[['_route' => 'app_api_eats_read', '_controller' => 'App\\Controller\\Api\\EatController::read'], ['id'], ['GET' => 0], null, false, true, null]],
        86 => [[['_route' => 'app_api_images_read', '_controller' => 'App\\Controller\\Api\\ImageController::read'], ['id'], ['GET' => 0], null, false, true, null]],
        104 => [[['_route' => 'app_api_menus_read', '_controller' => 'App\\Controller\\Api\\MenuController::read'], ['id'], ['GET' => 0], null, false, true, null]],
        132 => [[['_route' => 'app_api_restaurants_read', '_controller' => 'App\\Controller\\Api\\RestaurantController::read'], ['id'], ['GET' => 0], null, false, true, null]],
        151 => [[['_route' => 'app_api_review_read', '_controller' => 'App\\Controller\\Api\\ReviewController::read'], ['id'], ['GET' => 0], null, false, true, null]],
        171 => [[['_route' => 'app_api_users_read', '_controller' => 'App\\Controller\\Api\\UserController::read'], ['id'], ['GET' => 0], null, false, true, null]],
        211 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        231 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        277 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        291 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        311 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        324 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        334 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
