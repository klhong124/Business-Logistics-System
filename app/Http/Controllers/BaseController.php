<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use View;
use DB;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Routing\Redirector;

class BaseController extends Controller
{
	public function service() {
		$page_name = 'Service';
		// $data = DB::table('users')
			// ->get();

		// echo '<pre>'.print_r($data, 1).'</pre>';
		return View::make('pages/service')->with(array('page_name' => $page_name));
	}

	public function help() {
		$page_name = 'Help';

		return View::make('pages/help')->with(array('page_name' => $page_name));
	}

	public function aboutUs() {
		$page_name = 'About Us';

		return View::make('pages/about-us')->with(array('page_name' => $page_name));
	}
}
