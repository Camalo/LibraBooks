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
       
        $categoryes = $em->getRepository(Category::class)->findAll();

        return $this->render('index.html.twig', [
           'books' => $books, 'categoryes' => $categoryes
        ]);

        
    }
    /**
     * @Route("/book/{book}", name="one_book")
     */
    // show one row
    public function show_book($book)//(Book $book)
    {
        $em=$this->getDoctrine()->getManager();

        $book_inf = $em->getRepository(Book::class)->find($book);

        return $this->render('book/one_book.html.twig',[
            'book'=> $book_inf
            ]);
    }
}

