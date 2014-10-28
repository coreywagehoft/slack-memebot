<?php namespace MemeBot;

interface Memeable {

	public function generateMeme($text);

	public function matchMeme($text);
}