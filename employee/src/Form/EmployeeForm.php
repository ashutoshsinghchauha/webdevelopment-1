<?php
/**
 * @file
 * Contains \Drupal\employee\Form\EmployeeForm.
 */
namespace Drupal\employee\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class EmployeeForm extends FormBase{
  /**
   * {@inheritdoc}
   */
	public function getFormId(){
		return 'employee_form';
	}
	/**
	* {@inheritdoc}
	*/
	public function buildForm(array $form, FormStateInterface $form_state){
		$form['country'] = [
			'#type' => 'textfield',
			'#title' => t('Country'),
			'#required' => TRUE,
		];
		$form['city'] = [
			'#type' => 'textfield',
			'#title' => t('City'),
			'#required' => TRUE,
		];
		$form['timezones'] = [
			'#type' => 'select',
			'#title' => ('Timezones'),
			'#options' => [
			  'America/Chicago' => t('America/Chicago'),
			  'America/Newyork' => t('America/Newyork'),
			  'Asia/Tokyo' => t('Asia/Tokyo'),
			  'Asia/Dubai' => t('Asia/Dubai'),
			  'Asia/Kolkata' => t('Asia/Kolkata'),
			  'Europe/Amsterdam' => t('Europe/Amsterdam'),
			  'Europe/Oslo' => t('Europe/Oslo'),
			  'Europe/London' => t('Europe/London'),
			],
		];
		$form['actions']['#type'] = 'actions';
		$form['actions']['submit'] = [
		  '#type' => 'submit',
		  '#value' => $this->t('Save'),
		  '#button_type' => 'primary',
		];
		return $form;
	}
  /**
   * {@inheritdoc}
   */
	public function submitForm(array &$form, FormStateInterface $form_state) {
		date_default_timezone_set($form_state->getValue('timezones'));
		$date = date('jS M Y - h:i A');

		$this->messenger()->addStatus($this->t('Your TIMEZONE is @timezone', ['@timezone'=>$date]));
	}
}
