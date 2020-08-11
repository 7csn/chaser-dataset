<?php

namespace chaser\dataset;

/**
 * 自由数据包特征
 *
 * @package chaser\dataset
 */
trait Packet
{
    use PacketCollective, PacketReducible;

    /**
     * 修改数据
     *
     * @param string $name
     * @param mixed $value
     */
    public function setSingleData(string $name, $value)
    {
        $this->dataPackage[$name] = $value;
    }
}
