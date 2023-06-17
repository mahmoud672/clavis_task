<?php

namespace App\Http\Controllers;

use App\Traits\HandleValidationError;
use App\Traits\HttpResponseStatus;
use App\Traits\Status;
use App\Traits\Types;
use App\Traits\Upload;
use App\Traits\ErrorTrait;
use App\Traits\LoggingTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,LoggingTrait;
}
