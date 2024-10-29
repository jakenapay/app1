<?php

namespace App\Controllers;
use App\Models\EmployeeModel;
use App\Models\UserModel;
use function PHPUnit\Framework\any;

class Users extends BaseController
{
    protected $userModel; // Declare userModel as a property
    protected $db; // Declare db as a property

    public function users(): string
    {
        return view('users');
    }

    // Show all employees
    public function showEmployees()
    {
        $productModel = new EmployeeModel();
        $data['data'] = $productModel->findAll();
        // show in the ui
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        return view('users', $data);
    }

    public function editUser($id = null)
    {
        // echo $id;
        $productModel = new EmployeeModel();
        $data['data'] = $productModel->where('id', $id)->first();
        // var_dump($data);
        return view('editUser', $data);
    }

    public function update()
    {
        // Load the model (make sure this is in the constructor or method)
        $userModel = new UserModel();
        $this->userModel->db->transStart();

        // Get the input data
        $data = [
            'id' => htmlspecialchars($this->request->getVar('id')),
            'firstName' => htmlspecialchars($this->request->getVar('firstName')),
            'lastName' => htmlspecialchars($this->request->getVar('lastName')),
            'email' => htmlspecialchars($this->request->getVar('email')),
            'role' => htmlspecialchars($this->request->getVar('role')),
            'status' => htmlspecialchars(trim($this->request->getVar('status')))
        ];

        // Start a transaction
        $this->db->transStart();

        try {
            // Update the employee record
            $userModel->set($data);
            $userModel->where('id', $this->request->getVar('id'));
            $updateResult = $userModel->update();

            // Check if the update was successful
            $session = session();
            if ($this->db->affectedRows() > 0) {
                // Set success message
                $session->setFlashdata('success', 'User was updated successfully.');
            } else {
                // Set failure message (no rows affected)
                $session->setFlashdata('error', 'No changes were made or user not found.');
            }

            // Complete the transaction
            $this->db->transComplete();
        } catch (\Exception $e) {
            // Rollback transaction if there was an error
            $this->db->transRollback();

            // Log the error message (consider using a logging library)
            log_message('error', $e->getMessage());

            // Set error flash message
            $session->setFlashdata('error', 'An error occurred while updating the user. Please try again later.');
        }

        // Redirect back to the edit user page
        return redirect()->to('/editUser/' . $this->request->getVar('id'));
    }
}