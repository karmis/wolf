<?php

namespace BS\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
//        $blogs = $em->getRepository('BSFrontBundle:Blog')->createQueryBuilder('blog')
//            ->where('blog.published = :is')
//            ->andWhere('blog.recommended = :is')
//            ->setParameter('is', true)
//            ->orderBy('blog.id', 'ASC')
//            ->getQuery();
//
//        $paginator  = $this->get('knp_paginator');
//        $paginationBlogs = $paginator->paginate(
//            $blogs,
//            $this->get('request')->query->get('page', 1)/*page number*/,
//            4/*limit per page*/
//        );

        $entities = array(
            'blogs' => array(),
            'action' => array(),
            'events' => array()
        );

        $entities['blogs'] = $em->getRepository('BSFrontBundle:Blog')->createQueryBuilder('blog')
            ->where('blog.published = :is')
            ->setParameter('is', true)
            ->orderBy('blog.id', 'ASC')
            ->getQuery()->getResult();

        return $this->render('BSFrontBundle:Default:index.html.twig', array(
            'entities' => $entities
        ));
    }
}
