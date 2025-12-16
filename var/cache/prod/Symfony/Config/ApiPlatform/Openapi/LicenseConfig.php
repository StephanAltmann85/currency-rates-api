<?php

namespace Symfony\Config\ApiPlatform\Openapi;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class LicenseConfig 
{
    private $name;
    private $url;
    private $identifier;
    private $_usedProperties = [];

    /**
     * The license name used for the API.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function name($value): static
    {
        $this->_usedProperties['name'] = true;
        $this->name = $value;

        return $this;
    }

    /**
     * URL to the license used for the API. MUST be in the format of a URL.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function url($value): static
    {
        $this->_usedProperties['url'] = true;
        $this->url = $value;

        return $this;
    }

    /**
     * An SPDX license expression for the API. The identifier field is mutually exclusive of the url field.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function identifier($value): static
    {
        $this->_usedProperties['identifier'] = true;
        $this->identifier = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('name', $config)) {
            $this->_usedProperties['name'] = true;
            $this->name = $config['name'];
            unset($config['name']);
        }

        if (array_key_exists('url', $config)) {
            $this->_usedProperties['url'] = true;
            $this->url = $config['url'];
            unset($config['url']);
        }

        if (array_key_exists('identifier', $config)) {
            $this->_usedProperties['identifier'] = true;
            $this->identifier = $config['identifier'];
            unset($config['identifier']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['name'])) {
            $output['name'] = $this->name;
        }
        if (isset($this->_usedProperties['url'])) {
            $output['url'] = $this->url;
        }
        if (isset($this->_usedProperties['identifier'])) {
            $output['identifier'] = $this->identifier;
        }

        return $output;
    }

}
