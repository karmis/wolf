<?php

namespace BS\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BS\FrontBundle\Entity\Blog;
use Symfony\Component\HttpFoundation\Request;

/**
 * Blog controller.
 *
 */
class BlogController extends Controller
{

    /**
     * Lists all Blog entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('BSFrontBundle:Blog')->createQueryBuilder('blog')
            ->where('blog.published = :is')
            ->setParameter('is', true)
            ->orderBy('blog.id', 'ASC')
            ->getQuery();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', 1)/*page number*/,
            16/*limit per page*/
        );

        return $this->render('BSFrontBundle:Blog:index.html.twig', array(
            'entities' => $pagination,
        ));
    }

    /**
     * Finds and displays a Blog entity.
     *
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BSFrontBundle:Blog')->createQueryBuilder('blog')
            ->where('blog.published = :is')
            ->andWhere('blog.slug = :slug')
            ->setParameter('is', true)
            ->setParameter('slug', $slug)
            ->getQuery()->getSingleResult();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Blog entity.');
        }

        return $this->render('BSFrontBundle:Blog:show.html.twig', array(
            'entity' => $entity,
        ));
    }
}
