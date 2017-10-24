<?php
namespace Craft;

class FetchPlugin extends BasePlugin
{
	function getName()
	{
		 return Craft::t('Fetch');
	}

	function getVersion()
	{
		return '0.1';
	}

	function getDeveloper()
	{
		return 'Clive Portman';
	}

	function getDeveloperUrl()
	{
		return 'https://cliveportman.co.uk';
	}

	protected function defineSettings()
	{
		return array(
			'feedUrl' => array(AttributeType::String, 'required' => true, 'label' => 'Feed URL')
		);
	}

	public function getSettingsHtml()
	{
		return craft()->templates->render('fetch/_settings', array(
			'settings' => $this->getSettings()
		));
   	}
}