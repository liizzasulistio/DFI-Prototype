<?php namespace App\Controllers;
use App\Models\ParticipantsModel;
use App\Models\ProjectModel;
use App\Models\UserModel;

class ParticipantsController extends BaseController
{
    protected $participants;
    public function __construct()
    {
        $this->ParticipantsModel = new ParticipantsModel();
        $this->UserModel = new UserModel();
        $this->ProjectModel = new ProjectModel();
    }

    public function index()
    {
        $data = [
           'participants' => $this->ParticipantsModel->getParticipants(),
        ];
        return view('project/index', $data);
    }


}