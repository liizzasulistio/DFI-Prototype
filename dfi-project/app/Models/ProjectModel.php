<?php namespace App\Models;
use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'ProjectID';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'ProjectTitle',
        'slug',
        'ProjectCategory_FK',
        'ProjectStart',
        'ProjectEnd',
        'ProjectDeadline',
        'ProjectPost',
        'ProjectColor',
        'ProjectCanvas',
        'ProjectDescription',
    ];

    public function getProject($slug = false)
    {
        if($slug == false)
        {
         // return $this->db->table('projects')->join('categories', 'projects.ProjectCategory_FK = categories.CategoryID')->get()->getResultArray();
          return $this->db->table('projects')->
          join('categories', 'projects.ProjectCategory_FK = categories.CategoryID')->get()->getResultArray();
            //$merge_tab = $this->db->table('projects')->join('categories', 'projects.ProjectCategory_FK = categories.CategoryID')->paginate(10);
            // return $merge_tab;
            // return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }    


}