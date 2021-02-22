<?php

/**
 * Responsibility: Create a unique database password, instead of hard coding one
 */
class CredentialRandomizer
{
    /**
     * This is called from composer.json
     */
    public static function setDatabasePasswordInEnvironmentFile(): void
    {
        // This isn't very strong, but it's probably good enough for a code exercise
        self::setKey('DB_PASSWORD', rand(1000000000,PHP_INT_MAX));
    }

    /**
     * Set an environment variable in a ".env" file to a value.
     * If the key does not exist, create it at the end of the file.
     *
     * @param string $envKey
     * @param string $envValue
     */
    public static function setKey(string $envKey, string $envValue)
    {
        $envFile = '.env';
        $envFileContents = file_get_contents($envFile) ?: '';
        $keyPosition = strpos($envFileContents, "{$envKey}=");
        if ($keyPosition !== false) {
            $endOfLinePosition = strpos($envFileContents, PHP_EOL, $keyPosition);
            $oldLine = substr($envFileContents, $keyPosition, $endOfLinePosition - $keyPosition);
            $envFileContents = str_replace($oldLine, "{$envKey}={$envValue}", $envFileContents);
            $envFileContents = substr($envFileContents, 0, -1);
            // write updated contents to file
            $fp = fopen($envFile, 'w');
            fwrite($fp, $envFileContents);
            fclose($fp);
        } else {
            // append new key=value to file
            $fp = fopen($envFile, 'a');
            fwrite($fp, PHP_EOL."{$envKey}={$envValue}");
            fclose($fp);
        }
    }
}
