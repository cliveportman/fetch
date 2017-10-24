<?php

namespace Craft;

class FetchVariable
{

	// GETS ALL PRODUCTS
	public function fetchEntry()
	{
		return craft()->fetch->fetchEntry();
	}

}