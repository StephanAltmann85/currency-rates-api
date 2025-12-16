<?php

namespace Symfony\Config\Framework;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Workflows'.\DIRECTORY_SEPARATOR.'WorkflowConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class WorkflowsConfig 
{
    private $enabled;
    private $workflows;
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

    public function workflow(string $name, array $value = []): \Symfony\Config\Framework\Workflows\WorkflowConfig
    {
        if (!isset($this->workflows[$name])) {
            $this->_usedProperties['workflows'] = true;
            $this->workflows[$name] = new \Symfony\Config\Framework\Workflows\WorkflowConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "workflow()" has already been initialized. You cannot pass values the second time you call workflow().');
        }

        return $this->workflows[$name];
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('workflows', $config)) {
            $this->_usedProperties['workflows'] = true;
            $this->workflows = array_map(fn ($v) => new \Symfony\Config\Framework\Workflows\WorkflowConfig($v), $config['workflows']);
            unset($config['workflows']);
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
        if (isset($this->_usedProperties['workflows'])) {
            $output['workflows'] = array_map(fn ($v) => $v->toArray(), $this->workflows);
        }

        return $output;
    }

}
