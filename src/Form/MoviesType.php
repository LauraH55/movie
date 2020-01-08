<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextAreaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Authors;


use Symfony\Component\Form\FormBuilderInterface;

class MoviesType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
        ->add('name', TextType::class)
        ->add('description', TextAreaType::class)
        ->add('date', DateType::class)
        ->add('country', TextType::class)
        ->add('cover', TextType::class)
        ->add('link',TextType::class)
        ->add('author', EntityType::class, [
            'class' => Authors::class,
            'choice_label' => 'name',
        ]);
  }

}
