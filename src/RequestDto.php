<?php

namespace RaifuCore\TssClient;

class RequestDto
{
    protected ?string $category;
    protected ?string $name;
    protected ?array $payload = null;

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

    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
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
