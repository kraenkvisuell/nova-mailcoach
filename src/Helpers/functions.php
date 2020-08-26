<?php

use OptimistDigital\MediaField\Models\Media;

function mailcoachGetMediaUrl($id)
{
    return optional(Media::find($id))->url;
}
