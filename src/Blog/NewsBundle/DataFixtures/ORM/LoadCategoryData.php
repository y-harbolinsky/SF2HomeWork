<?php

namespace Blog\NewsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCategoryData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $objects = \Nelmio\Alice\Fixtures::load(
            __DIR__ . '/category.yml',
            $manager, array(
                'providers' => array($this)
            )
        );
    }

    public function categoryName()
    {
        $categories = array(
            'Найдена древнейшая из сохранившихся статуэток',
            'Психические травмы влияют на потомство)))',
            'Ученые раскрыли секрет пингвинов',
            'Коралловому треугольнику грозит уничтожение',
            'В Британии создано топливо из бананов',
            'Зафиксированы первые признаки нового солнечного цикла',
            'Открыт материал, который в полтора раза тверже алмаза',
            'Появление многоклеточной жизни отодвинули на 200 миллионов лет',
            'Синие киты возвращают утраченные маршруты миграции',
            'Марсоход Spirit застрял в песках Красной планеты',
        );

        return $categories[array_rand($categories)];
    }
}
