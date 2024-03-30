<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class RestController extends ResourceController {
    protected $session;

    public function __construct() {
        $this->session = session();
    }
    protected function sendData($data = null, $message = "Successful !", $status = true) {
        $data = array(
            "status" => $status,
            "message" => $message,
            "data" => $data,
        );
        return $this->respond($data);
    }
    protected function sendError($message = "Fail !", $data = null) {
        $data = array(
            "status" => false,
            "message" => $message,
            "data" => $data,
        );
        return $this->respond($data);
    }
    protected function getPost($index = false) {
        if ($this->request->is('json')) $body = !$index ? $this->request->getVar() : $this->request->getVar($index);
        else $body =  !$index ? $this->request->getPost() : $this->request->getPost($index);
        return (object) $body;
    }
    protected function is_number($str) {
        return is_numeric($str);
        return preg_match("/^[0-9]{1,}$/", $str);
    }
    protected function validate_phone($tel) {
        return preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $tel);
    }
    protected function validate_username($username) {
        return preg_match("/^[A-Za-z0-9]{6,30}$/", $username);
    }
    protected function validate_password($password) {
        return $password && strlen($password);
        return preg_match('/^[\w\d_@\-]{6,20}$/', $password);
    }
    protected function clean($string, $tolower = true) {
        if ($tolower) $string = strtolower($string);
        $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.

        return  $string; // Replaces multiple hyphens with single one.
    }
    protected function resize_image($path, $maxw = 100, $maxh = 100) {
        return;
        if (!$path) return;
        $lib = \Config\Services::image();
        $image = $lib->withFile($path);
        $props = $image->getFile()->getProperties(true);

        if ($props["width"] > $maxw) $image->resize($maxw, $maxh, true, "width");
        if ($props["height"] > $maxh) $image->resize($maxw, $maxh, true, "height");

        $image->save($path);
        unset($lib, $image, $props);
    }

    protected function unlink_image($url) {
        if (!$url) return;
        $uri = new \CodeIgniter\HTTP\URI($url);
        $path = $uri->getPath();
        try {
            $full_path = $_SERVER['DOCUMENT_ROOT'] . $path;
            unlink($full_path);
        } catch (Exception $e) {
        }
        unset($uri, $path);
    }
}
