<?php


namespace App\Services\Auth;


use App\Interfaces\Services\Auth\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;

class AuthService implements AuthServiceInterface
{

    /**
     * @param array $login_info
     * @return bool|void
     */
    public function login(array $login_info)
    {
        if (array_key_exists("phone",$login_info))
        {
            return $this->loginWithPhone($login_info['phone'],$login_info['password']);
        }
        elseif (array_key_exists("email",$login_info))
        {
            return $this->loginWithEmail($login_info['email'],$login_info['password']);
        }
    }

    /**
     * @param bool $is_current_device_only
     * @return mixed|void
     * @description logged out from current device or from all devices
     */
    public function logout($is_current_device_only = true)
    {

        $user = Auth::user()->token();
        if ($is_current_device_only)
        {
            $user->revoke();
        }
        else
        {
            $tokens =  $user->tokens->pluck('id');
            Token::whereIn('id', $tokens)
                ->update(['revoked'=> true]);

            RefreshToken::whereIn('access_token_id', $tokens)->update(['revoked' => true]);
        }

    }

    /**
     * @param $phone
     * @param $password
     * @return bool
     */
    protected function loginWithPhone($phone,$password,$type_id = null)
    {
        return Auth::attempt(['phone'=>$phone,'password'=>$password,'type_id' => $type_id]);
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    protected function loginWithEmail($email,$password,$type_id = null)
    {
        return Auth::attempt(['email'=>$email,'password'=>$password,'type_id' => $type_id]);
    }
}
