<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/analytics/data/v1beta/data.proto

namespace Google\Analytics\Data\V1beta;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The metadata for a single comparison.
 *
 * Generated from protobuf message <code>google.analytics.data.v1beta.ComparisonMetadata</code>
 */
class ComparisonMetadata extends \Google\Protobuf\Internal\Message
{
    /**
     * This comparison's resource name. Useable in [Comparison](#Comparison)'s
     * `comparison` field. For example, 'comparisons/1234'.
     *
     * Generated from protobuf field <code>string api_name = 1;</code>
     */
    private $api_name = '';
    /**
     * This comparison's name within the Google Analytics user interface.
     *
     * Generated from protobuf field <code>string ui_name = 2;</code>
     */
    private $ui_name = '';
    /**
     * This comparison's description.
     *
     * Generated from protobuf field <code>string description = 3;</code>
     */
    private $description = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $api_name
     *           This comparison's resource name. Useable in [Comparison](#Comparison)'s
     *           `comparison` field. For example, 'comparisons/1234'.
     *     @type string $ui_name
     *           This comparison's name within the Google Analytics user interface.
     *     @type string $description
     *           This comparison's description.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Analytics\Data\V1Beta\Data::initOnce();
        parent::__construct($data);
    }

    /**
     * This comparison's resource name. Useable in [Comparison](#Comparison)'s
     * `comparison` field. For example, 'comparisons/1234'.
     *
     * Generated from protobuf field <code>string api_name = 1;</code>
     * @return string
     */
    public function getApiName()
    {
        return $this->api_name;
    }

    /**
     * This comparison's resource name. Useable in [Comparison](#Comparison)'s
     * `comparison` field. For example, 'comparisons/1234'.
     *
     * Generated from protobuf field <code>string api_name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setApiName($var)
    {
        GPBUtil::checkString($var, True);
        $this->api_name = $var;

        return $this;
    }

    /**
     * This comparison's name within the Google Analytics user interface.
     *
     * Generated from protobuf field <code>string ui_name = 2;</code>
     * @return string
     */
    public function getUiName()
    {
        return $this->ui_name;
    }

    /**
     * This comparison's name within the Google Analytics user interface.
     *
     * Generated from protobuf field <code>string ui_name = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setUiName($var)
    {
        GPBUtil::checkString($var, True);
        $this->ui_name = $var;

        return $this;
    }

    /**
     * This comparison's description.
     *
     * Generated from protobuf field <code>string description = 3;</code>
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * This comparison's description.
     *
     * Generated from protobuf field <code>string description = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

}
