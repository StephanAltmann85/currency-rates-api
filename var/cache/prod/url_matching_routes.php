<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api(?'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:37)'
                        .'|\\.well\\-known/genid/([^/]++)(*:72)'
                        .'|validation_errors/([^/]++)(*:105)'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:142)'
                    .'|/(?'
                        .'|c(?'
                            .'|ontexts/([^.]+)(?:\\.(jsonld))?(*:188)'
                            .'|urrenc(?'
                                .'|ies(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:237)'
                                    .'|(?:\\.([^/]++))?(*:260)'
                                    .'|/([A-Z]{3})/history(*:287)'
                                .')'
                                .'|y_rate_histories/([^/\\.]++)(?:\\.([^/]++))?(*:338)'
                            .')'
                        .')'
                        .'|errors/(\\d+)(?:\\.([^/]++))?(*:375)'
                        .'|validation_errors/([^/]++)(?'
                            .'|(*:412)'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        37 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => null, '_api_respond' => true], ['_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        72 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => true], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        105 => [[['_route' => 'api_validation_errors', '_controller' => 'api_platform.action.not_exposed'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        142 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => null, '_api_respond' => true, 'index' => 'index'], ['index', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        188 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => true], ['shortName', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        237 => [[['_route' => '_api_/currencies/{iso3}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Currency', '_api_operation_name' => '_api_/currencies/{iso3}{._format}_get', '_format' => null], ['iso3', '_format'], ['GET' => 0], null, false, true, null]],
        260 => [[['_route' => '_api_/currencies{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Currency', '_api_operation_name' => '_api_/currencies{._format}_get_collection', '_format' => null], ['_format'], ['GET' => 0], null, false, true, null]],
        287 => [[['_route' => '_api_/currencies/{iso3}/history_get_collection', '_controller' => 'api_platform.action.placeholder', '_stateless' => true, '_api_resource_class' => 'App\\Entity\\CurrencyRateHistory', '_api_operation_name' => '_api_/currencies/{iso3}/history_get_collection', '_format' => null], ['iso3'], ['GET' => 0], null, false, false, null]],
        338 => [[['_route' => '_api_/currency_rate_histories/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_stateless' => true, '_api_resource_class' => 'App\\Entity\\CurrencyRateHistory', '_api_operation_name' => '_api_/currency_rate_histories/{id}{._format}_get', '_format' => null], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        375 => [[['_route' => '_api_errors', '_controller' => 'api_platform.action.placeholder', '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\State\\ApiResource\\Error', '_api_operation_name' => '_api_errors', '_format' => null], ['status', '_format'], ['GET' => 0], null, false, true, null]],
        412 => [
            [['_route' => '_api_validation_errors_problem', '_controller' => 'api_platform.action.placeholder', '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem', '_format' => null], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_hydra', '_controller' => 'api_platform.action.placeholder', '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra', '_format' => null], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_jsonapi', '_controller' => 'api_platform.action.placeholder', '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi', '_format' => null], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_xml', '_controller' => 'api_platform.action.placeholder', '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_xml', '_format' => null], ['id'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
