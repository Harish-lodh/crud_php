<?php

namespace App\Controllers;

use App\Models\Homemodel;

class Home extends BaseController
{
    protected $MyModel;

    public function __construct()
    {
        $this->MyModel = new Homemodel();
    }
    public function index()
    {

        return view('welcome_message');
    }
    public function details()
    {   
        $data['data'] = $this->MyModel->getDetails();
        
        return view("Details", $data);
    }




    public function add()
    {

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $Description = $this->request->getPost('Description');
        $gender = $this->request->getPost('gender');
        echo $name;
        if ($name && $email && $Description && $gender) {
            $this->MyModel->addData([
                'name' => $name,
                'email' => $email,
                'description' => $Description,
                'gender' => $gender
            ]);

            session()->setFlashdata('success', 'Data Add successfull!');
            return redirect()->to('/Details');
            
        } else {
            session()->setFlashdata('error', 'Adding failed !');
        }
    }

    function delete($id)
    {

        if ($this->MyModel->getdelete($id)) {
            echo "Record deleted successfully";
            session()->setFlashdata('success', 'Data successful deleted!');
            return redirect()->to("/Details");
        } else {
            echo " Error deleting records";
            session()->setFlashdata('error', 'Deleting failed !');
        }
    }
   public function fetchEmp($id){
    $data = $this->MyModel->find($id);
    return $this->response->setJSON($data);
   }



public function update()
{
    $userModel = new Homemodel();

    $data = [
          'id' => $this->request->getPost('id'),
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
        'description' => $this->request->getPost('description'),
        'gender' => $this->request->getPost('gender'),
    ];

    if (!$userModel->find($data['id'])) {
        // User not found, handle error
        return redirect()->to('/Details')->with('error', 'User not found');
    }

    $userModel->update($data['id'],$data);
    return redirect()->to('/Details')->with('success', 'User  updated successfully');
}}