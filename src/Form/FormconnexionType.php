<?php

namespace App\Form;

use App\Entity\Inscrit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FormconnexionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Pseudo', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Pseudo']
            ])
            ->add('mdp', PasswordType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Mot de passe']
            ])
            ->add('save', SubmitType::class, [
                'label' => 'se connecter'
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscrit::class,
        ]);
    }
}
