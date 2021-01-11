<?php namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\CategoryModel;
use App\Models\ParticipantModel;
use App\Models\UserModel;

class ProjectController extends BaseController
{
    protected $project;
    public function __construct()
    {
        $this->ProjectModel = new ProjectModel();
        $this->CategoryModel = new CategoryModel();
        $this->ParticipantModel = new ParticipantModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_project') ? $this->request->getVar('page_project') : 1;
       // $projectID = $this->request->getPost('ProjectID');
        $data = [
           'title' => 'Project',
           //'project' => $this->ProjectModel->getProject(),
            'project' => $this->ProjectModel->join('categories', 'projects.ProjectCategory_FK = categories.CategoryID')->paginate(10, 'project'),
           // 'participant' => $this->ParticipantModel->getParticipant(),
        //    'participant' => $this->ParticipantModel->query("SELECT users.UserUsername
        //    FROM participants
        //    JOIN users ON users.UserID=participants.ParticipateID
        //    WHERE ProjectID_FK='$projectID'")->getResultArray(),
            // 'participant' => $this->ParticipantModel->join('users', 'participants.UserID_FK = users.UserID')->join('projects', 'participants.ProjectID_FK' = 'projects.ProjectID')
            'pager' => $this->ProjectModel->pager,
            'currentPage' => $currentPage,
            ];
        return view('project/index', $data);
    }

    // public function create()
    // {
    //     $data = [
    //         'title' => 'Add Project',
    //         'category' => $this->CategoryModel->getCategory(),
    //     ];
    //     helper(['form']);
    //     $model = new ProjectModel();

    //     if($this->request->getMethod() == 'post')
    //     {
    //         //validation
    //         $rules = [
    //             'ProjectTitle' => 'required|is_unique[projects.ProjectTitle]',
    //             'ProjectCategory_FK' => 'required',
    //             'ProjectStart' => 'required',
    //             'ProjectEnd' => 'required',
    //             'ProjectDeadline' => 'required',
    //             'ProjectPost' => 'required',
    //             'ProjectColor' => 'required',
    //             'ProjectCanvas' => 'required',
    //             'ProjectDescription' => 'required',
    //         ];
    //         $errors = [
    //             'ProjectTitle' => [
    //                 'required' => '{field} is required.',
    //                 'is_unique'=>'This project name is already used in database.'
    //             ],
    //             'ProjectStart' => [
    //                 'required' => '{field} is required.'
    //             ],
    //             'ProjectEnd' => [
    //                 'required' => '{field} is required.'
    //             ],
    //             'ProjectDeadline' => [
    //                 'required' => '{field} is required.'
    //             ],
    //             'ProjectPost' => [
    //                 'required' => '{field} is required.'
    //             ],
    //             'ProjectColor' => [
    //                 'required' => '{field} is required.'
    //             ],
    //             'ProjectCanvas' => [
    //                 'required' => '{field} is required.'
    //             ],
    //             'ProjectDescription' => [
    //                 'required' => '{field} is required.'
    //             ]
    //         ];

    //         if(!$this->validate($rules, $errors))
    //         {
    //             $data['validation'] = $this->validator;
    //         }
    //         else
    //         {
    //             //store the project in database
    //             $slug = url_title($this->request->getVar('ProjectTitle'), '-', true);
    //             $newData = [
    //                 'ProjectTitle' => $this->request->getVar('ProjectTitle'),
    //                 'slug' => $slug,
    //                 'ProjectCategory_FK' => $this->request->getVar('ProjectCategory_FK'),
    //                 'ProjectStart' => $this->request->getVar('ProjectStart'),
    //                 'ProjectEnd' => $this->request->getVar('ProjectEnd'),
    //                 'ProjectDeadline' => $this->request->getVar('ProjectDeadline'),
    //                 'ProjectPost' => $this->request->getVar('ProjectPost'),
    //                 'ProjectColor' => $this->request->getVar('ProjectColor'),
    //                 'ProjectCanvas' => $this->request->getVar('ProjectCanvas'),
    //                 'ProjectDescription' => $this->request->getVar('ProjectDescription'),
    //             ];  
    //             $model->save($newData);
    //             return redirect()->to('/project');
    //         }
    //     }
    //     return view ('project/create', $data);
    // }

    public function create()
    {
        if (session()->get('UserType') == 'Project Officer')
        {
            $data = [
                'title' => 'Add Project',
                'category' => $this->CategoryModel->getCategory(),
                'validation' => \Config\Services::validation()
            ];
            return view('project/create', $data);
        }
        return redirect()->to('/project');
    }


    public function save()
    {
        //validation
        if(!$this->validate([
            'ProjectTitle' => [
                'rules' => 'required|is_unique[projects.ProjectTitle]',
                'errors' => [
                    'required' => '{field} is required.',
                    'is_unique'=>'This project name is already used in database.'
                ]
            ],
            'ProjectStart' => [
                'rules' => 'required',
                'errors' => '{field} is required.'
            ],
            'ProjectEnd' => [
                'rules' => 'required',
                'errors' => '{field} is required.'
            ],
            'ProjectDeadline' => [
                'rules' => 'required',
                'errors' => '{field} is required.'
            ],
            'ProjectPost' => [
                'rules' => 'required',
                'errors' => '{field} is required.'
            ],
            'ProjectColor' => [
                'rules' => 'required',
                'errors' => '{field} is required.'
            ],
            'ProjectCanvas' => [
                'rules' => 'required',
                'errors' => '{field} is required.'
            ]
        ]))
        {
            $validation = \Config\Services::validation();
            return redirect()->to('/add-project')->withInput()->with('validation', $validation);
        }


        $slug = url_title($this->request->getVar('ProjectTitle'), '-', true);
        $this->ProjectModel->save([
            'ProjectTitle' => $this->request->getVar('ProjectTitle'),
            'slug' => $slug,
            'ProjectCategory_FK' => $this->request->getVar('ProjectCategory_FK'),
            'ProjectStart' => $this->request->getVar('ProjectStart'),
            'ProjectEnd' => $this->request->getVar('ProjectEnd'),
            'ProjectDeadline' => $this->request->getVar('ProjectDeadline'),
            'ProjectPost' => $this->request->getVar('ProjectPost'),
            'ProjectColor' => $this->request->getVar('ProjectColor'),
            'ProjectCanvas' => $this->request->getVar('ProjectCanvas'),
            'ProjectDescription' => $this->request->getVar('ProjectDescription')
        ]);
        session()->setFlashdata('message', 'Project has been added.');
        return redirect()->to('/project');
    }




    public function update($slug)
    {
        $data = [
            'title' => 'Edit Project',
            'project' => $this->ProjectModel->getProject($slug),
            'category' => $this->CategoryModel->getCategory()
        ];
        return view('project/update', $data);
    }
    // public function detail($slug)
    // {
    //     $projectID = $this->ProjectModel
    //     $data = [
    //         'title' => 'Project Detail',
    //         'project' => $this->ProjectModel->getProject($slug),
    //     ];
        
    //     // $project = $this->ProjectModel->where(['slug' => $slug])->first();
    //   //  $project = $this->ProjectModel->getProject($slug);
    //  //  dd($data);
    //    // echo $slug;
    //     //jangan lupa buat error page kalau misalnya ngga ada
    //     // return view('project/read', $data);
    //     return view('project/index', $data);
    // }

    public function delete($ProjectID)
    {
        $this->ProjectModel->delete($ProjectID);
        session()->setFlashdata('message', 'Project has been deleted.');
        return redirect()->to('/project');
    }

}