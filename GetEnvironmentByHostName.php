<?php
/**
 * Created by iKNSA.
 * Author: Khalid Sookia <khalidsookia@gmail.com>
 * Date: 28/11/16
 * Time: 19:50
 */

namespace Romenys\Helpers;


class GetEnvironmentByHostName
{
    private $env = null;

    private $hosts;

    public function __construct()
    {
        $this->setHosts();
        $this->checkHostForEnv();
    }

    public function setHosts()
    {
        $this->hosts = parse_ini_file(__DIR__ . '/../../../app/config/hosts.ini', true);

        return $this;
    }

    public function getHosts()
    {
        return $this->hosts;
    }

    public function getEnv()
    {
        return $this->env;
    }

    public function setEnv($env)
    {
        $this->env = $env;

        return $this;
    }

    public function checkHostForEnv()
    {
        foreach ($this->getHosts() as $env => $hosts) {
            if (isset($hosts["host"]) && in_array($_SERVER["SERVER_NAME"], $hosts["host"])) {
                $this->setEnv($env);
            }
        }

        try {
            if (is_null($this->getEnv())) throw new \Exception('Host not allowed');
        } catch (\Exception $e) {
            die($e->getMessage());
        }

        return $this;
    }
}
