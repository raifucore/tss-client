<?php

namespace RaifuCore\TssClient;

class TssConfig
{
    private ?string $host;
    private ?string $apiToken;
    private ?string $sourceToken;
    private bool $isEnable;

    public function __construct(
        string $host,
        string $apiToken,
        string $sourceToken,
        bool $isEnable = true
    ) {
        $this->host = $host;
        $this->apiToken = $apiToken;
        $this->sourceToken = $sourceToken;
        $this->isEnable = $isEnable;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getApiToken(): ?string
    {
        return $this->apiToken;
    }

    public function getSourceToken(): ?string
    {
        return $this->sourceToken;
    }

    public function isEnable(): bool
    {
        return $this->isEnable;
    }
}
