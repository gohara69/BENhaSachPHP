<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public abstract function findAll(Request $request);
    public abstract function findById($id);
    public abstract function create(Request $request);
    public abstract function update(Request $request, $id);
    public abstract function delete($id);
}
