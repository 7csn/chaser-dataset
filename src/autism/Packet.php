<?php

namespace chaser\dataset\autism;

use chaser\dataset\PacketCollective;

/**
 * 封闭数据包特征
 *
 * @package chaser\dataset\autism
 */
trait Packet
{
    use PacketCollective;

    /**
     * 修改数据
     *
     * @param string $name
     * @param mixed $value
     */
    public function setSingleData(string $name, $value)
    {
        if (isset($this->dataPackage[$name])) {
            $this->dataPackage[$name] = $value;
        }
    }
}
