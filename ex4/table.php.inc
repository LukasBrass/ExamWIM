<?php
class table {
	protected $header;
	protected $row;
    
  function __construct($header,$row){
    $this -> header = $header;
    $this -> row = $row;
  }
  function set_header($tableau){
    $i =0;
    echo'<table><thead><tr>';
    while ( $i <= count($tableau)){
      echo'<th>'.$tableau[i].'</th>';
    }
    echo'</tr></thead>';
  }
  function add_row($tableau){
    $i =0;
    echo'<tbody><tr>';
    while ( $i <= count($tableau)){
      echo'<td>'.$tableau[i].'</td>';
    }
    echo '</tr></tbody>';
  }
}