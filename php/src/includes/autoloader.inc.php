 <?php
    //built-in function that looks for new instantiated class
    // pass function inside parentheses
    spl_autoload_register('myAutoLoader');

    //user-defined function
    function myAutoLoader($className) {
        // url for current website
        $url = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];

        // if inside includes folder, directory path needs to be updated
        if(strpos($url, 'includes') !== false) {
            $path = "../classes/";
        } else {
            $path = "classes/";
        }
        $extension =".class.php";
        $fullPath = $path . str_replace("\\", "/", $className) . $extension;

        // checks if file (or class) was found
        if(!file_exists($fullPath)) {
            return false;
        }
        require_once $fullPath;
    }
?>
