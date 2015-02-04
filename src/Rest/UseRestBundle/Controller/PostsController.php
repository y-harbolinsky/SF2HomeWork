<?php

namespace Rest\UseRestBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations\View as RestView;

class PostsController extends Controller
{
    /**
     * @RestView
     *
     * @return array
     * @return Response
     */
    public function getPostsAction()
    {
        $posts = $this->get('post.post_repository')->findAll();

        $restView = View::create();
        $restView->setData($posts);

        return $restView;
    }

    /**
     * @RestView
     *
     * @param $id
     * @return array
     * @return Response
     */
    public function getPostAction($id)
    {
        $post = $this->get('post.post_repository')->findBy(array('id' => $id));

        $restView = View::create();
        $restView->setData($post);

        return $restView;
    }
}
