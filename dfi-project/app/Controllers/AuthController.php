<?php namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'Login',
        ];
        helper(['form']);

        if($this->request->getMethod() == 'post')
        {
            //validation
            $rules = [
                'UserUsername' => 'required',
                'UserPassword' => 'required|validateUser[UserUsername, UserPassword]',
            ];
            $errors = [
                'UserPassword' => [
                    'validateUser' => 'Username or Email and Password don\'t match',
                ],
            ];

            if(!$this->validate($rules, $errors))
            {
                $data['validation'] = $this->validator;
            }
            else
            {
                $model = new UserModel();
                $username = $this->request->getVar('UserUsername');
                $user = $model->where('UserEmail', $username)->orWhere('UserUsername', $username)->first();

                $this->setUserSession($user);
                return redirect()->to('dashboard');
            }
        }
        return view('page/login', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'UserID' => $user['UserID'],
            'UserName' => $user['UserName'],
            'UserUsername' => $user['UserUsername'],
            'UserEmail' => $user['UserEmail'],
            'UserVerified' => $user['UserVerified'],
            'UserActive' => $user['UserActive'],
            'UserType' => $user['UserType'],
            'UserAva' => $user['UserAva'],
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return true;
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
        ];
        helper(['form']);

        if($this->request->getMethod() == 'post')
        {
            //validation
            $rules = [
                'UserName' => 'required',
                'UserEmail' => 'required|valid_email|is_unique[users.UserEmail]',
                'UserUsername' => 'required|is_unique[users.UserUsername]|min_length[4]|max_length[15]',
                'UserPassword' => 'required|min_length[8]|max_length[15]',
                'PasswordConfirm' => 'matches[UserPassword]',
                'UserHometown' => 'required',
                'UserBirthday' => 'required',
                'UserTwitter' => 'required',
                'UserInstagram' => 'required',
                'UserFanart' => 'uploaded[UserFanart]|max_size[UserFanart,1024]|is_image[UserFanart]|mime_in[UserFanart,image/jpg,image/jpeg,image/png]',
                'UserReason' => 'required|max_length[100]',
            ];

            if(!$this->validate($rules))
            {
                $data['validation'] = $this->validator;
            }
            else
            {
                $fanartFile = $this->request->getFile('UserFanart');
                $fanartName = $fanartFile->getRandomName();
                $fanartFile->move('./images', $fanartName);
               

                //store the user in database
                $model = new UserModel();
                $newData = [
                    'UserName' => $this->request->getVar('UserName'),
                    'UserEmail' => $this->request->getVar('UserEmail'),
                    'UserUsername' => $this->request->getVar('UserUsername'),
                    'UserPassword' => $this->request->getVar('UserPassword'),
                    'UserHometown' => $this->request->getVar('UserHometown'),
                    'UserBirthday' => $this->request->getVar('UserBirthday'),
                    'UserTwitter' => $this->request->getVar('UserTwitter'),
                    'UserInstagram' => $this->request->getVar('UserInstagram'),
                    'UserFanart' => $fanartName,
                    'UserReason' => $this->request->getVar('UserReason'),
                    'UserType' => 'Member',
                    'UserVerified' => '0',
                    'UserActive' => '1',
                    'UserAva' => 'def_ava.png',
                ];
               
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Registration Success!');

                return redirect()->to('/login');
            }
        }
        return view('page/register', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}