<?php

/**
 * Created by PhpStorm.
 * User: jony
 * Date: 5/14/17
 * Time: 11:02 PM
 */
namespace AppBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;


class MightyMouseController implements ContainerAwareInterface
{
    use ContainerAwareTrait;
    /**
     * @Route("/")
     */
    public function rescueAction()
    {
//        dump($this->container);
//        exit();
        $html = $this->container->get('twig')->render(
            'mighty_mouse/rescue.html.twig',
            array('quote' => 'Here I come to save the day!')
        );
        return new Response($html);
    }
}