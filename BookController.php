<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
     * @Route("/", name="books")
     */
    //show all rows
    public function index(): Response
    {
        $em=$this->getDoctrine()->getManager();

        $books=$em->getRepository(Book::class)->findAll();

        return $this->render('book/index.html.twig', [
           'books' => $books
        ]);
    }
    /**
     * @Route("/book/{book}", name="one_book")
     */
    // show one row
    public function show_book() //(Book $book)
    {
        $book="This is a page of book";
        return $this->render('book/one_book.html.twig',[
            'book'=> $book
            ]);
    }
}

