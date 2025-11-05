<?php

namespace RaifuCore\TssClient;

class TssConfig
{
    private ?string $host;
    private ?string $apiToken;
    private ?string $sourceKey;
    private bool $isEnable;

    public function __construct(array $config)
    {
        $this->host = $config['api_url'] ?? null;
        $this->apiToken = $config['api_token'] ?? null;
        $this->sourceKey = $config['source_key'] ?? null;
        $this->isEnable = $config['enable'] ?? false;
    }

    public function getHost(): ?string
    {
        return $this->host;
    }

    public function getApiToken(): ?string
    {
        return $this->apiToken;
    }

    public function getSourceKey(): ?string
    {
        return $this->sourceKey;
    }

    public function isEnable(): bool
    {
        return $this->isEnable;
    }
}
