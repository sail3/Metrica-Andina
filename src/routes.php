<?php
// Routes

$app->get('/', function ($request, $response, $args)
{
  $jsonContent = \Application\Services\Resource::retrieveAll();
  return $this->view->render($response, 'index.twig', [
    'page_title' => 'Lista empleados',
    'employees' => $jsonContent
  ]);
});

$app->post('/', function ($request, $response, $args)
{
  $params = $request->getParsedBody();
  $jsonContent = \Application\Services\Resource::findByEmail($params['search-term']);
  return $this->view->render($response, 'index.twig', [
    'page_title' => 'Lista empleados',
    'employees' => $jsonContent
  ]);
});
