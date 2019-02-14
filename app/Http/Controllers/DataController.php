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
use Hash;
use App\User;

class DataController extends Controller
{
	// homepage
	public function index() {
		return View::make('pages/index');
	}

	// orders
	public function orders() {
		$order_details = DB::table('order_details')
			->join('retailer', 'retailer.retailer_id', '=', 'order_details.retailer_id')
			->select('invoice_id', 'retailer.retailer_id', 'retailer_name', 'received_datetime', 'updated_at', 'archived_status')
			->get();

		// echo '<pre>'.print_r($order_details, 1).'</pre>';
		return View::make('pages/orders')->with(array('order_details' => $order_details));
	}

	// Archived changed
	public function orderPost() {
		$order_details = DB::table('order_details')
			->join('retailer', 'retailer.retailer_id', '=', 'order_details.retailer_id')
			->select('invoice_id', 'retailer.retailer_id', 'retailer_name', 'received_datetime', 'updated_at', 'archived_status')
			->get();

		$invoice_id = $_POST['invoice_id'];
		// $archived_status = ($_POST['archived_choice'] == 'Yes') ? "1" : "0";

		if($_POST['archived_choice'] == 'Yes'){
			DB::table('order_details')
				->where('invoice_id', $invoice_id)
				->update([
					'archived_status' => "1",
					'updated_at' => NOW()
				]);

				return back();
		} else {
			return View::make('pages/orders')->with(array('order_details' => $order_details));
		}

		// echo '<pre>'.print_r($datetime_now, 1).'</pre>';

	}

	public function confirmOrder($invoice_id) {
		$check = DB::table('order_details')
			->select('invoice_id')
			->where('invoice_id', $invoice_id)
			->where('archived_status', '0')
			->first();

		// echo '<pre>'.print_r($check, 1).'</pre>';

		if (!empty($check->invoice_id)) {
			DB::table('order_details')
			->where('invoice_id', $invoice_id)
			->update([
				'archived_status' => "1",
				'updated_at' => NOW()
			]);
		}

		return back();

		// print_r($invoice_id);
	}

	// order details
	public function details($invoice_id) {
		$order_details = DB::table('order_details')
			->select('invoice_id', 'warehouse', 'sent_datetime', 'arrived_datetime', 'received_datetime', 'archived_status')
			->get();

		$data = DB::table('order_details')
			->select('order_details.*', 'dummy_2.*')
			->join('dummy_2', 'dummy_2.invoice_id', 'order_details.invoice_id')
			->where('order_details.invoice_id', $invoice_id)
			->first();

		$product_list_str = json_decode(str_replace("'", '"', $data->product_list));
		$customer_info_str = json_decode(str_replace("'", '"', $data->customer_info));

		// $test = '[{"name": "John Doe",
		// 	"address": "115 Dell Avenue, Somewhere",
		// 	"tel": "999-3000",
		// 	"occupation" : "Clerk"},
		// 	{"name": "Jane Doe",
		// 	"address": "19 Some Road, Somecity",
		// 	"tel": "332-3449",
		// 	"occupation": "Student"}]';
		// $temp = json_decode($test);
		echo '<pre>'.print_r($customer_info_str, 1).'</pre>';

		return View::make('pages/order-details')->with(array(
			'order_details' => $order_details,
			'data' => $data,
			// 'product_list_str' => $product_list_str,
			'customer_info_str' => $customer_info_str
		));

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
			$current_password = Auth::user()->password;

			if (empty($_POST['oldPassword'])) {
				Session::flash('message', 'Please input you correct password!');
			} elseif (empty($_POST['newPasswordA'])) {
				Session::flash('message', 'New password cannot be empty!');
			} elseif (empty($_POST['newPasswordB'])) {
				Session::flash('message', 'Confirm password cannot be empty!');
			} elseif (strlen($_POST['newPasswordA']) < 6) {
				Session::flash('message', 'New password must contain at least 6 characters');
			} elseif (strlen($_POST['newPasswordB']) < 6) {
				Session::flash('message', 'Confirm password must contain at least 6 characters');
			} elseif ($_POST['newPasswordA'] != $_POST['newPasswordB']) {
				Session::flash('message', 'New password and confirm password must be the same!');
			} elseif (!(Hash::check($_POST['oldPassword'], $current_password))) {
				Session::flash('message', 'Old password incorrect!');
			} elseif (Hash::check($_POST['newPasswordA'], $current_password)) {
				Session::flash('message', 'New password cannot be same as old password!');
			} else {
				$user_id = Auth::User()->id;
				$obj_user = User::find($user_id);
				$obj_user->password = Hash::make($_POST['newPasswordB']);
				$obj_user->save();
				Session::flash('success', 'Change password successful!');
			}
		}
		return View::make('pages/change-password');
		echo '<pre>'.print_r($_POST, 1).'</pre>';
	}

	public function viewRetailer($id) {
		$data = DB::table('retailer')
			->select('retailer.id', 'retailer_name', 'retailer.url', 'retailer.description' , 'users.created_at')
			->join('users', 'users.id', '=', 'retailer.user_id')
			->where('retailer.retailer_id', $id)
			->first();
		$count = DB::table('order_details')
			->where('retailer_id', $id)
			->count('retailer_id');
			// echo '<pre>'.print_r($count, 1).'</pre>';
		return View::make('pages/retailer')->with(array('data' => $data, 'count' => $count));
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
	public function query() {
		$keyword = $_GET['q'];
		// echo '<pre>'.print_r($keyword, 1).'</pre>';
		$order_details = DB::table('order_details')
			->join('retailer', 'retailer.retailer_id', '=', 'order_details.retailer_id')
			->select('invoice_id', 'retailer.retailer_id', 'retailer_name', 'received_datetime', 'updated_at', 'archived_status')
			->where('invoice_id', $keyword)
			->get();
		// echo '<pre>'.print_r($order_details, 1).'</pre>';
		return View::make('pages/orders')->with(array('order_details' => $order_details));

		// $result = DB::table('retailer')
		// 	->where('retailer_name', 'like',  $keyword)
		// 	->select('retailer_name')
		// 	->get();
	}

	public function processing() {
		$order_details = DB::table('order_details')
			->join('retailer', 'retailer.retailer_id', '=', 'order_details.retailer_id')
			->select('invoice_id', 'retailer.retailer_id', 'retailer_name', 'received_datetime', 'updated_at', 'archived_status')
			->where('order_details.archived_status', "0")
			->get();
			// echo '<pre>'.print_r($order_details, 1).'</pre>';
		return View::make('pages/processing-orders')->with(array('order_details' => $order_details));
	}
}
