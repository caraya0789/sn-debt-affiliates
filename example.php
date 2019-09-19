<?php parse_str($_SERVER['QUERY_STRING']) ?>
<!DOCTYPE html>
<html>
  <head>
    <script src="//www.debt.ca/debt-widget/widget.min.js?key=test"></script>
  </head>
  <body>
    <div id="debtca-widget" style="width:400px; padding:20px; margin:0 auto;">
      <div data-dw="<?php echo $type ?>" data-dw-theme="<?php echo $theme ?>"></div>
    </div>
  </body>
</html>