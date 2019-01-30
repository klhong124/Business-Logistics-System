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
		$order_details = DB::table('order_details')
			->select('id', 'warehouse', 'sent_datetime', 'arrived_datetime', 'received_datetime')
			->get();

			// if ($order_details[0]->sent_datetime !== null) {
			// 	$sent_datetime = strtotime( $order_details[0]->sent_datetime );
			//    	$sent_date = date('d-M-Y', $sent_datetime);
			// 	$sent_time = date('H:m:s',$sent_datetime);
			// 	# code...
			// }
			// if ($order_details[0]->arrived_datetime !== null) {
			// 	$arrived_datetime = strtotime( $order_details[0]->arrived_datetime );
		 //   		$arrived_date = date('d-M-Y', $arrived_datetime);
			// 	$arrived_time = date('H:m:s',$arrived_datetime);
			// 	# code...
			// }
			// if ($order_details[0]->arrived_datetime !== null) {
			// 	$received_datetime = strtotime( $order_details[0]->received_datetime );
		 //   		$received_date = date('d-M-Y', $received_datetime);
			// 	$received_time = date('H:m:s',$received_datetime);
			// 	# code...
			// }
			// // $sent_datetime = strtotime( $order_details[0]->sent_datetime );
		 // //   	$sent_date = date('d-M-Y', $sent_datetime);
			// // $sent_time = date('H:m:s',$sent_datetime);

			// // $arrived_datetime = strtotime( $order_details[0]->arrived_datetime );
		 // //   	$arrived_date = date('d-M-Y', $arrived_datetime);
			// // $arrived_time = date('H:m:s',$arrived_datetime);

			// // $received_datetime = strtotime( $order_details[0]->received_datetime );
		 // //   	$received_date = date('d-M-Y', $received_datetime);
			// // $received_time = date('H:m:s',$received_datetime);

			// echo $received_datetime;
			// echo $received_date;


		return View::make('pages/order-details')->with(array(
			'order_details' => $order_details,
		));
	}
	// profile
	public function profile() {
		$user_id = Auth::user()->id;
		$user_info = DB::table('users')
			->select('id', 'name', 'email', 'created_at')
			->where('id', $user_id)
			->first();
		return View::make('pages/profile')->with(array('data' => $user_info));
	}
	// change profile
	public function changeProfile() {
		$user_id = Auth::user()->id;
		// print_r($_POST);
		DB::table('users')
			->where('id', $user_id)
			->update(['name' => $_POST['username']]);
			
		return redirect()->back();
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
			->select('retailer.id', 'retailer_name', 'retailer.url', 'retailer.description' , 'users.created_at')
			->join('users', 'users.id', '=', 'retailer.user_id')
			->where('retailer.id', $id)
			->first();
			// echo '<pre>'.print_r($data, 1).'</pre>';
		return View::make('pages/retailer')->with(array('data' => $data));
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
			return redirect::back();
		}
	}
}
