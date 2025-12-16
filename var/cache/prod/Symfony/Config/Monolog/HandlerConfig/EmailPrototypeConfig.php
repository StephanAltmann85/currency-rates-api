<?php

namespace Symfony\Config\Monolog\HandlerConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class EmailPrototypeConfig 
{
    private $id;
    private $method;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function id($value): static
    {
        $this->_usedProperties['id'] = true;
        $this->id = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function method($value): static
    {
        $this->_usedProperties['method'] = true;
        $this->method = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('id', $config)) {
            $this->_usedProperties['id'] = true;
            $this->id = $config['id'];
            unset($config['id']);
        }

        if (array_key_exists('method', $config)) {
            $this->_usedProperties['method'] = true;
            $this->method = $config['method'];
            unset($config['method']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['id'])) {
            $output['id'] = $this->id;
        }
        if (isset($this->_usedProperties['method'])) {
            $output['method'] = $this->method;
        }

        return $output;
    }

}
