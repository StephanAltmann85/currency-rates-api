<?php

namespace Symfony\Config\ApiPlatform\HttpCache\Invalidation;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class XkeyConfig 
{
    private $glue;
    private $_usedProperties = [];

    /**
     * xkey glue between keys
     * @default ' '
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function glue($value): static
    {
        $this->_usedProperties['glue'] = true;
        $this->glue = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('glue', $config)) {
            $this->_usedProperties['glue'] = true;
            $this->glue = $config['glue'];
            unset($config['glue']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['glue'])) {
            $output['glue'] = $this->glue;
        }

        return $output;
    }

}
