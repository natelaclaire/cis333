<?php
use Symfony\Component\Yaml\Yaml;

function loadConfig(): array {
    return Yaml::parseFile(APP_PATH.'app/config/config.yml');
}

function validPage(string $slug): bool {
    static $pageFiles = null;
    if (is_null($pageFiles)) {

        $directoryPath = APP_PATH.'app/content/pages';
        $scannedFiles = scandir($directoryPath);

        // remove the first two elements of the array, which are "." and ".."
        array_splice($scannedFiles, 0, 2);
        $pageFiles = array_map('strtolower', $scannedFiles);

    }
    $searchFile = strtolower($slug . '.md');
    return in_array($searchFile, $pageFiles);
}

function fetchPage(string $url): array {
    // initialize $page to empty array
    $page = [];

    // get the contents of the file as a string
    // (we already validated that the filename exists in the folder)
    if ($pageString = file_get_contents(APP_PATH.'app/content/pages/'.$url.'.md')) {
        // separate the YAML and Markdown into separate array elements
        $pageArray = explode("---\n", $pageString, 3);

        // only proceed if there was a YAML document at the top of the file
        if (count($pageArray)==3) {
            // parse the YAML from the string into an associative array (element 0 is empty)
            $page = Yaml::parse($pageArray[1]);
    
            // parse the Markdown and add to the $page array with a key of "content"
            $parsedown = new Parsedown();
            $page['content'] = $parsedown->text($pageArray[2]);
        }
    }

    return $page;
}

function fetchServices(): array {
    $services = Yaml::parseFile(APP_PATH.'app/content/data/services.yml');

    return $services;
}

function fetchPortfolio(?int $count = null, bool $random = false): array {
    
    $portfolio = Yaml::parseFile(APP_PATH.'app/content/data/portfolio.yml');
    
    if ($random) {
        shuffle($portfolio);
    }
    if ($count !== null) {
        $portfolio = array_slice($portfolio, 0, $count);
    }
    return $portfolio;
}

function constructUrl(string $url = '', array $params = []): string 
{
    global $config; // bind local variable from global scope

    if (!empty($params)) {
        $url .= (str_contains($config['baseUrl'], '?') ? '&' : '?') . http_build_query($params);
    }

    if ($url=='') { // for the home page, we don't need the $baseUrl

        return '/';

    } else {

        return $config['baseUrl'] . $url;

    }

}

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function serverString(string $key, string $default = ''): string
{
    $value = $_SERVER[$key] ?? $default;
    return is_string($value) ? $value : $default;
}

function getString(string $key, string $default = ''): string
{
    $value = filter_input(INPUT_GET, $key, FILTER_UNSAFE_RAW);
    if (PHP_SAPI === 'cli' && $value === null) {
        $value = $_GET[$key] ?? null;
    }

    if ($value === null || $value === false) {
        return $default;
    }

    return is_string($value) ? $value : $default;
}

function postString(string $key, string $default = ''): string
{
    $value = filter_input(INPUT_POST, $key, FILTER_UNSAFE_RAW);
    if (PHP_SAPI === 'cli' && $value === null) {
        $value = $_POST[$key] ?? null;
    }

    if ($value === null || $value === false) {
        return $default;
    }

    return is_string($value) ? $value : $default;
}

function postBool(string $key): bool
{
    $value = filter_input(INPUT_POST, $key, FILTER_UNSAFE_RAW);
    if (PHP_SAPI === 'cli' && $value === null) {
        $value = $_POST[$key] ?? null;
    }

    return $value !== null;
}

function postEmail(string $key, string $default = ''): string
{
    $value = filter_input(INPUT_POST, $key, FILTER_SANITIZE_EMAIL);
    return $value !== false ? $value : $default;
}

function postUrl(string $key, string $default = ''): string
{
    $value = filter_input(INPUT_POST, $key, FILTER_SANITIZE_URL);
    return $value !== false ? $value : $default;
}

function redirectTo(string $path, int $status = 302): string
{
    if (PHP_SAPI !== 'cli') {
        header('Location: ' . $path, true, $status);
        exit;
    }

    return $path;
}

function validateDate(string $date, string $format = 'Y-m-d'): bool
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

function compareDates(string $date1, string $date2, string $format = 'Y-m-d'): int
{
    $d1 = DateTime::createFromFormat($format, $date1);
    $d2 = DateTime::createFromFormat($format, $date2);

    if (!$d1 || !$d2) {
        throw new InvalidArgumentException('Invalid date format');
    }

    return $d1 <=> $d2;
}