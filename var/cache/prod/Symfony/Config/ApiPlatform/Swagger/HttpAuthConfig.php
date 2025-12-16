<?php

namespace Symfony\Config\ApiPlatform\Swagger;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class HttpAuthConfig 
{
    private $scheme;
    private $bearerFormat;
    private $_usedProperties = [];

    /**
     * The OpenAPI HTTP auth scheme, for example "bearer"
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function scheme($value): static
    {
        $this->_usedProperties['scheme'] = true;
        $this->scheme = $value;

        return $this;
    }

    /**
     * The OpenAPI HTTP bearer format
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function bearerFormat($value): static
    {
        $this->_usedProperties['bearerFormat'] = true;
        $this->bearerFormat = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('scheme', $config)) {
            $this->_usedProperties['scheme'] = true;
            $this->scheme = $config['scheme'];
            unset($config['scheme']);
        }

        if (array_key_exists('bearerFormat', $config)) {
            $this->_usedProperties['bearerFormat'] = true;
            $this->bearerFormat = $config['bearerFormat'];
            unset($config['bearerFormat']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['scheme'])) {
            $output['scheme'] = $this->scheme;
        }
        if (isset($this->_usedProperties['bearerFormat'])) {
            $output['bearerFormat'] = $this->bearerFormat;
        }

        return $output;
    }

}
