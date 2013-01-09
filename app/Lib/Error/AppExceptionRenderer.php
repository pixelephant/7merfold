<?php

App::uses('ExceptionRenderer', 'Error');

class AppExceptionRenderer extends ExceptionRenderer {
    public function missingController($error) {

			$this->controller->header('HTTP/1.1 404 Not Found:');
			// $this->controller->header("Status: 404 Not Found");;
			$this->controller->render('/Errors/error400', 'default');
			$this->controller->response->send();
    }

    public function missingAction($error) {
			$this->missingController($error);
    }
}

?>