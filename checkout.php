<?php 
  $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

  $pay = 'PAY-'.substr(str_shuffle($permitted_chars), 0, 16);

  echo $pay;

?>