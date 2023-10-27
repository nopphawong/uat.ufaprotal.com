<?php

namespace App\Controllers\api;

use App\Libraries\Encrypter;
use App\Models\AgentModel;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        $body = $this->getPost();

        $userModel = new UserModel();
        $user = $userModel->where("username", $body->username)->first();
        if (empty($user)) return $this->response(null, "Username not found !", false);
        if ($user->password != $body->password) return $this->response(null, "Password not match !", false);
        if (!$user->status) return $this->response(null, "Username inactived !", false);

        $agentModel = new AgentModel();
        $agent = $agentModel->where("code", $user->agent)->first();
        if (empty($agent)) return $this->response(null, "Agent not found !", false);
        if (!$agent->status) return $this->response(null, "Agent inactived !", false);

        $session_data = [
            "logged_in" => true,
            "username" => $user->username,
            "role" => $user->role,
            "agent" => (object) [
                "code" => $agent->code,
                "key" => $agent->key,
                "secret" => $agent->secret,
            ],
        ];

        $ect = new Encrypter();
        $plaintext = $ect->data_to_plaintext($session_data);
        $encoded = $ect->encode($plaintext);
        return $this->response(["url" => site_url("detect/{$encoded}")], $encoded);
    }
}