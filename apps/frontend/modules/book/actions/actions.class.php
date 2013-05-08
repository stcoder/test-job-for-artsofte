<?php

/**
 * book actions.
 *
 * @package    z1
 * @subpackage book
 * @author     Sergey Tihonov
 */
class bookActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Bookss = BooksQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BooksForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BooksForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Books = BooksQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Books, sprintf('Object Books does not exist (%s).', $request->getParameter('id')));
    $this->form = new BooksForm($Books);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Books = BooksQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Books, sprintf('Object Books does not exist (%s).', $request->getParameter('id')));
    $this->form = new BooksForm($Books);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Books = BooksQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Books, sprintf('Object Books does not exist (%s).', $request->getParameter('id')));
    $Books->delete();

    $this->redirect('book/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Books = $form->save();

      //$this->redirect('book/edit?id='.$Books->getId());
      $this->redirect('/');
    }
  }
}
