function urlMimeType($url)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$results = explode("\n", trim(curl_exec($ch)));
foreach($results as $line) {
    if (strtolower(strtok($line, ':')) == 'content-type') {
        $parts = explode(":", $line);
        $m = trim($parts[1]);
    }
}
return $m;
}
