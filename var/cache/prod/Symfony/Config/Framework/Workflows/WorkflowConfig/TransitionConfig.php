<?php

namespace Symfony\Config\Framework\Workflows\WorkflowConfig;

require_once __DIR__.\DIRECTORY_SEPARATOR.'TransitionConfig'.\DIRECTORY_SEPARATOR.'FromConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'TransitionConfig'.\DIRECTORY_SEPARATOR.'ToConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class TransitionConfig 
{
    private $name;
    private $guard;
    private $from;
    private $to;
    private $weight;
    private $metadata;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function name($value): static
    {
        $this->_usedProperties['name'] = true;
        $this->name = $value;

        return $this;
    }

    /**
     * An expression to block the transition.
     * @example is_fully_authenticated() and is_granted('ROLE_JOURNALIST') and subject.getTitle() == 'My first article'
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function guard($value): static
    {
        $this->_usedProperties['guard'] = true;
        $this->guard = $value;

        return $this;
    }

    /**
     * @template TValue of \BackedEnum|string|array
     * @param TValue $value
     * @return \Symfony\Config\Framework\Workflows\WorkflowConfig\TransitionConfig\FromConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\Workflows\WorkflowConfig\TransitionConfig\FromConfig : static)
     */
    public function from(\BackedEnum|string|array $value = []): \Symfony\Config\Framework\Workflows\WorkflowConfig\TransitionConfig\FromConfig|static
    {
        $this->_usedProperties['from'] = true;
        if (!\is_array($value)) {
            $this->from[] = $value;

            return $this;
        }

        return $this->from[] = new \Symfony\Config\Framework\Workflows\WorkflowConfig\TransitionConfig\FromConfig($value);
    }

    /**
     * @template TValue of \BackedEnum|string|array
     * @param TValue $value
     * @return \Symfony\Config\Framework\Workflows\WorkflowConfig\TransitionConfig\ToConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Framework\Workflows\WorkflowConfig\TransitionConfig\ToConfig : static)
     */
    public function to(\BackedEnum|string|array $value = []): \Symfony\Config\Framework\Workflows\WorkflowConfig\TransitionConfig\ToConfig|static
    {
        $this->_usedProperties['to'] = true;
        if (!\is_array($value)) {
            $this->to[] = $value;

            return $this;
        }

        return $this->to[] = new \Symfony\Config\Framework\Workflows\WorkflowConfig\TransitionConfig\ToConfig($value);
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

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function metadata(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['metadata'] = true;
        $this->metadata = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('name', $config)) {
            $this->_usedProperties['name'] = true;
            $this->name = $config['name'];
            unset($config['name']);
        }

        if (array_key_exists('guard', $config)) {
            $this->_usedProperties['guard'] = true;
            $this->guard = $config['guard'];
            unset($config['guard']);
        }

        if (array_key_exists('from', $config)) {
            $this->_usedProperties['from'] = true;
            $this->from = array_map(fn ($v) => \is_array($v) ? new \Symfony\Config\Framework\Workflows\WorkflowConfig\TransitionConfig\FromConfig($v) : $v, $config['from']);
            unset($config['from']);
        }

        if (array_key_exists('to', $config)) {
            $this->_usedProperties['to'] = true;
            $this->to = array_map(fn ($v) => \is_array($v) ? new \Symfony\Config\Framework\Workflows\WorkflowConfig\TransitionConfig\ToConfig($v) : $v, $config['to']);
            unset($config['to']);
        }

        if (array_key_exists('weight', $config)) {
            $this->_usedProperties['weight'] = true;
            $this->weight = $config['weight'];
            unset($config['weight']);
        }

        if (array_key_exists('metadata', $config)) {
            $this->_usedProperties['metadata'] = true;
            $this->metadata = $config['metadata'];
            unset($config['metadata']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['name'])) {
            $output['name'] = $this->name;
        }
        if (isset($this->_usedProperties['guard'])) {
            $output['guard'] = $this->guard;
        }
        if (isset($this->_usedProperties['from'])) {
            $output['from'] = array_map(fn ($v) => $v instanceof \Symfony\Config\Framework\Workflows\WorkflowConfig\TransitionConfig\FromConfig ? $v->toArray() : $v, $this->from);
        }
        if (isset($this->_usedProperties['to'])) {
            $output['to'] = array_map(fn ($v) => $v instanceof \Symfony\Config\Framework\Workflows\WorkflowConfig\TransitionConfig\ToConfig ? $v->toArray() : $v, $this->to);
        }
        if (isset($this->_usedProperties['weight'])) {
            $output['weight'] = $this->weight;
        }
        if (isset($this->_usedProperties['metadata'])) {
            $output['metadata'] = $this->metadata;
        }

        return $output;
    }

}
