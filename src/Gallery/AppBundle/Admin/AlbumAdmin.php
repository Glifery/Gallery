<?php

namespace Gallery\AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class AlbumAdmin extends Admin
{
    protected $baseRouteName = 'album';

    protected $baseRoutePattern = 'album';

    protected $datagridValues = array(
        '_page' => 1,
        '_per_page'   => 20,
        '_sort_by' => 'datetime',
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
            ->add('title')
            ->add('originalPath')
            ->add('parent')
            ->add('datetime')
            ->add('published')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('published')
            ->add('datetime')
            ->add('parent')
            ->add('title')
            ->add('originalPath')
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('published')
            ->add('parent')
            ->add('originalPath')
            ->add('datetime')
            ->add('title')
            ->add('description')
            ->add('photos')
        ;
    }
}