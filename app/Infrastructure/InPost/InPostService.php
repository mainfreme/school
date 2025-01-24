<?php

namespace App\Infrastructure\InPost;

use App\Domain\InPost\Services\InPostServiceInterface;
use App\Infrastructure\InPost\Http\InPostApiClient;

class InPostService implements InPostServiceInterface
{
    private InPostApiClient $apiClient;

    public function __construct(InPostApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function getLockers(array $query = []): array
    {
        return $this->apiClient->request('get', '/lockers', $query);
    }

    public function createShipment(array $data): array
    {
        return $this->apiClient->request('post', '/shipments', $data);
    }

    public function getShipment(string $shipmentId): array
    {
        return $this->apiClient->request('get', '/shipments/' . $shipmentId);
    }
}
