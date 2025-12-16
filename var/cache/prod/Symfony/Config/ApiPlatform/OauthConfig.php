<?php

namespace Symfony\Config\ApiPlatform;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class OauthConfig 
{
    private $enabled;
    private $clientId;
    private $clientSecret;
    private $pkce;
    private $type;
    private $flow;
    private $tokenUrl;
    private $authorizationUrl;
    private $refreshUrl;
    private $scopes;
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

    /**
     * The oauth client id.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function clientId($value): static
    {
        $this->_usedProperties['clientId'] = true;
        $this->clientId = $value;

        return $this;
    }

    /**
     * The OAuth client secret. Never use this parameter in your production environment. It exposes crucial security information. This feature is intended for dev/test environments only. Enable "oauth.pkce" instead
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function clientSecret($value): static
    {
        $this->_usedProperties['clientSecret'] = true;
        $this->clientSecret = $value;

        return $this;
    }

    /**
     * Enable the oauth PKCE.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function pkce($value): static
    {
        $this->_usedProperties['pkce'] = true;
        $this->pkce = $value;

        return $this;
    }

    /**
     * The oauth type.
     * @default 'oauth2'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function type($value): static
    {
        $this->_usedProperties['type'] = true;
        $this->type = $value;

        return $this;
    }

    /**
     * The oauth flow grant type.
     * @default 'application'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function flow($value): static
    {
        $this->_usedProperties['flow'] = true;
        $this->flow = $value;

        return $this;
    }

    /**
     * The oauth token url.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function tokenUrl($value): static
    {
        $this->_usedProperties['tokenUrl'] = true;
        $this->tokenUrl = $value;

        return $this;
    }

    /**
     * The oauth authentication url.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function authorizationUrl($value): static
    {
        $this->_usedProperties['authorizationUrl'] = true;
        $this->authorizationUrl = $value;

        return $this;
    }

    /**
     * The oauth refresh url.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function refreshUrl($value): static
    {
        $this->_usedProperties['refreshUrl'] = true;
        $this->refreshUrl = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function scopes(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['scopes'] = true;
        $this->scopes = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('clientId', $config)) {
            $this->_usedProperties['clientId'] = true;
            $this->clientId = $config['clientId'];
            unset($config['clientId']);
        }

        if (array_key_exists('clientSecret', $config)) {
            $this->_usedProperties['clientSecret'] = true;
            $this->clientSecret = $config['clientSecret'];
            unset($config['clientSecret']);
        }

        if (array_key_exists('pkce', $config)) {
            $this->_usedProperties['pkce'] = true;
            $this->pkce = $config['pkce'];
            unset($config['pkce']);
        }

        if (array_key_exists('type', $config)) {
            $this->_usedProperties['type'] = true;
            $this->type = $config['type'];
            unset($config['type']);
        }

        if (array_key_exists('flow', $config)) {
            $this->_usedProperties['flow'] = true;
            $this->flow = $config['flow'];
            unset($config['flow']);
        }

        if (array_key_exists('tokenUrl', $config)) {
            $this->_usedProperties['tokenUrl'] = true;
            $this->tokenUrl = $config['tokenUrl'];
            unset($config['tokenUrl']);
        }

        if (array_key_exists('authorizationUrl', $config)) {
            $this->_usedProperties['authorizationUrl'] = true;
            $this->authorizationUrl = $config['authorizationUrl'];
            unset($config['authorizationUrl']);
        }

        if (array_key_exists('refreshUrl', $config)) {
            $this->_usedProperties['refreshUrl'] = true;
            $this->refreshUrl = $config['refreshUrl'];
            unset($config['refreshUrl']);
        }

        if (array_key_exists('scopes', $config)) {
            $this->_usedProperties['scopes'] = true;
            $this->scopes = $config['scopes'];
            unset($config['scopes']);
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
        if (isset($this->_usedProperties['clientId'])) {
            $output['clientId'] = $this->clientId;
        }
        if (isset($this->_usedProperties['clientSecret'])) {
            $output['clientSecret'] = $this->clientSecret;
        }
        if (isset($this->_usedProperties['pkce'])) {
            $output['pkce'] = $this->pkce;
        }
        if (isset($this->_usedProperties['type'])) {
            $output['type'] = $this->type;
        }
        if (isset($this->_usedProperties['flow'])) {
            $output['flow'] = $this->flow;
        }
        if (isset($this->_usedProperties['tokenUrl'])) {
            $output['tokenUrl'] = $this->tokenUrl;
        }
        if (isset($this->_usedProperties['authorizationUrl'])) {
            $output['authorizationUrl'] = $this->authorizationUrl;
        }
        if (isset($this->_usedProperties['refreshUrl'])) {
            $output['refreshUrl'] = $this->refreshUrl;
        }
        if (isset($this->_usedProperties['scopes'])) {
            $output['scopes'] = $this->scopes;
        }

        return $output;
    }

}
