<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/cosplay' => [[['_route' => 'app_cosplay_index', '_controller' => 'App\\Controller\\CosplayController::index'], null, ['GET' => 0], null, true, false, null]],
        '/cosplay/new' => [[['_route' => 'app_cosplay_new', '_controller' => 'App\\Controller\\CosplayController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/materiaux' => [[['_route' => 'app_materiaux_index', '_controller' => 'App\\Controller\\MateriauxController::index'], null, ['GET' => 0], null, true, false, null]],
        '/materiaux/new' => [[['_route' => 'app_materiaux_new', '_controller' => 'App\\Controller\\MateriauxController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/cosplay/([^/]++)(?'
                    .'|(*:27)'
                    .'|/edit(*:39)'
                    .'|(*:46)'
                .')'
                .'|/materiaux/([^/]++)(?'
                    .'|(*:76)'
                    .'|/edit(*:88)'
                    .'|(*:95)'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:134)'
                    .'|wdt/([^/]++)(*:154)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:200)'
                            .'|router(*:214)'
                            .'|exception(?'
                                .'|(*:234)'
                                .'|\\.css(*:247)'
                            .')'
                        .')'
                        .'|(*:257)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        27 => [[['_route' => 'app_cosplay_show', '_controller' => 'App\\Controller\\CosplayController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        39 => [[['_route' => 'app_cosplay_edit', '_controller' => 'App\\Controller\\CosplayController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        46 => [[['_route' => 'app_cosplay_delete', '_controller' => 'App\\Controller\\CosplayController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        76 => [[['_route' => 'app_materiaux_show', '_controller' => 'App\\Controller\\MateriauxController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        88 => [[['_route' => 'app_materiaux_edit', '_controller' => 'App\\Controller\\MateriauxController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        95 => [[['_route' => 'app_materiaux_delete', '_controller' => 'App\\Controller\\MateriauxController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        134 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        154 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        200 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        214 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        234 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        247 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        257 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
