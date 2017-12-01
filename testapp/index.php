<?php
	session_start();
	require "config/db_config.php";
	require "library/func_lib.php";
	require "library/func_info.php";
	
	
	$userid = isset($_SESSION['mem_id'])?$_SESSION['mem_id']:'';
	$con = isset($_GET['con'])?$_GET['con']:'';
	extract($_GET);
	
	if($userid>0){
	
		switch($con){
			case 'list':
				$page = "include/inc_list.php";
				$active1="active";
				$pagetitle="Main";
			break;
			case'viewprofile':
				$page = "include/inc_viewprofile.php";
				$active1="active";
				$pagetitle ="Profile Information";
			break;
			case 'approval':
				$page = "include/inc_userapproval.php";
				$pagetitle="Status";
			break;
			case 'viewsellproduct':
				$page = "include/inc_viewsellproduct.php";
				$active7="active";
				$pagetitle="Status";
			break;
			case 'pay':
				$page = "include/inc_payment.php";
				$pagetitle="Application";
				$active2="active";
			break;
			case 'depo':
				$page = "include/inc_loan.php";
				$pagetitle="Contact Page";
				$active3="active";
			break;		
			case 'report':
				$page = "include/inc_reports.php";
				$pagetitle="Reports Page";
				$active5="active";
			break;
			case 'addusers':
				$page = "include/inc_addusers.php";
				$pagetitle="Add Users";
				$active1="active";
			break;
			case 'setting':
				$page = "include/inc_settings.php";
				$pagetitle="Setting Page";
				$active6="active";
			break;
			case 'sell':
				$page = "include/inc_sell.php";
				$pagetitle="Selling Page";
				$active7="active";
			break;
			case 'addm': 
				$page = "include/inc_add.php";
				$pagetitle="Members";
				$active8="active";
			break;
			case 'editmember': 
				$page = "include/inc_edit.php";
				$active1="active";
				$pagetitle="Edit";
			break;
			case 'user':
				$page = "include/inc_user.php";
				$pagetitle="Welcome";
				$active1="active";
			break;
			case 'userloan': 
				$page = "include/inc_userloan.php";
				$pagetitle="Loan Application";
				$active2="active";
			break;
			case 'userreport': 
				$page = "include/inc_userreports.php";
				$pagetitle="Reports";
				$active4="active";
			break;
			case 'userpay': 
				$page = "include/inc_userpayment.php";
				$pagetitle="Payment";
				$active3="active";
			break;
			case 'usersell': 
				$page = "include/inc_usersell.php";
				$pagetitle="Sell";
				$active5="active";
			break;
			case 'sellpost': 
				$page = "include/inc_sellpost.php";
				$active5="active";
				$pagetitle="Sell";
			break;
			case 'usertrans': 
				$page = "include/inc_usertrans.php";
				$pagetitle="Transaction Status";
				$active7="active";
			break;
			case 'delete':
				$page = "process/pro_delete.php";
			break;
			case 'deletea':
				$page = "process/pro_deleteproduct.php";
			break;
			case 'sellapproval':
				$page = "include/inc_sellapproval.php";
				$pagetitle = "Post";
				$active8="active";
			break;
			case 'useredit': 
				$page = "include/inc_useredit.php";
				$pagetitle="Edit Information";
			break;
			case 'updatesell': 
				$page = "include/inc_updatesell.php";
				$active5="active";
				$pagetitle="Edit";
			break;
			default:
				$page = "include/inc_list.php";
				$active1="active";
				$pagetitle="Main";
		
		}
	}else{
			$page = "include/inc_login.php";
			$pagetitle="Login";
	}


	include "include/inc_header.php";
	if($userid>0){	
		include "include/inc_menu.php";
	}
	include $page;
	
	include "include/inc_footer.php";
	
?>
