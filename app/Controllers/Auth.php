<?php

namespace App\Controllers;
use App\Models\EmployeeModel;
use CodeIgniter\Model;
use App\Models\UserModel;
use function PHPUnit\Framework\any;

class Auth extends BaseController
{

    protected $userModel; // Declare userModel as a property
    protected $db; // Declare db as a property

    public function token($length)
    {
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        return substr(str_shuffle($str_result), 0, $length);
    }

    public function loginPage()
    {
        // return view('register');
        return view('login');
    }

    public function register()
    {
        helper(['form']);
        $data = [

        ];
        return view('register', $data);
    }

    public function insert()
    {
        // Load form helper
        helper(['form']);

        // Get request data
        $requestData = [
            'firstName' => $this->request->getVar('firstName'),
            'lastName' => $this->request->getVar('lastName'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'confirmPassword' => $this->request->getVar('confirmPassword'),
            'role' => $this->request->getVar('role'),
            'status' => $this->request->getVar('status')
        ];

        $userModel = new UserModel();
        // Validate email uniqueness
        if ($userModel->where('email', $requestData['email'])->first()) {
            return redirect()->to('/register')->withInput()->with('error', 'Email already exists. Please use a different email.');
        }

        // Check if the passwords match
        if ($requestData['password'] !== $requestData['confirmPassword']) {
            return redirect()->to('/register')->withInput()->with('error', 'Passwords do not match. Please try again.');
        }

        // Prepare user data for saving
        $data = [
            'firstName' => $requestData['firstName'],
            'lastName' => $requestData['lastName'],
            'email' => $requestData['email'],
            'password' => password_hash($requestData['password'], PASSWORD_DEFAULT),
            'role' => $requestData['role'],
            'status' => $requestData['status'],
            'token' => $this->token(100)
        ];

        // Attempt to save the user data
        if ($userModel->save($data)) {
            return redirect()->to('/loginPage')->with('success', 'User registered successfully.');
        } else {
            return redirect()->to('/register')->withInput()->with('error', 'Failed to register user. Please try again.');
        }
    }

    public function auth()
    {
        $session = session();
        $userModel = new UserModel();

        // Get email and password from the request
        $email = htmlspecialchars($this->request->getVar('email'));
        $password = htmlspecialchars($this->request->getVar('password'));

        // Fetch the user data by email
        $db_data = $userModel->where('email', $email)->first();

        // Check if the user exists
        if (!$db_data) {
            // Redirect to login page with error message if user not found
            return redirect()->to('/loginPage')->withInput()->with('error', 'Invalid email or password.');
        }

        // Verify the password
        if (password_verify($password, $db_data['password'])) {
            // Check if the account is active
            if ($db_data['status'] === 'inactive') {
                return redirect()->to('/loginPage')->withInput()->with('error', 'Account is inactive.');
            }

            // Set session data for the logged-in user
            $session_data = [
                'id' => $db_data['id'],
                'firstName' => $db_data['firstName'],
                'lastName' => $db_data['lastName'],
                'email' => $db_data['email'],
                'token' => $db_data['token'],
                'role' => $db_data['role'],
                'status' => $db_data['status'],
                'isLoggedIn' => TRUE,
            ];
            $session->set($session_data);

            // Redirect to users page on successful login
            return redirect()->to('/users');
        } else {
            // Redirect back to login page with error message if password is incorrect
            return redirect()->to('/loginPage')->withInput()->with('error', 'Invalid email or password.');
        }
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $db_data = $userModel->where('email', $email)->first();

        if ($db_data) {
            $pass = $db_data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $session_data = [
                    'id' => $db_data['id'],
                    'firstName' => $db_data['firstName'],
                    'lastName' => $db_data['lastName'],
                    'email' => $db_data['email'],
                    'token' => $db_data['token'],
                    'role' => $db_data['role'],
                    'status' => $db_data['status'],
                    'isLoggedIn' => TRUE,
                ];
                $session->set($session_data);

                // Redirect to users page on successful login
                return redirect()->to('/users');

            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/register');
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/register');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/loginPage');
    }
}
