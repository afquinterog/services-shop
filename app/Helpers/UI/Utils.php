<?php

namespace App\Helpers\UI;

use Illuminate\Support\Facades\Storage;

/**
 * Decorate service attributes to be used in the Nova interface
 */
class Utils
{
    /**
     * Format a number to display on the ui
     */
    public static function formatValue($number, $decimals=0)
    {
        return '$' . number_format($number, $decimals);
    }

    /**
     * Format a number to display on the ui
     */
    public static function formatValueReport($number, $decimals=0)
    {
        return number_format($number, $decimals);
    }

    /**
     * Format a date using the user timezone
     */
    public static function formatDate($date)
    {
        return $date->setTimezone(auth()->user()->timezone);
    }

    /**
     * Return the preview for S3 images
     */
    public static function previewImageFromS3($value)
    {
        return $value ? Storage::disk('s3')->temporaryUrl($value, now()->addMinutes(5)) : null;
    }

    /**
     * Format a number to display on the ui
     */
    public static function removeDecimalFormats($number)
    {
        return Str::of($number)->replace('.', '')->replace('$', '')->replace(',', '');
    }
}
