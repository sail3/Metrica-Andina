<?php
// Routes

$app->map(['GET', 'POST'], '/', function ($request, $response, $args)
{
  if ($request->isPost()) {
    $params = $request->getParsedBody();
    $jsonContent = \Application\Services\Resource::findByEmail($params['search-term']);
  } else {
    $jsonContent = \Application\Services\Resource::retrieveAll();
  }
  return $this->view->render($response, 'index.twig', [
    'page_title' => 'Lista empleados',
    'employees' => $jsonContent
  ]);
});

$app->get('/employee/{id}', function ($request, $response, $args)
{
  $employee = \Application\Services\Resource::findById($args['id']);
  return $this->view->render($response, 'detail.twig', [
    'page_title' => 'Detalle empleado',
    'data' => $employee,
  ]);
});
