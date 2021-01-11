<?php namespace App\Models;
use CodeIgniter\Model;
use App\Models\ProjectModel;

class ParticipantModel extends Model
{
    protected $table = 'participants';
    protected $primaryKey = 'ParticipateID';
    protected $useTimestamps = true;
    protected $allowedField = [
        'ProjectID_FK',
        'UserID_FK'
    ];

    // public function getParticipant()
    // {
    //     return $this->table('participants')
    //     ->join('projects', 'projects.ProjectID = participants.ProjectID_FK')
    //     ->join('users', 'users.UserID = users.UserID_FK')
    //     ->get()->getResultArray();
    // }

    // public function getParticipant($ProjectID_FK = false)
    // {
    //     if($ProjectID_FK == false)
    //     {
        
    //     //   return $this->db->table('participants')->
    //     //   join('users', 'participants.UserID_FK = users.UserID')->get()->getResultArray();
    //       return $this->db->join('users', 'participants.UserID_FK = users.UserID')
    //       ->join('projects', 'participants.ProjectID_FK' = 'projects.ProjectID')->where->
    //     }
    //     return $this->where(['ProjectID_FK' => $ProjectID_FK])->first();
    // }    


    public function getParticipant($ProjectID)
    {
      $query = $this->db->query("SELECT users.UserUsername
      FROM participants
      JOIN users ON users.UserID=participants.ParticipateID
      WHERE ProjectID_FK=$ProjectID");
      return $query->result;
    }
    // public function getParticipant($ParticipateID)
    // {
    //     $this->db->select('users.Username, projects.ProjectID')
    //     ->from('users as u')
    //     ->join('users', 'participants.UserID_FK = users.UserID')
    //     ->join('projects', 'participants.ProjectID_FK = projects.ProjectID');
    //     $this->db->where('participants.ParticipateID', $ParticipateID);
    //     $query = $this->db->get ();
    //     return $query->row();
    // }

}