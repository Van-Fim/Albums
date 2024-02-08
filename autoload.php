<?
session_start();
error_reporting(E_ERROR | E_PARSE);
class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $class = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
            $file = $_SERVER['DOCUMENT_ROOT']."/src/{$class}";
            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
    }
}
Autoloader::register();
$DbManager = new DbManager();
$AuthSystem = new AuthSystem($DbManager);
$AlbumManager = new AlbumManager($DbManager, $AuthSystem);