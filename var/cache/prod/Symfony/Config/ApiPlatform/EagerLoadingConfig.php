<?php

namespace Symfony\Config\ApiPlatform;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class EagerLoadingConfig 
{
    private $enabled;
    private $fetchPartial;
    private $maxJoins;
    private $forceEager;
    private $_usedProperties = [];

    /**
     * @default true
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
     * Fetch only partial data according to serialization groups. If enabled, Doctrine ORM entities will not work as expected if any of the other fields are used.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function fetchPartial($value): static
    {
        $this->_usedProperties['fetchPartial'] = true;
        $this->fetchPartial = $value;

        return $this;
    }

    /**
     * Max number of joined relations before EagerLoading throws a RuntimeException
     * @default 30
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function maxJoins($value): static
    {
        $this->_usedProperties['maxJoins'] = true;
        $this->maxJoins = $value;

        return $this;
    }

    /**
     * Force join on every relation. If disabled, it will only join relations having the EAGER fetch mode.
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function forceEager($value): static
    {
        $this->_usedProperties['forceEager'] = true;
        $this->forceEager = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('fetch_partial', $config)) {
            $this->_usedProperties['fetchPartial'] = true;
            $this->fetchPartial = $config['fetch_partial'];
            unset($config['fetch_partial']);
        }

        if (array_key_exists('max_joins', $config)) {
            $this->_usedProperties['maxJoins'] = true;
            $this->maxJoins = $config['max_joins'];
            unset($config['max_joins']);
        }

        if (array_key_exists('force_eager', $config)) {
            $this->_usedProperties['forceEager'] = true;
            $this->forceEager = $config['force_eager'];
            unset($config['force_eager']);
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
        if (isset($this->_usedProperties['fetchPartial'])) {
            $output['fetch_partial'] = $this->fetchPartial;
        }
        if (isset($this->_usedProperties['maxJoins'])) {
            $output['max_joins'] = $this->maxJoins;
        }
        if (isset($this->_usedProperties['forceEager'])) {
            $output['force_eager'] = $this->forceEager;
        }

        return $output;
    }

}
