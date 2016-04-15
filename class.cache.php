<?php
namespace functions\cache;

#- REQUIRES -#
#- END REQUIRES -#

#- USES -# 
#- END USES -#

#- CLASS -#
class cache
{
    private static $time= '10 minutes';
    private $folder;
    public function __construct(){
        $this->setFolder(PATH."cache/");
    }
    protected function setFolder($folder = null) {
        if (file_exists($folder) && is_dir($folder) && is_writable($folder)) {
            $this->folder = $folder;
        } else {
            trigger_error('Não foi possível acessar a pasta de cache', E_USER_ERROR);
        }
    }
    protected function generateFileLocation($key) {
        return $this->folder . DIRECTORY_SEPARATOR . sha1($key) . '.tmp';
    }
    protected function createCacheFile($key, $content) {
        $filename = $this->generateFileLocation($key);
        return file_put_contents($filename, $content)
        OR trigger_error('Não foi possível criar o arquivo de cache', E_USER_ERROR);
    }
    public function save($key, $content, $time = null) {
        $time = strtotime(!is_null($time) ? $time : self::$time);
        $content = serialize(array(
            'expires' => $time,
            'content' => $content));
        return $this->createCacheFile($key, $content);
    }
    public function read($key) {
    $filename = $this->generateFileLocation($key);
    if (file_exists($filename) && is_readable($filename)) {
      $cache = unserialize(file_get_contents($filename));
      if ($cache['expires'] > time()) {
        return $cache['content'];
      } else {
        unlink($filename);
      }
    }
    return null;
  }
}
# END CLASS -#
