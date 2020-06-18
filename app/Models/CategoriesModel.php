<?php namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table      = 'categories';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'parent'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $validationRules    = [
        'name'     => ['label'  => 'category name','rules' => 'required|is_unique[categories.name]'],
        'parent'   => ['rules' => 'required'],
    ];
    

}