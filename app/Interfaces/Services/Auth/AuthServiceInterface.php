<?php


namespace App\Interfaces\Services\Auth;


interface AuthServiceInterface
{

    /**
     * @param $login_info
     */
    public function login(array $login_info);

    /**
     * @param $is_current_device_only
     * @return mixed
     */
    public function logout($is_current_device_only);

}
