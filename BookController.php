<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
   /**
     * @Route("/", name="homepage")
     */
    public function homepage(): Response
    {
        $entity_manager=$this->getDoctrine()->getManager();

        $books=$entity_manager->getRepository(Books::class)->findAll();
        $categories=$entity_manager->getRepository(Categories::class)->findAll();

        return $this->render('index.html.twig', [
            'books' => $books, 'categories' => $categories
        ]);
    }
    /**
     * @Route("/books/{book}", name="show_book")
     */
    public function show_book($book)
    {
        $entity_manager=$this->getDoctrine()->getManager();

        $inf_book=$entity_manager->getRepository(Books::class)->find($book);

        return $this->render('book/one_book.html.twig',[
            'book'=> $inf_book
        ]);
    }
    /**
     * @Route("/categories/{category}", name="show_category")
     */
    public function show_category($category)
    {
        $entity_manager=$this->getDoctrine()->getManager();

        $books_id = $entity_manager->getRepository(BooksInCategories::class)
            ->findBy(['category_id'=>$category],['book_id'=>'ASC']);

        $id=[];
        foreach($books_id as $bookid)
        {
            $id[]=$bookid->getBookId();
        }

       // $bb=$entity_manager->getRepository(Books::class)->findBy($id);

        return $this->render('category/category.html.twig',[
            'books'=> $id
        ]);
    }
}

