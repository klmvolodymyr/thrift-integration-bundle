<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\ThriftIntegrationBundle\Helper;

//use DTO\MessageBus\Constant;

class RoutingHelper
{
    /**
     * @param int $route
     *
     * @return string
     */
    public static function getRoute(int $route): string
    {
//        if (!isset(Constant::get('ROUTES')[$route])) {
//            throw new \RuntimeException('Route not found');
//        }
//
//        return Constant::get('ROUTES')[$route];
    }
}