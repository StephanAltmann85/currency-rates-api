<?php

namespace Symfony\Config\Doctrine;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Orm'.\DIRECTORY_SEPARATOR.'ControllerResolverConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Orm'.\DIRECTORY_SEPARATOR.'EntityManagerConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class OrmConfig 
{
    private $defaultEntityManager;
    private $enableNativeLazyObjects;
    private $controllerResolver;
    private $entityManagers;
    private $resolveTargetEntities;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultEntityManager($value): static
    {
        $this->_usedProperties['defaultEntityManager'] = true;
        $this->defaultEntityManager = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @deprecated Since doctrine/doctrine-bundle 3.1: The "enable_native_lazy_objects" option is deprecated and will be removed in DoctrineBundle 4.0, as native lazy objects are now always enabled.
     * @return $this
     */
    public function enableNativeLazyObjects($value): static
    {
        $this->_usedProperties['enableNativeLazyObjects'] = true;
        $this->enableNativeLazyObjects = $value;

        return $this;
    }

    /**
     * @template TValue of array|bool
     * @param TValue $value
     * @default {"enabled":true,"auto_mapping":false,"evict_cache":false}
     * @return \Symfony\Config\Doctrine\Orm\ControllerResolverConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Doctrine\Orm\ControllerResolverConfig : static)
     */
    public function controllerResolver(array|bool $value = []): \Symfony\Config\Doctrine\Orm\ControllerResolverConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['controllerResolver'] = true;
            $this->controllerResolver = $value;

            return $this;
        }

        if (!$this->controllerResolver instanceof \Symfony\Config\Doctrine\Orm\ControllerResolverConfig) {
            $this->_usedProperties['controllerResolver'] = true;
            $this->controllerResolver = new \Symfony\Config\Doctrine\Orm\ControllerResolverConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "controllerResolver()" has already been initialized. You cannot pass values the second time you call controllerResolver().');
        }

        return $this->controllerResolver;
    }

    public function entityManager(string $name, array $value = []): \Symfony\Config\Doctrine\Orm\EntityManagerConfig
    {
        if (!isset($this->entityManagers[$name])) {
            $this->_usedProperties['entityManagers'] = true;
            $this->entityManagers[$name] = new \Symfony\Config\Doctrine\Orm\EntityManagerConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "entityManager()" has already been initialized. You cannot pass values the second time you call entityManager().');
        }

        return $this->entityManagers[$name];
    }

    /**
     * @return $this
     */
    public function resolveTargetEntity(string $interface, mixed $value): static
    {
        $this->_usedProperties['resolveTargetEntities'] = true;
        $this->resolveTargetEntities[$interface] = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('default_entity_manager', $config)) {
            $this->_usedProperties['defaultEntityManager'] = true;
            $this->defaultEntityManager = $config['default_entity_manager'];
            unset($config['default_entity_manager']);
        }

        if (array_key_exists('enable_native_lazy_objects', $config)) {
            $this->_usedProperties['enableNativeLazyObjects'] = true;
            $this->enableNativeLazyObjects = $config['enable_native_lazy_objects'];
            unset($config['enable_native_lazy_objects']);
        }

        if (array_key_exists('controller_resolver', $config)) {
            $this->_usedProperties['controllerResolver'] = true;
            $this->controllerResolver = \is_array($config['controller_resolver']) ? new \Symfony\Config\Doctrine\Orm\ControllerResolverConfig($config['controller_resolver']) : $config['controller_resolver'];
            unset($config['controller_resolver']);
        }

        if (array_key_exists('entity_managers', $config)) {
            $this->_usedProperties['entityManagers'] = true;
            $this->entityManagers = array_map(fn ($v) => new \Symfony\Config\Doctrine\Orm\EntityManagerConfig($v), $config['entity_managers']);
            unset($config['entity_managers']);
        }

        if (array_key_exists('resolve_target_entities', $config)) {
            $this->_usedProperties['resolveTargetEntities'] = true;
            $this->resolveTargetEntities = $config['resolve_target_entities'];
            unset($config['resolve_target_entities']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['defaultEntityManager'])) {
            $output['default_entity_manager'] = $this->defaultEntityManager;
        }
        if (isset($this->_usedProperties['enableNativeLazyObjects'])) {
            $output['enable_native_lazy_objects'] = $this->enableNativeLazyObjects;
        }
        if (isset($this->_usedProperties['controllerResolver'])) {
            $output['controller_resolver'] = $this->controllerResolver instanceof \Symfony\Config\Doctrine\Orm\ControllerResolverConfig ? $this->controllerResolver->toArray() : $this->controllerResolver;
        }
        if (isset($this->_usedProperties['entityManagers'])) {
            $output['entity_managers'] = array_map(fn ($v) => $v->toArray(), $this->entityManagers);
        }
        if (isset($this->_usedProperties['resolveTargetEntities'])) {
            $output['resolve_target_entities'] = $this->resolveTargetEntities;
        }

        return $output;
    }

}
