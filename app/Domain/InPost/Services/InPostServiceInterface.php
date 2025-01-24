<?php

namespace App\Domain\InPost\Services;

interface InPostServiceInterface
{
    public function getLockers(array $query = []): array;

    public function createShipment(array $data): array;

    public function getShipment(string $shipmentId): array;
}
