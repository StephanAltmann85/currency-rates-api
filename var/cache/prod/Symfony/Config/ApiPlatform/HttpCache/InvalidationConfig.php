<?php

namespace Symfony\Config\ApiPlatform\HttpCache;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Invalidation'.\DIRECTORY_SEPARATOR.'XkeyConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class InvalidationConfig 
{
    private $enabled;
    private $varnishUrls;
    private $urls;
    private $scopedClients;
    private $maxHeaderLength;
    private $requestOptions;
    private $purger;
    private $xkey;
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
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function varnishUrls(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['varnishUrls'] = true;
        $this->varnishUrls = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function urls(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['urls'] = true;
        $this->urls = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function scopedClients(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['scopedClients'] = true;
        $this->scopedClients = $value;

        return $this;
    }

    /**
     * Max header length supported by the cache server.
     * @default 7500
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function maxHeaderLength($value): static
    {
        $this->_usedProperties['maxHeaderLength'] = true;
        $this->maxHeaderLength = $value;

        return $this;
    }

    /**
     * To pass options to the client charged with the request.
     * @default array (
     * )
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function requestOptions(mixed $value = array (
    )): static
    {
        $this->_usedProperties['requestOptions'] = true;
        $this->requestOptions = $value;

        return $this;
    }

    /**
     * Specify a purger to use (available values: "api_platform.http_cache.purger.varnish.ban", "api_platform.http_cache.purger.varnish.xkey", "api_platform.http_cache.purger.souin").
     * @default 'api_platform.http_cache.purger.varnish'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function purger($value): static
    {
        $this->_usedProperties['purger'] = true;
        $this->purger = $value;

        return $this;
    }

    /**
     * @default {"glue":" "}
     * @deprecated Since api-platform/core 3.0: The "xkey" configuration is deprecated, use your own purger to customize surrogate keys or the appropriate paramters.
     */
    public function xkey(array $value = []): \Symfony\Config\ApiPlatform\HttpCache\Invalidation\XkeyConfig
    {
        if (null === $this->xkey) {
            $this->_usedProperties['xkey'] = true;
            $this->xkey = new \Symfony\Config\ApiPlatform\HttpCache\Invalidation\XkeyConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "xkey()" has already been initialized. You cannot pass values the second time you call xkey().');
        }

        return $this->xkey;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('varnish_urls', $config)) {
            $this->_usedProperties['varnishUrls'] = true;
            $this->varnishUrls = $config['varnish_urls'];
            unset($config['varnish_urls']);
        }

        if (array_key_exists('urls', $config)) {
            $this->_usedProperties['urls'] = true;
            $this->urls = $config['urls'];
            unset($config['urls']);
        }

        if (array_key_exists('scoped_clients', $config)) {
            $this->_usedProperties['scopedClients'] = true;
            $this->scopedClients = $config['scoped_clients'];
            unset($config['scoped_clients']);
        }

        if (array_key_exists('max_header_length', $config)) {
            $this->_usedProperties['maxHeaderLength'] = true;
            $this->maxHeaderLength = $config['max_header_length'];
            unset($config['max_header_length']);
        }

        if (array_key_exists('request_options', $config)) {
            $this->_usedProperties['requestOptions'] = true;
            $this->requestOptions = $config['request_options'];
            unset($config['request_options']);
        }

        if (array_key_exists('purger', $config)) {
            $this->_usedProperties['purger'] = true;
            $this->purger = $config['purger'];
            unset($config['purger']);
        }

        if (array_key_exists('xkey', $config)) {
            $this->_usedProperties['xkey'] = true;
            $this->xkey = new \Symfony\Config\ApiPlatform\HttpCache\Invalidation\XkeyConfig($config['xkey']);
            unset($config['xkey']);
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
        if (isset($this->_usedProperties['varnishUrls'])) {
            $output['varnish_urls'] = $this->varnishUrls;
        }
        if (isset($this->_usedProperties['urls'])) {
            $output['urls'] = $this->urls;
        }
        if (isset($this->_usedProperties['scopedClients'])) {
            $output['scoped_clients'] = $this->scopedClients;
        }
        if (isset($this->_usedProperties['maxHeaderLength'])) {
            $output['max_header_length'] = $this->maxHeaderLength;
        }
        if (isset($this->_usedProperties['requestOptions'])) {
            $output['request_options'] = $this->requestOptions;
        }
        if (isset($this->_usedProperties['purger'])) {
            $output['purger'] = $this->purger;
        }
        if (isset($this->_usedProperties['xkey'])) {
            $output['xkey'] = $this->xkey->toArray();
        }

        return $output;
    }

}
