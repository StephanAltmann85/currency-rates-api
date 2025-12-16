<?php

namespace Symfony\Config\NelmioCors;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PathsConfig 
{
    private $allowCredentials;
    private $allowOrigin;
    private $allowHeaders;
    private $allowMethods;
    private $allowPrivateNetwork;
    private $exposeHeaders;
    private $maxAge;
    private $hosts;
    private $originRegex;
    private $forcedAllowOriginValue;
    private $skipSameAsOrigin;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function allowCredentials($value): static
    {
        $this->_usedProperties['allowCredentials'] = true;
        $this->allowCredentials = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed>|mixed $value
     *
     * @return $this
     */
    public function allowOrigin(mixed $value): static
    {
        $this->_usedProperties['allowOrigin'] = true;
        $this->allowOrigin = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed>|mixed $value
     *
     * @return $this
     */
    public function allowHeaders(mixed $value): static
    {
        $this->_usedProperties['allowHeaders'] = true;
        $this->allowHeaders = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function allowMethods(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['allowMethods'] = true;
        $this->allowMethods = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function allowPrivateNetwork($value): static
    {
        $this->_usedProperties['allowPrivateNetwork'] = true;
        $this->allowPrivateNetwork = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed>|mixed $value
     *
     * @return $this
     */
    public function exposeHeaders(mixed $value): static
    {
        $this->_usedProperties['exposeHeaders'] = true;
        $this->exposeHeaders = $value;

        return $this;
    }

    /**
     * @default 0
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function maxAge($value): static
    {
        $this->_usedProperties['maxAge'] = true;
        $this->maxAge = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function hosts(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['hosts'] = true;
        $this->hosts = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function originRegex($value): static
    {
        $this->_usedProperties['originRegex'] = true;
        $this->originRegex = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function forcedAllowOriginValue($value): static
    {
        $this->_usedProperties['forcedAllowOriginValue'] = true;
        $this->forcedAllowOriginValue = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function skipSameAsOrigin($value): static
    {
        $this->_usedProperties['skipSameAsOrigin'] = true;
        $this->skipSameAsOrigin = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('allow_credentials', $config)) {
            $this->_usedProperties['allowCredentials'] = true;
            $this->allowCredentials = $config['allow_credentials'];
            unset($config['allow_credentials']);
        }

        if (array_key_exists('allow_origin', $config)) {
            $this->_usedProperties['allowOrigin'] = true;
            $this->allowOrigin = $config['allow_origin'];
            unset($config['allow_origin']);
        }

        if (array_key_exists('allow_headers', $config)) {
            $this->_usedProperties['allowHeaders'] = true;
            $this->allowHeaders = $config['allow_headers'];
            unset($config['allow_headers']);
        }

        if (array_key_exists('allow_methods', $config)) {
            $this->_usedProperties['allowMethods'] = true;
            $this->allowMethods = $config['allow_methods'];
            unset($config['allow_methods']);
        }

        if (array_key_exists('allow_private_network', $config)) {
            $this->_usedProperties['allowPrivateNetwork'] = true;
            $this->allowPrivateNetwork = $config['allow_private_network'];
            unset($config['allow_private_network']);
        }

        if (array_key_exists('expose_headers', $config)) {
            $this->_usedProperties['exposeHeaders'] = true;
            $this->exposeHeaders = $config['expose_headers'];
            unset($config['expose_headers']);
        }

        if (array_key_exists('max_age', $config)) {
            $this->_usedProperties['maxAge'] = true;
            $this->maxAge = $config['max_age'];
            unset($config['max_age']);
        }

        if (array_key_exists('hosts', $config)) {
            $this->_usedProperties['hosts'] = true;
            $this->hosts = $config['hosts'];
            unset($config['hosts']);
        }

        if (array_key_exists('origin_regex', $config)) {
            $this->_usedProperties['originRegex'] = true;
            $this->originRegex = $config['origin_regex'];
            unset($config['origin_regex']);
        }

        if (array_key_exists('forced_allow_origin_value', $config)) {
            $this->_usedProperties['forcedAllowOriginValue'] = true;
            $this->forcedAllowOriginValue = $config['forced_allow_origin_value'];
            unset($config['forced_allow_origin_value']);
        }

        if (array_key_exists('skip_same_as_origin', $config)) {
            $this->_usedProperties['skipSameAsOrigin'] = true;
            $this->skipSameAsOrigin = $config['skip_same_as_origin'];
            unset($config['skip_same_as_origin']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['allowCredentials'])) {
            $output['allow_credentials'] = $this->allowCredentials;
        }
        if (isset($this->_usedProperties['allowOrigin'])) {
            $output['allow_origin'] = $this->allowOrigin;
        }
        if (isset($this->_usedProperties['allowHeaders'])) {
            $output['allow_headers'] = $this->allowHeaders;
        }
        if (isset($this->_usedProperties['allowMethods'])) {
            $output['allow_methods'] = $this->allowMethods;
        }
        if (isset($this->_usedProperties['allowPrivateNetwork'])) {
            $output['allow_private_network'] = $this->allowPrivateNetwork;
        }
        if (isset($this->_usedProperties['exposeHeaders'])) {
            $output['expose_headers'] = $this->exposeHeaders;
        }
        if (isset($this->_usedProperties['maxAge'])) {
            $output['max_age'] = $this->maxAge;
        }
        if (isset($this->_usedProperties['hosts'])) {
            $output['hosts'] = $this->hosts;
        }
        if (isset($this->_usedProperties['originRegex'])) {
            $output['origin_regex'] = $this->originRegex;
        }
        if (isset($this->_usedProperties['forcedAllowOriginValue'])) {
            $output['forced_allow_origin_value'] = $this->forcedAllowOriginValue;
        }
        if (isset($this->_usedProperties['skipSameAsOrigin'])) {
            $output['skip_same_as_origin'] = $this->skipSameAsOrigin;
        }

        return $output;
    }

}
