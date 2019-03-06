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

	public function query() {
		// echo '<pre>'.print_r($_GET, 1).'</pre>';
		$page_name = 'Help';
		$keyword = $_GET['q'];

		$result = DB::table('invoice_process')
			->join('invoice_detail', 'invoice_process.invoice_id', '=', 'invoice_detail.invoice_id')
			// ->select('invoice_id', 'retailer.retailer_id', 'retailer_name', 'received_datetime', 'updated_at', 'archived_status')
			->where('invoice_process.invoice_id', $keyword)
			->first();


		// echo '<pre>'.print_r($result, 1).'</pre>';
		return View::make('pages/help')->with(array('result' => $result, 'page_name' => $page_name));
	}

	public function aboutUs() {
		$page_name = 'About Us';

		return View::make('pages/about-us')->with(array('page_name' => $page_name));
	}


	public function test() {
		$str = ['a' => "abcdefg"];
		$str_json = json_encode($str);


		json_decode($str_json);
		echo '<pre>'.print_r($str_json, 1).'</pre>';
		echo '<pre>'.print_r(json_decode($str_json), 1).'</pre>';
	}


	public function confirmInvoice($invoice_id) {
		$page_name = 'Confirm Invoice';
		$data = DB::table('invoice_table')
			->join('invoice_receiver', 'invoice_receiver.invoice_id', 'invoice_table.invoice_id')
			->join('invoice_process', 'invoice_process.invoice_id', 'invoice_table.invoice_id')
			->join('invoice_detail', 'invoice_detail.invoice_id', 'invoice_table.invoice_id')
			->join('users', 'users.id', 'invoice_table.shipper_id')
			->join('users_detail', 'users_detail.id', 'invoice_table.shipper_id')
			->where('invoice_table.invoice_id', $invoice_id)
			->first();

		// echo '<pre>'.print_r($data, 1).'</pre>';
		return View::make('pages/confirm-invoice')->with(array('page_name' => $page_name, 'data' => $data));
	}
}
