<?php namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'UserID';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'UserName',
        'UserUsername',
        'UserEmail',
        'UserPassword',
        'UserHometown',
        'UserBirthday',
        'UserTwitter',
        'UserInstagram',
        'UserFanart',
        'UserReason',
        'UserAva',
        'UserBio',
        'UserVerified',
        'UserActive',
        'UserType_FK'
    ];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }
    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data)
    {
        if(isset($data['data']['UserPassword']))
            $data['data']['UserPassword'] = password_hash($data['data']['UserPassword'], PASSWORD_DEFAULT);
        return $data;
    }

    public function getUser($UserUsername = false)
    {
        if($UserUsername == false)
        {
            return $this->db->table('users')->join('users_type', 'users.UserType_FK = users_type.UserTypeID')->get()->getResultArray();
        }
        return $this->where(['UserUsername' => $UserUsername])->first();
    }
}