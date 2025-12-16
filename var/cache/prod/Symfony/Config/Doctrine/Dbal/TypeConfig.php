<?php

namespace Symfony\Config\Doctrine\Dbal;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class TypeConfig 
{
    private $class;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function class($value): static
    {
        $this->_usedProperties['class'] = true;
        $this->class = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('class', $config)) {
            $this->_usedProperties['class'] = true;
            $this->class = $config['class'];
            unset($config['class']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['class'])) {
            $output['class'] = $this->class;
        }

        return $output;
    }

}
