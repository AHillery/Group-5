<?php
require_once("Template.php");

class commomTemplate extends Template{
	
	private $_footer = "";
	private $_header = "";
	
	function __construct($title = "Default") {
	$this->_title = $title;
}
	
	public function setHeader($header){
		
		$this->_header .= "<header>\n";
		$this->_header .= $header;
		$this->_header .= "</header>\n";
		
		
	}
	
	public function setFooter($footer){
		
		$this->_footer .= "<footer>\n";
		$this->_footer .= $footer;
		$this->_footer .= "</footer>\n";
	}
	
	public function getHeader(){
		return $this->_header;
	}
	
	public function getFooter(){
		return $this->_footer;
	}
	
	
	
	
}

?>