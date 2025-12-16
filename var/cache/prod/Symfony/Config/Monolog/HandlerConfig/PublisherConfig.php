<?php

namespace Symfony\Config\Monolog\HandlerConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PublisherConfig 
{
    private $id;
    private $hostname;
    private $port;
    private $chunkSize;
    private $encoder;
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
    public function hostname($value): static
    {
        $this->_usedProperties['hostname'] = true;
        $this->hostname = $value;

        return $this;
    }

    /**
     * @default 12201
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function port($value): static
    {
        $this->_usedProperties['port'] = true;
        $this->port = $value;

        return $this;
    }

    /**
     * @default 1420
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function chunkSize($value): static
    {
        $this->_usedProperties['chunkSize'] = true;
        $this->chunkSize = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|'json'|'compressed_json' $value
     * @return $this
     */
    public function encoder($value): static
    {
        $this->_usedProperties['encoder'] = true;
        $this->encoder = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('id', $config)) {
            $this->_usedProperties['id'] = true;
            $this->id = $config['id'];
            unset($config['id']);
        }

        if (array_key_exists('hostname', $config)) {
            $this->_usedProperties['hostname'] = true;
            $this->hostname = $config['hostname'];
            unset($config['hostname']);
        }

        if (array_key_exists('port', $config)) {
            $this->_usedProperties['port'] = true;
            $this->port = $config['port'];
            unset($config['port']);
        }

        if (array_key_exists('chunk_size', $config)) {
            $this->_usedProperties['chunkSize'] = true;
            $this->chunkSize = $config['chunk_size'];
            unset($config['chunk_size']);
        }

        if (array_key_exists('encoder', $config)) {
            $this->_usedProperties['encoder'] = true;
            $this->encoder = $config['encoder'];
            unset($config['encoder']);
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
        if (isset($this->_usedProperties['hostname'])) {
            $output['hostname'] = $this->hostname;
        }
        if (isset($this->_usedProperties['port'])) {
            $output['port'] = $this->port;
        }
        if (isset($this->_usedProperties['chunkSize'])) {
            $output['chunk_size'] = $this->chunkSize;
        }
        if (isset($this->_usedProperties['encoder'])) {
            $output['encoder'] = $this->encoder;
        }

        return $output;
    }

}
