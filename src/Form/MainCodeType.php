<?php

namespace App\Form;

use App\Entity\Html;
use App\Entity\MainCode;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class MainCodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('code')
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Call |' => 'phpCall',
                    'Function |' => 'phpFunc',
                    'JS |' => 'java',
                    'JSXtra |' => 'xtra',
                    'Linux |' => 'unix',
                    'React |' => 'reac',
                    'Node |' => 'node',
                    'Bash |' => 'bash',
                    'Other |' => 'else',
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => true,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MainCode::class,
        ]);
    }
}
