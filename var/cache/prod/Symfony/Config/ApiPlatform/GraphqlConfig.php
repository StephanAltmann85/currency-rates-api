<?php

namespace Symfony\Config\ApiPlatform;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Graphql'.\DIRECTORY_SEPARATOR.'GraphiqlConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Graphql'.\DIRECTORY_SEPARATOR.'IntrospectionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Graphql'.\DIRECTORY_SEPARATOR.'GraphqlPlaygroundConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Graphql'.\DIRECTORY_SEPARATOR.'CollectionConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class GraphqlConfig 
{
    private $enabled;
    private $defaultIde;
    private $graphiql;
    private $introspection;
    private $maxQueryDepth;
    private $graphqlPlayground;
    private $maxQueryComplexity;
    private $nestingSeparator;
    private $collection;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): static
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * @default 'graphiql'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultIde($value): static
    {
        $this->_usedProperties['defaultIde'] = true;
        $this->defaultIde = $value;

        return $this;
    }

    /**
     * @template TValue of array|bool
     * @param TValue $value
     * @default {"enabled":false}
     * @return \Symfony\Config\ApiPlatform\Graphql\GraphiqlConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\ApiPlatform\Graphql\GraphiqlConfig : static)
     */
    public function graphiql(array|bool $value = []): \Symfony\Config\ApiPlatform\Graphql\GraphiqlConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['graphiql'] = true;
            $this->graphiql = $value;

            return $this;
        }

        if (!$this->graphiql instanceof \Symfony\Config\ApiPlatform\Graphql\GraphiqlConfig) {
            $this->_usedProperties['graphiql'] = true;
            $this->graphiql = new \Symfony\Config\ApiPlatform\Graphql\GraphiqlConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "graphiql()" has already been initialized. You cannot pass values the second time you call graphiql().');
        }

        return $this->graphiql;
    }

    /**
     * @template TValue of array|bool
     * @param TValue $value
     * @default {"enabled":true}
     * @return \Symfony\Config\ApiPlatform\Graphql\IntrospectionConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\ApiPlatform\Graphql\IntrospectionConfig : static)
     */
    public function introspection(array|bool $value = []): \Symfony\Config\ApiPlatform\Graphql\IntrospectionConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['introspection'] = true;
            $this->introspection = $value;

            return $this;
        }

        if (!$this->introspection instanceof \Symfony\Config\ApiPlatform\Graphql\IntrospectionConfig) {
            $this->_usedProperties['introspection'] = true;
            $this->introspection = new \Symfony\Config\ApiPlatform\Graphql\IntrospectionConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "introspection()" has already been initialized. You cannot pass values the second time you call introspection().');
        }

        return $this->introspection;
    }

    /**
     * @default 20
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function maxQueryDepth($value): static
    {
        $this->_usedProperties['maxQueryDepth'] = true;
        $this->maxQueryDepth = $value;

        return $this;
    }

    /**
     * @deprecated Since api-platform/core 4.0: The child node "graphql_playground" at path "api_platform.graphql" is deprecated.
     */
    public function graphqlPlayground(array $value = []): \Symfony\Config\ApiPlatform\Graphql\GraphqlPlaygroundConfig
    {
        if (null === $this->graphqlPlayground) {
            $this->_usedProperties['graphqlPlayground'] = true;
            $this->graphqlPlayground = new \Symfony\Config\ApiPlatform\Graphql\GraphqlPlaygroundConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "graphqlPlayground()" has already been initialized. You cannot pass values the second time you call graphqlPlayground().');
        }

        return $this->graphqlPlayground;
    }

    /**
     * @default 500
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function maxQueryComplexity($value): static
    {
        $this->_usedProperties['maxQueryComplexity'] = true;
        $this->maxQueryComplexity = $value;

        return $this;
    }

    /**
     * The separator to use to filter nested fields.
     * @default '_'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function nestingSeparator($value): static
    {
        $this->_usedProperties['nestingSeparator'] = true;
        $this->nestingSeparator = $value;

        return $this;
    }

    /**
     * @default {"pagination":{"enabled":true}}
     */
    public function collection(array $value = []): \Symfony\Config\ApiPlatform\Graphql\CollectionConfig
    {
        if (null === $this->collection) {
            $this->_usedProperties['collection'] = true;
            $this->collection = new \Symfony\Config\ApiPlatform\Graphql\CollectionConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "collection()" has already been initialized. You cannot pass values the second time you call collection().');
        }

        return $this->collection;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('default_ide', $config)) {
            $this->_usedProperties['defaultIde'] = true;
            $this->defaultIde = $config['default_ide'];
            unset($config['default_ide']);
        }

        if (array_key_exists('graphiql', $config)) {
            $this->_usedProperties['graphiql'] = true;
            $this->graphiql = \is_array($config['graphiql']) ? new \Symfony\Config\ApiPlatform\Graphql\GraphiqlConfig($config['graphiql']) : $config['graphiql'];
            unset($config['graphiql']);
        }

        if (array_key_exists('introspection', $config)) {
            $this->_usedProperties['introspection'] = true;
            $this->introspection = \is_array($config['introspection']) ? new \Symfony\Config\ApiPlatform\Graphql\IntrospectionConfig($config['introspection']) : $config['introspection'];
            unset($config['introspection']);
        }

        if (array_key_exists('max_query_depth', $config)) {
            $this->_usedProperties['maxQueryDepth'] = true;
            $this->maxQueryDepth = $config['max_query_depth'];
            unset($config['max_query_depth']);
        }

        if (array_key_exists('graphql_playground', $config)) {
            $this->_usedProperties['graphqlPlayground'] = true;
            $this->graphqlPlayground = new \Symfony\Config\ApiPlatform\Graphql\GraphqlPlaygroundConfig($config['graphql_playground']);
            unset($config['graphql_playground']);
        }

        if (array_key_exists('max_query_complexity', $config)) {
            $this->_usedProperties['maxQueryComplexity'] = true;
            $this->maxQueryComplexity = $config['max_query_complexity'];
            unset($config['max_query_complexity']);
        }

        if (array_key_exists('nesting_separator', $config)) {
            $this->_usedProperties['nestingSeparator'] = true;
            $this->nestingSeparator = $config['nesting_separator'];
            unset($config['nesting_separator']);
        }

        if (array_key_exists('collection', $config)) {
            $this->_usedProperties['collection'] = true;
            $this->collection = new \Symfony\Config\ApiPlatform\Graphql\CollectionConfig($config['collection']);
            unset($config['collection']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['defaultIde'])) {
            $output['default_ide'] = $this->defaultIde;
        }
        if (isset($this->_usedProperties['graphiql'])) {
            $output['graphiql'] = $this->graphiql instanceof \Symfony\Config\ApiPlatform\Graphql\GraphiqlConfig ? $this->graphiql->toArray() : $this->graphiql;
        }
        if (isset($this->_usedProperties['introspection'])) {
            $output['introspection'] = $this->introspection instanceof \Symfony\Config\ApiPlatform\Graphql\IntrospectionConfig ? $this->introspection->toArray() : $this->introspection;
        }
        if (isset($this->_usedProperties['maxQueryDepth'])) {
            $output['max_query_depth'] = $this->maxQueryDepth;
        }
        if (isset($this->_usedProperties['graphqlPlayground'])) {
            $output['graphql_playground'] = $this->graphqlPlayground->toArray();
        }
        if (isset($this->_usedProperties['maxQueryComplexity'])) {
            $output['max_query_complexity'] = $this->maxQueryComplexity;
        }
        if (isset($this->_usedProperties['nestingSeparator'])) {
            $output['nesting_separator'] = $this->nestingSeparator;
        }
        if (isset($this->_usedProperties['collection'])) {
            $output['collection'] = $this->collection->toArray();
        }

        return $output;
    }

}
