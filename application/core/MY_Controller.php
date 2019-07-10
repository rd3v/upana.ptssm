<?php
defined('BASEPATH') or exit('No direct script access allowed');

/***********************************************************

 *************************************************************/

class MY_Controller extends CI_Controller
{

    private $jwtToken;
    public $payload;
    public $user;

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('jwt');
        $this->load->model('user');
    }

    public function getRoute() {
        $routes = array_reverse($this->router->routes); // All routes as specified in config/routes.php, reserved because Codeigniter matched route from last element in array to first.
        foreach ($routes as $key => $val) {
        $route = $key; // Current route being checked.
        
            // Convert wildcards to RegEx
            $key = str_replace(array(':any', ':num'), array('[^/]+', '[0-9]+'), $key);
        
            // Does the RegEx match?
            if (preg_match('#^'.$key.'$#', $this->uri->uri_string(), $matches)) break;
        }
        
        if ( ! $route) $route = $routes['default_route']; // If the route is blank, it can only be mathcing the default route.
        
        return $route;
    }

    public function generateIdPelanggan($id) {
        $x = date("dmy");
        function add_nol($number,$add_nol) {
        while (strlen($number)<$add_nol) {
            $number = "0".$number;
        }
        return $number;
        }

        return add_nol($id,3).$x;
    }

    /**
     * Send Response
     *
     * @param    array        $data   Response body
     * @param     int         $code   HTTP Response code (default: 200)
     * @param    array       $header  Response header (default array[])
     *
     * @return HTTP Response;
     */
    public function sendResponse($data, $code = 200, $headers = array())
    {
        foreach ($headers as $key => $value) {
            $this->output->set_header($key . " : " . $value);
        }
        $this->output->set_content_type("application/json");
        $this->output->set_header("Access-Control-Allow-Origin: *");
        $this->output->set_header("X-Message: ApiBuilder/1.0");
        $this->output->set_header("Server: ApiBuilder", true);
        $this->output->set_status_header($code);
        $this->output->set_output(json_encode($data));
    }

    /**
     * Get Request Body
     * 
     * Get data from request body and parse to array 
     * 
     * @param  array  $key Must exist key
     *
     * @return mixed;
     */

    public function getBody($key = [])
    {
        $data = json_decode($this->input->raw_input_stream, true);
        foreach ($key as $value) {
            if (!isset($data[$value])) {

                $this->sendError("Request tidak valid", 400);
                die();
                
            }
        }
        return $data;
    }

    public function checkToken()
    {
        $status = "auth";
        $headers = $this->input->get_request_header("Authorization");
        list($token) = sscanf($headers, "Bearer %s");

        if ($token === null) {
            $this->output->set_status_header(401);
            die();
        }

        $this->jwtToken = $token;
    }

    public function checkAuth()
    {
        $request = $this->getBody();
        if (isset($request['id']) && isset($request['token'])) {
            $isAuth = $this->user->checkAuth($request['id'], $request['token']);

            if (!$isAuth) {
                $this->output->set_status_header(401);
                die();
            }

        } else {
            $this->sendError("Request tidak valid", 400);
            die();
        }

    }

    public function generateToken()
    {
        $input = $this->getBody();
        $iss = $this->input->get_request_header('User-agent', true);
        $user = $this->user;
        $payload = array('id' => $user['nim'], 'name' => $user['nama'], 'iss' => $iss);
        $token = $this->jwt->encode($payload, $iss . "nursan");

        return $token;
    }

    public function validateLogin()
    {
        $input = $this->getBody();

        if (isset($input['nim']) && isset($input['pass'])) {

            $result = $this->login->chekUser($input['nim']);

            if ($result === null) {
                throw new Exception("NIM tidak terdaftar atau salah", 1);
            } else {
                if (password_verify($input['pass'], $result['pass'])) {
                    $this->user = array(
                        'nim' => $result['nim'],
                        'nama' => $result['nama'],
                    );
                    return true;
                } else {
                    throw new Exception("Password anda salah", 1);
                }
            }

        } else {
            throw new Exception("check your field", 1);
        }
    }

    public function checkTable($table)
    {
        if ($this->db->table_exists($table)) {
            if (in_array($table, array('tables', 'users'))) {
                throw new Exception("Table forbiden", 1);
            } else {
                return true;
            }
        } else {
            throw new Exception("Table " . $table . " doest'n exists", 1);

        }
    }

    public function sendError($message, $code = 400)
    {
        $data = array('status' => 'error', 'desc' => $message);
        $this->output->set_status_header($code);
        $this->output->set_content_type("application/json");
        $this->output->set_header("Access-Control-Allow-Origin: *");
        $this->output->set_header("X-Message: ApiBuilder/1.0");
        $this->output->set_header("Server: ApiBuilder", true);
        $this->output->set_output(json_encode($data));

    }

    public function getRandomString($n) { 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $randomString = ''; 
      
        for ($i = 0; $i < 10; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
      
        return $randomString; 
    }

}

 