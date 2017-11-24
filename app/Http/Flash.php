<?php

namespace App\Http;

class Flash {

    public function message($title, $message)
    {
        $this->_create($title,$message,'info');
    }

    public function success($title, $message)
    {
        $this->_create($title,$message,'success');
    }

    public function error($title, $message)
    {
        $this->_create($title,$message,'error');
    }

    public function info($title, $message)
    {
        $this->_create($title,$message,'info');
    }


    protected function _create($title,$message,$type,$key = 'flash_message')
    {
        session()->flash($key,[
            'title' => $title,
            'message' => $message,
            'type' => $type
        ]);
    }

}

// $flash->message('Hello there');
// $flash->error('');
// $flash->aside();
// $flash->overlay();
// $flash->overlay();