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



}