<?php

namespace Gallery\AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class PhotoAdmin extends Admin
{
    protected $baseRouteName = 'photo';

    protected $baseRoutePattern = 'photo';

    protected $datagridValues = array(
        '_page' => 1,
        '_per_page'   => 20,
        '_sort_by' => 'originalPath',
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
            ->add('originalPath')
            ->add('album.title')
            ->add('album.datetime')
            ->add('album.published')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('published')
            ->add('album.title')
            ->add('originalPath')
            ->add('_action', 'actions', array(
                    'actions' => array(
                        'edit' => array(),
                        'delete' => array(),
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
            ->add('published')
            ->add('album')
            ->add('originalPath')
            ->add('uploadPath')
        ;
    }
}