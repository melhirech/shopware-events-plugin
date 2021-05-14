<?php

declare(strict_types=1);

namespace OpwebEventProcessor\Subscriber;

use Shopware\Core\Framework\DataAbstractionLayer\Event\EntityLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpClient\HttpClient;
use Shopware\Core\Content\Product\ProductEvents;
use Shopware\Core\Checkout\Order\OrderEvents;


class OpwebEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        // Return the events to listen to as array like this:  <event to listen to> => <method to execute>
        return [
            ProductEvents::PRODUCT_LOADED_EVENT => 'onProductsLoaded',
            ProductEvents::PRODUCT_WRITTEN_EVENT => 'onProductCreated',
            OrderEvents::ORDER_LOADED_EVENT => 'onOrdersLoaded',
        ];
    }

    public function onProductsLoaded(EntityLoadedEvent $event)
    {
        // E.g. work with the loaded entities: $event->getEntities()

        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', 'http://webcode.me');
        $statusCode = $response->getStatusCode();
        die($statusCode);
    }

    public function onProductCreated(EntityLoadedEvent $event)
    {
        // Do something
        // E.g. work with the loaded entities: $event->getEntities()
        // $result = $event->getEntities();
        // die(json_encode($result));
        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', 'http://webcode.me');
        $statusCode = $response->getStatusCode();
        die($statusCode);
    }

    public function onOrdersLoaded(EntityLoadedEvent $event)
    {
        // Do something
        // E.g. work with the loaded entities: $event->getEntities()
        $result = $event->getEntities();
        // die('onOrdersLoaded !!');
        die($result);
    }
}
