<?php

namespace App\Models;

use CodeIgniter\Model;

class SalaryModel extends Model
{
    protected $table            = 'salary';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id','amount'
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



    public function getSalary($limit = 10)
    {
        $builder = $this->db->table('salary');
        $builder->select('salary.id,salary.created_at,salary.amount,users.name,users.id');
        $builder->join('users', 'users.id = salary.user_id');
        $builder->limit($limit);
        $query = $builder->get();
        return $query->getResult();
    }

    public function TodaySalary()
    {
     $builder = $this->db->table('salary');
   $result = $builder->select('SUM(salary.amount) as amount, MAX(salary.created_at) as created_at, MAX(salary.id) as id, MAX(users.name) as name, MAX(users.username) as username')
    ->join('users', 'users.id = salary.user_id')
    ->where('DATE(salary.created_at)', date('Y-m-d'))
    ->groupBy('users.name')
    ->orderBy('created_at', 'DESC')  
    ->get()
    ->getResult();

return $result;

        
    }
    
}
