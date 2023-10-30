<?php
namespace Neos\Flow\Persistence\Doctrine\Mapping;

/*
 * This file is part of the Neos.Flow package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Doctrine\Persistence\Mapping\ReflectionService as DoctrineReflectionService;
use Neos\Flow\Reflection\ClassReflection;

/**
 * A ClassMetadata instance holds all the object-relational mapping metadata
 * of an entity and it's associations.
 */
class ClassMetadata extends \Doctrine\ORM\Mapping\ClassMetadata
{
    /**
     * Gets the ReflectionClass instance of the mapped class.
     */
    public function getReflectionClass(): ?\ReflectionClass
    {
        if ($this->reflClass === null) {
            $this->_initializeReflection();
        }
        return $this->reflClass;
    }

    /**
     * Initializes $this->reflClass and a number of related variables.
     */
    public function initializeReflection(DoctrineReflectionService $reflService): void
    {
        $this->_initializeReflection();
    }

    /**
     * Restores some state that can not be serialized/unserialized.
     */
    public function wakeupReflection(DoctrineReflectionService $reflService): void
    {
        parent::wakeupReflection($reflService);
        $this->reflClass = new ClassReflection($this->name);
    }

    /**
     * Initializes $this->reflClass and a number of related variables.
     */
    protected function _initializeReflection(): void
    {
        $this->reflClass = new ClassReflection($this->name);
        $this->namespace = $this->reflClass->getNamespaceName();
        $this->name = $this->rootEntityName = $this->reflClass->getName();
        $this->table['name'] = $this->reflClass->getShortName();
    }
}
