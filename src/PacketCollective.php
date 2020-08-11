<?php

namespace chaser\dataset;

/**
 * 数据包基础特性
 *
 * @package chaser\dataset
 */
trait PacketCollective
{
    /**
     * 获取数据
     *
     * @param string $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->getSingleData($name);
    }

    /**
     * 修改数据
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->setSingleData($name, $value);
    }

    /**
     * 获取单个数据
     *
     * @param string $name
     * @return null
     */
    public function getSingleData(string $name)
    {
        return $this->dataPackage[$name] ?? null;
    }

    /**
     * 批量获取数据
     *
     * @param string ...$names
     * @return array
     */
    public function getMultipleData(string ...$names)
    {
        return array_map([$this, 'getSingleData'], $names);
    }

    /**
     * 批量设置数据
     *
     * @param array $settings
     */
    public function setMultipleData(array $settings)
    {
        array_walk($settings, function ($value, $name) {
            $this->setSingleData($name, $value);
        });
    }

    /**
     * 获取全部数据
     *
     * @return array
     */
    public function getPackage()
    {
        return (array)$this->dataPackage;
    }

    /**
     * 设置单个数据
     *
     * @param string $name
     * @param mixed $value
     */
    abstract public function setSingleData(string $name, $value);
}
