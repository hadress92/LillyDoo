<?php


namespace AppBundle\Controller;



use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseEasyAdmin;
use libphonenumber\PhoneNumberFormat;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Intl\Intl;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;

class AdminController extends BaseEasyAdmin
{
    public function createEntityFormBuilder($entity, $view)
    {
        $formBuilder = parent::createEntityFormBuilder($entity, $view);
        $formBuilder->add('country', ChoiceType::class, [
           'choices' => [
              'countries' =>  array_flip(Intl::getRegionBundle()->getCountryNames())
           ]
        ])
        ->add('phoneNumber', PhoneNumberType::class, [
            'default_region' => 'EG',
            'format' => PhoneNumberFormat::NATIONAL
        ])
        ;
        return $formBuilder;
    }
}