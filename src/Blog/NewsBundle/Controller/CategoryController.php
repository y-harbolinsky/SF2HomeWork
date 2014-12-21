<?php

namespace Blog\NewsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    /**
     *@Template()
     */
    public function indexAction()
    {
        $categoryService = $this->get('blog.news.category_repository');

        return array('categories' => $categoryService->getCategories());
    }

    /**
     * @param $categoryId
     * @return array
     * @Template()
     */
    public function showCategoryAction($slug)
    {
        $categoryService = $this->get('blog.news.category_repository');

        return array('category' => $categoryService->getCategoryById($slug));
    }
}