<?php
// Routes

// $app->get('/[{name}]', function ($request, $response, $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");
//
//     // Render index view
//     return $this->renderer->render($response, 'index.twig', $args);
// });

$app->get('/', function ($request, $response, $args)
{
  $jsonContent = \Application\Services\Resource::retrieveAll();
  return $this->view->render($response, 'index.twig', [
    'title' => 'slim framework in action!!!!',
    'content' => 'this content is a example of slim framework.',
    'employees' => $jsonContent
  ]);
});
