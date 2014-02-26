<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/4/13
 * Time: 4:38 PM
 */

class Controller
{

    function __construct()
    {
        $this->view = new View();
        $this->statistics = new Statistics();
    }

    /**
     *
     * @param string $name Name of the model
     * @param string $path Location of the models
     */
    public function loadModel($name, $modelPath = 'models/')
    {

        $path = $modelPath . $name . '_model.php';

        if (file_exists($path)) {
            require $modelPath . $name . '_model.php';

            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }

}