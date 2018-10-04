#!/usr/bin/php
<?PHP

function get_data($url)
{
	$head[] = 'Accept: image/*';              
    $img = curl_init($url);         
    curl_setopt($img, CURLOPT_HTTPHEADER, $head);         
    curl_setopt($img, CURLOPT_RETURNTRANSFER, 1);         
    $ret = curl_exec($img);         
    curl_close($img);         
    return $ret;     
}

if ($argc == 2)
{
	$url = $argv[1];
	preg_match('/(http[s]?:\/\/)([^\/]*)/', $url, $match);
	$folder = $match[2];
	if (file_exists($folder) == false)
		mkdir ($folder);
	$file = file_get_contents($argv[1]);
	$file = substr($file, strpos($file, "<body"));
	preg_match_all('/(?:<img [^>]*src=")([^"]+)/', $file, $match);
	foreach ($match[1] as $elem) 
	{
		if ($elem[0] == "/")
			$elem = $url.$elem;
		$img_url = $elem;
		$img_name = basename($img_url);
		$img = get_data($img_url);
		file_put_contents("./".$folder."/".$img_name,$img);
	}
}

?>
