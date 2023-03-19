<?php

class User
{
    private $db, $data, $session_name, $isLoggedIn, $cookieName;

    public function __construct($user = null)
    {
        $this->db = Database::getInstance();
        $this->session_name = Config::get('session.user_session');
        $this->cookieName = Config::get('cookie.cookie_name');
        if (!$user) {
            if (Session::exists($this->session_name)) {
                $user = Session::get($this->session_name);//11
                if ($this->find($user)) {
                    $this->isLoggedIn = true;
                } else {

                }
            }
        }
    }

    public function create($fields = [])
    {
        $this->db->insert('users', $fields);
    }

    public function login($email = null, $password = null, $remember = false){
        if (!$email && !$password && Cookie::exists($this->cookieName)){
            Session::put($this->session_name, $this->data()->id);
        }else {
            $user = $this->find($email);
            if ($user){
                if (password_verify($password,$this->data()->password)){
                    Session::put($this->session_name, $this->data()->id);

                    if ($remember){
                        $hash = hash('sha256', uniqid());

                        $hashCheck = $this->db->get('user_session', ['user_id', '=', $this->data()->id]);

                        if (!$hashCheck->count()){
                            $this->db->insert('user_session', [
                                'user_id' => $this->data()->id,
                                'hash' => $hash,
                            ]);
                        }else{
                            $hash = $hashCheck-> first()-> hash;
                        }

                        Cookie::put($this->cookieName, $hash, Config::get('cookie.cookie_expiry'));
                    }

                    return true;

                }
            }
     }

        }


    public function find($value = null)
    {
        if (is_numeric($value)) {//11
            $this->data = $this->db->get('users', ['id', '=', $value])->first();
        } else {
            $this->data = $this->db->get('users', ['email', '=', $value])->first();

        }
        if ($this->data) {
            return true;
        }
        return false;
    }

    public function data()
    {
        return $this->data;
    }

    public function isLoggedIn()
    {
        return $this->isLoggedIn;
    }

    public function logout(){
        return Session::delete($this->session_name);
    }

    public function exists(){
        return (!empty($this->data())) ? true : false;
    }
    public function update($fields = [], $id = null){
        if (!$id && $this->isLoggedIn()){
            $id = $this->data()-> id;
        }

        $this->db->update('users', $id, $fields);
    }

    public function hasPermissions($key = null){
        $group = $this->db->get('user_groups', ['id', '=', $this->data()->group_id]);
//        $groupID = $this->data()->group_id;
//        $group = $this->db->get('user_groupscomphp', ['id', '=', $groupID] );
        if ($group->count()) {
            $permissions = $group->first()->permissions;
            $permissions = json_decode($permissions, true);

            if ($permissions[$key]){
                return true;
            }
            return false;
        }
    }
}

