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
        // Load the model
        $userModel = new UserModel();

        // Get the input data
        $data = [
            'id' => htmlspecialchars($this->request->getVar('editUserId')),
            'firstName' => htmlspecialchars($this->request->getVar('editUserFirstName')),
            'lastName' => htmlspecialchars($this->request->getVar('editUserLastName')),
            'email' => htmlspecialchars($this->request->getVar('editUserEmail')),
            'role' => htmlspecialchars($this->request->getVar('editUserRole')),
            'status' => htmlspecialchars(trim($this->request->getVar('editUserStatus')))
        ];

        // Start a transaction
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // Update the employee record
            $userModel->update($data['id'], $data);

            // Complete the transaction
            $db->transComplete();

            // Check if the transaction was successful
            $session = session();
            if ($db->transStatus() === false) {
                // Transaction failed
                $db->transRollback();
                $session->setFlashdata('error', 'Failed to update the user. Please try again.');
            } else {
                // Transaction succeeded
                $session->setFlashdata('success', 'User was updated successfully.');
            }
        } catch (\Exception $e) {
            // Rollback transaction if there was an error
            $db->transRollback();

            // Log the error message
            log_message('error', $e->getMessage());

            // Set error flash message
            $session->setFlashdata('error', 'An error occurred while updating the user. Please try again later.');
        }

        // Redirect back to the edit user page
        return redirect()->to('/users/');
    }
}