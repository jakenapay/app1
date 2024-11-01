<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\EmployeeModel;
use App\Models\UserModel;
use function PHPUnit\Framework\any;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function homepage()
    {
        return view('homepage');
    }

    // select all product
    public function product()
    {
        $productModel = new ProductModel();
        $data['data'] = $productModel->findAll();

        // show in the ui
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        return view('product', $data);
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

    public function sendMail()
    {
        // recipient 
        $to = 'jakemantesnapay@gmail.com'; 
        $subject = '';
        $message = '';
        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setSubject($subject);
        $email->setFrom('jakemantesnapay@gmail.com', $subject);
        $email->setMessage($message);
        if ($email->send()) {
            echo 'main sent successfully';
        } else {
            $data = $email->printDebugger();
            print ($data);
        }
    }

    public function mail()
    {
        $this->sendMail();
    }

    public function showProfile($id = null) {
        $employeeModel = new EmployeeModel();
        $data['data'] = $employeeModel->where('id', $id)->first();
        return view('profile', $data);
    }
}