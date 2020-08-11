<?php

namespace chaser\dataset\autism;

/**
 * 数据包可添加特征
 *
 * @package chaser\dataset\autism
 */
trait PacketAddable
{
    /**
     * 新增单个数据
     *
     * @param string $name
     * @param mixed $value
     */
    protected function addSingleData(string $name, $value)
    {
        $this->dataPackage[$name] = $value;
    }

    /**
     * 批量新增数据
     *
     * @param array $data
     */
    protected function addMultipleData(array $data)
    {
        array_walk($data, function ($value, $name) {
            $this->dataPackage[$name] = $value;
        });
    }
}
