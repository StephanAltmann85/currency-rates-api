<?php

namespace Symfony\Config\ApiPlatform;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Collection'.\DIRECTORY_SEPARATOR.'PaginationConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CollectionConfig 
{
    private $existsParameterName;
    private $order;
    private $orderParameterName;
    private $orderNullsComparison;
    private $pagination;
    private $_usedProperties = [];

    /**
     * The name of the query parameter to filter on nullable field values.
     * @default 'exists'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function existsParameterName($value): static
    {
        $this->_usedProperties['existsParameterName'] = true;
        $this->existsParameterName = $value;

        return $this;
    }

    /**
     * The default order of results.
     * @default 'ASC'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function order($value): static
    {
        $this->_usedProperties['order'] = true;
        $this->order = $value;

        return $this;
    }

    /**
     * The name of the query parameter to order results.
     * @default 'order'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function orderParameterName($value): static
    {
        $this->_usedProperties['orderParameterName'] = true;
        $this->orderParameterName = $value;

        return $this;
    }

    /**
     * The nulls comparison strategy.
     * @default null
     * @param ParamConfigurator|'nulls_smallest'|'nulls_largest'|'nulls_always_first'|'nulls_always_last'|NULL $value
     * @return $this
     */
    public function orderNullsComparison($value): static
    {
        $this->_usedProperties['orderNullsComparison'] = true;
        $this->orderNullsComparison = $value;

        return $this;
    }

    /**
     * @template TValue of array|bool
     * @param TValue $value
     * @default {"enabled":true,"page_parameter_name":"page","enabled_parameter_name":"pagination","items_per_page_parameter_name":"itemsPerPage","partial_parameter_name":"partial"}
     * @return \Symfony\Config\ApiPlatform\Collection\PaginationConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\ApiPlatform\Collection\PaginationConfig : static)
     */
    public function pagination(array|bool $value = []): \Symfony\Config\ApiPlatform\Collection\PaginationConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['pagination'] = true;
            $this->pagination = $value;

            return $this;
        }

        if (!$this->pagination instanceof \Symfony\Config\ApiPlatform\Collection\PaginationConfig) {
            $this->_usedProperties['pagination'] = true;
            $this->pagination = new \Symfony\Config\ApiPlatform\Collection\PaginationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "pagination()" has already been initialized. You cannot pass values the second time you call pagination().');
        }

        return $this->pagination;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('exists_parameter_name', $config)) {
            $this->_usedProperties['existsParameterName'] = true;
            $this->existsParameterName = $config['exists_parameter_name'];
            unset($config['exists_parameter_name']);
        }

        if (array_key_exists('order', $config)) {
            $this->_usedProperties['order'] = true;
            $this->order = $config['order'];
            unset($config['order']);
        }

        if (array_key_exists('order_parameter_name', $config)) {
            $this->_usedProperties['orderParameterName'] = true;
            $this->orderParameterName = $config['order_parameter_name'];
            unset($config['order_parameter_name']);
        }

        if (array_key_exists('order_nulls_comparison', $config)) {
            $this->_usedProperties['orderNullsComparison'] = true;
            $this->orderNullsComparison = $config['order_nulls_comparison'];
            unset($config['order_nulls_comparison']);
        }

        if (array_key_exists('pagination', $config)) {
            $this->_usedProperties['pagination'] = true;
            $this->pagination = \is_array($config['pagination']) ? new \Symfony\Config\ApiPlatform\Collection\PaginationConfig($config['pagination']) : $config['pagination'];
            unset($config['pagination']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['existsParameterName'])) {
            $output['exists_parameter_name'] = $this->existsParameterName;
        }
        if (isset($this->_usedProperties['order'])) {
            $output['order'] = $this->order;
        }
        if (isset($this->_usedProperties['orderParameterName'])) {
            $output['order_parameter_name'] = $this->orderParameterName;
        }
        if (isset($this->_usedProperties['orderNullsComparison'])) {
            $output['order_nulls_comparison'] = $this->orderNullsComparison;
        }
        if (isset($this->_usedProperties['pagination'])) {
            $output['pagination'] = $this->pagination instanceof \Symfony\Config\ApiPlatform\Collection\PaginationConfig ? $this->pagination->toArray() : $this->pagination;
        }

        return $output;
    }

}
