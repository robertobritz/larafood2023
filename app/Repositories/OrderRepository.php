<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    protected $entity;

    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        string $comment = '',
        int $tenantId,
        $clientId = '', 
        $tableId = ''
    ){
        $data = [
        'tenant_id' => $tenantId,    
        'identify' => $identify,
        'total' => $total,
        'status' => $status,
        'comment' => $comment,
        ];

        if ($clientId) $data['client_id'] = $clientId;
        if ($tableId) $data['table_id'] = $tableId;

        //dd($data); 

        $order = $this->entity->create($data);

        return $order;
    }


    public function getOrderByIdentify(string $identify)
    {

    }
    
}