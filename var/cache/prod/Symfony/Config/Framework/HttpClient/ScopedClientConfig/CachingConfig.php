<?php

namespace Symfony\Config\Framework\HttpClient\ScopedClientConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CachingConfig 
{
    private $enabled;
    private $cachePool;
    private $shared;
    private $maxTtl;
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
     * The taggable cache pool to use for storing the responses.
     * @default 'cache.http_client'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cachePool($value): static
    {
        $this->_usedProperties['cachePool'] = true;
        $this->cachePool = $value;

        return $this;
    }

    /**
     * Indicates whether the cache is shared (public) or private.
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function shared($value): static
    {
        $this->_usedProperties['shared'] = true;
        $this->shared = $value;

        return $this;
    }

    /**
     * The maximum TTL (in seconds) allowed for cached responses. Null means no cap.
     * @default null
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function maxTtl($value): static
    {
        $this->_usedProperties['maxTtl'] = true;
        $this->maxTtl = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('cache_pool', $config)) {
            $this->_usedProperties['cachePool'] = true;
            $this->cachePool = $config['cache_pool'];
            unset($config['cache_pool']);
        }

        if (array_key_exists('shared', $config)) {
            $this->_usedProperties['shared'] = true;
            $this->shared = $config['shared'];
            unset($config['shared']);
        }

        if (array_key_exists('max_ttl', $config)) {
            $this->_usedProperties['maxTtl'] = true;
            $this->maxTtl = $config['max_ttl'];
            unset($config['max_ttl']);
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
        if (isset($this->_usedProperties['cachePool'])) {
            $output['cache_pool'] = $this->cachePool;
        }
        if (isset($this->_usedProperties['shared'])) {
            $output['shared'] = $this->shared;
        }
        if (isset($this->_usedProperties['maxTtl'])) {
            $output['max_ttl'] = $this->maxTtl;
        }

        return $output;
    }

}
