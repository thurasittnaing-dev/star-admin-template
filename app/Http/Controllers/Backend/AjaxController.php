<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Service\AjaxService;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    private $ajaxService;

    public function __construct()
    {
        $this->ajaxService = new AjaxService;
    }
    public function cleanSession(Request $request)
    {
        return response()->json($this->ajaxService->cleanSession($request));
    }
}
