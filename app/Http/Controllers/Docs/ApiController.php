<?php
/**
 * Created by PhpStorm.
 * User: Pozas91
 * Date: 17/03/2017
 * Time: 13:32
 */

namespace app\Http\Controllers\Docs;


use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function __invoke()
    {
        return view('docs.api');
    }
}