<?php

namespace BS\FrontBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class BlogAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('caption', null, array(
                'label' => 'form.caption'
            ))
            ->add('published', null, array(
                'label' => 'form.published'
            ))
            ->add('slug', null, array(
                'label' => 'form.slug'
            ));
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('caption', null, array(
                'label' => 'form.caption'
            ))
            ->add('slug', null, array(
                'label' => 'form.slug'
            ))
            ->add('smallContent', null, array(
                'label' => 'form.smallContent'
            ))
            ->add('published', null, array(
                'label' => 'form.published'
            ))
            ->add('_action', 'actions', array(
                'label' => 'form.action',
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('id')
            ->add('caption', null, array(
                'label' => 'form.caption'
            ))
            ->add('slug', null, array(
                'label' => 'form.slug'
            ))
            ->add('smallContent', null, array(
                'label' => 'form.smallContent'
            ))
            ->add('content', 'ckeditor', array(
                'label' => 'form.content',
//                'config' => array(
//                    'toolbar' => array(
//                        array(
//                            'name' => 'links',
//                            'items' => array('Link', 'Unlink'),
//                        ),
//                        array(
//                            'name' => 'insert',
//                            'items' => array('Image'),
//                        ),
//                    )
//                )
            ))
            ->add('photoGallery', 'sonata_type_model_list', array(
                    'required' => false,
                    'label' => 'form.photoGallery',
                ),
                array(
                    'link_parameters' => array(
                        'context' => 'events_image'
                    )
                )
            )
            ->add('videoGallery', 'sonata_type_model_list', array(
                    'required' => false,
                    'label' => 'form.videoGallery',
                ),
                array(
                    'link_parameters' => array(
                        'context' => 'events_youtube'
                    )
                )
            )
            ->add('published', null, array(
                'label' => 'form.published',
                'data' => true
            ));
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('caption', null, array(
                'label' => 'form.caption',
            ))
            ->add('slug', null, array(
                'label' => 'form.slug'
            ))
            ->add('smallContent', null, array(
                'label' => 'form.smallContent'
            ))
            ->add('published', null, array(
                'label' => 'form.published',
            ));
    }
}
