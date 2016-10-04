<?php

namespace classes;

abstract class ClassesAdapter
{
    /** @var array  */
    protected $_errors = [];
    
    protected function addError($error, $key = null)
    {
        is_string($key) ? $this->_errors[$key] = $error : $this->_errors[] = $error;
    }
    
    public function hasErrors()
    {
        return !empty($this->_errors);
    }

    /**
     * @param  int|string   $key
     * @return array|string
     */
    public function getError($key = null)
    {
        return $key ? $this->_errors[$key] : $this->_errors;
    }
}
