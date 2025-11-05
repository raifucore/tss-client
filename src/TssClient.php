<?php

namespace RaifuCore\TssClient;

use GuzzleHttp\Client;
use Throwable;

class TssClient
{
    private Config $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @throws TssException
     */
    public function send(RequestDto $request): void
    {
        // is enable
        if (!$this->config->isEnable()) {
            return;
        }

        try {
            $client = new Client([
                'headers' => [
                    'x-api-token' => $this->config->getApiToken(),
                    'x-source-api-token' => $this->config->getSourceToken(),
                ]
            ]);

            $response = $client->post($this->config->getHost(), [
                'form_params' => [
                    'category' => $request->getCategory(),
                    'name' => $request->getName(),
                    'payload' => $request->getPayload()
                ]
            ]);

            echo "<pre>", print_r($response->getBody(), true), "</pre>"; die();

            $status = (bool) $response['status'] ?? null;
            if (!$status) {
                throw new \Exception($response['error'] ?? 'unknown error');
            }

        } catch (\Throwable $e) {
            throw new TssException($e->getMessage());
        }
    }
}
