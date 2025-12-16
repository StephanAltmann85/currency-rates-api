<?php

namespace Symfony\Config\DoctrineMigrations\Storage;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class TableStorageConfig 
{
    private $tableName;
    private $versionColumnName;
    private $versionColumnLength;
    private $executedAtColumnName;
    private $executionTimeColumnName;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function tableName($value): static
    {
        $this->_usedProperties['tableName'] = true;
        $this->tableName = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function versionColumnName($value): static
    {
        $this->_usedProperties['versionColumnName'] = true;
        $this->versionColumnName = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function versionColumnLength($value): static
    {
        $this->_usedProperties['versionColumnLength'] = true;
        $this->versionColumnLength = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function executedAtColumnName($value): static
    {
        $this->_usedProperties['executedAtColumnName'] = true;
        $this->executedAtColumnName = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function executionTimeColumnName($value): static
    {
        $this->_usedProperties['executionTimeColumnName'] = true;
        $this->executionTimeColumnName = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('table_name', $config)) {
            $this->_usedProperties['tableName'] = true;
            $this->tableName = $config['table_name'];
            unset($config['table_name']);
        }

        if (array_key_exists('version_column_name', $config)) {
            $this->_usedProperties['versionColumnName'] = true;
            $this->versionColumnName = $config['version_column_name'];
            unset($config['version_column_name']);
        }

        if (array_key_exists('version_column_length', $config)) {
            $this->_usedProperties['versionColumnLength'] = true;
            $this->versionColumnLength = $config['version_column_length'];
            unset($config['version_column_length']);
        }

        if (array_key_exists('executed_at_column_name', $config)) {
            $this->_usedProperties['executedAtColumnName'] = true;
            $this->executedAtColumnName = $config['executed_at_column_name'];
            unset($config['executed_at_column_name']);
        }

        if (array_key_exists('execution_time_column_name', $config)) {
            $this->_usedProperties['executionTimeColumnName'] = true;
            $this->executionTimeColumnName = $config['execution_time_column_name'];
            unset($config['execution_time_column_name']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['tableName'])) {
            $output['table_name'] = $this->tableName;
        }
        if (isset($this->_usedProperties['versionColumnName'])) {
            $output['version_column_name'] = $this->versionColumnName;
        }
        if (isset($this->_usedProperties['versionColumnLength'])) {
            $output['version_column_length'] = $this->versionColumnLength;
        }
        if (isset($this->_usedProperties['executedAtColumnName'])) {
            $output['executed_at_column_name'] = $this->executedAtColumnName;
        }
        if (isset($this->_usedProperties['executionTimeColumnName'])) {
            $output['execution_time_column_name'] = $this->executionTimeColumnName;
        }

        return $output;
    }

}
