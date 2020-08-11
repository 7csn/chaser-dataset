<?php

namespace chaser\dataset\autism;

use chaser\dataset\PacketReducible;

/**
 * 封闭数据包类
 *
 * @package chaser\dataset\autism
 */
class Application
{
    use Packet, PacketAddable, PacketReducible;

    /**
     * 数据包
     *
     * @var array
     */
    protected $dataPackage = [];
}
