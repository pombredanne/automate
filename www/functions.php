<?

function size_formatted($file) {
    if (file_exists($file)) {
        $size = filesize($file);
        if ($size < 1024)
            return number_format($size,0)." bytes";
        elseif ($size < (1024 * 1024))
            return number_format(($size / 1024),0)." KB";
        else
            return number_format(($size / 1024 / 1024),1). " MB";
    }
}

function match($scheda, $pattern) {
    preg_match($pattern, $scheda, $result);
    if (count($result) > 1)
        return $result[1];
    else
        return "";
}

function startswith($haystack,$needle,$case=true) {
    if($case){return (strcmp(substr($haystack, 0, strlen($needle)),$needle)===0);}
    return (strcasecmp(substr($haystack, 0, strlen($needle)),$needle)===0);
}

function endswith($haystack,$needle,$case=true) {
    if($case){return (strcmp(substr($haystack, strlen($haystack) - strlen($needle)),$needle)===0);}
    return (strcasecmp(substr($haystack, strlen($haystack) - strlen($needle)),$needle)===0);
}

function package_from_name($packagename, $packages) {
    foreach($packages as $package)
        if ($packagename == $package['Package'])
            return $package;
}

function icon($icon) {
    return "<img src='img/".$icon.".png'>";
}

function icon_from_file($file) {
    $path_parts = pathinfo($file);
    $extension = $path_parts['extension'];
    $icon = "ext/".$extension;
    if (file_exists("img/".$icon.".png"))
        return icon($icon);
    else
        return icon("ext/unknown");
}

?>
