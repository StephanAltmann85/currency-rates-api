<?php

namespace Symfony\Config\ApiPlatform;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ValidatorConfig 
{
    private $serializePayloadFields;
    private $queryParameterValidation;
    private $_usedProperties = [];

    /**
     * Set to null to serialize all payload fields when a validation error is thrown, or set the fields you want to include explicitly.
     * @default array (
     * )
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function serializePayloadFields(mixed $value = array (
    )): static
    {
        $this->_usedProperties['serializePayloadFields'] = true;
        $this->serializePayloadFields = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @deprecated Since api-platform/symfony 4.2: Will be removed in API Platform 5.0.
     * @return $this
     */
    public function queryParameterValidation($value): static
    {
        $this->_usedProperties['queryParameterValidation'] = true;
        $this->queryParameterValidation = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('serialize_payload_fields', $config)) {
            $this->_usedProperties['serializePayloadFields'] = true;
            $this->serializePayloadFields = $config['serialize_payload_fields'];
            unset($config['serialize_payload_fields']);
        }

        if (array_key_exists('query_parameter_validation', $config)) {
            $this->_usedProperties['queryParameterValidation'] = true;
            $this->queryParameterValidation = $config['query_parameter_validation'];
            unset($config['query_parameter_validation']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['serializePayloadFields'])) {
            $output['serialize_payload_fields'] = $this->serializePayloadFields;
        }
        if (isset($this->_usedProperties['queryParameterValidation'])) {
            $output['query_parameter_validation'] = $this->queryParameterValidation;
        }

        return $output;
    }

}
