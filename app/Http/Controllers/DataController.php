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
	public function index(){
		return View::make('pages/index');
	}

	public function search(){

		if (empty($_GET['query']) AND empty($_GET['location'])){

			//nothing search
			return "Error";

		} elseif (empty($_GET['location'])) {

			// search item only
			$keyword = $_GET['query'];
			$page = empty($_GET['page'])? 1 : $_GET['page'];
			list($results, $count) = Home_Model::searchByKeyword($keyword, $page);

		} elseif (empty($_GET['query'])) {

			// search by location only
			$keyword = $_GET['location'];
			$page = empty($_GET['page'])? 1 : $_GET['page'];
			list($results, $count) = Home_Model::searchByArea($keyword, $page);
		} else {

			//search by both location and item
			$query = $_GET['query'];
			$location = $_GET['location'];
			$page = empty($_GET['page'])? 1 : $_GET['page'];

			list($results, $count) = Home_Model::searchBoth($query, $location, $page);

		}
		// echo "<pre>". print_r($results). "</pre>";
		$subdistricts = Home_Model::getAllSubdistricts();
		$subdistricts_json = json_encode($subdistricts);
		echo "<pre>". print_r($results, 1). "</pre>";
		// echo $subdistricts_json;
		$totalPage = ceil($count/20);
		return View::make('public/search-result')->with(array("results" =>$results,"subdistricts"=>$subdistricts,"subdistricts_json"=>$subdistricts_json, "currentPage" => $page, "totalPage"=> $totalPage));
	}
	public function admin(){
		$subdistricts = Home_Model::getAllSubdistricts();
		// echo "<pre>". print_r($subdistricts). "</pre>";
		return View::make('public/admin')->with(array('subdistricts' => $subdistricts));

	}
	public function convertImage($originalImage, $outputImage, $quality) {
	    // jpg, png, gif or bmp?
	    $exploded = explode('.',$originalImage);
	    $ext = $exploded[count($exploded) - 1];

	    if (preg_match('/jpg|jpeg/i',$ext))
	        $imageTmp=imagecreatefromjpeg($originalImage);
	    else if (preg_match('/png/i',$ext))
	        $imageTmp=imagecreatefrompng($originalImage);
	    else if (preg_match('/gif/i',$ext))
	        $imageTmp=imagecreatefromgif($originalImage);
	    else if (preg_match('/bmp/i',$ext))
	        $imageTmp=imagecreatefrombmp($originalImage);
	    else
	        return 0;

	    // quality is a value from 0 (worst) to 100 (best)
	    imagejpeg($imageTmp, $outputImage, $quality);
	    imagedestroy($imageTmp);

	    return 1;
	}
	public function createShop(){
		$subdistrict = !empty($_POST["subdistrict"]) ? $_POST["subdistrict"] : NULL;
		$data['shop_name'] = !empty($_POST["shop_name"]) ? $_POST["shop_name"] : NULL;
		$data['shop_address'] = !empty($_POST["shop_address"]) ? $_POST["shop_address"] : NULL;
		$data['phone_no'] = !empty($_POST["phone_no"]) ? $_POST["phone_no"] : NULL;
		$data['time'] = !empty($_POST["time"]) ? $_POST["time"] : NULL;
		$data['comment'] = !empty($_POST["comment"]) ? $_POST["comment"] : NULL;
		$fileToUpload = !empty($_POST["fileToUpload"]) ? $_POST["fileToUpload"] : NULL;
		$subdistrict_id = Home_Model::getSubdistrictID($subdistrict);
		$shop_id = Home_Model::createShop($data, $subdistrict_id);

		$path = storage_path('app/public/');
		$target_dir = $shop_id;
		mkdir($path.$target_dir);

		// $target_file = $path.$target_dir.'/'.basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$target_file = $path.$target_dir.'/'.basename($_FILES["fileToUpload"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$target_file = $path.$target_dir.'/profile.'.$imageFileType;
		$final_file = $path.$target_dir.'/profile.jpg';

		// Check if image file is a actual image or fake image
		if (isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;

		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file ($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		    	$this->convertImage($target_file, $final_file, 100);
		        // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		        echo"done";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		// return View::make('public/submitImage');
	}
	public function getImage($shop_id) {
		$pathToFile = storage_path('app/public/'.$shop_id.'/profile.jpg');
		return response()->file($pathToFile);
	}

}
