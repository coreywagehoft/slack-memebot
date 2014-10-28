<?php namespace MemeBot;

class Meme {
	
	private $url;

	function __contstruct($url) {
		$this->url = $url;

	}

	public function getUrl() {

		return $this->url;
	}

}