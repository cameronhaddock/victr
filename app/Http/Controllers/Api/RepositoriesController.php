<?php

namespace App\Http\Controllers\Api;

use App\Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Ixudra\Curl\Facades\Curl;
class RepositoriesController extends Controller
{
    public function all()
    {


        return Repository::getFromGithub();
    }
}
