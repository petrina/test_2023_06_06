<?php

class Viewer extends Response {

    protected array $useClasses = [
        'Config',
    ];

    protected string $root = '';

    public function __construct()
    {
        parent::__construct();
        $this->root = dirname(__DIR__);
    }

    public function renderView(string $view, array $data = []) : string {
        $viewPath = $this->root.'/Views/'.$view.'.php';

        $content = '';
        if (file_exists($viewPath)) {
            ob_start();
            extract($data);
            include $viewPath;
            $content = ob_get_contents();
            ob_end_clean();
        }
        return $content;
    }

    public function renderPage(string $view, array $data = []) {
        $viewPath = $this->root.'/Views/template.php';

        $page = '';
        $content = $this->renderView($view, $data);

        if (file_exists($viewPath)) {
            ob_start();
            include $viewPath;
            $page = ob_get_contents();
            ob_end_clean();
        }

        $this->setData($page)->show();
    }

}