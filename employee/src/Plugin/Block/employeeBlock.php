<?php
/**
 * @file
 * Contains \Drupal\employee\Plugin\Block\employeeBlock.
 */
namespace Drupal\employee\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;

/**
 * Provides a 'CustomForm' Block.
 *
 * @Block(
 *   id = "custom_form",
 *   admin_label = @Translation("Custom Form"),
 *   category = @Translation("Custom Form"),
 * )
 */

class employeeBlock extends BlocKBase{

    /**
     * {@inheritdoc}
     */

    public function Build(){
        $form = \Drupal:: formBuilder()->getForm('\Drupal\employee\Form\EmployeeForm');
        return [
            '#theme' => 'employee-block',
            "#records" => $output,
            "#form" => $form,
            '#cache' => [
                'max-age'=>0,
            ],
        ];

    }
}