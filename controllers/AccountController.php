<?php

class AccountController extends Controller
{
  public function singupAction()
  {
    return $this->render(array(
      '_token' => generateCsrfToken('account/singup')
    ));
  }
}
