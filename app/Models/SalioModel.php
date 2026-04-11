<?php

namespace App\Models;

use CodeIgniter\Model;

class SalioModel extends Model
{
    protected $table            = 'salio';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [  'user_id','created_time','income','payment_method'

    ];

    // Dates
    protected $useTimestamps = false;
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


 public function Balance()
 {


$builder = $this->db->table('salio');
    $query = $builder->select('SUM(income) as income, payment_method')
        ->groupBy('payment_method')
        ->orderBy('income', 'DESC')
        ->get()
        ->getResult();
    return $query;
}

    public function getByBranch(?string $branch = null)
    {
        $builder = $this->db->table('salio');
        $builder->select('salio.*')
            ->join('users', 'users.id = salio.user_id');

        if ($branch === '__none__') {
            $builder->where('1', '0');
        } elseif ($branch !== null) {
            $builder->where('users.branch', $branch);
        }

        return $builder->get()->getResult();
    }

    public function BalanceByBranch(?string $branch = null)
    {
        $builder = $this->db->table('salio');
        $builder->select('SUM(salio.income) as income, salio.payment_method')
            ->join('users', 'users.id = salio.user_id')
            ->groupBy('salio.payment_method')
            ->orderBy('income', 'DESC');

        if ($branch === '__none__') {
            $builder->where('1', '0');
        } elseif ($branch !== null) {
            $builder->where('users.branch', $branch);
        }

        return $builder->get()->getResult();
    }
}



