<?php

namespace Joshi\Abandoned\Block\Adminhtml\Grid\Column\Renderer;

use Magento\Backend\Block\Context;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\DataObject;

class Phone extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    protected $customerFactory;

    public function __construct(Context $context, array $data = array(),CustomerFactory $customerFactory) {
        $this->customerFactory = $customerFactory;
        parent::__construct($context, $data);
    }

    public function render(DataObject $row)
    {
        $customerFactory = $this->customerFactory->create();

        $customerId = $row->getcustomer_id();

        $customer = $customerFactory->load($customerId);

        $Addresses = $customer->getAddresses();

        foreach ($Addresses as $address){
            return $address->getData('telephone');
        }

    }
}