<?php

class SaguaroConfigLoader {
    public $firstRun = false;
    public function initialize() {
        $config = file_get_contents("config.json");
        
        if (!$config) {
            $this->firstRun = true;
            require_once(CORE_DIR . "/configs/board_defaults.php");
            $config = $configArray;
        } else {
            $config = json_decode($config, true);
        }
        foreach($config as $key => $value) {
            define($key, $value);
        }
        return;
    }
}