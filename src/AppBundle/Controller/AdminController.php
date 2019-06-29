<?php


namespace AppBundle\Controller;



use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseEasyAdmin;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Intl\Intl;

class AdminController extends BaseEasyAdmin
{
    public function createEntityFormBuilder($entity, $view)
    {
        $formBuilder = parent::createEntityFormBuilder($entity, $view);
        $formBuilder->add('country', ChoiceType::class, [
           'choices' => [
              'countries' =>  array_flip(Intl::getRegionBundle()->getCountryNames())
           ]
        ]);
        return $formBuilder;
    }
}