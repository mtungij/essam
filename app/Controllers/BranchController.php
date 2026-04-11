<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BranchModel;
use App\Models\UserModel;

class BranchController extends BaseController
{
    private function ensureAdmin()
    {
        if (session('position') !== 'Admin') {
            return redirect()->to('/')->with('error', 'Unauthorized access');
        }
        return null;
    }

    public function index()
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }
        $branches = model(BranchModel::class)->orderBy('name', 'ASC')->findAll();
        return view('branches/index', ['branches' => $branches]);
    }

    public function store()
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }
        if (!$this->validate(['name' => 'required|is_unique[branches.name]'])) {
            return redirect()->back()->withInput()->with('branch_errors', $this->validator->getErrors());
        }

        model(BranchModel::class)->insert(['name' => $this->request->getPost('name')]);

        return redirect()->to('/branches')->with('success', 'Branch added successfully');
    }

    public function edit($id)
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }
        $branch = model(BranchModel::class)->find($id);
        if (!$branch) {
            return redirect()->to('/branches')->with('error', 'Branch not found');
        }
        return view('branches/edit', ['branch' => $branch]);
    }

    public function update()
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }
        $id = $this->request->getPost('id');

        if (!$this->validate(['name' => "required|is_unique[branches.name,id,{$id}]"])) {
            return redirect()->back()->withInput()->with('branch_errors', $this->validator->getErrors());
        }

        $newName = $this->request->getPost('name');
        $branch  = model(BranchModel::class)->find($id);

        if ($branch) {
            // Update branch name in all users that have the old branch name
            model(UserModel::class)
                ->where('branch', $branch->name)
                ->set(['branch' => $newName])
                ->update();

            model(BranchModel::class)->update($id, ['name' => $newName]);
        }

        return redirect()->to('/branches')->with('success', 'Branch updated successfully');
    }

    public function delete()
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }
        $id     = $this->request->getPost('id');
        $branch = model(BranchModel::class)->find($id);

        if ($branch) {
            // Check if any active users are assigned to this branch
            $count = model(UserModel::class)->where('branch', $branch->name)->countAllResults();
            if ($count > 0) {
                return redirect()->to('/branches')->with('error', "Cannot delete branch \"{$branch->name}\" — {$count} staff member(s) are assigned to it.");
            }
            model(BranchModel::class)->delete($id);
        }

        return redirect()->to('/branches')->with('success', 'Branch deleted successfully');
    }
}
