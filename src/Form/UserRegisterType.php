<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class UsersRegisterType extends AbstractType
{
    /**  formular pro create
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array('label' => "Uživatelské jméno", 'attr' => ['placeholder' => "uživatelské jméno"]))
            ->add('firstName', TextType::class, array('label' => "Jméno", 'attr' => ['placeholder' => "jméno"]))
            ->add('lastName', TextType::class, array('label' => "Příjmení", 'attr' => ['placeholder' => "příjmení"]))
            ->add('email', EmailType::class, array('label' => "Email", 'attr' => ['placeholder' => "email@email.cz"]))

            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => 'Zadaná hesla nejsou stejná.',
                'first_options' => array('label' => "label_password", 'attr' => ['placeholder' => "heslo"]),
                'second_options' => array('label' => "label_password_again", 'attr' => ['placeholder' => "heslo"])
            ))
            ->add('address', TextType::class, array('label' => "Adresa"))
            ->add('city', TextType::class, array('label' => "Město"))
            ->add('postal_code', TextType::class, array('label' => "PSČ"))
            ->add('school', TextType::class, array('label' => "Škola"))
            ->add('date_of_birth', DateType::class, array('label' => "Datum narození"))
            ->add('phone_number_player', TextType::class, array('label' => "Telefon na hráče"))
            ->add('phone_number_mother', TextType::class, array('label' => "Telefon na matku"))
            ->add('phone_number_father', TextType::class, array('label' => "Telefon na otce"))
            ->add('save', SubmitType::class, array(
                'label' => 'Registrovat se',
                'attr' => array('class'=>'button expanded')
            ));
    }
}