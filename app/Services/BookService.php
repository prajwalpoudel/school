<?php


namespace App\Services;


use App\Entities\Book;

class BookService extends BaseService
{
    /**
     * @return mixed|string
     */
    public function model()
    {
        return Book::class;
    }
}
