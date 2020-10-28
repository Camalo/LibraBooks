<?php

namespace App\Entity;

use App\Repository\BooksInCategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BooksInCategoriesRepository::class)
 */
class BooksInCategories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $book_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $category_id;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $book_title;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $category_title;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookId(): ?int
    {
        return $this->book_id;
    }

    public function setBookId(int $book_id): self
    {
        $this->book_id = $book_id;

        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }

    public function setCategoryId(int $category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }

    public function getBookTitle(): ?string
    {
        return $this->book_title;
    }

    public function setBookTitle(string $book_title): self
    {
        $this->book_title = $book_title;

        return $this;
    }

    public function getCategoryTitle(): ?string
    {
        return $this->category_title;
    }

    public function setCategoryTitle(string $category_title): self
    {
        $this->category_title = $category_title;

        return $this;
    }
}
