<?php

use JetBrains\PhpStorm\ArrayShape;

class Post {

// PROPERTIES OF THE CLASS
    private string $name;
    private string $email;
    private string $title;
    private string $message;
    private string $date;

// CONSTRUCTOR
    public function __construct(string $name, string $email, string $title, string $message) {
        $this->name = $name;
        $this->email = $email;
        $this->title = $title;
        $this->message = $message;
        $this->date = date("F j, Y");
    }

// MAKE AN ARRAY OF ALL THE DATA
    #[ArrayShape(['name' => "string", 'email' => "string", 'title' => "string", 'message' => "string", 'date'=> "string"])]
    public function makeArray():array{
        return
            [
                'name'=>$this->name,
                'email'=>$this->email,
                'title'=>$this->title,
                'message'=>$this->message,
                'date'=>$this->date,
            ];
    }


}