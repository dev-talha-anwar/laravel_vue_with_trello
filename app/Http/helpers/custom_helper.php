<?php

use Illuminate\Http\Request;

function uploadimage($file,$path,request $request){

	$extentions = ['jpg','JPG','JPEG','jpeg','PNG','png','GIF','gif','WEBP','webp','TIF','tif'];
	if(in_array($request->file($file)->getClientOriginalExtension(),$extentions)):
		return $request->$file->store($path);
	else:
		return false;
	endif;

}
function uploadvideo($file,$path,request $request){

	$extentions = ['MP4','mp4','flv','FLV','avi','AVI','MPEG-4','mpeg-4','MOV','mov','wmv','WMV'];
	if(in_array($request->file($file)->getClientOriginalExtension(),$extentions)):
		return $request->$file->store($path);
	else:
		return false;
	endif;

}

function setflashmsg($type = '', $msg = '') {

	if ($type != '' && $msg != ''):
		switch ($type) {
			case 'success':
			return '<div class="alert alert-dismissible alert-success"><div data-dismiss="alert" class="close"> &times; </div><strong>Success:</strong> ' . $msg . '</div><div class="clearfix"></div>';
			break;
			case 'danger':
			return '<div class="alert alert-dismissible alert-danger"><div data-dismiss="alert" class="close"> × </div><strong>Error: </strong> ' . $msg . '</div><div class="clearfix"></div>';
			break;
			case 'warning':
			return '<div class="alert alert-dismissible alert-warning"><div data-dismiss="alert" class="close"> × </div><strong>Warning:</strong> ' . $msg . '</div><div class="clearfix"></div>';
			break;
			default:
			return '<div class="alert alert-dismissible alert-info"><div data-dismiss="alert" class="close"> × </div><strong>Info:</strong> ' . $msg . '</div><div class="clearfix"></div>';
			break;
		}
	endif;
}

?>