<?php

namespace Craft;

class FetchService extends BaseApplicationComponent
{

	/*
	SUMMARY: FETCHES ENTRY DATA FROM A JSON FEED
	RETURNS: WHATEVER IS CONTAINED WITHIN 'ENTRY'
	REQUESTS: 1
	*/
	public function fetchEntry()
	{		

		$settings = craft()->plugins->getPlugin('fetch')->getSettings();
		$feedUrl = $settings->feedUrl;
		$url = $feedUrl;

		try {
			$client = new \Guzzle\Http\Client();
			$request = $client->get($url);
			$response = $request->send();

			if (!$response->isSuccessful()) {
				return;
			}

			$data = $response->json();
			return $data['entry'];

		} catch(\Exception $e) {
			return;
		}
		
	}
}