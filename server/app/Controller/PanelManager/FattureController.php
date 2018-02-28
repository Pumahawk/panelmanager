<?php

namespace PanelManager;

use View\View;

class FattureController {

	public function createAction() {
		$_POST = json_decode(file_get_contents('php://input'), true);
		if(isset(
			$_POST['from'], $_POST['bill_to'], $_POST['ship_to'], $_POST['invoice'],
			$_POST['date'], $_POST['pd'], $_POST['due_date'], $_POST['terms_conditions'],
			$_POST['items']
		)){

			$overwrite = (isset($_POST['overwrite'])) ? $_POST['overwrite'] : false;

			$from = $_POST['from'];
			$billTo = $_POST['bill_to'];
			$shipTo = $_POST['ship_to'];
			$invoice = $_POST['invoice'];
			$date = $_POST['date'];
			$pd = $_POST['pd'];
			$dueDate = $_POST['due_date'];
			$termsConditions = $_POST['terms_conditions'];
			$items = $_POST['items'];

			if(Fattura::generate($from, $billTo, $shipTo, $invoice, $date, $pd,
															$dueDate, $termsConditions, $items, $overwrite)) {
					$resp['status'] = 'OK';
			} else {
					$resp['status'] = 'ERROR';
					$resp['message'] = ($overwrite == false) ? 'Fattura gia esistente.' : 'Errore generazione fattura';
			}
		} else {
			$resp['status'] = 'ERROR';
			$resp['message'] = "Bad request";
		}
		echo json_encode($resp);
	}

  public function showAction($request) {
		$fattura = $request['fattura'];
		if($f = Fattura::open($fattura)) {
			header('Content-type: application/pdf');
			echo $f;
		} else {
			$resp['status'] = 'ERROR';
			$resp['message'] = "Bad request";
			echo json_encode($resp);
		}
  }

  public function getAllAction() {
		$resp['status'] = 'OK';
		$resp['message'] = "success";
		$resp['fatture'] = Fattura::getAll();
		echo json_encode($resp);
  }

	public function deleteAction() {
		$_POST = json_decode(file_get_contents('php://input'), true);
		if(isset($_POST['name'])) {
			$name = $_POST['name'];
			if(Fattura::delete($name)) {
				$resp['status'] = 'OK';
			} else {
				$resp['status'] = 'ERROR';
				$resp['message'] = "Imposible to delete";
			}
			echo json_encode($resp);
		} else {
			$resp['status'] = 'ERROR';
			$resp['message'] = "Bad request";
			echo json_encode($resp);
		}
	}

	function saveOptionAction() {
		$data = json_decode(file_get_contents('php://input'));
		if(isset($data -> from, $data -> bill, $data -> ship, $data -> terms)){
			Fattura::saveOption($data);
			$resp = [
				'status' => 'OK',
				'message' => ''
			];
		} else {
			$resp = [
				'status' => 'ERROR',
				'message' => 'Bad request'
			];
		}
		echo json_encode($resp);
	}

	function getOptionAction() {
		$opt = Fattura::getOption();

		$resp = [
			'status' => 'OK',
			'message' => '',
			'data' => $opt
		];
		echo json_encode($resp);
	}
}
