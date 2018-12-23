<?php

namespace Zbiller\Url\Options;

use Exception;

class UrlOptions
{
    /**
     * The controller where the laravel router should dispatch the request.
     * This is used when a URI is accessed by a user.
     * The format of this property should be Full\Namespace\Of\Controller
     *
     * @var string
     */
    private $routeController;

    /**
     * The controller where the laravel router should dispatch the request.
     * This is used when a URI is accessed by a user.
     * The format of this property should be simply the name of the method residing inside the $routeController
     *
     * @var string
     */
    private $routeAction;

    /**
     * The field used to generate the url slug from.
     *
     * @var string
     */
    private $fromField;

    /**
     * The field where to store the generated url slug.
     *
     * @var string
     */
    private $toField;

    /**
     * The prefix that should be prepended to the generated url slug.
     *
     * @var string
     */
    private $urlPrefix;

    /**
     * The suffix that should be appended to the generated url slug.
     *
     * @var string
     */
    private $urlSuffix;

    /**
     * The symbol that will be used to glue url segments together.
     *
     * @var string
     */
    private $urlGlue = '/';

    /**
     * Flag whether to update children urls on parent url save.
     *
     * @var bool
     */
    private $cascadeUpdate = true;

    /**
     * Get the value of a property of this class.
     *
     * @param $name
     * @return mixed
     * @throws Exception
     */
    public function __get($name)
    {
        if (property_exists(static::class, $name)) {
            return $this->{$name};
        }

        throw new Exception(
            'The property "' . $name . '" does not exist in class "' . static::class . '"'
        );
    }

    /**
     * Get a fresh instance of this class.
     *
     * @return UrlOptions
     */
    public static function instance(): UrlOptions
    {
        return new static();
    }

    /**
     * Set the $urlRoute to work with in the Zbiller\Url\Traits\HasUrl trait.
     *
     * @param string $controller
     * @param string $action
     * @return UrlOptions
     */
    public function routeUrlTo($controller, $action): UrlOptions
    {
        $this->routeController = $controller;
        $this->routeAction = $action;

        return $this;
    }

    /**
     * Set the $fromField to work with in the Zbiller\Url\Traits\HasUrl trait.
     *
     * @param string|array|callable $field
     * @return UrlOptions
     */
    public function generateUrlSlugFrom($field): UrlOptions
    {
        $this->fromField = $field;

        return $this;
    }

    /**
     * Set the $toField to work with in the Zbiller\Url\Traits\HasUrl trait.
     *
     * @param string $field
     * @return UrlOptions
     */
    public function saveUrlSlugTo($field): UrlOptions
    {
        $this->toField = $field;

        return $this;
    }

    /**
     * Set the $urlPrefix to work with in the Zbiller\Url\Traits\HasUrl trait.
     *
     * @param string|array|callable $prefix
     * @return UrlOptions
     */
    public function prefixUrlWith($prefix): UrlOptions
    {
        $this->urlPrefix = $prefix;

        return $this;
    }

    /**
     * Set the $urlSuffix to work with in the Zbiller\Url\Traits\HasUrl trait.
     *
     * @param string|array|callable $suffix
     * @return UrlOptions
     */
    public function suffixUrlWith($suffix): UrlOptions
    {
        $this->urlSuffix = $suffix;

        return $this;
    }

    /**
     * Set the $urlGlue to work with in the Zbiller\Url\Traits\HasUrl trait.
     *
     * @param string $glue
     * @return UrlOptions
     */
    public function glueUrlWith($glue): UrlOptions
    {
        $this->urlGlue = $glue;

        return $this;
    }

    /**
     * Set the $cascadeUpdate to work with in the Zbiller\Url\Traits\HasUrl trait.
     *
     * @return UrlOptions
     */
    public function doNotUpdateCascading(): UrlOptions
    {
        $this->cascadeUpdate = false;

        return $this;
    }
}
