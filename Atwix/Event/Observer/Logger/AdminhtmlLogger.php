<?php
/**
 * Atwix
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 * @category    Article example
 * @package     Atwix_Event
 * @author      Atwix Core Team
 * @copyright   Copyright (c) 2016 Atwix (http://www.atwix.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Atwix\Event\Observer\Logger;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Request\Http;
use Psr\Log\LoggerInterface;


class AdminhtmlLogger implements ObserverInterface
{
    protected $_logger;

    public function __construct(
        LoggerInterface $logger
    )
    {
        $this->_logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        /** @var Http $request */
        $request = $observer->getRequest();
        $fullName = $request->getPathInfo();

        $this->_logger->info('Adminhtml: ' . $fullName);

        return $this;
    }
}
