<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/analytics/data/v1beta/data.proto

namespace Google\Analytics\Data\V1beta;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Current state for a particular quota group.
 *
 * Generated from protobuf message <code>google.analytics.data.v1beta.QuotaStatus</code>
 */
class QuotaStatus extends \Google\Protobuf\Internal\Message
{
    /**
     * Quota consumed by this request.
     *
     * Generated from protobuf field <code>optional int32 consumed = 1;</code>
     */
    private $consumed = null;
    /**
     * Quota remaining after this request.
     *
     * Generated from protobuf field <code>optional int32 remaining = 2;</code>
     */
    private $remaining = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $consumed
     *           Quota consumed by this request.
     *     @type int $remaining
     *           Quota remaining after this request.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Analytics\Data\V1Beta\Data::initOnce();
        parent::__construct($data);
    }

    /**
     * Quota consumed by this request.
     *
     * Generated from protobuf field <code>optional int32 consumed = 1;</code>
     * @return int
     */
    public function getConsumed()
    {
        return isset($this->consumed) ? $this->consumed : 0;
    }

    public function hasConsumed()
    {
        return isset($this->consumed);
    }

    public function clearConsumed()
    {
        unset($this->consumed);
    }

    /**
     * Quota consumed by this request.
     *
     * Generated from protobuf field <code>optional int32 consumed = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setConsumed($var)
    {
        GPBUtil::checkInt32($var);
        $this->consumed = $var;

        return $this;
    }

    /**
     * Quota remaining after this request.
     *
     * Generated from protobuf field <code>optional int32 remaining = 2;</code>
     * @return int
     */
    public function getRemaining()
    {
        return isset($this->remaining) ? $this->remaining : 0;
    }

    public function hasRemaining()
    {
        return isset($this->remaining);
    }

    public function clearRemaining()
    {
        unset($this->remaining);
    }

    /**
     * Quota remaining after this request.
     *
     * Generated from protobuf field <code>optional int32 remaining = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setRemaining($var)
    {
        GPBUtil::checkInt32($var);
        $this->remaining = $var;

        return $this;
    }

}
