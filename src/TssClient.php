<?php

namespace RaifuCore\TssClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Throwable;

class TssClient
{
    private TssConfig $config;

    public function __construct(TssConfig $config)
    {
        $this->config = $config;
    }

    public function send(TssRequestDto $request): ?TssResponseDto
    {
        // is enable
        if (!$this->config->isEnable()) {
            return null;
        }

        $response = new TssResponseDto();

        try {
            $client = new Client([
                'timeout' => 5,
                'headers' => [
                    'x-api-token' => $this->config->getApiToken(),
                    'x-source-key' => $this->config->getSourceKey(),
                    'accept' => 'application/json',
                ]
            ]);

            $rResponse = $client->post($this->config->getHost(), [
                'json' => [
                    'category' => $request->getCategory(),
                    'payload' => $request->getPayload(),
                    'name' => $request->getName(),
                ]
            ]);

            $aResponse = json_decode($rResponse->getBody()->getContents(), true);

            $status = (bool)$aResponse['status'] ?? null;

            if (!$status) {
                $response
                    ->setStatus(false)
                    ->setError($aResponse['error'] ?? 'unknown error');
            } else {
                $response
                    ->setStatus(true)
                    ->setUuid($aResponse['data']['event_uuid'] ?? null)
                    ->setTime($aResponse['time'] ?? null)
                    ->setMessage($aResponse['message'] ?? null);
            }

        } catch (ClientException $e) {

            $aResponse = json_decode($e->getResponse()->getBody()->getContents(), true);

            $error = $aResponse['error']
                ?? $aResponse['message']
                ?? $e->getMessage();

            $response->setStatus(false)->setError($error);

        } catch (ServerException $e) {

            $aResponse = json_decode($e->getResponse()->getBody()->getContents(), true);

            $response->setStatus(false)->setError("Code: {$e->getCode()}. " . ($aResponse['message'] ?? ''));

        } catch (Throwable $e) {

            $response->setStatus(false)->setError("Code: {$e->getCode()}. " . $e->getMessage());
        }

        return $response;
    }
}
