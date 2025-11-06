<?php

namespace RaifuCore\TssClient;

class TssRequestDto
{
    protected string $category;
    protected ?string $name = null;
    protected ?array $payload = null;

    public function __construct(string $category)
    {
        $this->category = $category;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPayload(): ?array
    {
        return $this->payload;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setPayload(array $payload): self
    {
        $this->payload = $payload;
        return $this;
    }
}
