<?php

namespace Symfony\Config\Monolog\HandlerConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class RedisConfig 
{
    private $id;
    private $host;
    private $password;
    private $port;
    private $database;
    private $keyName;
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
    public function host($value): static
    {
        $this->_usedProperties['host'] = true;
        $this->host = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function password($value): static
    {
        $this->_usedProperties['password'] = true;
        $this->password = $value;

        return $this;
    }

    /**
     * @default 6379
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
     * @default 0
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function database($value): static
    {
        $this->_usedProperties['database'] = true;
        $this->database = $value;

        return $this;
    }

    /**
     * @default 'monolog_redis'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function keyName($value): static
    {
        $this->_usedProperties['keyName'] = true;
        $this->keyName = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('id', $config)) {
            $this->_usedProperties['id'] = true;
            $this->id = $config['id'];
            unset($config['id']);
        }

        if (array_key_exists('host', $config)) {
            $this->_usedProperties['host'] = true;
            $this->host = $config['host'];
            unset($config['host']);
        }

        if (array_key_exists('password', $config)) {
            $this->_usedProperties['password'] = true;
            $this->password = $config['password'];
            unset($config['password']);
        }

        if (array_key_exists('port', $config)) {
            $this->_usedProperties['port'] = true;
            $this->port = $config['port'];
            unset($config['port']);
        }

        if (array_key_exists('database', $config)) {
            $this->_usedProperties['database'] = true;
            $this->database = $config['database'];
            unset($config['database']);
        }

        if (array_key_exists('key_name', $config)) {
            $this->_usedProperties['keyName'] = true;
            $this->keyName = $config['key_name'];
            unset($config['key_name']);
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
        if (isset($this->_usedProperties['host'])) {
            $output['host'] = $this->host;
        }
        if (isset($this->_usedProperties['password'])) {
            $output['password'] = $this->password;
        }
        if (isset($this->_usedProperties['port'])) {
            $output['port'] = $this->port;
        }
        if (isset($this->_usedProperties['database'])) {
            $output['database'] = $this->database;
        }
        if (isset($this->_usedProperties['keyName'])) {
            $output['key_name'] = $this->keyName;
        }

        return $output;
    }

}
