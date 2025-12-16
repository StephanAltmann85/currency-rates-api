<?php

namespace Symfony\Config\Framework\Workflows\WorkflowConfig\TransitionConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FromConfig 
{
    private $place;
    private $weight;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function place($value): static
    {
        $this->_usedProperties['place'] = true;
        $this->place = $value;

        return $this;
    }

    /**
     * @default 1
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function weight($value): static
    {
        $this->_usedProperties['weight'] = true;
        $this->weight = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('place', $config)) {
            $this->_usedProperties['place'] = true;
            $this->place = $config['place'];
            unset($config['place']);
        }

        if (array_key_exists('weight', $config)) {
            $this->_usedProperties['weight'] = true;
            $this->weight = $config['weight'];
            unset($config['weight']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['place'])) {
            $output['place'] = $this->place;
        }
        if (isset($this->_usedProperties['weight'])) {
            $output['weight'] = $this->weight;
        }

        return $output;
    }

}
