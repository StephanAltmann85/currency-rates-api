<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Monolog'.\DIRECTORY_SEPARATOR.'HandlerConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MonologConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $useMicroseconds;
    private $channels;
    private $handlers;
    private $_usedProperties = [];
    private $_hasDeprecatedCalls = false;

    /**
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function useMicroseconds($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['useMicroseconds'] = true;
        $this->useMicroseconds = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function channels(ParamConfigurator|array $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['channels'] = true;
        $this->channels = $value;

        return $this;
    }

    /**
     * @example {"type":"stream","path":"\/var\/log\/symfony.log","level":"ERROR","bubble":"false","formatter":"my_formatter"}
     * @example {"type":"fingers_crossed","action_level":"WARNING","buffer_size":30,"handler":"custom"}
     * @example {"type":"service","id":"my_handler"}
     * @deprecated since Symfony 7.4
     */
    public function handler(string $name, array $value = []): \Symfony\Config\Monolog\HandlerConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (!isset($this->handlers[$name])) {
            $this->_usedProperties['handlers'] = true;
            $this->handlers[$name] = new \Symfony\Config\Monolog\HandlerConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "handler()" has already been initialized. You cannot pass values the second time you call handler().');
        }

        return $this->handlers[$name];
    }

    public function getExtensionAlias(): string
    {
        return 'monolog';
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('use_microseconds', $config)) {
            $this->_usedProperties['useMicroseconds'] = true;
            $this->useMicroseconds = $config['use_microseconds'];
            unset($config['use_microseconds']);
        }

        if (array_key_exists('channels', $config)) {
            $this->_usedProperties['channels'] = true;
            $this->channels = $config['channels'];
            unset($config['channels']);
        }

        if (array_key_exists('handlers', $config)) {
            $this->_usedProperties['handlers'] = true;
            $this->handlers = array_map(fn ($v) => new \Symfony\Config\Monolog\HandlerConfig($v), $config['handlers']);
            unset($config['handlers']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['useMicroseconds'])) {
            $output['use_microseconds'] = $this->useMicroseconds;
        }
        if (isset($this->_usedProperties['channels'])) {
            $output['channels'] = $this->channels;
        }
        if (isset($this->_usedProperties['handlers'])) {
            $output['handlers'] = array_map(fn ($v) => $v->toArray(), $this->handlers);
        }
        if ($this->_hasDeprecatedCalls) {
            trigger_deprecation('symfony/config', '7.4', 'Calling any fluent method on "%s" is deprecated; pass the configuration to the constructor instead.', $this::class);
        }

        return $output;
    }

}
