<?php namespace Modules\Compras\Events;

use Modules\Media\Contracts\DeletingMedia;

class ProductoWasDeleted implements DeletingMedia
{
    private $element;
    
    public function __construct(\Producto $element)
    {
        $this->element = $element;
    }
    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->element->id;
    }
    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return get_class($this->element);
    }
}