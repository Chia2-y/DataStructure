<?php
class SimpleQueue
{
    private $_queue = [];
    private $_size = 0;

    public function __construct($size = 10){
        $this->_size = $size;
    }

    //入列
    public function enqueue($value)
    {
        if(count($this->_queue) > $this->_size){
            return false;
        }
        array_push($this->_queue,$value);
    }

    //出列
    public function dequeue()
    {
        if(count($this->_queue) == 0){
            return false;
        }
        return array_shift($this->_queue);
    }

    public function size()
    {
        return count($this->_queue);
    }

    public function queue()
    {
        return $this->_queue;
    }
}

$queue = new SimpleQueue(10);
$queue->enqueue(1);
$queue->enqueue(3);
$queue->enqueue(5);
var_dump($queue->dequeue());
var_dump($queue->dequeue());
var_dump($queue->size());
var_dump($queue->queue());



