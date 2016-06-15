<?php
extract($_GET);
setcookie('langue',$langue);
if($langue == 'fr'){
  echo "Bonjour";
}
if($langue == 'en'){
  echo "Hello";
}
if($langue == 'es'){
  echo "Hola";
}
