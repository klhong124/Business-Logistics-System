<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use View;
use DB;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Routing\Redirector;
use Hash;
use App\User;

date_default_timezone_set('Asia/Hong_Kong');

class DataController extends Controller
{
	// homepage
	public function index() {
		return View::make('pages/index');
	}

	// orders
	public function orders() {
		$current_user_role = Auth::user()->role; 

		if ($current_user_role == '0') {
			$order_details = DB::table('invoice_process')
						->join('invoice_receiver', 'invoice_process.invoice_id', '=', 'invoice_receiver.invoice_id')
						->join('invoice_table', 'invoice_process.invoice_id', '=', 'invoice_table.invoice_id')
						->join('users', 'invoice_table.shipper_id', '=', 'users.id')
						->select('invoice_process.*', 'invoice_receiver.*', 'invoice_table.*', 'users.*')
						->get();

					// echo '<pre>'.print_r($order_details, 1).'</pre>';
					return View::make('pages/orders')->with(array('order_details' => $order_details));
		} elseif ($current_user_role == '1') {
			$current_user_id = Auth::user()->id;
			
			$order_details = DB::table('invoice_process')
				->join('invoice_receiver', 'invoice_process.invoice_id', '=', 'invoice_receiver.invoice_id')
				->join('invoice_table', 'invoice_process.invoice_id', '=', 'invoice_table.invoice_id')
				->join('users', 'invoice_table.shipper_id', '=', 'users.id')
				->select('invoice_process.*', 'invoice_receiver.*', 'invoice_table.*', 'users.*')
				->where('invoice_table.shipper_id', $current_user_id)
				->get();

			// echo '<pre>'.print_r($order_details, 1).'</pre>';
			return View::make('pages/orders')->with(array('order_details' => $order_details));
		}	
	}

	// Archived changed
	public function orderPost() {
		$order_details = DB::table('invoice_process')
			->join('invoice_receiver', 'invoice_process.invoice_id', '=', 'invoice_receiver.invoice_id')
			->join('invoice_table', 'invoice_process.invoice_id', '=', 'invoice_table.invoice_id')
			->select('invoice_process.*', 'invoice_receiver.*', 'invoice_table.*')
			->get();

		$invoice_id = $_POST['invoice_id'];
		// $archived_status = ($_POST['archived_choice'] == 'Yes') ? "1" : "0";

		if($_POST['archived_choice'] == 'Yes') {
			DB::table('invoice_process')
				->where('invoice_id', $invoice_id)
				->update([
					'pickup_time' => NOW(),
					'update_time' => NOW()
				]);

			return back();
		} else {
			// return View::make('pages/orders')->with(array('order_details' => $order_details));
			return back();
		}

		// echo '<pre>'.print_r($datetime_now, 1).'</pre>';

	}

	public function confirmOrder($invoice_id) {
		$check = DB::table('invoice_process')
			->select('invoice_id')
			->where('invoice_id', $invoice_id)
			->where('pickup_time', NULL)
			->first();

		// echo '<pre>'.print_r($check, 1).'</pre>';

		if (!empty($check->invoice_id)) {
			DB::table('invoice_process')
			->where('invoice_id', $invoice_id)
			->update([
				'pickup_time' => NOW(),
				'update_time' => NOW()
			]);
		}

		return back();

		// print_r($invoice_id);
	}

	// order details
	public function details($invoice_id) {
		$invoice_details = DB::table('invoice_process')
			->join('invoice_receiver', 'invoice_process.invoice_id', '=', 'invoice_receiver.invoice_id')
			->join('invoice_detail', 'invoice_process.invoice_id', '=', 'invoice_detail.invoice_id')
			->join('invoice_table', 'invoice_process.invoice_id', '=', 'invoice_table.invoice_id')
			->join('users', 'invoice_table.shipper_id', '=', 'users.id')
			->select('invoice_process.*', 'invoice_receiver.*', 'invoice_detail.*', 'invoice_table.*', 'users.*')
			->where('invoice_process.invoice_id', $invoice_id)
			->first();

		$current_time = NOW();

		// $product_list_str = json_decode(str_replace("'", '"', $data->product_list));
		// $customer_info_str = json_decode(str_replace("'", '"', $data->customer_info));

		// $test = '[{"name": "John Doe",
		// 	"address": "115 Dell Avenue, Somewhere",
		// 	"tel": "999-3000",
		// 	"occupation" : "Clerk"},
		// 	{"name": "Jane Doe",
		// 	"address": "19 Some Road, Somecity",
		// 	"tel": "332-3449",
		// 	"occupation": "Student"}]';
		// $temp = json_decode($test);

		// echo '<pre>'.print_r($customer_info_str, 1).'</pre>';
		// echo '<pre>'.print_r($product_list_str, 1).'</pre>';

		return View::make('pages/order-details')->with(array(
			'invoice_details' => $invoice_details,
			'current_time' => $current_time
			// 'product_list_str' => $product_list_str,
			// 'customer_info_str' => $customer_info_str
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

	// reset password
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
		$data = DB::table('invoice_table')
			// ->select('retailer.id', 'retailer_name', 'retailer.url', 'retailer.description' , 'users.created_at')
			->join('users_detail', 'users_detail.id', '=', 'invoice_table.shipper_id')
			->join('users', 'users.id', '=', 'invoice_table.shipper_id')
			->where('users_detail.id', $id)
			->first();
		$count = DB::table('invoice_table')
			->where('shipper_id', $id)
			->count('shipper_id');
			// echo '<pre>'.print_r($data, 1).'</pre>';
		return View::make('pages/retailer')->with(array('data' => $data, 'count' => $count));
	}

	public function postRetailerInfo() {
		if (!empty( $_POST['retailer_name'])) {
			$name = $_POST['retailer_name'];
			$description = $_POST['description'];
			$url = $_POST['url'];
			$id = $_POST['id'];

			DB::table('users_detail')
				->where('id', $id)
				->update([
					'description'=>$description,
					'url'=>$url
				]);

			DB::table('users')
				->where('id', $id)
				->update([
					'name'=>$name
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
		$result = DB::table('invoice_process')
			->join('invoice_receiver', 'invoice_process.invoice_id', '=', 'invoice_receiver.invoice_id')
			->join('invoice_table', 'invoice_process.invoice_id', '=', 'invoice_table.invoice_id')
			->select('invoice_process.*', 'invoice_receiver.*', 'invoice_table.*')
			->where('invoice_process.invoice_id', $keyword)
			->get();
		// echo '<pre>'.print_r($order_details, 1).'</pre>';
		return View::make('pages/orders')->with(array('order_details' => $result));

		// $result = DB::table('retailer')
		// 	->where('retailer_name', 'like',  $keyword)
		// 	->select('retailer_name')
		// 	->get();
	}

	public function processing() {
		$current_user_role = Auth::user()->role; 

		if ($current_user_role == '0') {
			$order_details = DB::table('invoice_process')
				->join('invoice_receiver', 'invoice_process.invoice_id', '=', 'invoice_receiver.invoice_id')
				->join('invoice_table', 'invoice_process.invoice_id', '=', 'invoice_table.invoice_id')
				->join('users', 'invoice_table.shipper_id', '=', 'users.id')
				->select('invoice_process.*', 'invoice_receiver.*', 'invoice_table.*', 'users.*')
				->where('invoice_process.pickup_time', null)
				->get();
				
				// echo '<pre>'.print_r($order_details, 1).'</pre>';
			
				return View::make('pages/processing-orders')->with(array('order_details' => $order_details));
		} elseif ($current_user_role == '1') {
			$current_user_id = Auth::user()->id;
			
			$order_details = DB::table('invoice_process')
				->join('invoice_receiver', 'invoice_process.invoice_id', '=', 'invoice_receiver.invoice_id')
				->join('invoice_table', 'invoice_process.invoice_id', '=', 'invoice_table.invoice_id')
				->join('users', 'invoice_table.shipper_id', '=', 'users.id')
				->select('invoice_process.*', 'invoice_receiver.*', 'invoice_table.*', 'users.*')
				->where([
					['invoice_table.shipper_id', $current_user_id],
					['invoice_process.pickup_time', null],
					])
				->get();

			// echo '<pre>'.print_r($order_details, 1).'</pre>';
			return View::make('pages/processing-orders')->with(array('order_details' => $order_details));
		}
	}

	public function csv_reader() {
		// upload a file in some whrere


		//return View::make('pages/orders')->with(array('order_details' => $order_details));
	}

	public function complete_invoice($invoice_id) {
		$order_details = DB::table('invoice_process')
			->where('invoice_id', $invoice_id)
			->update([
				'pickup_time' => NOW()
				]);
		return redirect('confirm-invoice/'.$invoice_id);
	}

	public function csvUploadPage() {
		$page_name = 'Upload A CSV';

		$error_message = '';
		$success_message = '';

		return View::make('pages/csv-upload')->with(array('error_message' => $error_message, 'success_message' => $success_message, 'page_name' => $page_name));
	}

	public function uploadCSV() {
		$success_message = "";
		$error_message = "";

		$date = date('Y-m-d H:i:s');
		// echo strtotime($date);
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$new_name = $target_dir . "data" . ".csv";

		// unlink($new_name);

		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "csv" ) {
		    echo "Sorry, only csv files are allowed.";
		    $uploadOk = 0;
			$error_message = 'Sorry, only csv files are allowed.';
		}
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new_name)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		// return back();
		$page_name = 'Upload A CSV';
		if ($uploadOk) {
			$success_message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded as ".basename($_FILES["fileToUpload"]["name"], ".csv") . strtotime($date) . ".csv";
			// check_csv_log();
		}

		if ($uploadOk) {
			#Desktop
			$output = shell_exec("D:\GitHub\CSV-Converter\main.py");
			echo "<script>console.log(`{$output}`);</script>";
			#surfaceBook
			#exec("uploads\csv_reader_API\main.exe");
		}

		$json_array = [];
		if ($uploadOk) {
			// read python log
			$strJsonFileContents = file_get_contents(public_path() . "/uploads/csv_log.json");
			$json_array = json_decode($strJsonFileContents, true);
		}

		return View::make('pages/csv-upload')->with(array('error_message' => $error_message, 'success_message' => $success_message, 'page_name' => $page_name, 'python_last_message' => end($json_array)));
	}

	public function check_csv_log() {
		
	}
}
