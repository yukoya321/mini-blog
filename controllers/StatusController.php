<?php

class StatusController extends Controller
{
  public function indexAction()
  {
    $user = $this->session->get('user');
    $statuses = $this->db_manager->get('Status')->fetchAllPersonalArchivesByUserId($user['id']);

    return $this->render(array(
      'statuses' => $statuses,
      'body' => '',
      '_token' => $this->generateCsrfToken('status/post'),
    ));
  }

  public function postAction()
  {
    if(!$this->request->isPost())
    {
      $this->forward404();
    }

    $token = $this->request->getPost('_token');
    if(!$this->checkCsrfToken('status/post', $token))
    {
      return $this->redirect('/');
    }

    $body = $this->request->getPost('body');
    $errors = array();

    if(!strlen($body))
    {
      $errors[] = 'no body';
    } else if(mb_strlen($body) > 200)
    {
      $errors[] = 'must be less than 200 chars';
    }

    if(count($errors) === 0)
    {
      $user = $this->session->get('user');
      $this->db_manager->get('Status')->insert($user['id'], $body);

      return $this->redirect('/');
    }

    $user = $this->session->get('user');
    $statuses = $this->db_manager->get('Status')->fetchAllPersonalAchivesByUserId($user['id']);

    return $this->render(array(
      'errors' => $errors,
      'body' => $body,
      'statuses' => $statuses,
      '_token' => $this->generateCsrfToken('status/post'),
    ), 'index');
  }
}
