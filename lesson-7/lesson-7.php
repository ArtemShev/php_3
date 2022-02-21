<?php
#1 задание
// Найти и указать в проекте Front Controller и расписать классы, которые с ним взаимодействуют.
$routes = new RouteCollection();

$routes->add(
    'index',
    new Route('/', ['_controller' => [MainController::class, 'indexAction']])
);

$routes->add(
    'product_list',
    new Route('/product/list', ['_controller' => [ProductController::class, 'listAction']])
);
$routes->add(
    'product_info',
    new Route('/product/info/{id}', ['_controller' => [ProductController::class, 'infoAction']])
);

// Взаимодействует со всеми остальными контроллерами.





// 2. Найти в проекте паттерн Registry и объяснить, почему он был применён.
class Registry
{
    /**
     * @var ContainerBuilder
     */
    private static $containerBuilder;

    /**
     * Добавляем контейнер для работы реестра
     *
     * @param ContainerBuilder $containerBuilder
     * @return void
     */
    public static function addContainer(ContainerBuilder $containerBuilder): void
    {
        static::$containerBuilder = $containerBuilder;
    }
// позволяет прописать глобальную переменную, изменение которой не будет доступно из других классов.

