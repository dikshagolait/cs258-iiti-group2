<?php
if(isset($urlpar[1])){
	if(is_numeric($urlpar[1])){
		$dno = $urlpar[1];
		if(isset($urlpar[2])){
			switch($urlpar[2]){
			case 'apply': 
				include_once('views/tenders/apply.php');
				break;
			default:
				header('Location: /tenders/'.$urlpar[1]);
			}
		}else{
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'POST':
					if(isset($_POST['name'])){
						if(isset($_SESSION['id'])){
							include_once('models/tender_user.php');
							$tu = new TenderUser();
							$tu->insert($dno,$_SESSION['id']);
							include_once('views/tenders/details.php');
						}
					}
					break;
				case 'GET':
				default:
					include_once('views/tenders/details.php');
					break;
			}
		}
	}else{
		switch($urlpar[1]){
			default:
			header('Location: /404');
		}
	}
}else{
	include_once('views/tenders/list.php');
}
?>