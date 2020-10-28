<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,['label'=>'Title'])
            ->add('author',TextType::class,['label'=>'Author'])
            ->add('category',TextType::class,['label'=>'Category'])
            ->add('year',TextType::class,['label'=>'Year'])
            ->add('description',TextareaType::class,['label'=>'Description'])
            ->add('book_pictire',TextType::class,['label'=>'Book_pictire'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
