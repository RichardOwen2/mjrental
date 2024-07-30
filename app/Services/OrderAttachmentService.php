<?php

namespace App\Services;

use App\Models\OrderAttachment;

/**
 * Class OrderAttachmentService.
 */
class OrderAttachmentService
{
    public static function store($order_id, $attachments)
    {
        foreach ($attachments as $attachment) {
            $filename = time() . '_' . $attachment->getClientOriginalName();
            $attachment->storeAs('public/product/attachment', $filename);

            OrderAttachment::create([
                'order_id' => $order_id,
                'attachment' => $filename,
            ]);
        }
    }
}
