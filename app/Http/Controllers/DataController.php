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

class DataController extends Controller
{
	// homepage
	public function index() {
		return View::make('pages/index');
	}

	public function orders() {
		$retailers = DB::table('retailer')
			->select('id', 'retailer_name')
			->get();
		// echo '<pre>'.print_r($retailers, 1).'</pre>';
		return View::make('pages/orders')->with(array('retailers' => $retailers));
	}
	// order details
	public function details() {
		return View::make('pages/order-details');
	}
	// profile
	public function profile($user_id) {
		$user_info = DB::table('users')
			->select('id', 'name', 'email', 'created_at')
			->where('id', $user_id)
			->first();
		return View::make('pages/profile')->with(array('data' => $user_info));
	}
	// change password
	public function changePassword() {
		return View::make('pages/change-password');
	}

	// reset password (not yet done)
	public function resetPassword(Request $request){
		if(Auth::Check()){
			if (empty($_POST['oldPassword'])){
				Session::flash('message', 'Please input you correct password!');
			}
		}
		return View::make('pages/change-password');
		echo '<pre>'.print_r($_POST, 1).'</pre>';
	}

	public function viewRetailer($id) {
		$data = DB::table('retailer')
			->select('user_id', 'name', 'email' , 'created_at', 'retailer.*')
			->join('users', 'users.id', '=', 'retailer.user_id')
			->where('retailer.id', $id)
			->first();
			// echo '<pre>'.print_r($data, 1).'</pre>';
		return View::make('pages/retailer')->with(array('data' => $data ));
	}

	public function postRetailerInfo() {
		if (!empty( $_POST['retailer_name'])) {
			$retailer_name = $_POST['retailer_name'];
			$description = $_POST['description'];
			$url = $_POST['url'];
			$id = $_POST['id'];

			DB::table('retailer')
				->where('id', $id)
				->update([
					'retailer_name'=>$retailer_name,
					'description'=>$description,
					'url'=>$url
				]);

			Session::flash('message', "Update successful!");
			return redirect()->back();
		} else {
			Session::flash('message', "Retailer name cannot be empty!");
			return Redirect::back();
		}
	}
}
