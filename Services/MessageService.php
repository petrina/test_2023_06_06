<?php

class MessageService extends Di {

    protected array $useClasses = [
        'MessageSMSService',
        'MessageEmailService',
    ];

    public function saveMessage($message) {
        $message = trim($message);
        $item = new MessageModel();
        $item->entity->message = htmlentities($message);
        $item->entity->created_at = date('Y-m-d H:i:s');
        $item->save();

        $this->messageSMSService->setToQueue(strip_tags($message));
        $this->messageEmailService->setToQueue(nl2br(htmlentities($message)));
    }
}