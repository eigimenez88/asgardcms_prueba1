<?php namespace Modules\Compras\Events;

use Modules\Media\Contracts\StoringMedia;

class ProductoWasUpdated implements StoringMedia
{
    private $element;
    private $data;

    public function __construct(\Producto $element, array $data)
    {
        $this->element = $element;
        $this->data = $data;
    }
    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->element;
    }
    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}