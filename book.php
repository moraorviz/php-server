<?php

class Book
{
    private $BookID;
    private $Title;
    private $Author;
    private $datePublished;
    private $isbn;

    public function __construct(string $Title, string $Author, string $publishedDate, string $isbn)
    {
        $this->Title = $Title;
        $this->Author = $Author;
        $this->publishedDate = $publishedDate;
        $this->isbn = $isbn;
    }

    public function getBookID(): integer
    {
        return $this->BookID;
    }
    
    public function getTitle(): string
    {
        return $this->Title;
    }
    
    public function getAuthor(): string
    {
        return $this->Author;
    }
    
    public function getDatePublished(): string
    {
        return $this->datePublished;
    }
    
    public function getIsbn(): string
    {
        return $this->isbn;
    }
}