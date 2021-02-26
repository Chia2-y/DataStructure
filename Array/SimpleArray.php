<?php

class SimpleArray
{
    //数据
    private $_data;
    //空间
    private $_size;
    //长度
    private $_length;

    public function __construct($size = 10)
    {
        $this->_size = $size;

        $this->_data = [];

        $this->_length = 0;
    }

    /**
     * 是否已满
     * @return bool
     */
    private function checkArrFull()
    {
        if ($this->_length == $this->_size) {
            return true;
        }
        return false;
    }

    /**
     * 是否越界
     * @param $index
     * @return bool
     */
    private function checkArrRange($index)
    {
        if ($index >= ($this->_size - 1)) {
            return true;
        }
        return false;
    }

    /**
     * 插入
     * @param $index
     * @param $value
     * @return int
     */
    public function insert($index, $value)
    {
        $index = (int)$index;
        $value = (int)$value;

        if ($index < 0) {
            return 1001;
        }
        if ($this->checkArrFull()) {
            return 1002;
        }
        if ($this->checkArrRange($index)) {
            return 1003;
        }

        for ($i = $this->_length - 1; $i >= $index; $i--) {
            $this->_data[$i + 1] = $this->_data[$i];
        }
        $this->_data[$index] = $value;
        $this->_length++;
        return 1000;
    }

    /**
     * 删除
     * @param $index
     * @param int $value
     * @return array|int[]
     */
    public function delete($index, $value = 0)
    {
        $index = (int)$index;
        $value = (int)$value;
        if ($index < 0) {
            $code = 1001;
            return [$code, $value];
        }

        if ($this->checkArrRange($index)) {
            $code = 1003;
            return [$code, $value];
        }

        $value = $this->_data[$index];
        for ($i = $index; $i < $this->_length - 1; $i++) {
            $this->_data[$i] = $this->_data[$i + 1];
        }
        $this->_length--;
        return [1000, $value];
    }

    public function find($index)
    {
        $index = (int)$index;
        $value = 0;
        if ($index < 0) {
            $code = 1001;
            return [$code, $value];
        }
        if ($this->checkArrRange($index)) {
            $code = 1003;
            return [$code, $value];
        }

        return [1000, $this->_data[$index]];
    }

    public function dd()
    {
        $format = '';
        for ($i = 0; $i < $this->_length; $i++) {
            $format .= '|' . $this->_data[$i];
        }
        print(trim($format,'|') . PHP_EOL);
    }

}
