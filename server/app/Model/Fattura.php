<?php

use Dompdf\Dompdf;
use View\View;

class Fattura {

  public static $dirFatture = __DIR__.'/../data/fatture';

  public static function open($fattura) {
    //TODO metodo Fattura::open
    $list = Fattura::getAll();
    $presente = in_array($fattura, $list);
    if($presente) {
      return file_get_contents(Fattura::$dirFatture.'/'.$fattura);
    } else {
      return false;
    }
  }
  public static function getAll() {
    $list = scandir(Fattura::$dirFatture);
    $listRet = array();
    foreach ($list as $key => $fattura) {
      switch($fattura) {
        case '.':
        case '..':
        case 'README.md':
          break;
        default:
          $listRet[] = $fattura;
      }
    }
    return $listRet;
  }
  public static function generate($from, $billTo, $shipTo, $invoice,
                            $date, $pd, $dueDate, $termsConditions, $items) {
    //TODO metodo Fattura::generate


		$ftd['from'] = $from;
		$ftd['bill_to'] = $billTo;
		$ftd['ship_to'] = $shipTo;
		$ftd['invoice'] = $invoice;
		$ftd['date'] = $date;
		$ftd['pd'] = $pd;
		$ftd['due_date'] = $dueDate;
		$ftd['items_conditions'] = $termsConditions;
		$ftd['items'] = $items;

    $v = new View();
    ob_start();
    $v -> render('fattura', $ftd);
    $html = ob_get_clean();

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Output the generated PDF to Browser
    $doc = $dompdf->output();

    $fileName = $invoice.".pdf";
    file_put_contents(Fattura::$dirFatture.'/'.$fileName, $doc);
    return true;
  }
  public static function delete($id) {
    if(in_array($id, Fattura::getAll())) {
      unlink(Fattura::$dirFatture.'/'.$id);
      return true;
    } else {
      return false;
    }
  }
}
