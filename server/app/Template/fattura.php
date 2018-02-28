<?php
  $ft = $data;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <style>body{font-size: 16px;color: black;}</style>
    <title>Title</title>
  </head>
  <body>
    <h1>Invoice</h1>
    <p>
      <?=$ft['from']?>
    </p>
    <table width="100%">
      <tr><td>BILL TO</td><td>SHIP TO</td>
        <td rowspan="2">
          <table width="100%">
            <tr><td>INVOICE #</td><td><?=$ft['invoice']?></td></tr>
            <tr><td>INVOICE DATE</td><td><?=$ft['date']?></td></tr>
            <tr><td>DUE DATE</td><td><?=$ft['due_date']?></td></tr>

          </table>
        </td>
      </tr>
      <tr>
        <td>
          <?=$ft['bill_to']?>
        </td>
        <td>
          <?=$ft['ship_to']?>
        </td><td><td></tr>
    </table>
    <hr>
    <table width="100%">
      <tr><td>QTY</td><td>DESCRIPTION</td><td>UNIT PRICE</td><td>AMOUNT</td></tr>
      <?php
      $total = 0;
      foreach ($ft['items'] as $key => $item):
        $item['amount'] = $item['uPrice'] * $item['qty'];
        $total += $item['amount'];
        ?>
        <tr><td><?= $item['qty'] ?></td><td><?= $item['descrizione'] ?></td><td><?= $item['uPrice'] ?></td><td><?= $item['amount'] ?></td></tr>
      <?php endforeach; ?>
    </table>
    <table>
      <tr>
        <td>Total:</td><td><?=$total?></td>
      </tr>
    </table>
  </body>
</html>
