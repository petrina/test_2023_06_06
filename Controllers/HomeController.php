<?php

class HomeController extends Controller {

    protected array $useClasses = [
        'Request',
        'Viewer',
    ];

    public function index() {
        $this->viewer->renderPage('home');
    }
}