<?php

namespace RSAR\General\Form;

use Symfony\Component\Form;
use Symfony\Component\Validator\Constraints;

class Subscribe extends Form\AbstractType
{
	public function getName()
	{
		return 'rsar_subscribe';
	}

	public function buildForm(Form\FormBuilderInterface $builder, array $options)
	{
		$builder->add('email_address', 'email', [
			'constraints' => [
				new Constraints\NotBlank,
				new Constraints\Email,
			],
		]);
	}
}