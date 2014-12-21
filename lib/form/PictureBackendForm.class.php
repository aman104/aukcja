<?php 

class PictureBackendForm extends sfForm
{
	public function configure()
  	{
	    $this->widgetSchema['file'] = new sfWidgetFormInputFileEditable(array(
            'label' => 'Obrazek',
            'file_src' => '',
            'is_image' => false,
            'with_delete' => false,
        ));

		$this->validatorSchema['file'] = new sfValidatorFile(array(
            'required' => false,
            'path' => sfConfig::get('sf_upload_dir') . '/pictures',
            'mime_types' => 'web_images',
        ));

  	}
}