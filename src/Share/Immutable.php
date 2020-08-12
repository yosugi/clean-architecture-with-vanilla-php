<?php

declare(strict_types=1);

namespace Cavp\Share;

use LogicException;

/**
 * Immutable trait.
 */
trait Immutable
{
    /**
     * @param string $propName
     * @return mixed
     */
    public function __get(string $propName)
    {
        if (!property_exists($this, $propName)) {
            $className = get_class($this);
            throw new LogicException("Undefined property \"${className}::${propName}\".");
        }
        return $this->{$propName};
    }

    /**
     * @param string $propName
     * @param mixed  $value
     */
    public function __set(string $propName, $value): void
    {
        $className = get_class($this);
        throw new LogicException("Cannot modify property \"${className}::${propName}\".");
    }

    /**
     * Returns an object with the specified property set.
     *
     * @param string $propName
     * @param mixed  $value
     * @return self
     */
    public function setProperty(string $propName, $value): self
    {
        $duplication = clone $this;
        $duplication->{$propName} = $value;

        return $duplication;
    }

    /**
     * Returns an object with the specified property set (multiple version).
     *
     * @param array<string, mixed> $propNameToValueMap
     * @return self
     */
    public function setProperties(array $propNameToValueMap): self
    {
        $duplication = clone $this;

        foreach ($propNameToValueMap as $propName => $value) {
            $duplication->{$propName} = $value;
        }
        return $duplication;
    }
}
