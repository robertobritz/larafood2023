<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        string $comment = '',
        int $tenantId,
        $clientId = '',
        $tableId = ''
    );
    public function getOrderByIdentify(string $identify);

}