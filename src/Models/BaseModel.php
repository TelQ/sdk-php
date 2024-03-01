<?php

namespace TelQ\Sdk\Models;

abstract class BaseModel implements ModelInterface
{
    /**
     * @return array
     */
    public function toArray()
    {
        $data = [];
        foreach (static::getProperties() as $propName) {
            $getterMethod = 'get' . ucfirst($propName);
            $value = call_user_func([$this, $getterMethod]);
            if (is_array($value)) {
                $values = [];
                foreach ($value as $item) {
                    $values[] = $item instanceof ModelInterface ? $item->toArray() : $item;
                }
                $data[$propName] = $values;
            } else {
                $data[$propName] = $value;
            }
        }
        return $data;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function fromArray(array $data)
    {
        $model = new static();
        foreach (static::getProperties() as $propName) {
            if (!array_key_exists($propName, $data)) {
               // echo 'Not exists '. $propName, PHP_EOL;
                continue;
            }
            $setterName = 'set' . ucfirst($propName);
            call_user_func_array([$model, $setterName], [$data[$propName]]);
        }

        return $model;
    }

    protected static function getProperties()
    {
        throw new \RuntimeException('Not implemented getProperties() method');
    }
}