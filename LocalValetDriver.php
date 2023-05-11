<?php

use Valet\Drivers\LaravelValetDriver;

class LocalValetDriver extends LaravelValetDriver
{
	/**
	 * Determine if the driver serves the request.
	 */
	public function serves(string $sitePath, string $siteName, string $uri): bool
	{
		return true;
	}

	public function isStaticFile(string $sitePath, string $siteName, string $uri)
	{
		if (file_exists($staticFilePath = $sitePath . '/.vitepress/dist/' . $uri)) {
			return $staticFilePath;
		}

		return false;
	}

	/**
	 * Get the fully resolved path to the application's front controller.
	 */
	public function frontControllerPath(string $sitePath, string $siteName, string $uri): string
	{
		return $sitePath . '/.vitepress/dist/index.html';
	}
}
