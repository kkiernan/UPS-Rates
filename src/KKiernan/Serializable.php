<?php

/*
| -------------------------------------------------------------------------
| Serialize A Class As An XML String
| -------------------------------------------------------------------------
|
| This is a quick and dirty trait that will be cleaned up as needed.
| The idea is to serialize an object as an XML string (that is,
| object properties become element tags in an XML string)
| specifically formatted for the UPS API.
|
*/

namespace KKiernan;

trait Serializable
{
    /**
     * The properties that should not be serialized.
     *
     * @var array
     */
    protected $ignorable = ['ignorable', 'cantBeEmpty'];

    /**
     * Serializes the object as an XML string.
     * 
     * @return string
     */
    public function asXml()
    {
        if ($this->shouldNotBeSerialized()) {
            return;
        }

        $xml = '';

        $class = end(explode('\\', get_class($this)));

        $xml .= sprintf("<%s>", $class);

        foreach ($this as $key => $value) {
            if (in_array($key, $this->ignorable)) {
                continue;
            }

            $type = gettype($value);

            if ($type == 'object') {
                $xml .= $value->asXml();
            } elseif ($type == 'array') {
                foreach ($value as $object) {
                    $xml .= $object->asXml();
                }
            } elseif ($type == 'boolean') {
                if ($value) {
                    $xml .= sprintf("<%s/>", ucfirst($key));
                }
            } else {
                $key = ucfirst($key);
                $xml .= sprintf("<%s>%s</%s>", $key, $value, $key);
            }
        }

        $xml .= sprintf("</%s>", $class);

        return $xml;
    }

    /**
     * Returns true if the object should be serialized.
     *
     * @return boolean
     */
    public function shouldBeSerialized()
    {
        // If the object cannot be empty, but has no properties that are not 
        // false booleans, do not serialize it. This protects us from
        // errors like those that would occur if we sent an empty
        // RateInformation element to the API, for example.
        if (isset($this->cantBeEmpty) && $this->serializablePropertyCount() === 0) {
            return false;
        }

        return true;
    }

    /**
     * Returns true if the object should NOT be serialized.
     *
     * @return boolean
     */
    public function shouldNotBeSerialized()
    {
        return !$this->shouldBeSerialized();
    }

    /**
     * Gets the number of serializable properties (those that are not false 
     * booleans and also not in the ignore array).
     *
     * @return int
     */
    public function serializablePropertyCount()
    {
        $count = 0;

        foreach ($this as $key => $value) {
            $type = gettype($value);

            if ($type == 'boolean' && $value == false || in_array($key, $this->ignorable)) {
                continue;
            }

            $count++;
        }

        return $count;
    }
}
