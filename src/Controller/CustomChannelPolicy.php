<?php

// src/Channel/CustomChannelPolicy.php

namespace App\Controller;

use Symfony\Component\Notifier\Channel\ChannelInterface;
use Symfony\Component\Notifier\Channel\ChannelPolicyInterface;
use Symfony\Component\Notifier\Channel\SmsChannel;



class CustomChannelPolicy implements ChannelPolicyInterface
{
    private $smsChannel;

    public function __construct(SmsChannel $smsChannel)
    {
        $this->smsChannel = $smsChannel;
    }

    public function getChannels(string $importance): array
    {
        switch ($importance) {
            case 'urgent':
                return [$this->smsChannel];
            case 'high':
                return [$this->smsChannel]; // Add the appropriate channel for "high" importance
            case 'medium':
                return [$this->smsChannel];
            case 'low':
                return [];
            default:
                return [];
        }
    }
}