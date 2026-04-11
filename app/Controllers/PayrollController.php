<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SalaryModel;
use App\Models\UserModel;

class PayrollController extends BaseController
{
    public function index()
    {
        $branch = $this->getBranch();
        $user   = model(SalaryModel::class)->getSalary(10, $branch);
        return view('users/payroll', ['user' => $user]);
    }

    private function getBranch(): ?string
    {
        if (session('position') === 'Admin') {
            return null;
        }
        $branch = session('branch');
        return ($branch !== null && $branch !== '') ? $branch : '__none__';
    }
    
    public function Report()
    {
        $from   = $this->request->getGet('from');
        $to     = $this->request->getGet('to');
        $branch = $this->getBranch();

        if (!empty($from) && !empty($to)) {
            $builder = model('SalaryModel')->builder('salary')
                ->select('salary.id,salary.created_at,salary.amount,users.name,users.id')
                ->join('users', 'users.id = salary.user_id')
                ->where('salary.created_at >=', $from)
                ->where('salary.created_at <=', $to)
                ->orderBy('salary.created_at', 'DESC');

            if ($branch === '__none__') {
                $builder->where('1', '0');
            } elseif ($branch !== null) {
                $builder->where('users.branch', $branch);
            }

            $salary = $builder->get()->getResult();
            return view('users/payroll', ['salary' => $salary, 'user' => $salary]);
        }

        $salary = model(SalaryModel::class)->TodaySalary($branch);
        return view('users/payroll', ['salary' => $salary]);
    }
}
