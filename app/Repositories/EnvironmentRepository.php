<?php


namespace App\Repositories;

class EnvironmentRepository
{
    /**
     * @var string
     */
    private $envPath;
    /**
     * @var string
     */
    private $envExamplePath;
    /**
     * @var array
     */
    private $env;

    /**
     * Create a new EnvironmentRepository instance.
     *
     * @param string $envPath
     * @param string $envExamplePath
     */
    public function __construct($envPath = '.env', $envExamplePath = '.env.example')
    {
        $this->envPath = base_path($envPath);
        $this->envExamplePath = base_path($envExamplePath);
        $this->env = $this->all();
    }

    /**
     * Get the content of the .env file.
     *
     * @return array
     */
    private function all(): array
    {
        if (!file_exists($this->envPath)) {
            if (file_exists($this->envExamplePath)) {
                copy($this->envExamplePath, $this->envPath);
            } else {
                touch($this->envPath);
            }
        }
        return file($this->envPath);
    }

    
    public function setDatabaseSetting(array $connectionSettings): bool
    {
        if (!array_has($connectionSettings, ['database', 'username', 'password', 'host', 'port', 'dbtype'])) {
            return false;
        }

        $this->set('DB_DATABASE', $connectionSettings['database']);
        $this->set('DB_USERNAME', $connectionSettings['username']);
        $this->set('DB_PASSWORD', $connectionSettings['password']);
        $this->set('DB_HOST', $connectionSettings['host']);
        $this->set('DB_PORT', $connectionSettings['port']);
        $this->set('DB_CONNECTION', $connectionSettings['dbtype']);
		
        return $this->saveFile();
    }

    /**
     * Set .env element.
     *
     * @param string $key
     * @param string $value
     */
    private function set(string $key, string $value)
    {
        $this->env = array_map(function ($item) use ($key, $value) {
            if (strpos($item, $key) !== false) {
                $start = strpos($item, '=') + 1;
                $item = substr_replace($item, $value . "\n", $start);
            };
            return $item;
        }, $this->env);
    }

    /**
     * Save the edited content to the .env file.
     * Return false on error.
     *
     * @return bool
     */
    private function saveFile(): bool
    {
        return (file_put_contents($this->envPath, implode($this->env)) !== false);
    }
}
