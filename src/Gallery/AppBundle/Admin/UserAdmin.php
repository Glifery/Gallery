<?php

namespace Gallery\AppBundle\Admin;

use Gallery\AppBundle\Entity\User;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class UserAdmin extends Admin
{
    protected $baseRouteName = 'user';

    protected $baseRoutePattern = 'user';

    protected $datagridValues = array(
        '_page' => 1,
        '_per_page'   => 20,
        '_sort_by' => 'username',
        '_sort_order' => 'ASC'
    );

    /**
     * @param RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('export');
    }

    /**
     * @param DatagridMapper $datagrid
     */
    protected function configureDatagridFilters(DatagridMapper $datagrid)
    {
        $datagrid
            ->add('username')
            ->add('email')
            ->add('vkontakteId')
            ->add('roles', 'doctrine_orm_choice', array(), 'choice', array(
                    'multiple' => true,
                    'expanded' => true,
                    'choices' => array(
                        User::ROLE_SUPER_ADMIN => 'Супер Администратор',
                        User::ROLE_ADMIN => 'Администратор',
                        User::ROLE_USER => 'Пользователь',
                    )
                ))
            ->add('lastLogin', 'doctrine_orm_date_range', array(), null,  array(
                    'widget' => 'single_text'
                ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('username')
            ->add('email')
            ->add('vkontakteId')
            ->add('lastLogin')
            ->add('_action', 'actions', array(
                    'actions' => array(
                        'edit' => array(),
                        'delete' => array()
                    )
                ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('enabled', null, array(
                    'required' => false
                ))
            ->add('username')
            ->add('email')
            ->add('vkontakteId')
            ->add('roles', 'choice', array(
                    'multiple' => true,
                    'expanded' => true,
                    'choices' => array(
                        User::ROLE_SUPER_ADMIN => 'Супер Администратор',
                        User::ROLE_ADMIN => 'Администратор',
                        User::ROLE_USER => 'Пользователь',
                    )
                ))
            ->add('description')
        ;
    }
}