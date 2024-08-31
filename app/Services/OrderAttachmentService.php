<?php

namespace App\Services;

use App\Models\OrderAttachment;

/**
 * Class OrderAttachmentService.
 */
class OrderAttachmentService
{
    public static function getAttachment($order_id)
    {
        return OrderAttachment::where('order_id', $order_id)->get();
    }

    public static function store($order_id, $attachments)
    {
        foreach ($attachments as $attachment) {
            $filename = time() . '_' . $attachment->getClientOriginalName();
            $attachment->storeAs('public/order/attachment', $filename, 'uploads');

            OrderAttachment::create([
                'order_id' => $order_id,
                'attachment' => $filename,
            ]);
        }
    }
}
