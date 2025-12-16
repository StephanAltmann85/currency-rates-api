<?php

namespace Symfony\Config\ApiPlatform;

use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class DefaultsConfig 
{
    private $uriTemplate;
    private $shortName;
    private $description;
    private $types;
    private $operations;
    private $formats;
    private $inputFormats;
    private $outputFormats;
    private $uriVariables;
    private $routePrefix;
    private $defaults;
    private $requirements;
    private $options;
    private $stateless;
    private $sunset;
    private $acceptPatch;
    private $status;
    private $host;
    private $schemes;
    private $condition;
    private $controller;
    private $class;
    private $urlGenerationStrategy;
    private $deprecationReason;
    private $headers;
    private $cacheHeaders;
    private $normalizationContext;
    private $denormalizationContext;
    private $collectDenormalizationErrors;
    private $hydraContext;
    private $openapi;
    private $validationContext;
    private $filters;
    private $mercure;
    private $messenger;
    private $input;
    private $output;
    private $order;
    private $fetchPartial;
    private $forceEager;
    private $paginationClientEnabled;
    private $paginationClientItemsPerPage;
    private $paginationClientPartial;
    private $paginationViaCursor;
    private $paginationEnabled;
    private $paginationFetchJoinCollection;
    private $paginationUseOutputWalkers;
    private $paginationItemsPerPage;
    private $paginationMaximumItemsPerPage;
    private $paginationPartial;
    private $paginationType;
    private $security;
    private $securityMessage;
    private $securityPostDenormalize;
    private $securityPostDenormalizeMessage;
    private $securityPostValidation;
    private $securityPostValidationMessage;
    private $compositeIdentifier;
    private $exceptionToStatus;
    private $queryParameterValidationEnabled;
    private $links;
    private $graphQlOperations;
    private $provider;
    private $processor;
    private $stateOptions;
    private $rules;
    private $policy;
    private $middleware;
    private $parameters;
    private $strictQueryParameterValidation;
    private $hideHydraOperation;
    private $jsonStream;
    private $extraProperties;
    private $map;
    private $routeName;
    private $errors;
    private $read;
    private $deserialize;
    private $validate;
    private $write;
    private $serialize;
    private $priority;
    private $name;
    private $allowCreate;
    private $itemUriTemplate;
    private $_usedProperties = [];
    private $_extraKeys;

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function uriTemplate(mixed $value): static
    {
        $this->_usedProperties['uriTemplate'] = true;
        $this->uriTemplate = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function shortName(mixed $value): static
    {
        $this->_usedProperties['shortName'] = true;
        $this->shortName = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function description(mixed $value): static
    {
        $this->_usedProperties['description'] = true;
        $this->description = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function types(mixed $value): static
    {
        $this->_usedProperties['types'] = true;
        $this->types = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function operations(mixed $value): static
    {
        $this->_usedProperties['operations'] = true;
        $this->operations = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function formats(mixed $value): static
    {
        $this->_usedProperties['formats'] = true;
        $this->formats = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function inputFormats(mixed $value): static
    {
        $this->_usedProperties['inputFormats'] = true;
        $this->inputFormats = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function outputFormats(mixed $value): static
    {
        $this->_usedProperties['outputFormats'] = true;
        $this->outputFormats = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function uriVariables(mixed $value): static
    {
        $this->_usedProperties['uriVariables'] = true;
        $this->uriVariables = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function routePrefix(mixed $value): static
    {
        $this->_usedProperties['routePrefix'] = true;
        $this->routePrefix = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function defaults(mixed $value): static
    {
        $this->_usedProperties['defaults'] = true;
        $this->defaults = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function requirements(mixed $value): static
    {
        $this->_usedProperties['requirements'] = true;
        $this->requirements = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function options(mixed $value): static
    {
        $this->_usedProperties['options'] = true;
        $this->options = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function stateless(mixed $value): static
    {
        $this->_usedProperties['stateless'] = true;
        $this->stateless = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function sunset(mixed $value): static
    {
        $this->_usedProperties['sunset'] = true;
        $this->sunset = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function acceptPatch(mixed $value): static
    {
        $this->_usedProperties['acceptPatch'] = true;
        $this->acceptPatch = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function status(mixed $value): static
    {
        $this->_usedProperties['status'] = true;
        $this->status = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function host(mixed $value): static
    {
        $this->_usedProperties['host'] = true;
        $this->host = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function schemes(mixed $value): static
    {
        $this->_usedProperties['schemes'] = true;
        $this->schemes = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function condition(mixed $value): static
    {
        $this->_usedProperties['condition'] = true;
        $this->condition = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function controller(mixed $value): static
    {
        $this->_usedProperties['controller'] = true;
        $this->controller = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function class(mixed $value): static
    {
        $this->_usedProperties['class'] = true;
        $this->class = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function urlGenerationStrategy(mixed $value): static
    {
        $this->_usedProperties['urlGenerationStrategy'] = true;
        $this->urlGenerationStrategy = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function deprecationReason(mixed $value): static
    {
        $this->_usedProperties['deprecationReason'] = true;
        $this->deprecationReason = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function headers(mixed $value): static
    {
        $this->_usedProperties['headers'] = true;
        $this->headers = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function cacheHeaders(mixed $value): static
    {
        $this->_usedProperties['cacheHeaders'] = true;
        $this->cacheHeaders = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function normalizationContext(mixed $value): static
    {
        $this->_usedProperties['normalizationContext'] = true;
        $this->normalizationContext = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function denormalizationContext(mixed $value): static
    {
        $this->_usedProperties['denormalizationContext'] = true;
        $this->denormalizationContext = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function collectDenormalizationErrors(mixed $value): static
    {
        $this->_usedProperties['collectDenormalizationErrors'] = true;
        $this->collectDenormalizationErrors = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function hydraContext(mixed $value): static
    {
        $this->_usedProperties['hydraContext'] = true;
        $this->hydraContext = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function openapi(mixed $value): static
    {
        $this->_usedProperties['openapi'] = true;
        $this->openapi = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function validationContext(mixed $value): static
    {
        $this->_usedProperties['validationContext'] = true;
        $this->validationContext = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function filters(mixed $value): static
    {
        $this->_usedProperties['filters'] = true;
        $this->filters = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function mercure(mixed $value): static
    {
        $this->_usedProperties['mercure'] = true;
        $this->mercure = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function messenger(mixed $value): static
    {
        $this->_usedProperties['messenger'] = true;
        $this->messenger = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function input(mixed $value): static
    {
        $this->_usedProperties['input'] = true;
        $this->input = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function output(mixed $value): static
    {
        $this->_usedProperties['output'] = true;
        $this->output = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function order(mixed $value): static
    {
        $this->_usedProperties['order'] = true;
        $this->order = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function fetchPartial(mixed $value): static
    {
        $this->_usedProperties['fetchPartial'] = true;
        $this->fetchPartial = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function forceEager(mixed $value): static
    {
        $this->_usedProperties['forceEager'] = true;
        $this->forceEager = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function paginationClientEnabled(mixed $value): static
    {
        $this->_usedProperties['paginationClientEnabled'] = true;
        $this->paginationClientEnabled = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function paginationClientItemsPerPage(mixed $value): static
    {
        $this->_usedProperties['paginationClientItemsPerPage'] = true;
        $this->paginationClientItemsPerPage = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function paginationClientPartial(mixed $value): static
    {
        $this->_usedProperties['paginationClientPartial'] = true;
        $this->paginationClientPartial = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function paginationViaCursor(mixed $value): static
    {
        $this->_usedProperties['paginationViaCursor'] = true;
        $this->paginationViaCursor = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function paginationEnabled(mixed $value): static
    {
        $this->_usedProperties['paginationEnabled'] = true;
        $this->paginationEnabled = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function paginationFetchJoinCollection(mixed $value): static
    {
        $this->_usedProperties['paginationFetchJoinCollection'] = true;
        $this->paginationFetchJoinCollection = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function paginationUseOutputWalkers(mixed $value): static
    {
        $this->_usedProperties['paginationUseOutputWalkers'] = true;
        $this->paginationUseOutputWalkers = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function paginationItemsPerPage(mixed $value): static
    {
        $this->_usedProperties['paginationItemsPerPage'] = true;
        $this->paginationItemsPerPage = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function paginationMaximumItemsPerPage(mixed $value): static
    {
        $this->_usedProperties['paginationMaximumItemsPerPage'] = true;
        $this->paginationMaximumItemsPerPage = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function paginationPartial(mixed $value): static
    {
        $this->_usedProperties['paginationPartial'] = true;
        $this->paginationPartial = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function paginationType(mixed $value): static
    {
        $this->_usedProperties['paginationType'] = true;
        $this->paginationType = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function security(mixed $value): static
    {
        $this->_usedProperties['security'] = true;
        $this->security = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function securityMessage(mixed $value): static
    {
        $this->_usedProperties['securityMessage'] = true;
        $this->securityMessage = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function securityPostDenormalize(mixed $value): static
    {
        $this->_usedProperties['securityPostDenormalize'] = true;
        $this->securityPostDenormalize = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function securityPostDenormalizeMessage(mixed $value): static
    {
        $this->_usedProperties['securityPostDenormalizeMessage'] = true;
        $this->securityPostDenormalizeMessage = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function securityPostValidation(mixed $value): static
    {
        $this->_usedProperties['securityPostValidation'] = true;
        $this->securityPostValidation = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function securityPostValidationMessage(mixed $value): static
    {
        $this->_usedProperties['securityPostValidationMessage'] = true;
        $this->securityPostValidationMessage = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function compositeIdentifier(mixed $value): static
    {
        $this->_usedProperties['compositeIdentifier'] = true;
        $this->compositeIdentifier = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function exceptionToStatus(mixed $value): static
    {
        $this->_usedProperties['exceptionToStatus'] = true;
        $this->exceptionToStatus = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function queryParameterValidationEnabled(mixed $value): static
    {
        $this->_usedProperties['queryParameterValidationEnabled'] = true;
        $this->queryParameterValidationEnabled = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function links(mixed $value): static
    {
        $this->_usedProperties['links'] = true;
        $this->links = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function graphQlOperations(mixed $value): static
    {
        $this->_usedProperties['graphQlOperations'] = true;
        $this->graphQlOperations = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function provider(mixed $value): static
    {
        $this->_usedProperties['provider'] = true;
        $this->provider = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function processor(mixed $value): static
    {
        $this->_usedProperties['processor'] = true;
        $this->processor = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function stateOptions(mixed $value): static
    {
        $this->_usedProperties['stateOptions'] = true;
        $this->stateOptions = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function rules(mixed $value): static
    {
        $this->_usedProperties['rules'] = true;
        $this->rules = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function policy(mixed $value): static
    {
        $this->_usedProperties['policy'] = true;
        $this->policy = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function middleware(mixed $value): static
    {
        $this->_usedProperties['middleware'] = true;
        $this->middleware = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function parameters(mixed $value): static
    {
        $this->_usedProperties['parameters'] = true;
        $this->parameters = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function strictQueryParameterValidation(mixed $value): static
    {
        $this->_usedProperties['strictQueryParameterValidation'] = true;
        $this->strictQueryParameterValidation = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function hideHydraOperation(mixed $value): static
    {
        $this->_usedProperties['hideHydraOperation'] = true;
        $this->hideHydraOperation = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function jsonStream(mixed $value): static
    {
        $this->_usedProperties['jsonStream'] = true;
        $this->jsonStream = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function extraProperties(mixed $value): static
    {
        $this->_usedProperties['extraProperties'] = true;
        $this->extraProperties = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function map(mixed $value): static
    {
        $this->_usedProperties['map'] = true;
        $this->map = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function routeName(mixed $value): static
    {
        $this->_usedProperties['routeName'] = true;
        $this->routeName = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function errors(mixed $value): static
    {
        $this->_usedProperties['errors'] = true;
        $this->errors = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function read(mixed $value): static
    {
        $this->_usedProperties['read'] = true;
        $this->read = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function deserialize(mixed $value): static
    {
        $this->_usedProperties['deserialize'] = true;
        $this->deserialize = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function validate(mixed $value): static
    {
        $this->_usedProperties['validate'] = true;
        $this->validate = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function write(mixed $value): static
    {
        $this->_usedProperties['write'] = true;
        $this->write = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function serialize(mixed $value): static
    {
        $this->_usedProperties['serialize'] = true;
        $this->serialize = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function priority(mixed $value): static
    {
        $this->_usedProperties['priority'] = true;
        $this->priority = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function name(mixed $value): static
    {
        $this->_usedProperties['name'] = true;
        $this->name = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function allowCreate(mixed $value): static
    {
        $this->_usedProperties['allowCreate'] = true;
        $this->allowCreate = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function itemUriTemplate(mixed $value): static
    {
        $this->_usedProperties['itemUriTemplate'] = true;
        $this->itemUriTemplate = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('uri_template', $config)) {
            $this->_usedProperties['uriTemplate'] = true;
            $this->uriTemplate = $config['uri_template'];
            unset($config['uri_template']);
        }

        if (array_key_exists('short_name', $config)) {
            $this->_usedProperties['shortName'] = true;
            $this->shortName = $config['short_name'];
            unset($config['short_name']);
        }

        if (array_key_exists('description', $config)) {
            $this->_usedProperties['description'] = true;
            $this->description = $config['description'];
            unset($config['description']);
        }

        if (array_key_exists('types', $config)) {
            $this->_usedProperties['types'] = true;
            $this->types = $config['types'];
            unset($config['types']);
        }

        if (array_key_exists('operations', $config)) {
            $this->_usedProperties['operations'] = true;
            $this->operations = $config['operations'];
            unset($config['operations']);
        }

        if (array_key_exists('formats', $config)) {
            $this->_usedProperties['formats'] = true;
            $this->formats = $config['formats'];
            unset($config['formats']);
        }

        if (array_key_exists('input_formats', $config)) {
            $this->_usedProperties['inputFormats'] = true;
            $this->inputFormats = $config['input_formats'];
            unset($config['input_formats']);
        }

        if (array_key_exists('output_formats', $config)) {
            $this->_usedProperties['outputFormats'] = true;
            $this->outputFormats = $config['output_formats'];
            unset($config['output_formats']);
        }

        if (array_key_exists('uri_variables', $config)) {
            $this->_usedProperties['uriVariables'] = true;
            $this->uriVariables = $config['uri_variables'];
            unset($config['uri_variables']);
        }

        if (array_key_exists('route_prefix', $config)) {
            $this->_usedProperties['routePrefix'] = true;
            $this->routePrefix = $config['route_prefix'];
            unset($config['route_prefix']);
        }

        if (array_key_exists('defaults', $config)) {
            $this->_usedProperties['defaults'] = true;
            $this->defaults = $config['defaults'];
            unset($config['defaults']);
        }

        if (array_key_exists('requirements', $config)) {
            $this->_usedProperties['requirements'] = true;
            $this->requirements = $config['requirements'];
            unset($config['requirements']);
        }

        if (array_key_exists('options', $config)) {
            $this->_usedProperties['options'] = true;
            $this->options = $config['options'];
            unset($config['options']);
        }

        if (array_key_exists('stateless', $config)) {
            $this->_usedProperties['stateless'] = true;
            $this->stateless = $config['stateless'];
            unset($config['stateless']);
        }

        if (array_key_exists('sunset', $config)) {
            $this->_usedProperties['sunset'] = true;
            $this->sunset = $config['sunset'];
            unset($config['sunset']);
        }

        if (array_key_exists('accept_patch', $config)) {
            $this->_usedProperties['acceptPatch'] = true;
            $this->acceptPatch = $config['accept_patch'];
            unset($config['accept_patch']);
        }

        if (array_key_exists('status', $config)) {
            $this->_usedProperties['status'] = true;
            $this->status = $config['status'];
            unset($config['status']);
        }

        if (array_key_exists('host', $config)) {
            $this->_usedProperties['host'] = true;
            $this->host = $config['host'];
            unset($config['host']);
        }

        if (array_key_exists('schemes', $config)) {
            $this->_usedProperties['schemes'] = true;
            $this->schemes = $config['schemes'];
            unset($config['schemes']);
        }

        if (array_key_exists('condition', $config)) {
            $this->_usedProperties['condition'] = true;
            $this->condition = $config['condition'];
            unset($config['condition']);
        }

        if (array_key_exists('controller', $config)) {
            $this->_usedProperties['controller'] = true;
            $this->controller = $config['controller'];
            unset($config['controller']);
        }

        if (array_key_exists('class', $config)) {
            $this->_usedProperties['class'] = true;
            $this->class = $config['class'];
            unset($config['class']);
        }

        if (array_key_exists('url_generation_strategy', $config)) {
            $this->_usedProperties['urlGenerationStrategy'] = true;
            $this->urlGenerationStrategy = $config['url_generation_strategy'];
            unset($config['url_generation_strategy']);
        }

        if (array_key_exists('deprecation_reason', $config)) {
            $this->_usedProperties['deprecationReason'] = true;
            $this->deprecationReason = $config['deprecation_reason'];
            unset($config['deprecation_reason']);
        }

        if (array_key_exists('headers', $config)) {
            $this->_usedProperties['headers'] = true;
            $this->headers = $config['headers'];
            unset($config['headers']);
        }

        if (array_key_exists('cache_headers', $config)) {
            $this->_usedProperties['cacheHeaders'] = true;
            $this->cacheHeaders = $config['cache_headers'];
            unset($config['cache_headers']);
        }

        if (array_key_exists('normalization_context', $config)) {
            $this->_usedProperties['normalizationContext'] = true;
            $this->normalizationContext = $config['normalization_context'];
            unset($config['normalization_context']);
        }

        if (array_key_exists('denormalization_context', $config)) {
            $this->_usedProperties['denormalizationContext'] = true;
            $this->denormalizationContext = $config['denormalization_context'];
            unset($config['denormalization_context']);
        }

        if (array_key_exists('collect_denormalization_errors', $config)) {
            $this->_usedProperties['collectDenormalizationErrors'] = true;
            $this->collectDenormalizationErrors = $config['collect_denormalization_errors'];
            unset($config['collect_denormalization_errors']);
        }

        if (array_key_exists('hydra_context', $config)) {
            $this->_usedProperties['hydraContext'] = true;
            $this->hydraContext = $config['hydra_context'];
            unset($config['hydra_context']);
        }

        if (array_key_exists('openapi', $config)) {
            $this->_usedProperties['openapi'] = true;
            $this->openapi = $config['openapi'];
            unset($config['openapi']);
        }

        if (array_key_exists('validation_context', $config)) {
            $this->_usedProperties['validationContext'] = true;
            $this->validationContext = $config['validation_context'];
            unset($config['validation_context']);
        }

        if (array_key_exists('filters', $config)) {
            $this->_usedProperties['filters'] = true;
            $this->filters = $config['filters'];
            unset($config['filters']);
        }

        if (array_key_exists('mercure', $config)) {
            $this->_usedProperties['mercure'] = true;
            $this->mercure = $config['mercure'];
            unset($config['mercure']);
        }

        if (array_key_exists('messenger', $config)) {
            $this->_usedProperties['messenger'] = true;
            $this->messenger = $config['messenger'];
            unset($config['messenger']);
        }

        if (array_key_exists('input', $config)) {
            $this->_usedProperties['input'] = true;
            $this->input = $config['input'];
            unset($config['input']);
        }

        if (array_key_exists('output', $config)) {
            $this->_usedProperties['output'] = true;
            $this->output = $config['output'];
            unset($config['output']);
        }

        if (array_key_exists('order', $config)) {
            $this->_usedProperties['order'] = true;
            $this->order = $config['order'];
            unset($config['order']);
        }

        if (array_key_exists('fetch_partial', $config)) {
            $this->_usedProperties['fetchPartial'] = true;
            $this->fetchPartial = $config['fetch_partial'];
            unset($config['fetch_partial']);
        }

        if (array_key_exists('force_eager', $config)) {
            $this->_usedProperties['forceEager'] = true;
            $this->forceEager = $config['force_eager'];
            unset($config['force_eager']);
        }

        if (array_key_exists('pagination_client_enabled', $config)) {
            $this->_usedProperties['paginationClientEnabled'] = true;
            $this->paginationClientEnabled = $config['pagination_client_enabled'];
            unset($config['pagination_client_enabled']);
        }

        if (array_key_exists('pagination_client_items_per_page', $config)) {
            $this->_usedProperties['paginationClientItemsPerPage'] = true;
            $this->paginationClientItemsPerPage = $config['pagination_client_items_per_page'];
            unset($config['pagination_client_items_per_page']);
        }

        if (array_key_exists('pagination_client_partial', $config)) {
            $this->_usedProperties['paginationClientPartial'] = true;
            $this->paginationClientPartial = $config['pagination_client_partial'];
            unset($config['pagination_client_partial']);
        }

        if (array_key_exists('pagination_via_cursor', $config)) {
            $this->_usedProperties['paginationViaCursor'] = true;
            $this->paginationViaCursor = $config['pagination_via_cursor'];
            unset($config['pagination_via_cursor']);
        }

        if (array_key_exists('pagination_enabled', $config)) {
            $this->_usedProperties['paginationEnabled'] = true;
            $this->paginationEnabled = $config['pagination_enabled'];
            unset($config['pagination_enabled']);
        }

        if (array_key_exists('pagination_fetch_join_collection', $config)) {
            $this->_usedProperties['paginationFetchJoinCollection'] = true;
            $this->paginationFetchJoinCollection = $config['pagination_fetch_join_collection'];
            unset($config['pagination_fetch_join_collection']);
        }

        if (array_key_exists('pagination_use_output_walkers', $config)) {
            $this->_usedProperties['paginationUseOutputWalkers'] = true;
            $this->paginationUseOutputWalkers = $config['pagination_use_output_walkers'];
            unset($config['pagination_use_output_walkers']);
        }

        if (array_key_exists('pagination_items_per_page', $config)) {
            $this->_usedProperties['paginationItemsPerPage'] = true;
            $this->paginationItemsPerPage = $config['pagination_items_per_page'];
            unset($config['pagination_items_per_page']);
        }

        if (array_key_exists('pagination_maximum_items_per_page', $config)) {
            $this->_usedProperties['paginationMaximumItemsPerPage'] = true;
            $this->paginationMaximumItemsPerPage = $config['pagination_maximum_items_per_page'];
            unset($config['pagination_maximum_items_per_page']);
        }

        if (array_key_exists('pagination_partial', $config)) {
            $this->_usedProperties['paginationPartial'] = true;
            $this->paginationPartial = $config['pagination_partial'];
            unset($config['pagination_partial']);
        }

        if (array_key_exists('pagination_type', $config)) {
            $this->_usedProperties['paginationType'] = true;
            $this->paginationType = $config['pagination_type'];
            unset($config['pagination_type']);
        }

        if (array_key_exists('security', $config)) {
            $this->_usedProperties['security'] = true;
            $this->security = $config['security'];
            unset($config['security']);
        }

        if (array_key_exists('security_message', $config)) {
            $this->_usedProperties['securityMessage'] = true;
            $this->securityMessage = $config['security_message'];
            unset($config['security_message']);
        }

        if (array_key_exists('security_post_denormalize', $config)) {
            $this->_usedProperties['securityPostDenormalize'] = true;
            $this->securityPostDenormalize = $config['security_post_denormalize'];
            unset($config['security_post_denormalize']);
        }

        if (array_key_exists('security_post_denormalize_message', $config)) {
            $this->_usedProperties['securityPostDenormalizeMessage'] = true;
            $this->securityPostDenormalizeMessage = $config['security_post_denormalize_message'];
            unset($config['security_post_denormalize_message']);
        }

        if (array_key_exists('security_post_validation', $config)) {
            $this->_usedProperties['securityPostValidation'] = true;
            $this->securityPostValidation = $config['security_post_validation'];
            unset($config['security_post_validation']);
        }

        if (array_key_exists('security_post_validation_message', $config)) {
            $this->_usedProperties['securityPostValidationMessage'] = true;
            $this->securityPostValidationMessage = $config['security_post_validation_message'];
            unset($config['security_post_validation_message']);
        }

        if (array_key_exists('composite_identifier', $config)) {
            $this->_usedProperties['compositeIdentifier'] = true;
            $this->compositeIdentifier = $config['composite_identifier'];
            unset($config['composite_identifier']);
        }

        if (array_key_exists('exception_to_status', $config)) {
            $this->_usedProperties['exceptionToStatus'] = true;
            $this->exceptionToStatus = $config['exception_to_status'];
            unset($config['exception_to_status']);
        }

        if (array_key_exists('query_parameter_validation_enabled', $config)) {
            $this->_usedProperties['queryParameterValidationEnabled'] = true;
            $this->queryParameterValidationEnabled = $config['query_parameter_validation_enabled'];
            unset($config['query_parameter_validation_enabled']);
        }

        if (array_key_exists('links', $config)) {
            $this->_usedProperties['links'] = true;
            $this->links = $config['links'];
            unset($config['links']);
        }

        if (array_key_exists('graph_ql_operations', $config)) {
            $this->_usedProperties['graphQlOperations'] = true;
            $this->graphQlOperations = $config['graph_ql_operations'];
            unset($config['graph_ql_operations']);
        }

        if (array_key_exists('provider', $config)) {
            $this->_usedProperties['provider'] = true;
            $this->provider = $config['provider'];
            unset($config['provider']);
        }

        if (array_key_exists('processor', $config)) {
            $this->_usedProperties['processor'] = true;
            $this->processor = $config['processor'];
            unset($config['processor']);
        }

        if (array_key_exists('state_options', $config)) {
            $this->_usedProperties['stateOptions'] = true;
            $this->stateOptions = $config['state_options'];
            unset($config['state_options']);
        }

        if (array_key_exists('rules', $config)) {
            $this->_usedProperties['rules'] = true;
            $this->rules = $config['rules'];
            unset($config['rules']);
        }

        if (array_key_exists('policy', $config)) {
            $this->_usedProperties['policy'] = true;
            $this->policy = $config['policy'];
            unset($config['policy']);
        }

        if (array_key_exists('middleware', $config)) {
            $this->_usedProperties['middleware'] = true;
            $this->middleware = $config['middleware'];
            unset($config['middleware']);
        }

        if (array_key_exists('parameters', $config)) {
            $this->_usedProperties['parameters'] = true;
            $this->parameters = $config['parameters'];
            unset($config['parameters']);
        }

        if (array_key_exists('strict_query_parameter_validation', $config)) {
            $this->_usedProperties['strictQueryParameterValidation'] = true;
            $this->strictQueryParameterValidation = $config['strict_query_parameter_validation'];
            unset($config['strict_query_parameter_validation']);
        }

        if (array_key_exists('hide_hydra_operation', $config)) {
            $this->_usedProperties['hideHydraOperation'] = true;
            $this->hideHydraOperation = $config['hide_hydra_operation'];
            unset($config['hide_hydra_operation']);
        }

        if (array_key_exists('json_stream', $config)) {
            $this->_usedProperties['jsonStream'] = true;
            $this->jsonStream = $config['json_stream'];
            unset($config['json_stream']);
        }

        if (array_key_exists('extra_properties', $config)) {
            $this->_usedProperties['extraProperties'] = true;
            $this->extraProperties = $config['extra_properties'];
            unset($config['extra_properties']);
        }

        if (array_key_exists('map', $config)) {
            $this->_usedProperties['map'] = true;
            $this->map = $config['map'];
            unset($config['map']);
        }

        if (array_key_exists('route_name', $config)) {
            $this->_usedProperties['routeName'] = true;
            $this->routeName = $config['route_name'];
            unset($config['route_name']);
        }

        if (array_key_exists('errors', $config)) {
            $this->_usedProperties['errors'] = true;
            $this->errors = $config['errors'];
            unset($config['errors']);
        }

        if (array_key_exists('read', $config)) {
            $this->_usedProperties['read'] = true;
            $this->read = $config['read'];
            unset($config['read']);
        }

        if (array_key_exists('deserialize', $config)) {
            $this->_usedProperties['deserialize'] = true;
            $this->deserialize = $config['deserialize'];
            unset($config['deserialize']);
        }

        if (array_key_exists('validate', $config)) {
            $this->_usedProperties['validate'] = true;
            $this->validate = $config['validate'];
            unset($config['validate']);
        }

        if (array_key_exists('write', $config)) {
            $this->_usedProperties['write'] = true;
            $this->write = $config['write'];
            unset($config['write']);
        }

        if (array_key_exists('serialize', $config)) {
            $this->_usedProperties['serialize'] = true;
            $this->serialize = $config['serialize'];
            unset($config['serialize']);
        }

        if (array_key_exists('priority', $config)) {
            $this->_usedProperties['priority'] = true;
            $this->priority = $config['priority'];
            unset($config['priority']);
        }

        if (array_key_exists('name', $config)) {
            $this->_usedProperties['name'] = true;
            $this->name = $config['name'];
            unset($config['name']);
        }

        if (array_key_exists('allow_create', $config)) {
            $this->_usedProperties['allowCreate'] = true;
            $this->allowCreate = $config['allow_create'];
            unset($config['allow_create']);
        }

        if (array_key_exists('item_uri_template', $config)) {
            $this->_usedProperties['itemUriTemplate'] = true;
            $this->itemUriTemplate = $config['item_uri_template'];
            unset($config['item_uri_template']);
        }

        $this->_extraKeys = $config;

    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['uriTemplate'])) {
            $output['uri_template'] = $this->uriTemplate;
        }
        if (isset($this->_usedProperties['shortName'])) {
            $output['short_name'] = $this->shortName;
        }
        if (isset($this->_usedProperties['description'])) {
            $output['description'] = $this->description;
        }
        if (isset($this->_usedProperties['types'])) {
            $output['types'] = $this->types;
        }
        if (isset($this->_usedProperties['operations'])) {
            $output['operations'] = $this->operations;
        }
        if (isset($this->_usedProperties['formats'])) {
            $output['formats'] = $this->formats;
        }
        if (isset($this->_usedProperties['inputFormats'])) {
            $output['input_formats'] = $this->inputFormats;
        }
        if (isset($this->_usedProperties['outputFormats'])) {
            $output['output_formats'] = $this->outputFormats;
        }
        if (isset($this->_usedProperties['uriVariables'])) {
            $output['uri_variables'] = $this->uriVariables;
        }
        if (isset($this->_usedProperties['routePrefix'])) {
            $output['route_prefix'] = $this->routePrefix;
        }
        if (isset($this->_usedProperties['defaults'])) {
            $output['defaults'] = $this->defaults;
        }
        if (isset($this->_usedProperties['requirements'])) {
            $output['requirements'] = $this->requirements;
        }
        if (isset($this->_usedProperties['options'])) {
            $output['options'] = $this->options;
        }
        if (isset($this->_usedProperties['stateless'])) {
            $output['stateless'] = $this->stateless;
        }
        if (isset($this->_usedProperties['sunset'])) {
            $output['sunset'] = $this->sunset;
        }
        if (isset($this->_usedProperties['acceptPatch'])) {
            $output['accept_patch'] = $this->acceptPatch;
        }
        if (isset($this->_usedProperties['status'])) {
            $output['status'] = $this->status;
        }
        if (isset($this->_usedProperties['host'])) {
            $output['host'] = $this->host;
        }
        if (isset($this->_usedProperties['schemes'])) {
            $output['schemes'] = $this->schemes;
        }
        if (isset($this->_usedProperties['condition'])) {
            $output['condition'] = $this->condition;
        }
        if (isset($this->_usedProperties['controller'])) {
            $output['controller'] = $this->controller;
        }
        if (isset($this->_usedProperties['class'])) {
            $output['class'] = $this->class;
        }
        if (isset($this->_usedProperties['urlGenerationStrategy'])) {
            $output['url_generation_strategy'] = $this->urlGenerationStrategy;
        }
        if (isset($this->_usedProperties['deprecationReason'])) {
            $output['deprecation_reason'] = $this->deprecationReason;
        }
        if (isset($this->_usedProperties['headers'])) {
            $output['headers'] = $this->headers;
        }
        if (isset($this->_usedProperties['cacheHeaders'])) {
            $output['cache_headers'] = $this->cacheHeaders;
        }
        if (isset($this->_usedProperties['normalizationContext'])) {
            $output['normalization_context'] = $this->normalizationContext;
        }
        if (isset($this->_usedProperties['denormalizationContext'])) {
            $output['denormalization_context'] = $this->denormalizationContext;
        }
        if (isset($this->_usedProperties['collectDenormalizationErrors'])) {
            $output['collect_denormalization_errors'] = $this->collectDenormalizationErrors;
        }
        if (isset($this->_usedProperties['hydraContext'])) {
            $output['hydra_context'] = $this->hydraContext;
        }
        if (isset($this->_usedProperties['openapi'])) {
            $output['openapi'] = $this->openapi;
        }
        if (isset($this->_usedProperties['validationContext'])) {
            $output['validation_context'] = $this->validationContext;
        }
        if (isset($this->_usedProperties['filters'])) {
            $output['filters'] = $this->filters;
        }
        if (isset($this->_usedProperties['mercure'])) {
            $output['mercure'] = $this->mercure;
        }
        if (isset($this->_usedProperties['messenger'])) {
            $output['messenger'] = $this->messenger;
        }
        if (isset($this->_usedProperties['input'])) {
            $output['input'] = $this->input;
        }
        if (isset($this->_usedProperties['output'])) {
            $output['output'] = $this->output;
        }
        if (isset($this->_usedProperties['order'])) {
            $output['order'] = $this->order;
        }
        if (isset($this->_usedProperties['fetchPartial'])) {
            $output['fetch_partial'] = $this->fetchPartial;
        }
        if (isset($this->_usedProperties['forceEager'])) {
            $output['force_eager'] = $this->forceEager;
        }
        if (isset($this->_usedProperties['paginationClientEnabled'])) {
            $output['pagination_client_enabled'] = $this->paginationClientEnabled;
        }
        if (isset($this->_usedProperties['paginationClientItemsPerPage'])) {
            $output['pagination_client_items_per_page'] = $this->paginationClientItemsPerPage;
        }
        if (isset($this->_usedProperties['paginationClientPartial'])) {
            $output['pagination_client_partial'] = $this->paginationClientPartial;
        }
        if (isset($this->_usedProperties['paginationViaCursor'])) {
            $output['pagination_via_cursor'] = $this->paginationViaCursor;
        }
        if (isset($this->_usedProperties['paginationEnabled'])) {
            $output['pagination_enabled'] = $this->paginationEnabled;
        }
        if (isset($this->_usedProperties['paginationFetchJoinCollection'])) {
            $output['pagination_fetch_join_collection'] = $this->paginationFetchJoinCollection;
        }
        if (isset($this->_usedProperties['paginationUseOutputWalkers'])) {
            $output['pagination_use_output_walkers'] = $this->paginationUseOutputWalkers;
        }
        if (isset($this->_usedProperties['paginationItemsPerPage'])) {
            $output['pagination_items_per_page'] = $this->paginationItemsPerPage;
        }
        if (isset($this->_usedProperties['paginationMaximumItemsPerPage'])) {
            $output['pagination_maximum_items_per_page'] = $this->paginationMaximumItemsPerPage;
        }
        if (isset($this->_usedProperties['paginationPartial'])) {
            $output['pagination_partial'] = $this->paginationPartial;
        }
        if (isset($this->_usedProperties['paginationType'])) {
            $output['pagination_type'] = $this->paginationType;
        }
        if (isset($this->_usedProperties['security'])) {
            $output['security'] = $this->security;
        }
        if (isset($this->_usedProperties['securityMessage'])) {
            $output['security_message'] = $this->securityMessage;
        }
        if (isset($this->_usedProperties['securityPostDenormalize'])) {
            $output['security_post_denormalize'] = $this->securityPostDenormalize;
        }
        if (isset($this->_usedProperties['securityPostDenormalizeMessage'])) {
            $output['security_post_denormalize_message'] = $this->securityPostDenormalizeMessage;
        }
        if (isset($this->_usedProperties['securityPostValidation'])) {
            $output['security_post_validation'] = $this->securityPostValidation;
        }
        if (isset($this->_usedProperties['securityPostValidationMessage'])) {
            $output['security_post_validation_message'] = $this->securityPostValidationMessage;
        }
        if (isset($this->_usedProperties['compositeIdentifier'])) {
            $output['composite_identifier'] = $this->compositeIdentifier;
        }
        if (isset($this->_usedProperties['exceptionToStatus'])) {
            $output['exception_to_status'] = $this->exceptionToStatus;
        }
        if (isset($this->_usedProperties['queryParameterValidationEnabled'])) {
            $output['query_parameter_validation_enabled'] = $this->queryParameterValidationEnabled;
        }
        if (isset($this->_usedProperties['links'])) {
            $output['links'] = $this->links;
        }
        if (isset($this->_usedProperties['graphQlOperations'])) {
            $output['graph_ql_operations'] = $this->graphQlOperations;
        }
        if (isset($this->_usedProperties['provider'])) {
            $output['provider'] = $this->provider;
        }
        if (isset($this->_usedProperties['processor'])) {
            $output['processor'] = $this->processor;
        }
        if (isset($this->_usedProperties['stateOptions'])) {
            $output['state_options'] = $this->stateOptions;
        }
        if (isset($this->_usedProperties['rules'])) {
            $output['rules'] = $this->rules;
        }
        if (isset($this->_usedProperties['policy'])) {
            $output['policy'] = $this->policy;
        }
        if (isset($this->_usedProperties['middleware'])) {
            $output['middleware'] = $this->middleware;
        }
        if (isset($this->_usedProperties['parameters'])) {
            $output['parameters'] = $this->parameters;
        }
        if (isset($this->_usedProperties['strictQueryParameterValidation'])) {
            $output['strict_query_parameter_validation'] = $this->strictQueryParameterValidation;
        }
        if (isset($this->_usedProperties['hideHydraOperation'])) {
            $output['hide_hydra_operation'] = $this->hideHydraOperation;
        }
        if (isset($this->_usedProperties['jsonStream'])) {
            $output['json_stream'] = $this->jsonStream;
        }
        if (isset($this->_usedProperties['extraProperties'])) {
            $output['extra_properties'] = $this->extraProperties;
        }
        if (isset($this->_usedProperties['map'])) {
            $output['map'] = $this->map;
        }
        if (isset($this->_usedProperties['routeName'])) {
            $output['route_name'] = $this->routeName;
        }
        if (isset($this->_usedProperties['errors'])) {
            $output['errors'] = $this->errors;
        }
        if (isset($this->_usedProperties['read'])) {
            $output['read'] = $this->read;
        }
        if (isset($this->_usedProperties['deserialize'])) {
            $output['deserialize'] = $this->deserialize;
        }
        if (isset($this->_usedProperties['validate'])) {
            $output['validate'] = $this->validate;
        }
        if (isset($this->_usedProperties['write'])) {
            $output['write'] = $this->write;
        }
        if (isset($this->_usedProperties['serialize'])) {
            $output['serialize'] = $this->serialize;
        }
        if (isset($this->_usedProperties['priority'])) {
            $output['priority'] = $this->priority;
        }
        if (isset($this->_usedProperties['name'])) {
            $output['name'] = $this->name;
        }
        if (isset($this->_usedProperties['allowCreate'])) {
            $output['allow_create'] = $this->allowCreate;
        }
        if (isset($this->_usedProperties['itemUriTemplate'])) {
            $output['item_uri_template'] = $this->itemUriTemplate;
        }

        return $output + $this->_extraKeys;
    }

    /**
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function set(string $key, mixed $value): static
    {
        $this->_extraKeys[$key] = $value;

        return $this;
    }

}
