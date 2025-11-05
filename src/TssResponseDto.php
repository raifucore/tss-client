<?php

namespace RaifuCore\TssClient;

class TssResponseDto
{
    protected bool $status = false;
    protected ?string $error = null;
    protected ?string $message = null;
    protected ?string $uuid = null;
    protected ?float $time = null;

    public function isSuccess(): bool
    {
        return $this->status;
    }

    public function getError(): ?string
    {
        return $this->error;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getTime(): ?float
    {
        return $this->time;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function setError(string $error): self
    {
        $this->error = $error;
        return $this;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function setUuid(?string $uuid): self
    {
        $this->uuid = $uuid;
        return $this;
    }

    public function setTime(?float $time): self
    {
        $this->time = $time;
        return $this;
    }
}
