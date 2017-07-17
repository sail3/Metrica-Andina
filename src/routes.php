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

$app->get('/web-service/{minRange}/{maxRange}', function ($request, $response, $args)
{
  $jsonContent = \Application\Services\Resource::retrieveBySalyRange( $args['minRange'], $args['maxRange']);
  $res = $response->withHeader('Content-type', 'text/xml');
  return $this->view->render($res, 'xml_response.twig', [
    'page_title' => 'Lista empleados',
    'employees' => $jsonContent
  ]);
});
