<?php

namespace Symfony\Config\ApiPlatform;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FormatsConfig 
{
    private $mimeTypes;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function mimeTypes(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['mimeTypes'] = true;
        $this->mimeTypes = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('mime_types', $config)) {
            $this->_usedProperties['mimeTypes'] = true;
            $this->mimeTypes = $config['mime_types'];
            unset($config['mime_types']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['mimeTypes'])) {
            $output['mime_types'] = $this->mimeTypes;
        }

        return $output;
    }

}
