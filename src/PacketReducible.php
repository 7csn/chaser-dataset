<?php

namespace chaser\dataset;

/**
 * 自由数据包可删减特征
 *
 * @package chaser\dataset
 */
trait PacketReducible
{
    /**
     * 删除单个数据
     *
     * @param string $name
     */
    protected function delSingleData(string $name)
    {
        unset($this->dataPackage[$name]);
    }

    /**
     * 批量删除数据
     *
     * @param string ...$names
     */
    protected function delMultipleData(string ...$names)
    {
        array_walk($names, [$this, 'delSingleData']);
    }

    /**
     * 清空数据包
     */
    protected function clearAllData()
    {
        $this->dataPackage = [];
    }
}
