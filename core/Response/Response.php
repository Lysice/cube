<<<<<<< HEAD
<?php

namespace Core\Response;
class Response {
    protected $headers = [];
    protected $content;
    protected $code = 200;

    public function sendContent() {
        echo $this->content;
    }

    public function sendHeaders() {
        foreach ($this->headers as $key => $header) {
            header($key . ': ' . $header);
        }
    }

    public function send() {
        $this->sendHeaders();
        $this->sendContent();
        return $this;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function getContent() {
        return $this->content;
    }

    public function getStatusCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
        return $this;
    }
=======
<?php

namespace Core\Response;
class Response {
    protected $headers = [];
    protected $content;
    protected $code = 200;

    public function sendContent() {
        echo $this->content;
    }

    public function sendHeaders() {
        foreach ($this->headers as $key => $header) {
            header($key . ': ' . $header);
        }
    }

    public function send() {
        $this->sendHeaders();
        $this->sendContent();
        return $this;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function getContent() {
        return $this->content;
    }

    public function getStatusCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
        return $this;
    }
>>>>>>> b38d2450bf2b80154df4a6eab2b30c7c4c992a60
}