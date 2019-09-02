<?php

namespace GuiaLocaliza\Foundation;

use Illuminate\Foundation\Application as LaravelAplication;

class Application extends LaravelAplication
{

	/**
     * this is the default for the application path
     */
    //protected $appBasePath = 'app/core/';
    protected $appBasePath = 'app/modules/companies/admin/';

    public function __construct($basePath = null)
    {
        $this->registerBaseBindings();

        $this->registerBaseServiceProviders();

        $this->registerCoreContainerAliases();

        if ($basePath) $this->setBasePath($basePath);
    }

    public function setAppPath($path) {
        // store the path in the class only
        $this->appBasePath = $path;

        // set the path in the container (using this class's path to reset it)
        return app()->__set('path', $this->path());
    }

    /**
     * Get the path to the application "app" directory.
     *
     * @return string
     */
    public function path($path = '')
    {
        return $this->basePath.DIRECTORY_SEPARATOR.$this->appBasePath;
    }

}
