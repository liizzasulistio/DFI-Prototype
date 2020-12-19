<?php namespace App\Controllers;
use App\Models\UserModel;

class PageController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'DFI Project',
        ];
        return view('index', $data);
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('page/dashboard', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'My Profile'
        ];
        helper(['form']);
        $model = new UserModel();
        $data['user'] = $model->where('UserID', session()->get('UserID'))->first();
        return view('page/profile', $data);
    }

    public function update()
    {
        $model = new UserModel();
        $data = [
            'title' => 'Edit Profile',
            'member' => $model->getUser(),
        ];
        helper(['form']);
       

        if($this->request->getMethod() == 'post')
        {

            
            //validation
            $rules = [
                'UserName' => 'required',
                'UserEmail' => 'required|valid_email',
                'UserUsername' => 'required|min_length[4]|max_length[15]',
                'UserHometown' => 'required',
                'UserBirthday' => 'required',
                'UserTwitter' => 'required',
                'UserInstagram' => 'required',
                'UserAva' => 'max_size[UserAva,1024]|is_image[UserAva]|mime_in[UserAva,image/jpg,image/jpeg,image/png]',
                'UserBio' => 'required|max_length[100]',
            ];

            if($this->request->getPost('UserPassword') != '')
            {
				$rules['UserPassword'] = 'required|min_length[8]|max_length[255]';
				$rules['PasswordConfirm'] = 'matches[UserPassword]';
            }
            
            if(!$this->validate($rules))
            {
                $data['validation'] = $this->validator;
            }
            else
            {
                $avaFile = $this->request->getFile('UserAva');
                if($avaFile->getError() == 4)
                {
                    $avaName = 'def_ava.png';
                }
                else
                {
                    $avaName = $avaFile->getRandomName();
                    $avaFile->move('./images', $avaName);
                }
                
                //store the user in database
                $model = new UserModel();
                $newData = [
                    'UserID' => session()->get('UserID'),
                    'UserName' => $this->request->getPost('UserName'),
                    'UserEmail' => $this->request->getPost('UserEmail'),
                    'UserUsername' => $this->request->getPost('UserUsername'),
                    'UserHometown' => $this->request->getPost('UserHometown'),
                    'UserBirthday' => $this->request->getPost('UserBirthday'),
                    'UserTwitter' => $this->request->getPost('UserTwitter'),
                    'UserInstagram' => $this->request->getPost('UserInstagram'),
                    'UserAva' => $avaName,
                    'UserBio' => $this->request->getPost('UserBio'),
                ];

                if($this->request->getPost('UserPassword') != '')
                {
                    $newData['UserPassword'] = $this->request->getPost('UserPassword');
                }
        
                $model->save($newData);
                session()->setFlashdata('success', 'Successfuly Updated');
				return redirect()->to('/profile');
            }
        }
        $data['user'] = $model->where('UserID', session()->get('UserID'))->first();
        return view('page/update', $data);
    }
}