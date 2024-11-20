<?php

namespace App\Models;

use CodeIgniter\Model;

class Homemodel extends Model
{
  protected $table = "crudapp";
  protected $primaryKey = "id";
  protected $allowedFields = ['name', 'email', 'description', 'gender'];
  public function getDetails()
  {
    return $this->findAll();
  }
  public function addData($data)
  {
    return $this->insert($data);
  }
  public function getdelete($id)
  {
    return $this->delete($id);
  }

  
}
