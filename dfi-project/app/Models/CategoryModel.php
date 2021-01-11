<?php namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'CategoryID';
    protected $useTimestamps = true;
    protected $allowedFields = [ 'CategoryName' ];

    public function getCategory()
    {
        return $this->findAll();
    }
}