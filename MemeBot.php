<?php

require_once 'MemeBot/Memeable.php';
require_once 'MemeBot/MemeClass.php';
require_once 'MemeBot/Meme.php';

$meme = new MemeBot\MemeClass;

// Get Request
$trigger = trim($_POST['trigger_word']);
$text    = trim(substr($_POST['text'], strlen($trigger) + 1));

if($text == '') {
	sendResponse("One does not simply <text> - Lord of the Rings Boromir\nY U NO <text> - Y U NO Guy\nI don't always <text> but when i do <text> - The Most Interesting man in the World\nNot sure if <text> or <text> - Futurama Fry\nBrace yourselves <text> - Brace Yourselves X is Coming (Imminent Ned, Game of Thrones)\nYo dawg <text> so <text> - Yo Dawg Heard You (Xzibit)\n<text> that would be great - Bill Lumbergh from Office Space\nWhat if I told you <text> - Matrix Morpheus");
}


$returned_meme = $meme->generateMeme($text);

sendResponse($returned_meme);

exit;


/**
 * Send JSON Response
 *
 * @param $response
 */
function sendResponse($response)
{
    header('Content-Type: application/json');
    die(json_encode(array(
        'text' => $response
    )));
}