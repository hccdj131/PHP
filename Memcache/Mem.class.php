<?php

class Mem
{
    private $type = 'Memcached';
    private $m;
    private $time = 0;
    private $error;

    private $debug = 'true';

    public function __construct()
    {
        if(!class_exists($this->type)){
            $this->error = "No ".$this->type;
            return false;
        } else {
            $this->m = new $this->type;
        }
    }

    public function addServer($arr)
    {
        $this->m->addServer($arr);
    }

    public function s($key,$value = '', $time = NULL)
    {
        $number = func_num_args();
        if($number == 1)
        {
            //get
            return $this->get($key);
        } else if ($number >= 2){
            if($value === NULL){
                //delete
                $this->delete($key);
            } else {
                //set
                $this->set($key,$value,$time);
            }
        }
    }

    private function set($key, $value, $time = NULL)
    {
        if($time === NULL){
            $time = $this->time;
        }
        $this->m->get($key,$value);
        if($this->m->getResultCode() != 0){
            return false;
        }
    }

    private function get(){
        return $this->m->get($key);
        if($this->m->getResultCode() != 0){
            return false;
        } else {
            return $return;
        }
    }

    private function delete($key)
    {
        $this->m->delete($key);
    }

    public function getError()
    {
        if($this->error){
            return $this->error;
        } else {
            return $this->m->getResultMessage();
        }
    }
}