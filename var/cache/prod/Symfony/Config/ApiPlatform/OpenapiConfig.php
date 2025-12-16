<?php

namespace Symfony\Config\ApiPlatform;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Openapi'.\DIRECTORY_SEPARATOR.'ContactConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Openapi'.\DIRECTORY_SEPARATOR.'TagsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Openapi'.\DIRECTORY_SEPARATOR.'LicenseConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class OpenapiConfig 
{
    private $contact;
    private $termsOfService;
    private $tags;
    private $license;
    private $swaggerUiExtraConfiguration;
    private $overrideResponses;
    private $errorResourceClass;
    private $validationErrorResourceClass;
    private $_usedProperties = [];

    /**
     * @default {"name":null,"url":null,"email":null}
     */
    public function contact(array $value = []): \Symfony\Config\ApiPlatform\Openapi\ContactConfig
    {
        if (null === $this->contact) {
            $this->_usedProperties['contact'] = true;
            $this->contact = new \Symfony\Config\ApiPlatform\Openapi\ContactConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "contact()" has already been initialized. You cannot pass values the second time you call contact().');
        }

        return $this->contact;
    }

    /**
     * A URL to the Terms of Service for the API. MUST be in the format of a URL.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function termsOfService($value): static
    {
        $this->_usedProperties['termsOfService'] = true;
        $this->termsOfService = $value;

        return $this;
    }

    /**
     * Global OpenApi tags overriding the default computed tags if specified.
     */
    public function tags(array $value = []): \Symfony\Config\ApiPlatform\Openapi\TagsConfig
    {
        $this->_usedProperties['tags'] = true;

        return $this->tags[] = new \Symfony\Config\ApiPlatform\Openapi\TagsConfig($value);
    }

    /**
     * @default {"name":null,"url":null,"identifier":null}
     */
    public function license(array $value = []): \Symfony\Config\ApiPlatform\Openapi\LicenseConfig
    {
        if (null === $this->license) {
            $this->_usedProperties['license'] = true;
            $this->license = new \Symfony\Config\ApiPlatform\Openapi\LicenseConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "license()" has already been initialized. You cannot pass values the second time you call license().');
        }

        return $this->license;
    }

    /**
     * To pass extra configuration to Swagger UI, like docExpansion or filter.
     * @default array (
     * )
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function swaggerUiExtraConfiguration(mixed $value = array (
    )): static
    {
        $this->_usedProperties['swaggerUiExtraConfiguration'] = true;
        $this->swaggerUiExtraConfiguration = $value;

        return $this;
    }

    /**
     * Whether API Platform adds automatic responses to the OpenAPI documentation.
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function overrideResponses($value): static
    {
        $this->_usedProperties['overrideResponses'] = true;
        $this->overrideResponses = $value;

        return $this;
    }

    /**
     * The class used to represent errors in the OpenAPI documentation.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function errorResourceClass($value): static
    {
        $this->_usedProperties['errorResourceClass'] = true;
        $this->errorResourceClass = $value;

        return $this;
    }

    /**
     * The class used to represent validation errors in the OpenAPI documentation.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function validationErrorResourceClass($value): static
    {
        $this->_usedProperties['validationErrorResourceClass'] = true;
        $this->validationErrorResourceClass = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('contact', $config)) {
            $this->_usedProperties['contact'] = true;
            $this->contact = new \Symfony\Config\ApiPlatform\Openapi\ContactConfig($config['contact']);
            unset($config['contact']);
        }

        if (array_key_exists('termsOfService', $config)) {
            $this->_usedProperties['termsOfService'] = true;
            $this->termsOfService = $config['termsOfService'];
            unset($config['termsOfService']);
        }

        if (array_key_exists('tags', $config)) {
            $this->_usedProperties['tags'] = true;
            $this->tags = array_map(fn ($v) => new \Symfony\Config\ApiPlatform\Openapi\TagsConfig($v), $config['tags']);
            unset($config['tags']);
        }

        if (array_key_exists('license', $config)) {
            $this->_usedProperties['license'] = true;
            $this->license = new \Symfony\Config\ApiPlatform\Openapi\LicenseConfig($config['license']);
            unset($config['license']);
        }

        if (array_key_exists('swagger_ui_extra_configuration', $config)) {
            $this->_usedProperties['swaggerUiExtraConfiguration'] = true;
            $this->swaggerUiExtraConfiguration = $config['swagger_ui_extra_configuration'];
            unset($config['swagger_ui_extra_configuration']);
        }

        if (array_key_exists('overrideResponses', $config)) {
            $this->_usedProperties['overrideResponses'] = true;
            $this->overrideResponses = $config['overrideResponses'];
            unset($config['overrideResponses']);
        }

        if (array_key_exists('error_resource_class', $config)) {
            $this->_usedProperties['errorResourceClass'] = true;
            $this->errorResourceClass = $config['error_resource_class'];
            unset($config['error_resource_class']);
        }

        if (array_key_exists('validation_error_resource_class', $config)) {
            $this->_usedProperties['validationErrorResourceClass'] = true;
            $this->validationErrorResourceClass = $config['validation_error_resource_class'];
            unset($config['validation_error_resource_class']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['contact'])) {
            $output['contact'] = $this->contact->toArray();
        }
        if (isset($this->_usedProperties['termsOfService'])) {
            $output['termsOfService'] = $this->termsOfService;
        }
        if (isset($this->_usedProperties['tags'])) {
            $output['tags'] = array_map(fn ($v) => $v->toArray(), $this->tags);
        }
        if (isset($this->_usedProperties['license'])) {
            $output['license'] = $this->license->toArray();
        }
        if (isset($this->_usedProperties['swaggerUiExtraConfiguration'])) {
            $output['swagger_ui_extra_configuration'] = $this->swaggerUiExtraConfiguration;
        }
        if (isset($this->_usedProperties['overrideResponses'])) {
            $output['overrideResponses'] = $this->overrideResponses;
        }
        if (isset($this->_usedProperties['errorResourceClass'])) {
            $output['error_resource_class'] = $this->errorResourceClass;
        }
        if (isset($this->_usedProperties['validationErrorResourceClass'])) {
            $output['validation_error_resource_class'] = $this->validationErrorResourceClass;
        }

        return $output;
    }

}
