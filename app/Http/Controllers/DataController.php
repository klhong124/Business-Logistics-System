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

class DataController extends Controller
{
	// homepage
	public function index() {
		return View::make('pages/index');
	}

	public function orders() {
		return View::make('pages/orders');
	}

	public function details() {
		return View::make('pages/order-details');
	}

	public function profile() {
		return View::make('pages/profile');
	}

	public function changePassword() {
		return View::make('pages/change-password');
	}

	
	// public function search(){
	//
	// 	if (empty($_GET['query']) AND empty($_GET['location'])){
	//
	// 		//nothing search
	// 		return "Error";
	//
	// 	} elseif (empty($_GET['location'])) {
	//
	// 		// search item only
	// 		$keyword = $_GET['query'];
	// 		$page = empty($_GET['page'])? 1 : $_GET['page'];
	// 		list($results, $count) = Home_Model::searchByKeyword($keyword, $page);
	//
	// 	} elseif (empty($_GET['query'])) {
	//
	// 		// search by location only
	// 		$keyword = $_GET['location'];
	// 		$page = empty($_GET['page'])? 1 : $_GET['page'];
	// 		list($results, $count) = Home_Model::searchByArea($keyword, $page);
	// 	} else {
	//
	// 		//search by both location and item
	// 		$query = $_GET['query'];
	// 		$location = $_GET['location'];
	// 		$page = empty($_GET['page'])? 1 : $_GET['page'];
	//
	// 		list($results, $count) = Home_Model::searchBoth($query, $location, $page);
	//
	// 	}
	// 	// echo "<pre>". print_r($results). "</pre>";
	// 	$subdistricts = Home_Model::getAllSubdistricts();
	// 	$subdistricts_json = json_encode($subdistricts);
	// 	echo "<pre>". print_r($results, 1). "</pre>";
	// 	// echo $subdistricts_json;
	// 	$totalPage = ceil($count/20);
	// 	return View::make('public/search-result')->with(array("results" =>$results,"subdistricts"=>$subdistricts,"subdistricts_json"=>$subdistricts_json, "currentPage" => $page, "totalPage"=> $totalPage));
	// }

}
