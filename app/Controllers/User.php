<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BranchModel;
use App\Models\SalaryModel;
use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        helper('form');
        $userModel = model(UserModel::class);
        if (session('position') !== 'Admin') {
            $branch = session('branch');
            if ($branch !== null && $branch !== '') {
                $users = $userModel->where('branch', $branch)->findAll();
            } else {
                $users = $userModel->where('id', session('user_id'))->findAll();
            }
        } else {
            $users = $userModel->findAll();
        }
        $branches = model(BranchModel::class)->orderBy('name', 'ASC')->findAll();
        return view('users/index', ['users' => $users, 'branches' => $branches]);
    }

    public function create()
    {
        if (
            !$this->validate([
                'name'             => 'required',
                'username'         => 'required|is_unique[users.username]',
                'position'         => 'required',
                'branch'           => 'required',
                'password'         => 'required',
                'confirm_password' => 'required|matches[password]'
            ])
        ) {
            return redirect()->back()->withInput();
        }

        $user_input = $this->validator->getValidated();
        $user_input['password'] = password_hash($user_input['password'], PASSWORD_BCRYPT, ['cost' => 12]);

        unset($user_input['confirm_password']);

        model(UserModel::class)->insert($user_input);

        return redirect()->back()->with('create_user', 'Staff Registered Successfully');
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        model(UserModel::class)->delete($id);
        return redirect()->back()->with('delete','staff deleted sucessfully');
    }

       public function edit($id)
       {
           $user     = model(UserModel::class)->find($id);
           $branches = model(BranchModel::class)->orderBy('name', 'ASC')->findAll();
           return view('users/edit', ['user' => $user, 'branches' => $branches]);
       }

   public function update()
   {
       if (
           !$this->validate([
               'name'     => 'required',
               'username' => 'required',
               'position' => 'required',
               'branch'   => 'required',
           ])
       ) {
           return redirect()->back()->withInput();
       } else {
           $id         = $this->request->getPost('id');
           $user_input = $this->validator->getValidated();

           model(UserModel::class)->where('id', $id)->set($user_input)->update();
           return redirect('users')->with('edit_user', 'Staff Updated Successfully');
       }
   }


   public function salary()
   {
       $isAdmin = session('position') === 'Admin';
       $branch  = $isAdmin ? null : ((session('branch') !== null && session('branch') !== '') ? session('branch') : '__none__');
       $salary  = model(SalaryModel::class)->TodaySalary($branch);
       if (!$isAdmin && $branch !== null && $branch !== '__none__') {
           $user = model(UserModel::class)->where('branch', $branch)->findAll();
       } elseif (!$isAdmin) {
           $user = model(UserModel::class)->where('id', session('user_id'))->findAll();
       } else {
           $user = model(UserModel::class)->findAll();
       }
       return view('users/salary', ['user' => $user, 'salary' => $salary]);
   }

   public function paysalary()
   {
     $userId= $this->request->getPost('userId');
     $amount =$this->request->getPost('amount');

         if (session('position') !== 'Admin') {
                 $targetUser = model(UserModel::class)->find($userId);
                 $myBranch   = session('branch');
                 if (!$targetUser || $targetUser->branch !== $myBranch) {
                         return redirect('salary')->with('errors', 'Unauthorized salary action');
                 }
         }

     $data =['user_id'=>$userId,'amount'=>$amount];

     $salary=model(SalaryModel::class)->insert($data);


     return redirect('salary');



   }

   

   

public function logout()

{
    session()->destroy();
    return redirect ('login');
}

public function profileSettings()
{
    return redirect()->to('/profile/picture');
}

public function profilePictureView()
{
    if (!session('user_id')) {
        return redirect('login');
    }

    $user = model(UserModel::class)->find(session('user_id'));
    return view('users/profile_picture', ['user' => $user]);
}

public function changePasswordView()
{
    if (!session('user_id')) {
        return redirect('login');
    }

    return view('users/change_password');
}

public function updatePassword()
{
    if (!session('user_id')) {
        return redirect('login');
    }

    if (!$this->validate([
        'current_password' => 'required',
        'new_password'     => 'required|min_length[6]',
        'confirm_password' => 'required|matches[new_password]',
    ])) {
        return redirect()->back()->withInput()->with('profile_error', validation_list_errors());
    }

    $user = model(UserModel::class)->find(session('user_id'));
    if (!$user || !password_verify($this->request->getPost('current_password'), $user->password)) {
        return redirect()->back()->with('profile_error', 'Current password is incorrect');
    }

    $newPassword = password_hash($this->request->getPost('new_password'), PASSWORD_BCRYPT, ['cost' => 12]);
    model(UserModel::class)->update($user->id, ['password' => $newPassword]);

    return redirect()->back()->with('profile_success', 'Password changed successfully');
}

public function updateProfilePicture()
{
    if (!session('user_id')) {
        return redirect('login');
    }

    $uploadPath = FCPATH . 'uploads/profiles';
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0755, true);
    }

    if (!is_writable($uploadPath)) {
        return redirect()->back()->with('profile_error', 'Upload folder is not writable: ' . $uploadPath);
    }

    $newName = null;
    $croppedImage = (string) $this->request->getPost('cropped_image');

    // Priority: use cropped image from client-side cropper.
    if ($croppedImage !== '') {
        if (!preg_match('/^data:image\/(png|jpeg|jpg|webp);base64,/', $croppedImage, $matches)) {
            return redirect()->back()->with('profile_error', 'Invalid cropped image format');
        }

        $extension = $matches[1] === 'jpeg' ? 'jpg' : $matches[1];
        $base64Data = preg_replace('/^data:image\/[a-zA-Z0-9.+-]+;base64,/', '', $croppedImage);
        $binaryData = base64_decode(str_replace(' ', '+', $base64Data), true);

        if ($binaryData === false) {
            return redirect()->back()->with('profile_error', 'Could not decode cropped image');
        }

        if (strlen($binaryData) > 2 * 1024 * 1024) {
            return redirect()->back()->with('profile_error', 'Cropped image is too large (max 2MB)');
        }

        $newName = uniqid('profile_', true) . '.' . $extension;
        if (file_put_contents($uploadPath . '/' . $newName, $binaryData) === false) {
            return redirect()->back()->with('profile_error', 'Could not save cropped image');
        }
    } else {
        $file = $this->request->getFile('profile_picture');
        if (!$file || !$file->isValid()) {
            return redirect()->back()->with('profile_error', 'Please select a valid image file');
        }

        if (!$this->validate([
            'profile_picture' => 'uploaded[profile_picture]|is_image[profile_picture]|max_size[profile_picture,2048]|mime_in[profile_picture,image/jpg,image/jpeg,image/png,image/webp]',
        ])) {
            return redirect()->back()->with('profile_error', validation_list_errors());
        }

        $newName = $file->getRandomName();
        if (!$file->move($uploadPath, $newName, true)) {
            return redirect()->back()->with('profile_error', 'Could not move uploaded file. Please check folder permissions.');
        }
    }

    $user = model(UserModel::class)->find(session('user_id'));
    if ($user && !empty($user->profile_picture)) {
        $oldPath = $uploadPath . '/' . $user->profile_picture;
        if (is_file($oldPath)) {
            @unlink($oldPath);
        }
    }

    model(UserModel::class)->update(session('user_id'), ['profile_picture' => $newName]);
    session()->set('profile_picture', $newName);

    return redirect()->back()->with('profile_success', 'Profile picture updated successfully');
}


}