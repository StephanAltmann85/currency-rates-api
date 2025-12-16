<?php

namespace Symfony\Config\Monolog;

require_once __DIR__.\DIRECTORY_SEPARATOR.'HandlerConfig'.\DIRECTORY_SEPARATOR.'ProcessPsr3MessagesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'HandlerConfig'.\DIRECTORY_SEPARATOR.'ExcludedHttpCodeConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'HandlerConfig'.\DIRECTORY_SEPARATOR.'PublisherConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'HandlerConfig'.\DIRECTORY_SEPARATOR.'MongodbConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'HandlerConfig'.\DIRECTORY_SEPARATOR.'ElasticsearchConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'HandlerConfig'.\DIRECTORY_SEPARATOR.'RedisConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'HandlerConfig'.\DIRECTORY_SEPARATOR.'PredisConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'HandlerConfig'.\DIRECTORY_SEPARATOR.'EmailPrototypeConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'HandlerConfig'.\DIRECTORY_SEPARATOR.'VerbosityLevelsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'HandlerConfig'.\DIRECTORY_SEPARATOR.'ChannelsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class HandlerConfig 
{
    private $type;
    private $id;
    private $enabled;
    private $priority;
    private $level;
    private $bubble;
    private $interactiveOnly;
    private $appName;
    private $includeStacktraces;
    private $processPsr3Messages;
    private $path;
    private $filePermission;
    private $useLocking;
    private $filenameFormat;
    private $dateFormat;
    private $ident;
    private $logopts;
    private $facility;
    private $maxFiles;
    private $actionLevel;
    private $activationStrategy;
    private $stopBuffering;
    private $passthruLevel;
    private $excludedHttpCodes;
    private $acceptedLevels;
    private $minLevel;
    private $maxLevel;
    private $bufferSize;
    private $flushOnOverflow;
    private $handler;
    private $url;
    private $exchange;
    private $exchangeName;
    private $channel;
    private $botName;
    private $useAttachment;
    private $useShortAttachment;
    private $includeExtra;
    private $iconEmoji;
    private $webhookUrl;
    private $excludeFields;
    private $token;
    private $region;
    private $source;
    private $useSsl;
    private $user;
    private $title;
    private $host;
    private $port;
    private $config;
    private $members;
    private $connectionString;
    private $timeout;
    private $time;
    private $deduplicationLevel;
    private $store;
    private $connectionTimeout;
    private $persistent;
    private $messageType;
    private $parseMode;
    private $disableWebpagePreview;
    private $disableNotification;
    private $splitLongMessages;
    private $delayBetweenMessages;
    private $topic;
    private $factor;
    private $tags;
    private $consoleFormatterOptions;
    private $formatter;
    private $nested;
    private $publisher;
    private $mongodb;
    private $elasticsearch;
    private $index;
    private $documentType;
    private $ignoreError;
    private $redis;
    private $predis;
    private $fromEmail;
    private $toEmail;
    private $subject;
    private $contentType;
    private $headers;
    private $mailer;
    private $emailPrototype;
    private $verbosityLevels;
    private $channels;
    private $_usedProperties = [];

    /**
     * @default null
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
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function id($value): static
    {
        $this->_usedProperties['id'] = true;
        $this->id = $value;

        return $this;
    }

    /**
     * @default true
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
     * @default 0
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function priority($value): static
    {
        $this->_usedProperties['priority'] = true;
        $this->priority = $value;

        return $this;
    }

    /**
     * @default 'DEBUG'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function level($value): static
    {
        $this->_usedProperties['level'] = true;
        $this->level = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function bubble($value): static
    {
        $this->_usedProperties['bubble'] = true;
        $this->bubble = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function interactiveOnly($value): static
    {
        $this->_usedProperties['interactiveOnly'] = true;
        $this->interactiveOnly = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function appName($value): static
    {
        $this->_usedProperties['appName'] = true;
        $this->appName = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function includeStacktraces($value): static
    {
        $this->_usedProperties['includeStacktraces'] = true;
        $this->includeStacktraces = $value;

        return $this;
    }

    /**
     * @template TValue of mixed
     * @param TValue $value
     * @default {"enabled":null}
     * @return \Symfony\Config\Monolog\HandlerConfig\ProcessPsr3MessagesConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Monolog\HandlerConfig\ProcessPsr3MessagesConfig : static)
     */
    public function processPsr3Messages(mixed $value = []): \Symfony\Config\Monolog\HandlerConfig\ProcessPsr3MessagesConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['processPsr3Messages'] = true;
            $this->processPsr3Messages = $value;

            return $this;
        }

        if (!$this->processPsr3Messages instanceof \Symfony\Config\Monolog\HandlerConfig\ProcessPsr3MessagesConfig) {
            $this->_usedProperties['processPsr3Messages'] = true;
            $this->processPsr3Messages = new \Symfony\Config\Monolog\HandlerConfig\ProcessPsr3MessagesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "processPsr3Messages()" has already been initialized. You cannot pass values the second time you call processPsr3Messages().');
        }

        return $this->processPsr3Messages;
    }

    /**
     * @default '%kernel.logs_dir%/%kernel.environment%.log'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function path($value): static
    {
        $this->_usedProperties['path'] = true;
        $this->path = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function filePermission($value): static
    {
        $this->_usedProperties['filePermission'] = true;
        $this->filePermission = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function useLocking($value): static
    {
        $this->_usedProperties['useLocking'] = true;
        $this->useLocking = $value;

        return $this;
    }

    /**
     * @default '{filename}-{date}'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function filenameFormat($value): static
    {
        $this->_usedProperties['filenameFormat'] = true;
        $this->filenameFormat = $value;

        return $this;
    }

    /**
     * @default 'Y-m-d'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function dateFormat($value): static
    {
        $this->_usedProperties['dateFormat'] = true;
        $this->dateFormat = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function ident($value): static
    {
        $this->_usedProperties['ident'] = true;
        $this->ident = $value;

        return $this;
    }

    /**
     * @default 1
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function logopts($value): static
    {
        $this->_usedProperties['logopts'] = true;
        $this->logopts = $value;

        return $this;
    }

    /**
     * @default 'user'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function facility($value): static
    {
        $this->_usedProperties['facility'] = true;
        $this->facility = $value;

        return $this;
    }

    /**
     * @default 0
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function maxFiles($value): static
    {
        $this->_usedProperties['maxFiles'] = true;
        $this->maxFiles = $value;

        return $this;
    }

    /**
     * @default 'WARNING'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function actionLevel($value): static
    {
        $this->_usedProperties['actionLevel'] = true;
        $this->actionLevel = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function activationStrategy($value): static
    {
        $this->_usedProperties['activationStrategy'] = true;
        $this->activationStrategy = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function stopBuffering($value): static
    {
        $this->_usedProperties['stopBuffering'] = true;
        $this->stopBuffering = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function passthruLevel($value): static
    {
        $this->_usedProperties['passthruLevel'] = true;
        $this->passthruLevel = $value;

        return $this;
    }

    /**
     * @template TValue of mixed
     * @param TValue $value
     * Only for "fingers_crossed" handler type
     * @example 403
     * @example 404
     * @example {"400":["^\/foo","^\/bar"]}
     * @return \Symfony\Config\Monolog\HandlerConfig\ExcludedHttpCodeConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Monolog\HandlerConfig\ExcludedHttpCodeConfig : static)
     */
    public function excludedHttpCode(mixed $value = []): \Symfony\Config\Monolog\HandlerConfig\ExcludedHttpCodeConfig|static
    {
        $this->_usedProperties['excludedHttpCodes'] = true;
        if (!\is_array($value)) {
            $this->excludedHttpCodes[] = $value;

            return $this;
        }

        return $this->excludedHttpCodes[] = new \Symfony\Config\Monolog\HandlerConfig\ExcludedHttpCodeConfig($value);
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function acceptedLevels(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['acceptedLevels'] = true;
        $this->acceptedLevels = $value;

        return $this;
    }

    /**
     * @default 'DEBUG'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function minLevel($value): static
    {
        $this->_usedProperties['minLevel'] = true;
        $this->minLevel = $value;

        return $this;
    }

    /**
     * @default 'EMERGENCY'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function maxLevel($value): static
    {
        $this->_usedProperties['maxLevel'] = true;
        $this->maxLevel = $value;

        return $this;
    }

    /**
     * @default 0
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function bufferSize($value): static
    {
        $this->_usedProperties['bufferSize'] = true;
        $this->bufferSize = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function flushOnOverflow($value): static
    {
        $this->_usedProperties['flushOnOverflow'] = true;
        $this->flushOnOverflow = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function handler($value): static
    {
        $this->_usedProperties['handler'] = true;
        $this->handler = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function url($value): static
    {
        $this->_usedProperties['url'] = true;
        $this->url = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function exchange($value): static
    {
        $this->_usedProperties['exchange'] = true;
        $this->exchange = $value;

        return $this;
    }

    /**
     * @default 'log'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function exchangeName($value): static
    {
        $this->_usedProperties['exchangeName'] = true;
        $this->exchangeName = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function channel($value): static
    {
        $this->_usedProperties['channel'] = true;
        $this->channel = $value;

        return $this;
    }

    /**
     * @default 'Monolog'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function botName($value): static
    {
        $this->_usedProperties['botName'] = true;
        $this->botName = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function useAttachment($value): static
    {
        $this->_usedProperties['useAttachment'] = true;
        $this->useAttachment = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function useShortAttachment($value): static
    {
        $this->_usedProperties['useShortAttachment'] = true;
        $this->useShortAttachment = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function includeExtra($value): static
    {
        $this->_usedProperties['includeExtra'] = true;
        $this->includeExtra = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function iconEmoji($value): static
    {
        $this->_usedProperties['iconEmoji'] = true;
        $this->iconEmoji = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function webhookUrl($value): static
    {
        $this->_usedProperties['webhookUrl'] = true;
        $this->webhookUrl = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function excludeFields(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['excludeFields'] = true;
        $this->excludeFields = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function token($value): static
    {
        $this->_usedProperties['token'] = true;
        $this->token = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function region($value): static
    {
        $this->_usedProperties['region'] = true;
        $this->region = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function source($value): static
    {
        $this->_usedProperties['source'] = true;
        $this->source = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function useSsl($value): static
    {
        $this->_usedProperties['useSsl'] = true;
        $this->useSsl = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function user(mixed $value): static
    {
        $this->_usedProperties['user'] = true;
        $this->user = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function title($value): static
    {
        $this->_usedProperties['title'] = true;
        $this->title = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function host($value): static
    {
        $this->_usedProperties['host'] = true;
        $this->host = $value;

        return $this;
    }

    /**
     * @default 514
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function port($value): static
    {
        $this->_usedProperties['port'] = true;
        $this->port = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function config(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['config'] = true;
        $this->config = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function members(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['members'] = true;
        $this->members = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function connectionString($value): static
    {
        $this->_usedProperties['connectionString'] = true;
        $this->connectionString = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function timeout($value): static
    {
        $this->_usedProperties['timeout'] = true;
        $this->timeout = $value;

        return $this;
    }

    /**
     * @default 60
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function time($value): static
    {
        $this->_usedProperties['time'] = true;
        $this->time = $value;

        return $this;
    }

    /**
     * @default 400
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function deduplicationLevel($value): static
    {
        $this->_usedProperties['deduplicationLevel'] = true;
        $this->deduplicationLevel = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function store($value): static
    {
        $this->_usedProperties['store'] = true;
        $this->store = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function connectionTimeout($value): static
    {
        $this->_usedProperties['connectionTimeout'] = true;
        $this->connectionTimeout = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function persistent($value): static
    {
        $this->_usedProperties['persistent'] = true;
        $this->persistent = $value;

        return $this;
    }

    /**
     * @default 0
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function messageType($value): static
    {
        $this->_usedProperties['messageType'] = true;
        $this->messageType = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function parseMode($value): static
    {
        $this->_usedProperties['parseMode'] = true;
        $this->parseMode = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function disableWebpagePreview($value): static
    {
        $this->_usedProperties['disableWebpagePreview'] = true;
        $this->disableWebpagePreview = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function disableNotification($value): static
    {
        $this->_usedProperties['disableNotification'] = true;
        $this->disableNotification = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function splitLongMessages($value): static
    {
        $this->_usedProperties['splitLongMessages'] = true;
        $this->splitLongMessages = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function delayBetweenMessages($value): static
    {
        $this->_usedProperties['delayBetweenMessages'] = true;
        $this->delayBetweenMessages = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function topic($value): static
    {
        $this->_usedProperties['topic'] = true;
        $this->topic = $value;

        return $this;
    }

    /**
     * @default 1
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function factor($value): static
    {
        $this->_usedProperties['factor'] = true;
        $this->factor = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed>|string $value
     *
     * @return $this
     */
    public function tags(ParamConfigurator|string|array $value): static
    {
        $this->_usedProperties['tags'] = true;
        $this->tags = $value;

        return $this;
    }

    /**
     * @default array (
     * )
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function consoleFormatterOptions(mixed $value = array (
    )): static
    {
        $this->_usedProperties['consoleFormatterOptions'] = true;
        $this->consoleFormatterOptions = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function formatter($value): static
    {
        $this->_usedProperties['formatter'] = true;
        $this->formatter = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function nested($value): static
    {
        $this->_usedProperties['nested'] = true;
        $this->nested = $value;

        return $this;
    }

    /**
     * @template TValue of string|array
     * @param TValue $value
     * @return \Symfony\Config\Monolog\HandlerConfig\PublisherConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Monolog\HandlerConfig\PublisherConfig : static)
     */
    public function publisher(string|array $value = []): \Symfony\Config\Monolog\HandlerConfig\PublisherConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['publisher'] = true;
            $this->publisher = $value;

            return $this;
        }

        if (!$this->publisher instanceof \Symfony\Config\Monolog\HandlerConfig\PublisherConfig) {
            $this->_usedProperties['publisher'] = true;
            $this->publisher = new \Symfony\Config\Monolog\HandlerConfig\PublisherConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "publisher()" has already been initialized. You cannot pass values the second time you call publisher().');
        }

        return $this->publisher;
    }

    /**
     * @template TValue of string|array
     * @param TValue $value
     * @return \Symfony\Config\Monolog\HandlerConfig\MongodbConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Monolog\HandlerConfig\MongodbConfig : static)
     */
    public function mongodb(string|array $value = []): \Symfony\Config\Monolog\HandlerConfig\MongodbConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['mongodb'] = true;
            $this->mongodb = $value;

            return $this;
        }

        if (!$this->mongodb instanceof \Symfony\Config\Monolog\HandlerConfig\MongodbConfig) {
            $this->_usedProperties['mongodb'] = true;
            $this->mongodb = new \Symfony\Config\Monolog\HandlerConfig\MongodbConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "mongodb()" has already been initialized. You cannot pass values the second time you call mongodb().');
        }

        return $this->mongodb;
    }

    /**
     * @template TValue of string|array
     * @param TValue $value
     * @return \Symfony\Config\Monolog\HandlerConfig\ElasticsearchConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Monolog\HandlerConfig\ElasticsearchConfig : static)
     */
    public function elasticsearch(string|array $value = []): \Symfony\Config\Monolog\HandlerConfig\ElasticsearchConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['elasticsearch'] = true;
            $this->elasticsearch = $value;

            return $this;
        }

        if (!$this->elasticsearch instanceof \Symfony\Config\Monolog\HandlerConfig\ElasticsearchConfig) {
            $this->_usedProperties['elasticsearch'] = true;
            $this->elasticsearch = new \Symfony\Config\Monolog\HandlerConfig\ElasticsearchConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "elasticsearch()" has already been initialized. You cannot pass values the second time you call elasticsearch().');
        }

        return $this->elasticsearch;
    }

    /**
     * @default 'monolog'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function index($value): static
    {
        $this->_usedProperties['index'] = true;
        $this->index = $value;

        return $this;
    }

    /**
     * @default 'logs'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function documentType($value): static
    {
        $this->_usedProperties['documentType'] = true;
        $this->documentType = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function ignoreError($value): static
    {
        $this->_usedProperties['ignoreError'] = true;
        $this->ignoreError = $value;

        return $this;
    }

    /**
     * @template TValue of string|array
     * @param TValue $value
     * @return \Symfony\Config\Monolog\HandlerConfig\RedisConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Monolog\HandlerConfig\RedisConfig : static)
     */
    public function redis(string|array $value = []): \Symfony\Config\Monolog\HandlerConfig\RedisConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['redis'] = true;
            $this->redis = $value;

            return $this;
        }

        if (!$this->redis instanceof \Symfony\Config\Monolog\HandlerConfig\RedisConfig) {
            $this->_usedProperties['redis'] = true;
            $this->redis = new \Symfony\Config\Monolog\HandlerConfig\RedisConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "redis()" has already been initialized. You cannot pass values the second time you call redis().');
        }

        return $this->redis;
    }

    /**
     * @template TValue of string|array
     * @param TValue $value
     * @return \Symfony\Config\Monolog\HandlerConfig\PredisConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Monolog\HandlerConfig\PredisConfig : static)
     */
    public function predis(string|array $value = []): \Symfony\Config\Monolog\HandlerConfig\PredisConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['predis'] = true;
            $this->predis = $value;

            return $this;
        }

        if (!$this->predis instanceof \Symfony\Config\Monolog\HandlerConfig\PredisConfig) {
            $this->_usedProperties['predis'] = true;
            $this->predis = new \Symfony\Config\Monolog\HandlerConfig\PredisConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "predis()" has already been initialized. You cannot pass values the second time you call predis().');
        }

        return $this->predis;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function fromEmail($value): static
    {
        $this->_usedProperties['fromEmail'] = true;
        $this->fromEmail = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed>|string $value
     *
     * @return $this
     */
    public function toEmail(ParamConfigurator|string|array $value): static
    {
        $this->_usedProperties['toEmail'] = true;
        $this->toEmail = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function subject($value): static
    {
        $this->_usedProperties['subject'] = true;
        $this->subject = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function contentType($value): static
    {
        $this->_usedProperties['contentType'] = true;
        $this->contentType = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function headers(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['headers'] = true;
        $this->headers = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function mailer($value): static
    {
        $this->_usedProperties['mailer'] = true;
        $this->mailer = $value;

        return $this;
    }

    /**
     * @template TValue of string|array
     * @param TValue $value
     * @return \Symfony\Config\Monolog\HandlerConfig\EmailPrototypeConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Monolog\HandlerConfig\EmailPrototypeConfig : static)
     */
    public function emailPrototype(string|array $value = []): \Symfony\Config\Monolog\HandlerConfig\EmailPrototypeConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['emailPrototype'] = true;
            $this->emailPrototype = $value;

            return $this;
        }

        if (!$this->emailPrototype instanceof \Symfony\Config\Monolog\HandlerConfig\EmailPrototypeConfig) {
            $this->_usedProperties['emailPrototype'] = true;
            $this->emailPrototype = new \Symfony\Config\Monolog\HandlerConfig\EmailPrototypeConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "emailPrototype()" has already been initialized. You cannot pass values the second time you call emailPrototype().');
        }

        return $this->emailPrototype;
    }

    public function verbosityLevels(array $value = []): \Symfony\Config\Monolog\HandlerConfig\VerbosityLevelsConfig
    {
        if (null === $this->verbosityLevels) {
            $this->_usedProperties['verbosityLevels'] = true;
            $this->verbosityLevels = new \Symfony\Config\Monolog\HandlerConfig\VerbosityLevelsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "verbosityLevels()" has already been initialized. You cannot pass values the second time you call verbosityLevels().');
        }

        return $this->verbosityLevels;
    }

    /**
     * @template TValue of mixed
     * @param TValue $value
     * @return \Symfony\Config\Monolog\HandlerConfig\ChannelsConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\Monolog\HandlerConfig\ChannelsConfig : static)
     */
    public function channels(mixed $value = []): \Symfony\Config\Monolog\HandlerConfig\ChannelsConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['channels'] = true;
            $this->channels = $value;

            return $this;
        }

        if (!$this->channels instanceof \Symfony\Config\Monolog\HandlerConfig\ChannelsConfig) {
            $this->_usedProperties['channels'] = true;
            $this->channels = new \Symfony\Config\Monolog\HandlerConfig\ChannelsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "channels()" has already been initialized. You cannot pass values the second time you call channels().');
        }

        return $this->channels;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('type', $config)) {
            $this->_usedProperties['type'] = true;
            $this->type = $config['type'];
            unset($config['type']);
        }

        if (array_key_exists('id', $config)) {
            $this->_usedProperties['id'] = true;
            $this->id = $config['id'];
            unset($config['id']);
        }

        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('priority', $config)) {
            $this->_usedProperties['priority'] = true;
            $this->priority = $config['priority'];
            unset($config['priority']);
        }

        if (array_key_exists('level', $config)) {
            $this->_usedProperties['level'] = true;
            $this->level = $config['level'];
            unset($config['level']);
        }

        if (array_key_exists('bubble', $config)) {
            $this->_usedProperties['bubble'] = true;
            $this->bubble = $config['bubble'];
            unset($config['bubble']);
        }

        if (array_key_exists('interactive_only', $config)) {
            $this->_usedProperties['interactiveOnly'] = true;
            $this->interactiveOnly = $config['interactive_only'];
            unset($config['interactive_only']);
        }

        if (array_key_exists('app_name', $config)) {
            $this->_usedProperties['appName'] = true;
            $this->appName = $config['app_name'];
            unset($config['app_name']);
        }

        if (array_key_exists('include_stacktraces', $config)) {
            $this->_usedProperties['includeStacktraces'] = true;
            $this->includeStacktraces = $config['include_stacktraces'];
            unset($config['include_stacktraces']);
        }

        if (array_key_exists('process_psr_3_messages', $config)) {
            $this->_usedProperties['processPsr3Messages'] = true;
            $this->processPsr3Messages = \is_array($config['process_psr_3_messages']) ? new \Symfony\Config\Monolog\HandlerConfig\ProcessPsr3MessagesConfig($config['process_psr_3_messages']) : $config['process_psr_3_messages'];
            unset($config['process_psr_3_messages']);
        }

        if (array_key_exists('path', $config)) {
            $this->_usedProperties['path'] = true;
            $this->path = $config['path'];
            unset($config['path']);
        }

        if (array_key_exists('file_permission', $config)) {
            $this->_usedProperties['filePermission'] = true;
            $this->filePermission = $config['file_permission'];
            unset($config['file_permission']);
        }

        if (array_key_exists('use_locking', $config)) {
            $this->_usedProperties['useLocking'] = true;
            $this->useLocking = $config['use_locking'];
            unset($config['use_locking']);
        }

        if (array_key_exists('filename_format', $config)) {
            $this->_usedProperties['filenameFormat'] = true;
            $this->filenameFormat = $config['filename_format'];
            unset($config['filename_format']);
        }

        if (array_key_exists('date_format', $config)) {
            $this->_usedProperties['dateFormat'] = true;
            $this->dateFormat = $config['date_format'];
            unset($config['date_format']);
        }

        if (array_key_exists('ident', $config)) {
            $this->_usedProperties['ident'] = true;
            $this->ident = $config['ident'];
            unset($config['ident']);
        }

        if (array_key_exists('logopts', $config)) {
            $this->_usedProperties['logopts'] = true;
            $this->logopts = $config['logopts'];
            unset($config['logopts']);
        }

        if (array_key_exists('facility', $config)) {
            $this->_usedProperties['facility'] = true;
            $this->facility = $config['facility'];
            unset($config['facility']);
        }

        if (array_key_exists('max_files', $config)) {
            $this->_usedProperties['maxFiles'] = true;
            $this->maxFiles = $config['max_files'];
            unset($config['max_files']);
        }

        if (array_key_exists('action_level', $config)) {
            $this->_usedProperties['actionLevel'] = true;
            $this->actionLevel = $config['action_level'];
            unset($config['action_level']);
        }

        if (array_key_exists('activation_strategy', $config)) {
            $this->_usedProperties['activationStrategy'] = true;
            $this->activationStrategy = $config['activation_strategy'];
            unset($config['activation_strategy']);
        }

        if (array_key_exists('stop_buffering', $config)) {
            $this->_usedProperties['stopBuffering'] = true;
            $this->stopBuffering = $config['stop_buffering'];
            unset($config['stop_buffering']);
        }

        if (array_key_exists('passthru_level', $config)) {
            $this->_usedProperties['passthruLevel'] = true;
            $this->passthruLevel = $config['passthru_level'];
            unset($config['passthru_level']);
        }

        if (array_key_exists('excluded_http_codes', $config)) {
            $this->_usedProperties['excludedHttpCodes'] = true;
            $this->excludedHttpCodes = array_map(fn ($v) => \is_array($v) ? new \Symfony\Config\Monolog\HandlerConfig\ExcludedHttpCodeConfig($v) : $v, $config['excluded_http_codes']);
            unset($config['excluded_http_codes']);
        }

        if (array_key_exists('accepted_levels', $config)) {
            $this->_usedProperties['acceptedLevels'] = true;
            $this->acceptedLevels = $config['accepted_levels'];
            unset($config['accepted_levels']);
        }

        if (array_key_exists('min_level', $config)) {
            $this->_usedProperties['minLevel'] = true;
            $this->minLevel = $config['min_level'];
            unset($config['min_level']);
        }

        if (array_key_exists('max_level', $config)) {
            $this->_usedProperties['maxLevel'] = true;
            $this->maxLevel = $config['max_level'];
            unset($config['max_level']);
        }

        if (array_key_exists('buffer_size', $config)) {
            $this->_usedProperties['bufferSize'] = true;
            $this->bufferSize = $config['buffer_size'];
            unset($config['buffer_size']);
        }

        if (array_key_exists('flush_on_overflow', $config)) {
            $this->_usedProperties['flushOnOverflow'] = true;
            $this->flushOnOverflow = $config['flush_on_overflow'];
            unset($config['flush_on_overflow']);
        }

        if (array_key_exists('handler', $config)) {
            $this->_usedProperties['handler'] = true;
            $this->handler = $config['handler'];
            unset($config['handler']);
        }

        if (array_key_exists('url', $config)) {
            $this->_usedProperties['url'] = true;
            $this->url = $config['url'];
            unset($config['url']);
        }

        if (array_key_exists('exchange', $config)) {
            $this->_usedProperties['exchange'] = true;
            $this->exchange = $config['exchange'];
            unset($config['exchange']);
        }

        if (array_key_exists('exchange_name', $config)) {
            $this->_usedProperties['exchangeName'] = true;
            $this->exchangeName = $config['exchange_name'];
            unset($config['exchange_name']);
        }

        if (array_key_exists('channel', $config)) {
            $this->_usedProperties['channel'] = true;
            $this->channel = $config['channel'];
            unset($config['channel']);
        }

        if (array_key_exists('bot_name', $config)) {
            $this->_usedProperties['botName'] = true;
            $this->botName = $config['bot_name'];
            unset($config['bot_name']);
        }

        if (array_key_exists('use_attachment', $config)) {
            $this->_usedProperties['useAttachment'] = true;
            $this->useAttachment = $config['use_attachment'];
            unset($config['use_attachment']);
        }

        if (array_key_exists('use_short_attachment', $config)) {
            $this->_usedProperties['useShortAttachment'] = true;
            $this->useShortAttachment = $config['use_short_attachment'];
            unset($config['use_short_attachment']);
        }

        if (array_key_exists('include_extra', $config)) {
            $this->_usedProperties['includeExtra'] = true;
            $this->includeExtra = $config['include_extra'];
            unset($config['include_extra']);
        }

        if (array_key_exists('icon_emoji', $config)) {
            $this->_usedProperties['iconEmoji'] = true;
            $this->iconEmoji = $config['icon_emoji'];
            unset($config['icon_emoji']);
        }

        if (array_key_exists('webhook_url', $config)) {
            $this->_usedProperties['webhookUrl'] = true;
            $this->webhookUrl = $config['webhook_url'];
            unset($config['webhook_url']);
        }

        if (array_key_exists('exclude_fields', $config)) {
            $this->_usedProperties['excludeFields'] = true;
            $this->excludeFields = $config['exclude_fields'];
            unset($config['exclude_fields']);
        }

        if (array_key_exists('token', $config)) {
            $this->_usedProperties['token'] = true;
            $this->token = $config['token'];
            unset($config['token']);
        }

        if (array_key_exists('region', $config)) {
            $this->_usedProperties['region'] = true;
            $this->region = $config['region'];
            unset($config['region']);
        }

        if (array_key_exists('source', $config)) {
            $this->_usedProperties['source'] = true;
            $this->source = $config['source'];
            unset($config['source']);
        }

        if (array_key_exists('use_ssl', $config)) {
            $this->_usedProperties['useSsl'] = true;
            $this->useSsl = $config['use_ssl'];
            unset($config['use_ssl']);
        }

        if (array_key_exists('user', $config)) {
            $this->_usedProperties['user'] = true;
            $this->user = $config['user'];
            unset($config['user']);
        }

        if (array_key_exists('title', $config)) {
            $this->_usedProperties['title'] = true;
            $this->title = $config['title'];
            unset($config['title']);
        }

        if (array_key_exists('host', $config)) {
            $this->_usedProperties['host'] = true;
            $this->host = $config['host'];
            unset($config['host']);
        }

        if (array_key_exists('port', $config)) {
            $this->_usedProperties['port'] = true;
            $this->port = $config['port'];
            unset($config['port']);
        }

        if (array_key_exists('config', $config)) {
            $this->_usedProperties['config'] = true;
            $this->config = $config['config'];
            unset($config['config']);
        }

        if (array_key_exists('members', $config)) {
            $this->_usedProperties['members'] = true;
            $this->members = $config['members'];
            unset($config['members']);
        }

        if (array_key_exists('connection_string', $config)) {
            $this->_usedProperties['connectionString'] = true;
            $this->connectionString = $config['connection_string'];
            unset($config['connection_string']);
        }

        if (array_key_exists('timeout', $config)) {
            $this->_usedProperties['timeout'] = true;
            $this->timeout = $config['timeout'];
            unset($config['timeout']);
        }

        if (array_key_exists('time', $config)) {
            $this->_usedProperties['time'] = true;
            $this->time = $config['time'];
            unset($config['time']);
        }

        if (array_key_exists('deduplication_level', $config)) {
            $this->_usedProperties['deduplicationLevel'] = true;
            $this->deduplicationLevel = $config['deduplication_level'];
            unset($config['deduplication_level']);
        }

        if (array_key_exists('store', $config)) {
            $this->_usedProperties['store'] = true;
            $this->store = $config['store'];
            unset($config['store']);
        }

        if (array_key_exists('connection_timeout', $config)) {
            $this->_usedProperties['connectionTimeout'] = true;
            $this->connectionTimeout = $config['connection_timeout'];
            unset($config['connection_timeout']);
        }

        if (array_key_exists('persistent', $config)) {
            $this->_usedProperties['persistent'] = true;
            $this->persistent = $config['persistent'];
            unset($config['persistent']);
        }

        if (array_key_exists('message_type', $config)) {
            $this->_usedProperties['messageType'] = true;
            $this->messageType = $config['message_type'];
            unset($config['message_type']);
        }

        if (array_key_exists('parse_mode', $config)) {
            $this->_usedProperties['parseMode'] = true;
            $this->parseMode = $config['parse_mode'];
            unset($config['parse_mode']);
        }

        if (array_key_exists('disable_webpage_preview', $config)) {
            $this->_usedProperties['disableWebpagePreview'] = true;
            $this->disableWebpagePreview = $config['disable_webpage_preview'];
            unset($config['disable_webpage_preview']);
        }

        if (array_key_exists('disable_notification', $config)) {
            $this->_usedProperties['disableNotification'] = true;
            $this->disableNotification = $config['disable_notification'];
            unset($config['disable_notification']);
        }

        if (array_key_exists('split_long_messages', $config)) {
            $this->_usedProperties['splitLongMessages'] = true;
            $this->splitLongMessages = $config['split_long_messages'];
            unset($config['split_long_messages']);
        }

        if (array_key_exists('delay_between_messages', $config)) {
            $this->_usedProperties['delayBetweenMessages'] = true;
            $this->delayBetweenMessages = $config['delay_between_messages'];
            unset($config['delay_between_messages']);
        }

        if (array_key_exists('topic', $config)) {
            $this->_usedProperties['topic'] = true;
            $this->topic = $config['topic'];
            unset($config['topic']);
        }

        if (array_key_exists('factor', $config)) {
            $this->_usedProperties['factor'] = true;
            $this->factor = $config['factor'];
            unset($config['factor']);
        }

        if (array_key_exists('tags', $config)) {
            $this->_usedProperties['tags'] = true;
            $this->tags = $config['tags'];
            unset($config['tags']);
        }

        if (array_key_exists('console_formatter_options', $config)) {
            $this->_usedProperties['consoleFormatterOptions'] = true;
            $this->consoleFormatterOptions = $config['console_formatter_options'];
            unset($config['console_formatter_options']);
        }

        if (array_key_exists('formatter', $config)) {
            $this->_usedProperties['formatter'] = true;
            $this->formatter = $config['formatter'];
            unset($config['formatter']);
        }

        if (array_key_exists('nested', $config)) {
            $this->_usedProperties['nested'] = true;
            $this->nested = $config['nested'];
            unset($config['nested']);
        }

        if (array_key_exists('publisher', $config)) {
            $this->_usedProperties['publisher'] = true;
            $this->publisher = \is_array($config['publisher']) ? new \Symfony\Config\Monolog\HandlerConfig\PublisherConfig($config['publisher']) : $config['publisher'];
            unset($config['publisher']);
        }

        if (array_key_exists('mongodb', $config)) {
            $this->_usedProperties['mongodb'] = true;
            $this->mongodb = \is_array($config['mongodb']) ? new \Symfony\Config\Monolog\HandlerConfig\MongodbConfig($config['mongodb']) : $config['mongodb'];
            unset($config['mongodb']);
        }

        if (array_key_exists('elasticsearch', $config)) {
            $this->_usedProperties['elasticsearch'] = true;
            $this->elasticsearch = \is_array($config['elasticsearch']) ? new \Symfony\Config\Monolog\HandlerConfig\ElasticsearchConfig($config['elasticsearch']) : $config['elasticsearch'];
            unset($config['elasticsearch']);
        }

        if (array_key_exists('index', $config)) {
            $this->_usedProperties['index'] = true;
            $this->index = $config['index'];
            unset($config['index']);
        }

        if (array_key_exists('document_type', $config)) {
            $this->_usedProperties['documentType'] = true;
            $this->documentType = $config['document_type'];
            unset($config['document_type']);
        }

        if (array_key_exists('ignore_error', $config)) {
            $this->_usedProperties['ignoreError'] = true;
            $this->ignoreError = $config['ignore_error'];
            unset($config['ignore_error']);
        }

        if (array_key_exists('redis', $config)) {
            $this->_usedProperties['redis'] = true;
            $this->redis = \is_array($config['redis']) ? new \Symfony\Config\Monolog\HandlerConfig\RedisConfig($config['redis']) : $config['redis'];
            unset($config['redis']);
        }

        if (array_key_exists('predis', $config)) {
            $this->_usedProperties['predis'] = true;
            $this->predis = \is_array($config['predis']) ? new \Symfony\Config\Monolog\HandlerConfig\PredisConfig($config['predis']) : $config['predis'];
            unset($config['predis']);
        }

        if (array_key_exists('from_email', $config)) {
            $this->_usedProperties['fromEmail'] = true;
            $this->fromEmail = $config['from_email'];
            unset($config['from_email']);
        }

        if (array_key_exists('to_email', $config)) {
            $this->_usedProperties['toEmail'] = true;
            $this->toEmail = $config['to_email'];
            unset($config['to_email']);
        }

        if (array_key_exists('subject', $config)) {
            $this->_usedProperties['subject'] = true;
            $this->subject = $config['subject'];
            unset($config['subject']);
        }

        if (array_key_exists('content_type', $config)) {
            $this->_usedProperties['contentType'] = true;
            $this->contentType = $config['content_type'];
            unset($config['content_type']);
        }

        if (array_key_exists('headers', $config)) {
            $this->_usedProperties['headers'] = true;
            $this->headers = $config['headers'];
            unset($config['headers']);
        }

        if (array_key_exists('mailer', $config)) {
            $this->_usedProperties['mailer'] = true;
            $this->mailer = $config['mailer'];
            unset($config['mailer']);
        }

        if (array_key_exists('email_prototype', $config)) {
            $this->_usedProperties['emailPrototype'] = true;
            $this->emailPrototype = \is_array($config['email_prototype']) ? new \Symfony\Config\Monolog\HandlerConfig\EmailPrototypeConfig($config['email_prototype']) : $config['email_prototype'];
            unset($config['email_prototype']);
        }

        if (array_key_exists('verbosity_levels', $config)) {
            $this->_usedProperties['verbosityLevels'] = true;
            $this->verbosityLevels = new \Symfony\Config\Monolog\HandlerConfig\VerbosityLevelsConfig($config['verbosity_levels']);
            unset($config['verbosity_levels']);
        }

        if (array_key_exists('channels', $config)) {
            $this->_usedProperties['channels'] = true;
            $this->channels = \is_array($config['channels']) ? new \Symfony\Config\Monolog\HandlerConfig\ChannelsConfig($config['channels']) : $config['channels'];
            unset($config['channels']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['type'])) {
            $output['type'] = $this->type;
        }
        if (isset($this->_usedProperties['id'])) {
            $output['id'] = $this->id;
        }
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['priority'])) {
            $output['priority'] = $this->priority;
        }
        if (isset($this->_usedProperties['level'])) {
            $output['level'] = $this->level;
        }
        if (isset($this->_usedProperties['bubble'])) {
            $output['bubble'] = $this->bubble;
        }
        if (isset($this->_usedProperties['interactiveOnly'])) {
            $output['interactive_only'] = $this->interactiveOnly;
        }
        if (isset($this->_usedProperties['appName'])) {
            $output['app_name'] = $this->appName;
        }
        if (isset($this->_usedProperties['includeStacktraces'])) {
            $output['include_stacktraces'] = $this->includeStacktraces;
        }
        if (isset($this->_usedProperties['processPsr3Messages'])) {
            $output['process_psr_3_messages'] = $this->processPsr3Messages instanceof \Symfony\Config\Monolog\HandlerConfig\ProcessPsr3MessagesConfig ? $this->processPsr3Messages->toArray() : $this->processPsr3Messages;
        }
        if (isset($this->_usedProperties['path'])) {
            $output['path'] = $this->path;
        }
        if (isset($this->_usedProperties['filePermission'])) {
            $output['file_permission'] = $this->filePermission;
        }
        if (isset($this->_usedProperties['useLocking'])) {
            $output['use_locking'] = $this->useLocking;
        }
        if (isset($this->_usedProperties['filenameFormat'])) {
            $output['filename_format'] = $this->filenameFormat;
        }
        if (isset($this->_usedProperties['dateFormat'])) {
            $output['date_format'] = $this->dateFormat;
        }
        if (isset($this->_usedProperties['ident'])) {
            $output['ident'] = $this->ident;
        }
        if (isset($this->_usedProperties['logopts'])) {
            $output['logopts'] = $this->logopts;
        }
        if (isset($this->_usedProperties['facility'])) {
            $output['facility'] = $this->facility;
        }
        if (isset($this->_usedProperties['maxFiles'])) {
            $output['max_files'] = $this->maxFiles;
        }
        if (isset($this->_usedProperties['actionLevel'])) {
            $output['action_level'] = $this->actionLevel;
        }
        if (isset($this->_usedProperties['activationStrategy'])) {
            $output['activation_strategy'] = $this->activationStrategy;
        }
        if (isset($this->_usedProperties['stopBuffering'])) {
            $output['stop_buffering'] = $this->stopBuffering;
        }
        if (isset($this->_usedProperties['passthruLevel'])) {
            $output['passthru_level'] = $this->passthruLevel;
        }
        if (isset($this->_usedProperties['excludedHttpCodes'])) {
            $output['excluded_http_codes'] = array_map(fn ($v) => $v instanceof \Symfony\Config\Monolog\HandlerConfig\ExcludedHttpCodeConfig ? $v->toArray() : $v, $this->excludedHttpCodes);
        }
        if (isset($this->_usedProperties['acceptedLevels'])) {
            $output['accepted_levels'] = $this->acceptedLevels;
        }
        if (isset($this->_usedProperties['minLevel'])) {
            $output['min_level'] = $this->minLevel;
        }
        if (isset($this->_usedProperties['maxLevel'])) {
            $output['max_level'] = $this->maxLevel;
        }
        if (isset($this->_usedProperties['bufferSize'])) {
            $output['buffer_size'] = $this->bufferSize;
        }
        if (isset($this->_usedProperties['flushOnOverflow'])) {
            $output['flush_on_overflow'] = $this->flushOnOverflow;
        }
        if (isset($this->_usedProperties['handler'])) {
            $output['handler'] = $this->handler;
        }
        if (isset($this->_usedProperties['url'])) {
            $output['url'] = $this->url;
        }
        if (isset($this->_usedProperties['exchange'])) {
            $output['exchange'] = $this->exchange;
        }
        if (isset($this->_usedProperties['exchangeName'])) {
            $output['exchange_name'] = $this->exchangeName;
        }
        if (isset($this->_usedProperties['channel'])) {
            $output['channel'] = $this->channel;
        }
        if (isset($this->_usedProperties['botName'])) {
            $output['bot_name'] = $this->botName;
        }
        if (isset($this->_usedProperties['useAttachment'])) {
            $output['use_attachment'] = $this->useAttachment;
        }
        if (isset($this->_usedProperties['useShortAttachment'])) {
            $output['use_short_attachment'] = $this->useShortAttachment;
        }
        if (isset($this->_usedProperties['includeExtra'])) {
            $output['include_extra'] = $this->includeExtra;
        }
        if (isset($this->_usedProperties['iconEmoji'])) {
            $output['icon_emoji'] = $this->iconEmoji;
        }
        if (isset($this->_usedProperties['webhookUrl'])) {
            $output['webhook_url'] = $this->webhookUrl;
        }
        if (isset($this->_usedProperties['excludeFields'])) {
            $output['exclude_fields'] = $this->excludeFields;
        }
        if (isset($this->_usedProperties['token'])) {
            $output['token'] = $this->token;
        }
        if (isset($this->_usedProperties['region'])) {
            $output['region'] = $this->region;
        }
        if (isset($this->_usedProperties['source'])) {
            $output['source'] = $this->source;
        }
        if (isset($this->_usedProperties['useSsl'])) {
            $output['use_ssl'] = $this->useSsl;
        }
        if (isset($this->_usedProperties['user'])) {
            $output['user'] = $this->user;
        }
        if (isset($this->_usedProperties['title'])) {
            $output['title'] = $this->title;
        }
        if (isset($this->_usedProperties['host'])) {
            $output['host'] = $this->host;
        }
        if (isset($this->_usedProperties['port'])) {
            $output['port'] = $this->port;
        }
        if (isset($this->_usedProperties['config'])) {
            $output['config'] = $this->config;
        }
        if (isset($this->_usedProperties['members'])) {
            $output['members'] = $this->members;
        }
        if (isset($this->_usedProperties['connectionString'])) {
            $output['connection_string'] = $this->connectionString;
        }
        if (isset($this->_usedProperties['timeout'])) {
            $output['timeout'] = $this->timeout;
        }
        if (isset($this->_usedProperties['time'])) {
            $output['time'] = $this->time;
        }
        if (isset($this->_usedProperties['deduplicationLevel'])) {
            $output['deduplication_level'] = $this->deduplicationLevel;
        }
        if (isset($this->_usedProperties['store'])) {
            $output['store'] = $this->store;
        }
        if (isset($this->_usedProperties['connectionTimeout'])) {
            $output['connection_timeout'] = $this->connectionTimeout;
        }
        if (isset($this->_usedProperties['persistent'])) {
            $output['persistent'] = $this->persistent;
        }
        if (isset($this->_usedProperties['messageType'])) {
            $output['message_type'] = $this->messageType;
        }
        if (isset($this->_usedProperties['parseMode'])) {
            $output['parse_mode'] = $this->parseMode;
        }
        if (isset($this->_usedProperties['disableWebpagePreview'])) {
            $output['disable_webpage_preview'] = $this->disableWebpagePreview;
        }
        if (isset($this->_usedProperties['disableNotification'])) {
            $output['disable_notification'] = $this->disableNotification;
        }
        if (isset($this->_usedProperties['splitLongMessages'])) {
            $output['split_long_messages'] = $this->splitLongMessages;
        }
        if (isset($this->_usedProperties['delayBetweenMessages'])) {
            $output['delay_between_messages'] = $this->delayBetweenMessages;
        }
        if (isset($this->_usedProperties['topic'])) {
            $output['topic'] = $this->topic;
        }
        if (isset($this->_usedProperties['factor'])) {
            $output['factor'] = $this->factor;
        }
        if (isset($this->_usedProperties['tags'])) {
            $output['tags'] = $this->tags;
        }
        if (isset($this->_usedProperties['consoleFormatterOptions'])) {
            $output['console_formatter_options'] = $this->consoleFormatterOptions;
        }
        if (isset($this->_usedProperties['formatter'])) {
            $output['formatter'] = $this->formatter;
        }
        if (isset($this->_usedProperties['nested'])) {
            $output['nested'] = $this->nested;
        }
        if (isset($this->_usedProperties['publisher'])) {
            $output['publisher'] = $this->publisher instanceof \Symfony\Config\Monolog\HandlerConfig\PublisherConfig ? $this->publisher->toArray() : $this->publisher;
        }
        if (isset($this->_usedProperties['mongodb'])) {
            $output['mongodb'] = $this->mongodb instanceof \Symfony\Config\Monolog\HandlerConfig\MongodbConfig ? $this->mongodb->toArray() : $this->mongodb;
        }
        if (isset($this->_usedProperties['elasticsearch'])) {
            $output['elasticsearch'] = $this->elasticsearch instanceof \Symfony\Config\Monolog\HandlerConfig\ElasticsearchConfig ? $this->elasticsearch->toArray() : $this->elasticsearch;
        }
        if (isset($this->_usedProperties['index'])) {
            $output['index'] = $this->index;
        }
        if (isset($this->_usedProperties['documentType'])) {
            $output['document_type'] = $this->documentType;
        }
        if (isset($this->_usedProperties['ignoreError'])) {
            $output['ignore_error'] = $this->ignoreError;
        }
        if (isset($this->_usedProperties['redis'])) {
            $output['redis'] = $this->redis instanceof \Symfony\Config\Monolog\HandlerConfig\RedisConfig ? $this->redis->toArray() : $this->redis;
        }
        if (isset($this->_usedProperties['predis'])) {
            $output['predis'] = $this->predis instanceof \Symfony\Config\Monolog\HandlerConfig\PredisConfig ? $this->predis->toArray() : $this->predis;
        }
        if (isset($this->_usedProperties['fromEmail'])) {
            $output['from_email'] = $this->fromEmail;
        }
        if (isset($this->_usedProperties['toEmail'])) {
            $output['to_email'] = $this->toEmail;
        }
        if (isset($this->_usedProperties['subject'])) {
            $output['subject'] = $this->subject;
        }
        if (isset($this->_usedProperties['contentType'])) {
            $output['content_type'] = $this->contentType;
        }
        if (isset($this->_usedProperties['headers'])) {
            $output['headers'] = $this->headers;
        }
        if (isset($this->_usedProperties['mailer'])) {
            $output['mailer'] = $this->mailer;
        }
        if (isset($this->_usedProperties['emailPrototype'])) {
            $output['email_prototype'] = $this->emailPrototype instanceof \Symfony\Config\Monolog\HandlerConfig\EmailPrototypeConfig ? $this->emailPrototype->toArray() : $this->emailPrototype;
        }
        if (isset($this->_usedProperties['verbosityLevels'])) {
            $output['verbosity_levels'] = $this->verbosityLevels->toArray();
        }
        if (isset($this->_usedProperties['channels'])) {
            $output['channels'] = $this->channels instanceof \Symfony\Config\Monolog\HandlerConfig\ChannelsConfig ? $this->channels->toArray() : $this->channels;
        }

        return $output;
    }

}
