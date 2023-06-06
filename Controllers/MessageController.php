<?php

class MessageController extends Controller {

    protected array $useClasses = [
        'Request',
        'Viewer',
        'MessageService',
    ];

    public function create() {
        $this->viewer->renderPage('form');
    }

    public function store() {
        $this->messageService->saveMessage($this->request->post('message'));
        $this->viewer->setStatus(302)->setHeader('Location', 'index.php?path=message/index')->show();
    }

    public function index() {
        $items = (new MessageModel())->getAll();
        $this->viewer->renderPage('table', ['items' => $items]);
    }
}