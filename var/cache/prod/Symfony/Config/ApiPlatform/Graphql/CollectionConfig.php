<?php

namespace Symfony\Config\ApiPlatform\Graphql;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Collection'.\DIRECTORY_SEPARATOR.'PaginationConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CollectionConfig 
{
    private $pagination;
    private $_usedProperties = [];

    /**
     * @template TValue of array|bool
     * @param TValue $value
     * @default {"enabled":true}
     * @return \Symfony\Config\ApiPlatform\Graphql\Collection\PaginationConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\ApiPlatform\Graphql\Collection\PaginationConfig : static)
     */
    public function pagination(array|bool $value = []): \Symfony\Config\ApiPlatform\Graphql\Collection\PaginationConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['pagination'] = true;
            $this->pagination = $value;

            return $this;
        }

        if (!$this->pagination instanceof \Symfony\Config\ApiPlatform\Graphql\Collection\PaginationConfig) {
            $this->_usedProperties['pagination'] = true;
            $this->pagination = new \Symfony\Config\ApiPlatform\Graphql\Collection\PaginationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "pagination()" has already been initialized. You cannot pass values the second time you call pagination().');
        }

        return $this->pagination;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('pagination', $config)) {
            $this->_usedProperties['pagination'] = true;
            $this->pagination = \is_array($config['pagination']) ? new \Symfony\Config\ApiPlatform\Graphql\Collection\PaginationConfig($config['pagination']) : $config['pagination'];
            unset($config['pagination']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['pagination'])) {
            $output['pagination'] = $this->pagination instanceof \Symfony\Config\ApiPlatform\Graphql\Collection\PaginationConfig ? $this->pagination->toArray() : $this->pagination;
        }

        return $output;
    }

}
