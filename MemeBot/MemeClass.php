<?php namespace Memebot;

class MemeClass implements Memeable
{

	public function matchMeme($text) {

		$final_text = array(
			"text0" => '',
			"text1" => '',
			"template_id" => ''
		);

		// This is going to be a mess but we have no choice

		// Y U NO?!
		if (preg_match('/(y u no) (.+)/i',$text, $matches) === 1) {

			$final_text['text0'] = $matches[1];
			$final_text['text1'] = $matches[2];
			$final_text['template_id'] = '61527';

			return $final_text;
		}

		// I don't always
		if (preg_match('/(i don?t always .*) (but when i do,? .*)/i',$text, $matches) === 1) {

			$final_text['text0'] = $matches[1];
			$final_text['text1'] = $matches[2];
			$final_text['template_id'] = '61532';

			return $final_text;
		}

		// One does not simply
		if(preg_match('/(one does not simply) (.*)/i', $text, $matches) === 1) {

			$final_text['text0'] = $matches[1];
			$final_text['text1'] = $matches[2];
			$final_text['template_id'] = '61579';

			return $final_text;
		}

		// Not sure if FRY
		if(preg_match('/(not sure if .*) (or .*)/i', $text, $matches) === 1) {

			$final_text['text0'] = $matches[1];
			$final_text['text1'] = $matches[2];
			$final_text['template_id'] = '61520';

			return $final_text;
		}

		// Brace Yourselves
		if(preg_match('/(brace yoursel[^\s]+) (.*)/i', $text, $matches) === 1) {

			$final_text['text0'] = $matches[1];
			$final_text['text1'] = $matches[2];
			$final_text['template_id'] = '61546';

			return $final_text;
		}

		// Lumberg
		if(preg_match('/(.*) (that would be great|that?d be great)/i', $text, $matches) === 1) {

			$final_text['text0'] = $matches[1];
			$final_text['text1'] = $matches[2];
			$final_text['template_id'] = '563423';

			return $final_text;
		}

		// Yo dawg
		if(preg_match('/(yo dawg .*) (so .*)/i', $text, $matches) === 1) {

			$final_text['text0'] = $matches[1];
			$final_text['text1'] = $matches[2];
			$final_text['template_id'] = '101716';

			return $final_text;
		}

		// Yo dawg
		if(preg_match('/(what if i told you) (.*)/i', $text, $matches) === 1) {

			$final_text['text0'] = $matches[1];
			$final_text['text1'] = $matches[2];
			$final_text['template_id'] = '100947';

			return $final_text;
		}
	}

	public function generateMeme($text)
	{
		$args = $this->matchMeme($text);

		$url = 'https://api.imgflip.com/caption_image?template_id=' . urlencode($args['template_id']) . '&username=corey_domandtom&password=Developer8&text0=' . rawurlencode($args['text0']) . '&text1=' . rawurlencode($args['text1']). '';

		$response = $this->sendRequest($url);
		return $response->data->url;
	}


	public function sendRequest($url)
	{
	$response = array();

        if (ini_get('allow_url_fopen')) {
            $response = file_get_contents($url);
        } elseif (function_exists('curl_version')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);
        }
        
        return json_decode($response);
	}
	
}