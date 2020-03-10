<?php

namespace App\Services\Media;

class AttributesParser
{
    private $name = '';
    private $featuredIndex = '';
    private $altText = '';
    private $allowedKey = [
        'name',
        'featured_index',
        'altText',
    ];

    public function __construct($request)
    {
        foreach ($request->get('properties') as $key => $value) {
            dd($key);
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFeaturedIndex()
    {
        return $this->featuredIndex;
    }

    /**
     * @param mixed $featuredIndex
     */
    public function setFeaturedIndex($featuredIndex): void
    {
        $this->featuredIndex = $featuredIndex;
    }

    /**
     * @return mixed
     */
    public function getAltText()
    {
        return $this->altText;
    }

    /**
     * @param mixed $altText
     */
    public function setAltText($altText): void
    {
        $this->altText = $altText;
    }
}
