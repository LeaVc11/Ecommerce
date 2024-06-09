<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre Email',
                'attr' => [
                    'class' => 'input-field fw-bold dark',
                    'placeholder' => 'exemple@mail.com',
                ],
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom',
                'attr' => [
                    'class' => 'input-field',
                ],
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom',
                'attr' => [
                    'class' => 'input-field',
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'attr' => [
                    'class' => 'input-field fw-bold ',
                ],
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'max' => 30,
                    ]),
                ],

                'first_options' => [
                    'label' => 'Votre password',
                    'attr' => [
                        'class' => 'input-field',
                    ],
                    'hash_property_path' => 'password'],
                'second_options' => [
                    'label' => 'Confirmer votre password',
                    'attr' => [
                        'class' => 'input-field',
                    ],
                ],
                'mapped' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Inscription',
                'attr' => [
                    'class' => 'btn btn-block btn-lg form-control text-center my-3',
                ],
            ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'constraints' => [
                new UniqueEntity([
                    'entityClass' => User::class,
                    'fields' => 'email'
                ]),
            ],
            'data_class' => User::class,
        ]);
    }
}
