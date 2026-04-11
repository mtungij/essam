<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['customer', 'phone', 'order_type', 'budget', 'expenses', 'cost', 'user_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation 
        protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function getOrders(?int $perPage = null, ?string $branch = null): array
    {
        $this->builder()
            ->select('orders.*, users.username')
            ->join('users', 'orders.user_id = users.id')
            ->orderBy('orders.created_at', 'DESC');

        if ($branch === '__none__') {
            $this->builder()->where('1', '0'); // no results
        } elseif ($branch !== null) {
            $this->builder()->where('users.branch', $branch);
        }

        return [
            'orders'  => $this->paginate($perPage),
            'pager' => $this->pager,
        ];
    }

    public function search(string $search, ?string $branch = null): array
    {
        $this->builder()
            ->select('orders.*, users.username')
            ->join('users', 'orders.user_id = users.id')
            ->orderBy('orders.created_at', 'DESC')
            ->like('orders.customer', $search);

        if ($branch === '__none__') {
            $this->builder()->where('1', '0');
        } elseif ($branch !== null) {
            $this->builder()->where('users.branch', $branch);
        }

        return [
            'orders'  => $this->paginate(),
            'pager' => $this->pager,
        ];
    }


    public function getTodayOrders(?string $branch = null)
    {
        $builder = $this->builder()
            ->select('orders.*, users.username')
            ->join('users', 'orders.user_id = users.id')
            ->where('DATE(orders.created_at)', date('Y-m-d'))
            ->orderBy('orders.created_at', 'DESC');

        if ($branch === '__none__') {
            $builder->where('1', '0');
        } elseif ($branch !== null) {
            $builder->where('users.branch', $branch);
        }

        return $builder->get()->getResult();
    }
}


