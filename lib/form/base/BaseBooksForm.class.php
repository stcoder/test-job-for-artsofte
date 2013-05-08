<?php

/**
 * Books form base class.
 *
 * @method Books getObject() Returns the current form's model object
 *
 * @package    z1
 * @subpackage form
 * @author     Sergey Tihonov
 */
abstract class BaseBooksForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'title'       => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'description' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('books[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Books';
  }


}
