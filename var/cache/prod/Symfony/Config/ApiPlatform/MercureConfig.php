<?php

namespace Symfony\Config\ApiPlatform;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MercureConfig 
{
    private $enabled;
    private $hubUrl;
    private $includeType;
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
     * The URL sent in the Link HTTP header. If not set, will default to the URL for MercureBundle's default hub.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function hubUrl($value): static
    {
        $this->_usedProperties['hubUrl'] = true;
        $this->hubUrl = $value;

        return $this;
    }

    /**
     * Always include @type in updates (including delete ones).
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function includeType($value): static
    {
        $this->_usedProperties['includeType'] = true;
        $this->includeType = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('hub_url', $config)) {
            $this->_usedProperties['hubUrl'] = true;
            $this->hubUrl = $config['hub_url'];
            unset($config['hub_url']);
        }

        if (array_key_exists('include_type', $config)) {
            $this->_usedProperties['includeType'] = true;
            $this->includeType = $config['include_type'];
            unset($config['include_type']);
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
        if (isset($this->_usedProperties['hubUrl'])) {
            $output['hub_url'] = $this->hubUrl;
        }
        if (isset($this->_usedProperties['includeType'])) {
            $output['include_type'] = $this->includeType;
        }

        return $output;
    }

}
