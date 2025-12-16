<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'ValidatorConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'EagerLoadingConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'CollectionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'MappingConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'SerializerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'DoctrineConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'DoctrineMongodbOdmConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'OauthConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'GraphqlConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'SwaggerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'HttpCacheConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'MercureConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'MessengerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'ElasticsearchConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'OpenapiConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'MakerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'FormatsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'PatchFormatsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'DocsFormatsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'ErrorFormatsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ApiPlatform'.\DIRECTORY_SEPARATOR.'DefaultsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ApiPlatformConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $title;
    private $description;
    private $version;
    private $showWebby;
    private $useSymfonyListeners;
    private $nameConverter;
    private $assetPackage;
    private $pathSegmentNameGenerator;
    private $inflector;
    private $validator;
    private $eagerLoading;
    private $handleSymfonyErrors;
    private $enableSwagger;
    private $enableJsonStreamer;
    private $enableSwaggerUi;
    private $enableReDoc;
    private $enableEntrypoint;
    private $enableDocs;
    private $enableProfiler;
    private $enablePhpdocParser;
    private $enableLinkSecurity;
    private $collection;
    private $mapping;
    private $resourceClassDirectories;
    private $serializer;
    private $doctrine;
    private $doctrineMongodbOdm;
    private $oauth;
    private $graphql;
    private $swagger;
    private $httpCache;
    private $mercure;
    private $messenger;
    private $elasticsearch;
    private $openapi;
    private $maker;
    private $exceptionToStatus;
    private $formats;
    private $patchFormats;
    private $docsFormats;
    private $errorFormats;
    private $jsonschemaFormats;
    private $defaults;
    private $_usedProperties = [];
    private $_hasDeprecatedCalls = false;

    /**
     * The title of the API.
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function title($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['title'] = true;
        $this->title = $value;

        return $this;
    }

    /**
     * The description of the API.
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function description($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['description'] = true;
        $this->description = $value;

        return $this;
    }

    /**
     * The version of the API.
     * @default '0.0.0'
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function version($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['version'] = true;
        $this->version = $value;

        return $this;
    }

    /**
     * If true, show Webby on the documentation page
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function showWebby($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['showWebby'] = true;
        $this->showWebby = $value;

        return $this;
    }

    /**
     * Uses Symfony event listeners instead of the ApiPlatform\Symfony\Controller\MainController.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function useSymfonyListeners($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['useSymfonyListeners'] = true;
        $this->useSymfonyListeners = $value;

        return $this;
    }

    /**
     * Specify a name converter to use.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function nameConverter($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['nameConverter'] = true;
        $this->nameConverter = $value;

        return $this;
    }

    /**
     * Specify an asset package name to use.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function assetPackage($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['assetPackage'] = true;
        $this->assetPackage = $value;

        return $this;
    }

    /**
     * Specify a path name generator to use.
     * @default 'api_platform.metadata.path_segment_name_generator.underscore'
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function pathSegmentNameGenerator($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['pathSegmentNameGenerator'] = true;
        $this->pathSegmentNameGenerator = $value;

        return $this;
    }

    /**
     * Specify an inflector to use.
     * @default 'api_platform.metadata.inflector'
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function inflector($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['inflector'] = true;
        $this->inflector = $value;

        return $this;
    }

    /**
     * @default {"serialize_payload_fields":[],"query_parameter_validation":true}
     * @deprecated since Symfony 7.4
     */
    public function validator(array $value = []): \Symfony\Config\ApiPlatform\ValidatorConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->validator) {
            $this->_usedProperties['validator'] = true;
            $this->validator = new \Symfony\Config\ApiPlatform\ValidatorConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "validator()" has already been initialized. You cannot pass values the second time you call validator().');
        }

        return $this->validator;
    }

    /**
     * @template TValue of array|bool
     * @param TValue $value
     * @default {"enabled":true,"fetch_partial":false,"max_joins":30,"force_eager":true}
     * @return \Symfony\Config\ApiPlatform\EagerLoadingConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\ApiPlatform\EagerLoadingConfig : static)
     * @deprecated since Symfony 7.4
     */
    public function eagerLoading(array|bool $value = []): \Symfony\Config\ApiPlatform\EagerLoadingConfig|static
    {
        $this->_hasDeprecatedCalls = true;
        if (!\is_array($value)) {
            $this->_usedProperties['eagerLoading'] = true;
            $this->eagerLoading = $value;

            return $this;
        }

        if (!$this->eagerLoading instanceof \Symfony\Config\ApiPlatform\EagerLoadingConfig) {
            $this->_usedProperties['eagerLoading'] = true;
            $this->eagerLoading = new \Symfony\Config\ApiPlatform\EagerLoadingConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "eagerLoading()" has already been initialized. You cannot pass values the second time you call eagerLoading().');
        }

        return $this->eagerLoading;
    }

    /**
     * Allows to handle symfony exceptions.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function handleSymfonyErrors($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['handleSymfonyErrors'] = true;
        $this->handleSymfonyErrors = $value;

        return $this;
    }

    /**
     * Enable the Swagger documentation and export.
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function enableSwagger($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['enableSwagger'] = true;
        $this->enableSwagger = $value;

        return $this;
    }

    /**
     * Enable json streamer.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function enableJsonStreamer($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['enableJsonStreamer'] = true;
        $this->enableJsonStreamer = $value;

        return $this;
    }

    /**
     * Enable Swagger UI
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function enableSwaggerUi($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['enableSwaggerUi'] = true;
        $this->enableSwaggerUi = $value;

        return $this;
    }

    /**
     * Enable ReDoc
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function enableReDoc($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['enableReDoc'] = true;
        $this->enableReDoc = $value;

        return $this;
    }

    /**
     * Enable the entrypoint
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function enableEntrypoint($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['enableEntrypoint'] = true;
        $this->enableEntrypoint = $value;

        return $this;
    }

    /**
     * Enable the docs
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function enableDocs($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['enableDocs'] = true;
        $this->enableDocs = $value;

        return $this;
    }

    /**
     * Enable the data collector and the WebProfilerBundle integration.
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function enableProfiler($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['enableProfiler'] = true;
        $this->enableProfiler = $value;

        return $this;
    }

    /**
     * Enable resource metadata collector using PHPStan PhpDocParser.
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function enablePhpdocParser($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['enablePhpdocParser'] = true;
        $this->enablePhpdocParser = $value;

        return $this;
    }

    /**
     * Enable security for Links (sub resources)
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function enableLinkSecurity($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['enableLinkSecurity'] = true;
        $this->enableLinkSecurity = $value;

        return $this;
    }

    /**
     * @default {"exists_parameter_name":"exists","order":"ASC","order_parameter_name":"order","order_nulls_comparison":null,"pagination":{"enabled":true,"page_parameter_name":"page","enabled_parameter_name":"pagination","items_per_page_parameter_name":"itemsPerPage","partial_parameter_name":"partial"}}
     * @deprecated since Symfony 7.4
     */
    public function collection(array $value = []): \Symfony\Config\ApiPlatform\CollectionConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->collection) {
            $this->_usedProperties['collection'] = true;
            $this->collection = new \Symfony\Config\ApiPlatform\CollectionConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "collection()" has already been initialized. You cannot pass values the second time you call collection().');
        }

        return $this->collection;
    }

    /**
     * @default {"imports":[],"paths":[]}
     * @deprecated since Symfony 7.4
     */
    public function mapping(array $value = []): \Symfony\Config\ApiPlatform\MappingConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->mapping) {
            $this->_usedProperties['mapping'] = true;
            $this->mapping = new \Symfony\Config\ApiPlatform\MappingConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "mapping()" has already been initialized. You cannot pass values the second time you call mapping().');
        }

        return $this->mapping;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function resourceClassDirectories(ParamConfigurator|array $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['resourceClassDirectories'] = true;
        $this->resourceClassDirectories = $value;

        return $this;
    }

    /**
     * @default {"hydra_prefix":false}
     * @deprecated since Symfony 7.4
     */
    public function serializer(array $value = []): \Symfony\Config\ApiPlatform\SerializerConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->serializer) {
            $this->_usedProperties['serializer'] = true;
            $this->serializer = new \Symfony\Config\ApiPlatform\SerializerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "serializer()" has already been initialized. You cannot pass values the second time you call serializer().');
        }

        return $this->serializer;
    }

    /**
     * @template TValue of array|bool
     * @param TValue $value
     * @default {"enabled":true}
     * @return \Symfony\Config\ApiPlatform\DoctrineConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\ApiPlatform\DoctrineConfig : static)
     * @deprecated since Symfony 7.4
     */
    public function doctrine(array|bool $value = []): \Symfony\Config\ApiPlatform\DoctrineConfig|static
    {
        $this->_hasDeprecatedCalls = true;
        if (!\is_array($value)) {
            $this->_usedProperties['doctrine'] = true;
            $this->doctrine = $value;

            return $this;
        }

        if (!$this->doctrine instanceof \Symfony\Config\ApiPlatform\DoctrineConfig) {
            $this->_usedProperties['doctrine'] = true;
            $this->doctrine = new \Symfony\Config\ApiPlatform\DoctrineConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "doctrine()" has already been initialized. You cannot pass values the second time you call doctrine().');
        }

        return $this->doctrine;
    }

    /**
     * @template TValue of array|bool
     * @param TValue $value
     * @default {"enabled":false}
     * @return \Symfony\Config\ApiPlatform\DoctrineMongodbOdmConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\ApiPlatform\DoctrineMongodbOdmConfig : static)
     * @deprecated since Symfony 7.4
     */
    public function doctrineMongodbOdm(array|bool $value = []): \Symfony\Config\ApiPlatform\DoctrineMongodbOdmConfig|static
    {
        $this->_hasDeprecatedCalls = true;
        if (!\is_array($value)) {
            $this->_usedProperties['doctrineMongodbOdm'] = true;
            $this->doctrineMongodbOdm = $value;

            return $this;
        }

        if (!$this->doctrineMongodbOdm instanceof \Symfony\Config\ApiPlatform\DoctrineMongodbOdmConfig) {
            $this->_usedProperties['doctrineMongodbOdm'] = true;
            $this->doctrineMongodbOdm = new \Symfony\Config\ApiPlatform\DoctrineMongodbOdmConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "doctrineMongodbOdm()" has already been initialized. You cannot pass values the second time you call doctrineMongodbOdm().');
        }

        return $this->doctrineMongodbOdm;
    }

    /**
     * @template TValue of array|bool
     * @param TValue $value
     * @default {"enabled":false,"clientId":"","clientSecret":"","pkce":false,"type":"oauth2","flow":"application","tokenUrl":"","authorizationUrl":"","refreshUrl":"","scopes":[]}
     * @return \Symfony\Config\ApiPlatform\OauthConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\ApiPlatform\OauthConfig : static)
     * @deprecated since Symfony 7.4
     */
    public function oauth(array|bool $value = []): \Symfony\Config\ApiPlatform\OauthConfig|static
    {
        $this->_hasDeprecatedCalls = true;
        if (!\is_array($value)) {
            $this->_usedProperties['oauth'] = true;
            $this->oauth = $value;

            return $this;
        }

        if (!$this->oauth instanceof \Symfony\Config\ApiPlatform\OauthConfig) {
            $this->_usedProperties['oauth'] = true;
            $this->oauth = new \Symfony\Config\ApiPlatform\OauthConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "oauth()" has already been initialized. You cannot pass values the second time you call oauth().');
        }

        return $this->oauth;
    }

    /**
     * @template TValue of array|bool
     * @param TValue $value
     * @default {"enabled":false,"default_ide":"graphiql","graphiql":{"enabled":false},"introspection":{"enabled":true},"max_query_depth":20,"max_query_complexity":500,"nesting_separator":"_","collection":{"pagination":{"enabled":true}}}
     * @return \Symfony\Config\ApiPlatform\GraphqlConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\ApiPlatform\GraphqlConfig : static)
     * @deprecated since Symfony 7.4
     */
    public function graphql(array|bool $value = []): \Symfony\Config\ApiPlatform\GraphqlConfig|static
    {
        $this->_hasDeprecatedCalls = true;
        if (!\is_array($value)) {
            $this->_usedProperties['graphql'] = true;
            $this->graphql = $value;

            return $this;
        }

        if (!$this->graphql instanceof \Symfony\Config\ApiPlatform\GraphqlConfig) {
            $this->_usedProperties['graphql'] = true;
            $this->graphql = new \Symfony\Config\ApiPlatform\GraphqlConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "graphql()" has already been initialized. You cannot pass values the second time you call graphql().');
        }

        return $this->graphql;
    }

    /**
     * @default {"persist_authorization":false,"versions":[3],"api_keys":[],"http_auth":[],"swagger_ui_extra_configuration":[]}
     * @deprecated since Symfony 7.4
     */
    public function swagger(array $value = []): \Symfony\Config\ApiPlatform\SwaggerConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->swagger) {
            $this->_usedProperties['swagger'] = true;
            $this->swagger = new \Symfony\Config\ApiPlatform\SwaggerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "swagger()" has already been initialized. You cannot pass values the second time you call swagger().');
        }

        return $this->swagger;
    }

    /**
     * @default {"public":null,"invalidation":{"enabled":false,"varnish_urls":[],"urls":[],"scoped_clients":[],"max_header_length":7500,"request_options":[],"purger":"api_platform.http_cache.purger.varnish","xkey":{"glue":" "}}}
     * @deprecated since Symfony 7.4
     */
    public function httpCache(array $value = []): \Symfony\Config\ApiPlatform\HttpCacheConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->httpCache) {
            $this->_usedProperties['httpCache'] = true;
            $this->httpCache = new \Symfony\Config\ApiPlatform\HttpCacheConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "httpCache()" has already been initialized. You cannot pass values the second time you call httpCache().');
        }

        return $this->httpCache;
    }

    /**
     * @template TValue of array|bool
     * @param TValue $value
     * @default {"enabled":false,"hub_url":null,"include_type":false}
     * @return \Symfony\Config\ApiPlatform\MercureConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\ApiPlatform\MercureConfig : static)
     * @deprecated since Symfony 7.4
     */
    public function mercure(array|bool $value = []): \Symfony\Config\ApiPlatform\MercureConfig|static
    {
        $this->_hasDeprecatedCalls = true;
        if (!\is_array($value)) {
            $this->_usedProperties['mercure'] = true;
            $this->mercure = $value;

            return $this;
        }

        if (!$this->mercure instanceof \Symfony\Config\ApiPlatform\MercureConfig) {
            $this->_usedProperties['mercure'] = true;
            $this->mercure = new \Symfony\Config\ApiPlatform\MercureConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "mercure()" has already been initialized. You cannot pass values the second time you call mercure().');
        }

        return $this->mercure;
    }

    /**
     * @template TValue of array|bool
     * @param TValue $value
     * @default {"enabled":false}
     * @return \Symfony\Config\ApiPlatform\MessengerConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\ApiPlatform\MessengerConfig : static)
     * @deprecated since Symfony 7.4
     */
    public function messenger(array|bool $value = []): \Symfony\Config\ApiPlatform\MessengerConfig|static
    {
        $this->_hasDeprecatedCalls = true;
        if (!\is_array($value)) {
            $this->_usedProperties['messenger'] = true;
            $this->messenger = $value;

            return $this;
        }

        if (!$this->messenger instanceof \Symfony\Config\ApiPlatform\MessengerConfig) {
            $this->_usedProperties['messenger'] = true;
            $this->messenger = new \Symfony\Config\ApiPlatform\MessengerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "messenger()" has already been initialized. You cannot pass values the second time you call messenger().');
        }

        return $this->messenger;
    }

    /**
     * @template TValue of array|bool
     * @param TValue $value
     * @default {"enabled":false,"hosts":[]}
     * @return \Symfony\Config\ApiPlatform\ElasticsearchConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\ApiPlatform\ElasticsearchConfig : static)
     * @deprecated since Symfony 7.4
     */
    public function elasticsearch(array|bool $value = []): \Symfony\Config\ApiPlatform\ElasticsearchConfig|static
    {
        $this->_hasDeprecatedCalls = true;
        if (!\is_array($value)) {
            $this->_usedProperties['elasticsearch'] = true;
            $this->elasticsearch = $value;

            return $this;
        }

        if (!$this->elasticsearch instanceof \Symfony\Config\ApiPlatform\ElasticsearchConfig) {
            $this->_usedProperties['elasticsearch'] = true;
            $this->elasticsearch = new \Symfony\Config\ApiPlatform\ElasticsearchConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "elasticsearch()" has already been initialized. You cannot pass values the second time you call elasticsearch().');
        }

        return $this->elasticsearch;
    }

    /**
     * @default {"contact":{"name":null,"url":null,"email":null},"termsOfService":null,"tags":[],"license":{"name":null,"url":null,"identifier":null},"swagger_ui_extra_configuration":[],"overrideResponses":true,"error_resource_class":null,"validation_error_resource_class":null}
     * @deprecated since Symfony 7.4
     */
    public function openapi(array $value = []): \Symfony\Config\ApiPlatform\OpenapiConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->openapi) {
            $this->_usedProperties['openapi'] = true;
            $this->openapi = new \Symfony\Config\ApiPlatform\OpenapiConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "openapi()" has already been initialized. You cannot pass values the second time you call openapi().');
        }

        return $this->openapi;
    }

    /**
     * @template TValue of array|bool
     * @param TValue $value
     * @default {"enabled":true}
     * @return \Symfony\Config\ApiPlatform\MakerConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\ApiPlatform\MakerConfig : static)
     * @deprecated since Symfony 7.4
     */
    public function maker(array|bool $value = []): \Symfony\Config\ApiPlatform\MakerConfig|static
    {
        $this->_hasDeprecatedCalls = true;
        if (!\is_array($value)) {
            $this->_usedProperties['maker'] = true;
            $this->maker = $value;

            return $this;
        }

        if (!$this->maker instanceof \Symfony\Config\ApiPlatform\MakerConfig) {
            $this->_usedProperties['maker'] = true;
            $this->maker = new \Symfony\Config\ApiPlatform\MakerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "maker()" has already been initialized. You cannot pass values the second time you call maker().');
        }

        return $this->maker;
    }

    /**
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function exceptionToStatus(string $exception_class, ParamConfigurator|int $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['exceptionToStatus'] = true;
        $this->exceptionToStatus[$exception_class] = $value;

        return $this;
    }

    /**
     * The list of enabled formats. The first one will be the default.
     * @default {"jsonld":{"mime_types":["application\/ld+json"]}}
     * @deprecated since Symfony 7.4
     */
    public function formats(string $format, array $value = []): \Symfony\Config\ApiPlatform\FormatsConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (!isset($this->formats[$format])) {
            $this->_usedProperties['formats'] = true;
            $this->formats[$format] = new \Symfony\Config\ApiPlatform\FormatsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "formats()" has already been initialized. You cannot pass values the second time you call formats().');
        }

        return $this->formats[$format];
    }

    /**
     * The list of enabled formats. The first one will be the default.
     * @default {"json":{"mime_types":["application\/merge-patch+json"]}}
     * @deprecated since Symfony 7.4
     */
    public function patchFormats(string $format, array $value = []): \Symfony\Config\ApiPlatform\PatchFormatsConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (!isset($this->patchFormats[$format])) {
            $this->_usedProperties['patchFormats'] = true;
            $this->patchFormats[$format] = new \Symfony\Config\ApiPlatform\PatchFormatsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "patchFormats()" has already been initialized. You cannot pass values the second time you call patchFormats().');
        }

        return $this->patchFormats[$format];
    }

    /**
     * The list of enabled formats. The first one will be the default.
     * @default {"jsonld":{"mime_types":["application\/ld+json"]},"jsonopenapi":{"mime_types":["application\/vnd.openapi+json"]},"html":{"mime_types":["text\/html"]},"yamlopenapi":{"mime_types":["application\/vnd.openapi+yaml"]}}
     * @deprecated since Symfony 7.4
     */
    public function docsFormats(string $format, array $value = []): \Symfony\Config\ApiPlatform\DocsFormatsConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (!isset($this->docsFormats[$format])) {
            $this->_usedProperties['docsFormats'] = true;
            $this->docsFormats[$format] = new \Symfony\Config\ApiPlatform\DocsFormatsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "docsFormats()" has already been initialized. You cannot pass values the second time you call docsFormats().');
        }

        return $this->docsFormats[$format];
    }

    /**
     * The list of enabled formats. The first one will be the default.
     * @default {"jsonld":{"mime_types":["application\/ld+json"]},"jsonproblem":{"mime_types":["application\/problem+json"]},"json":{"mime_types":["application\/problem+json","application\/json"]}}
     * @deprecated since Symfony 7.4
     */
    public function errorFormats(string $format, array $value = []): \Symfony\Config\ApiPlatform\ErrorFormatsConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (!isset($this->errorFormats[$format])) {
            $this->_usedProperties['errorFormats'] = true;
            $this->errorFormats[$format] = new \Symfony\Config\ApiPlatform\ErrorFormatsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "errorFormats()" has already been initialized. You cannot pass values the second time you call errorFormats().');
        }

        return $this->errorFormats[$format];
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function jsonschemaFormats(ParamConfigurator|array $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['jsonschemaFormats'] = true;
        $this->jsonschemaFormats = $value;

        return $this;
    }

    /**
     * @template TValue of mixed
     * @param TValue $value
     * @return \Symfony\Config\ApiPlatform\DefaultsConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\ApiPlatform\DefaultsConfig : static)
     * @deprecated since Symfony 7.4
     */
    public function defaults(mixed $value = []): \Symfony\Config\ApiPlatform\DefaultsConfig|static
    {
        $this->_hasDeprecatedCalls = true;
        if (!\is_array($value)) {
            $this->_usedProperties['defaults'] = true;
            $this->defaults = $value;

            return $this;
        }

        if (!$this->defaults instanceof \Symfony\Config\ApiPlatform\DefaultsConfig) {
            $this->_usedProperties['defaults'] = true;
            $this->defaults = new \Symfony\Config\ApiPlatform\DefaultsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "defaults()" has already been initialized. You cannot pass values the second time you call defaults().');
        }

        return $this->defaults;
    }

    public function getExtensionAlias(): string
    {
        return 'api_platform';
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('title', $config)) {
            $this->_usedProperties['title'] = true;
            $this->title = $config['title'];
            unset($config['title']);
        }

        if (array_key_exists('description', $config)) {
            $this->_usedProperties['description'] = true;
            $this->description = $config['description'];
            unset($config['description']);
        }

        if (array_key_exists('version', $config)) {
            $this->_usedProperties['version'] = true;
            $this->version = $config['version'];
            unset($config['version']);
        }

        if (array_key_exists('show_webby', $config)) {
            $this->_usedProperties['showWebby'] = true;
            $this->showWebby = $config['show_webby'];
            unset($config['show_webby']);
        }

        if (array_key_exists('use_symfony_listeners', $config)) {
            $this->_usedProperties['useSymfonyListeners'] = true;
            $this->useSymfonyListeners = $config['use_symfony_listeners'];
            unset($config['use_symfony_listeners']);
        }

        if (array_key_exists('name_converter', $config)) {
            $this->_usedProperties['nameConverter'] = true;
            $this->nameConverter = $config['name_converter'];
            unset($config['name_converter']);
        }

        if (array_key_exists('asset_package', $config)) {
            $this->_usedProperties['assetPackage'] = true;
            $this->assetPackage = $config['asset_package'];
            unset($config['asset_package']);
        }

        if (array_key_exists('path_segment_name_generator', $config)) {
            $this->_usedProperties['pathSegmentNameGenerator'] = true;
            $this->pathSegmentNameGenerator = $config['path_segment_name_generator'];
            unset($config['path_segment_name_generator']);
        }

        if (array_key_exists('inflector', $config)) {
            $this->_usedProperties['inflector'] = true;
            $this->inflector = $config['inflector'];
            unset($config['inflector']);
        }

        if (array_key_exists('validator', $config)) {
            $this->_usedProperties['validator'] = true;
            $this->validator = new \Symfony\Config\ApiPlatform\ValidatorConfig($config['validator']);
            unset($config['validator']);
        }

        if (array_key_exists('eager_loading', $config)) {
            $this->_usedProperties['eagerLoading'] = true;
            $this->eagerLoading = \is_array($config['eager_loading']) ? new \Symfony\Config\ApiPlatform\EagerLoadingConfig($config['eager_loading']) : $config['eager_loading'];
            unset($config['eager_loading']);
        }

        if (array_key_exists('handle_symfony_errors', $config)) {
            $this->_usedProperties['handleSymfonyErrors'] = true;
            $this->handleSymfonyErrors = $config['handle_symfony_errors'];
            unset($config['handle_symfony_errors']);
        }

        if (array_key_exists('enable_swagger', $config)) {
            $this->_usedProperties['enableSwagger'] = true;
            $this->enableSwagger = $config['enable_swagger'];
            unset($config['enable_swagger']);
        }

        if (array_key_exists('enable_json_streamer', $config)) {
            $this->_usedProperties['enableJsonStreamer'] = true;
            $this->enableJsonStreamer = $config['enable_json_streamer'];
            unset($config['enable_json_streamer']);
        }

        if (array_key_exists('enable_swagger_ui', $config)) {
            $this->_usedProperties['enableSwaggerUi'] = true;
            $this->enableSwaggerUi = $config['enable_swagger_ui'];
            unset($config['enable_swagger_ui']);
        }

        if (array_key_exists('enable_re_doc', $config)) {
            $this->_usedProperties['enableReDoc'] = true;
            $this->enableReDoc = $config['enable_re_doc'];
            unset($config['enable_re_doc']);
        }

        if (array_key_exists('enable_entrypoint', $config)) {
            $this->_usedProperties['enableEntrypoint'] = true;
            $this->enableEntrypoint = $config['enable_entrypoint'];
            unset($config['enable_entrypoint']);
        }

        if (array_key_exists('enable_docs', $config)) {
            $this->_usedProperties['enableDocs'] = true;
            $this->enableDocs = $config['enable_docs'];
            unset($config['enable_docs']);
        }

        if (array_key_exists('enable_profiler', $config)) {
            $this->_usedProperties['enableProfiler'] = true;
            $this->enableProfiler = $config['enable_profiler'];
            unset($config['enable_profiler']);
        }

        if (array_key_exists('enable_phpdoc_parser', $config)) {
            $this->_usedProperties['enablePhpdocParser'] = true;
            $this->enablePhpdocParser = $config['enable_phpdoc_parser'];
            unset($config['enable_phpdoc_parser']);
        }

        if (array_key_exists('enable_link_security', $config)) {
            $this->_usedProperties['enableLinkSecurity'] = true;
            $this->enableLinkSecurity = $config['enable_link_security'];
            unset($config['enable_link_security']);
        }

        if (array_key_exists('collection', $config)) {
            $this->_usedProperties['collection'] = true;
            $this->collection = new \Symfony\Config\ApiPlatform\CollectionConfig($config['collection']);
            unset($config['collection']);
        }

        if (array_key_exists('mapping', $config)) {
            $this->_usedProperties['mapping'] = true;
            $this->mapping = new \Symfony\Config\ApiPlatform\MappingConfig($config['mapping']);
            unset($config['mapping']);
        }

        if (array_key_exists('resource_class_directories', $config)) {
            $this->_usedProperties['resourceClassDirectories'] = true;
            $this->resourceClassDirectories = $config['resource_class_directories'];
            unset($config['resource_class_directories']);
        }

        if (array_key_exists('serializer', $config)) {
            $this->_usedProperties['serializer'] = true;
            $this->serializer = new \Symfony\Config\ApiPlatform\SerializerConfig($config['serializer']);
            unset($config['serializer']);
        }

        if (array_key_exists('doctrine', $config)) {
            $this->_usedProperties['doctrine'] = true;
            $this->doctrine = \is_array($config['doctrine']) ? new \Symfony\Config\ApiPlatform\DoctrineConfig($config['doctrine']) : $config['doctrine'];
            unset($config['doctrine']);
        }

        if (array_key_exists('doctrine_mongodb_odm', $config)) {
            $this->_usedProperties['doctrineMongodbOdm'] = true;
            $this->doctrineMongodbOdm = \is_array($config['doctrine_mongodb_odm']) ? new \Symfony\Config\ApiPlatform\DoctrineMongodbOdmConfig($config['doctrine_mongodb_odm']) : $config['doctrine_mongodb_odm'];
            unset($config['doctrine_mongodb_odm']);
        }

        if (array_key_exists('oauth', $config)) {
            $this->_usedProperties['oauth'] = true;
            $this->oauth = \is_array($config['oauth']) ? new \Symfony\Config\ApiPlatform\OauthConfig($config['oauth']) : $config['oauth'];
            unset($config['oauth']);
        }

        if (array_key_exists('graphql', $config)) {
            $this->_usedProperties['graphql'] = true;
            $this->graphql = \is_array($config['graphql']) ? new \Symfony\Config\ApiPlatform\GraphqlConfig($config['graphql']) : $config['graphql'];
            unset($config['graphql']);
        }

        if (array_key_exists('swagger', $config)) {
            $this->_usedProperties['swagger'] = true;
            $this->swagger = new \Symfony\Config\ApiPlatform\SwaggerConfig($config['swagger']);
            unset($config['swagger']);
        }

        if (array_key_exists('http_cache', $config)) {
            $this->_usedProperties['httpCache'] = true;
            $this->httpCache = new \Symfony\Config\ApiPlatform\HttpCacheConfig($config['http_cache']);
            unset($config['http_cache']);
        }

        if (array_key_exists('mercure', $config)) {
            $this->_usedProperties['mercure'] = true;
            $this->mercure = \is_array($config['mercure']) ? new \Symfony\Config\ApiPlatform\MercureConfig($config['mercure']) : $config['mercure'];
            unset($config['mercure']);
        }

        if (array_key_exists('messenger', $config)) {
            $this->_usedProperties['messenger'] = true;
            $this->messenger = \is_array($config['messenger']) ? new \Symfony\Config\ApiPlatform\MessengerConfig($config['messenger']) : $config['messenger'];
            unset($config['messenger']);
        }

        if (array_key_exists('elasticsearch', $config)) {
            $this->_usedProperties['elasticsearch'] = true;
            $this->elasticsearch = \is_array($config['elasticsearch']) ? new \Symfony\Config\ApiPlatform\ElasticsearchConfig($config['elasticsearch']) : $config['elasticsearch'];
            unset($config['elasticsearch']);
        }

        if (array_key_exists('openapi', $config)) {
            $this->_usedProperties['openapi'] = true;
            $this->openapi = new \Symfony\Config\ApiPlatform\OpenapiConfig($config['openapi']);
            unset($config['openapi']);
        }

        if (array_key_exists('maker', $config)) {
            $this->_usedProperties['maker'] = true;
            $this->maker = \is_array($config['maker']) ? new \Symfony\Config\ApiPlatform\MakerConfig($config['maker']) : $config['maker'];
            unset($config['maker']);
        }

        if (array_key_exists('exception_to_status', $config)) {
            $this->_usedProperties['exceptionToStatus'] = true;
            $this->exceptionToStatus = $config['exception_to_status'];
            unset($config['exception_to_status']);
        }

        if (array_key_exists('formats', $config)) {
            $this->_usedProperties['formats'] = true;
            $this->formats = array_map(fn ($v) => new \Symfony\Config\ApiPlatform\FormatsConfig($v), $config['formats']);
            unset($config['formats']);
        }

        if (array_key_exists('patch_formats', $config)) {
            $this->_usedProperties['patchFormats'] = true;
            $this->patchFormats = array_map(fn ($v) => new \Symfony\Config\ApiPlatform\PatchFormatsConfig($v), $config['patch_formats']);
            unset($config['patch_formats']);
        }

        if (array_key_exists('docs_formats', $config)) {
            $this->_usedProperties['docsFormats'] = true;
            $this->docsFormats = array_map(fn ($v) => new \Symfony\Config\ApiPlatform\DocsFormatsConfig($v), $config['docs_formats']);
            unset($config['docs_formats']);
        }

        if (array_key_exists('error_formats', $config)) {
            $this->_usedProperties['errorFormats'] = true;
            $this->errorFormats = array_map(fn ($v) => new \Symfony\Config\ApiPlatform\ErrorFormatsConfig($v), $config['error_formats']);
            unset($config['error_formats']);
        }

        if (array_key_exists('jsonschema_formats', $config)) {
            $this->_usedProperties['jsonschemaFormats'] = true;
            $this->jsonschemaFormats = $config['jsonschema_formats'];
            unset($config['jsonschema_formats']);
        }

        if (array_key_exists('defaults', $config)) {
            $this->_usedProperties['defaults'] = true;
            $this->defaults = \is_array($config['defaults']) ? new \Symfony\Config\ApiPlatform\DefaultsConfig($config['defaults']) : $config['defaults'];
            unset($config['defaults']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['title'])) {
            $output['title'] = $this->title;
        }
        if (isset($this->_usedProperties['description'])) {
            $output['description'] = $this->description;
        }
        if (isset($this->_usedProperties['version'])) {
            $output['version'] = $this->version;
        }
        if (isset($this->_usedProperties['showWebby'])) {
            $output['show_webby'] = $this->showWebby;
        }
        if (isset($this->_usedProperties['useSymfonyListeners'])) {
            $output['use_symfony_listeners'] = $this->useSymfonyListeners;
        }
        if (isset($this->_usedProperties['nameConverter'])) {
            $output['name_converter'] = $this->nameConverter;
        }
        if (isset($this->_usedProperties['assetPackage'])) {
            $output['asset_package'] = $this->assetPackage;
        }
        if (isset($this->_usedProperties['pathSegmentNameGenerator'])) {
            $output['path_segment_name_generator'] = $this->pathSegmentNameGenerator;
        }
        if (isset($this->_usedProperties['inflector'])) {
            $output['inflector'] = $this->inflector;
        }
        if (isset($this->_usedProperties['validator'])) {
            $output['validator'] = $this->validator->toArray();
        }
        if (isset($this->_usedProperties['eagerLoading'])) {
            $output['eager_loading'] = $this->eagerLoading instanceof \Symfony\Config\ApiPlatform\EagerLoadingConfig ? $this->eagerLoading->toArray() : $this->eagerLoading;
        }
        if (isset($this->_usedProperties['handleSymfonyErrors'])) {
            $output['handle_symfony_errors'] = $this->handleSymfonyErrors;
        }
        if (isset($this->_usedProperties['enableSwagger'])) {
            $output['enable_swagger'] = $this->enableSwagger;
        }
        if (isset($this->_usedProperties['enableJsonStreamer'])) {
            $output['enable_json_streamer'] = $this->enableJsonStreamer;
        }
        if (isset($this->_usedProperties['enableSwaggerUi'])) {
            $output['enable_swagger_ui'] = $this->enableSwaggerUi;
        }
        if (isset($this->_usedProperties['enableReDoc'])) {
            $output['enable_re_doc'] = $this->enableReDoc;
        }
        if (isset($this->_usedProperties['enableEntrypoint'])) {
            $output['enable_entrypoint'] = $this->enableEntrypoint;
        }
        if (isset($this->_usedProperties['enableDocs'])) {
            $output['enable_docs'] = $this->enableDocs;
        }
        if (isset($this->_usedProperties['enableProfiler'])) {
            $output['enable_profiler'] = $this->enableProfiler;
        }
        if (isset($this->_usedProperties['enablePhpdocParser'])) {
            $output['enable_phpdoc_parser'] = $this->enablePhpdocParser;
        }
        if (isset($this->_usedProperties['enableLinkSecurity'])) {
            $output['enable_link_security'] = $this->enableLinkSecurity;
        }
        if (isset($this->_usedProperties['collection'])) {
            $output['collection'] = $this->collection->toArray();
        }
        if (isset($this->_usedProperties['mapping'])) {
            $output['mapping'] = $this->mapping->toArray();
        }
        if (isset($this->_usedProperties['resourceClassDirectories'])) {
            $output['resource_class_directories'] = $this->resourceClassDirectories;
        }
        if (isset($this->_usedProperties['serializer'])) {
            $output['serializer'] = $this->serializer->toArray();
        }
        if (isset($this->_usedProperties['doctrine'])) {
            $output['doctrine'] = $this->doctrine instanceof \Symfony\Config\ApiPlatform\DoctrineConfig ? $this->doctrine->toArray() : $this->doctrine;
        }
        if (isset($this->_usedProperties['doctrineMongodbOdm'])) {
            $output['doctrine_mongodb_odm'] = $this->doctrineMongodbOdm instanceof \Symfony\Config\ApiPlatform\DoctrineMongodbOdmConfig ? $this->doctrineMongodbOdm->toArray() : $this->doctrineMongodbOdm;
        }
        if (isset($this->_usedProperties['oauth'])) {
            $output['oauth'] = $this->oauth instanceof \Symfony\Config\ApiPlatform\OauthConfig ? $this->oauth->toArray() : $this->oauth;
        }
        if (isset($this->_usedProperties['graphql'])) {
            $output['graphql'] = $this->graphql instanceof \Symfony\Config\ApiPlatform\GraphqlConfig ? $this->graphql->toArray() : $this->graphql;
        }
        if (isset($this->_usedProperties['swagger'])) {
            $output['swagger'] = $this->swagger->toArray();
        }
        if (isset($this->_usedProperties['httpCache'])) {
            $output['http_cache'] = $this->httpCache->toArray();
        }
        if (isset($this->_usedProperties['mercure'])) {
            $output['mercure'] = $this->mercure instanceof \Symfony\Config\ApiPlatform\MercureConfig ? $this->mercure->toArray() : $this->mercure;
        }
        if (isset($this->_usedProperties['messenger'])) {
            $output['messenger'] = $this->messenger instanceof \Symfony\Config\ApiPlatform\MessengerConfig ? $this->messenger->toArray() : $this->messenger;
        }
        if (isset($this->_usedProperties['elasticsearch'])) {
            $output['elasticsearch'] = $this->elasticsearch instanceof \Symfony\Config\ApiPlatform\ElasticsearchConfig ? $this->elasticsearch->toArray() : $this->elasticsearch;
        }
        if (isset($this->_usedProperties['openapi'])) {
            $output['openapi'] = $this->openapi->toArray();
        }
        if (isset($this->_usedProperties['maker'])) {
            $output['maker'] = $this->maker instanceof \Symfony\Config\ApiPlatform\MakerConfig ? $this->maker->toArray() : $this->maker;
        }
        if (isset($this->_usedProperties['exceptionToStatus'])) {
            $output['exception_to_status'] = $this->exceptionToStatus;
        }
        if (isset($this->_usedProperties['formats'])) {
            $output['formats'] = array_map(fn ($v) => $v->toArray(), $this->formats);
        }
        if (isset($this->_usedProperties['patchFormats'])) {
            $output['patch_formats'] = array_map(fn ($v) => $v->toArray(), $this->patchFormats);
        }
        if (isset($this->_usedProperties['docsFormats'])) {
            $output['docs_formats'] = array_map(fn ($v) => $v->toArray(), $this->docsFormats);
        }
        if (isset($this->_usedProperties['errorFormats'])) {
            $output['error_formats'] = array_map(fn ($v) => $v->toArray(), $this->errorFormats);
        }
        if (isset($this->_usedProperties['jsonschemaFormats'])) {
            $output['jsonschema_formats'] = $this->jsonschemaFormats;
        }
        if (isset($this->_usedProperties['defaults'])) {
            $output['defaults'] = $this->defaults instanceof \Symfony\Config\ApiPlatform\DefaultsConfig ? $this->defaults->toArray() : $this->defaults;
        }
        if ($this->_hasDeprecatedCalls) {
            trigger_deprecation('symfony/config', '7.4', 'Calling any fluent method on "%s" is deprecated; pass the configuration to the constructor instead.', $this::class);
        }

        return $output;
    }

}
