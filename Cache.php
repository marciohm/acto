<?php

/**
 * Instructions
 *
Typically, with API responses-- ones that don't change too often, engineers use caching
to speed up their apps. This way, they don't have to make constant API calls and can just
pull data from their cache.
Your task is to write a simple class that implements a disk or database based cache.
You need to be able to add to and remove from the cache.
Users should also be able to set the cache expiry, but your default expiry should be 10 minutes.
 */

class Cache {

	public function set(Request $request) {
		$key  = md5($request->url());
		$time = $request->exists('minutes')?$request->get('minutes'):10;

		if (!Cache::has($key)) {
			Cache::put($key, $response, $time);
		}
	}

	public function remove(Request $request) {
		$key = md5($request->url());
		Cache::forget($key);
	}

}