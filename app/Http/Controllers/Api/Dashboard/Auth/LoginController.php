<?php


namespace App\Http\Controllers\Api\Dashboard\Auth;


use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Admin\Profile\ProfileResource;
use App\Http\Validations\Api\Dashboard\Auth\LoginValidation;
use App\Interfaces\Services\Auth\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    /**
     * @var AuthServiceInterface
     */
    protected $authServiceInterface;



    public function __construct(AuthServiceInterface $authServiceInterface)
    {
        $this->authServiceInterface = $authServiceInterface;

    }

    public function __invoke(Request $request,LoginValidation $validations)
    {

        $this->logInfo(__METHOD__);

        try {

            $info = $request->all();

            /** @var  $validation */
            $validation = $validations->boot($request);

            if ($errorMessages = $validation->getMessageBag()->getMessages())
            {
                return $this->failureResponse(422,$errorMessages);
            }

            if (!$this->authServiceInterface->login($info))
            {
                return $this->failureResponse(422,"wrong credentials");
            }
            $admin = Auth::user();
            $token = $admin->createToken('MyApp')->accessToken;


            return response(['user_info'=>new ProfileResource($admin),'token' => $token],"logged in successfully");

        }
        catch (\Exception $exception)
        {

            return response(500,"some error occurs: " . $this->logError(__METHOD__, $exception));
        }

    }

}
