<?php

namespace RSAR\General\Controller\Module;

use Message\Cog\Controller\Controller;

class Subscribe extends Controller
{
	public function subscribe()
	{
		$form = $this->createForm(
			$this->get('rsar.form.subscribe'),
			null,
			['action' => $this->generateUrl('rsar.subscribe.action')]
		);

		return $this->render('RSAR:General::module:subscribe:subscribe', [
			'form' => $form,
		]);
	}

	public function subscribeAction()
	{
		$form = $this->createForm($this->get('rsar.form.subscribe'));

		$form->handleRequest();

		if ($form->isValid()) {
			$data = $form->getData();

			$this->get('mailing.subscription.edit')->subscribe($data['email_address']);
			$this->addFlash('success', $this->trans('ms.mailing.subscribe.feedback.success'));
		}

		return $this->redirectToReferer();
	}
}