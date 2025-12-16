<?php

namespace Symfony\Config\Monolog\HandlerConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class VerbosityLevelsConfig 
{
    private $vERBOSITYQUIET;
    private $vERBOSITYNORMAL;
    private $vERBOSITYVERBOSE;
    private $vERBOSITYVERYVERBOSE;
    private $vERBOSITYDEBUG;
    private $_usedProperties = [];

    /**
     * @default 'ERROR'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function vERBOSITYQUIET($value): static
    {
        $this->_usedProperties['vERBOSITYQUIET'] = true;
        $this->vERBOSITYQUIET = $value;

        return $this;
    }

    /**
     * @default 'WARNING'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function vERBOSITYNORMAL($value): static
    {
        $this->_usedProperties['vERBOSITYNORMAL'] = true;
        $this->vERBOSITYNORMAL = $value;

        return $this;
    }

    /**
     * @default 'NOTICE'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function vERBOSITYVERBOSE($value): static
    {
        $this->_usedProperties['vERBOSITYVERBOSE'] = true;
        $this->vERBOSITYVERBOSE = $value;

        return $this;
    }

    /**
     * @default 'INFO'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function vERBOSITYVERYVERBOSE($value): static
    {
        $this->_usedProperties['vERBOSITYVERYVERBOSE'] = true;
        $this->vERBOSITYVERYVERBOSE = $value;

        return $this;
    }

    /**
     * @default 'DEBUG'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function vERBOSITYDEBUG($value): static
    {
        $this->_usedProperties['vERBOSITYDEBUG'] = true;
        $this->vERBOSITYDEBUG = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('VERBOSITY_QUIET', $config)) {
            $this->_usedProperties['vERBOSITYQUIET'] = true;
            $this->vERBOSITYQUIET = $config['VERBOSITY_QUIET'];
            unset($config['VERBOSITY_QUIET']);
        }

        if (array_key_exists('VERBOSITY_NORMAL', $config)) {
            $this->_usedProperties['vERBOSITYNORMAL'] = true;
            $this->vERBOSITYNORMAL = $config['VERBOSITY_NORMAL'];
            unset($config['VERBOSITY_NORMAL']);
        }

        if (array_key_exists('VERBOSITY_VERBOSE', $config)) {
            $this->_usedProperties['vERBOSITYVERBOSE'] = true;
            $this->vERBOSITYVERBOSE = $config['VERBOSITY_VERBOSE'];
            unset($config['VERBOSITY_VERBOSE']);
        }

        if (array_key_exists('VERBOSITY_VERY_VERBOSE', $config)) {
            $this->_usedProperties['vERBOSITYVERYVERBOSE'] = true;
            $this->vERBOSITYVERYVERBOSE = $config['VERBOSITY_VERY_VERBOSE'];
            unset($config['VERBOSITY_VERY_VERBOSE']);
        }

        if (array_key_exists('VERBOSITY_DEBUG', $config)) {
            $this->_usedProperties['vERBOSITYDEBUG'] = true;
            $this->vERBOSITYDEBUG = $config['VERBOSITY_DEBUG'];
            unset($config['VERBOSITY_DEBUG']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['vERBOSITYQUIET'])) {
            $output['VERBOSITY_QUIET'] = $this->vERBOSITYQUIET;
        }
        if (isset($this->_usedProperties['vERBOSITYNORMAL'])) {
            $output['VERBOSITY_NORMAL'] = $this->vERBOSITYNORMAL;
        }
        if (isset($this->_usedProperties['vERBOSITYVERBOSE'])) {
            $output['VERBOSITY_VERBOSE'] = $this->vERBOSITYVERBOSE;
        }
        if (isset($this->_usedProperties['vERBOSITYVERYVERBOSE'])) {
            $output['VERBOSITY_VERY_VERBOSE'] = $this->vERBOSITYVERYVERBOSE;
        }
        if (isset($this->_usedProperties['vERBOSITYDEBUG'])) {
            $output['VERBOSITY_DEBUG'] = $this->vERBOSITYDEBUG;
        }

        return $output;
    }

}
