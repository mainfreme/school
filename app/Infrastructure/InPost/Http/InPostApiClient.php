<?php

namespace App\Infrastructure\InPost\Http;

use Illuminate\Support\Facades\Http;

class InPostApiClient
{
    private string $baseUrl;
    private string $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.inpost.base_url', env('INPOST_API_URL'));
        $this->apiKey = env('INPOST_API_KEY');
    }

    public function request(string $method, string $endpoint, array $data = [])
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->{$method}($this->baseUrl . $endpoint, $data);

        if ($response->failed()) {
            throw new \Exception('InPost API Error: ' . $response->body());
        }

        return $response->json();
    }
}
