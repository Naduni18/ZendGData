<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   ZendGData
 */

namespace ZendGData\Calendar\Extension;

/**
 * Represents the gCal:accessLevel element used by the Calendar data API
 *
 * @category   Zend
 * @package    ZendGData
 * @subpackage Calendar
 */
class AccessLevel extends \ZendGData\Extension
{

    protected $_rootNamespace = 'gCal';
    protected $_rootElement = 'accesslevel';
    protected $_value = null;

    /**
     * Constructs a new ZendGData\Calendar\Extension\AccessLevel object.
     * @param string $value (optional) The text content of the element.
     */
    public function __construct($value = null)
    {
        $this->registerAllNamespaces(\ZendGData\Calendar::$namespaces);
        parent::__construct();
        $this->_value = $value;
    }

    /**
     * Retrieves a DOMElement which corresponds to this element and all
     * child properties.  This is used to build an entry back into a DOM
     * and eventually XML text for sending to the server upon updates, or
     * for application storage/persistence.
     *
     * @param DOMDocument $doc The DOMDocument used to construct DOMElements
     * @return DOMElement The DOMElement representing this element and all
     * child properties.
     */
    public function getDOM($doc = null, $majorVersion = 1, $minorVersion = null)
    {
        $element = parent::getDOM($doc, $majorVersion, $minorVersion);
        if ($this->_value != null) {
            $element->setAttribute('value', $this->_value);
        }
        return $element;
    }

    /**
     * Given a DOMNode representing an attribute, tries to map the data into
     * instance members.  If no mapping is defined, the name and value are
     * stored in an array.
     *
     * @param DOMNode $attribute The DOMNode attribute needed to be handled
     */
    protected function takeAttributeFromDOM($attribute)
    {
        switch ($attribute->localName) {
        case 'value':
            $this->_value = $attribute->nodeValue;
            break;
        default:
            parent::takeAttributeFromDOM($attribute);
        }
    }

    /**
     * Get the value for this element's value attribute.
     *
     * @return string The attribute being modified.
     */
    public function getValue()
    {
        return $this->_value;
    }


    /**
     * Set the value for this element's value attribute.
     *
     * @param string $value The desired value for this attribute.
     * @return \ZendGData\Calendar\Extension\Selected The element being modified.
     */
    public function setValue($value)
    {
        $this->_value = $value;
        return $this;
    }

    /**
     * Magic toString method allows using this directly via echo
     * Works best in PHP >= 4.2.0
     */
    public function __toString()
    {
        return $this->getValue();
    }

}
