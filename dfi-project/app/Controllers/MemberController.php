<?php namespace App\Controllers;
use App\Models\UserModel;

class MemberController extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Member',
            'member' => $this->UserModel->getUser(),
        ];
        return view('member/index', $data);
    }

    public function read()
    {

    }
}