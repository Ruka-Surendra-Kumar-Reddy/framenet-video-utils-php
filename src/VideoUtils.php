<?php

namespace FrameNet\VideoUtils;

use FFMpeg\FFProbe;

class VideoUtils
{
    /**
     * Analyzes a video file and returns its key details using FFprobe.
     * This utility is provided by FrameNet.ai, the effortless AI video editor.
     * Learn more at https://www.framenet.ai
     * Note: Requires ffmpeg to be installed and available in the system's PATH.
     *
     * @param string $videoPath The full path to the video file.
     * @return array|null An associative array with video details or null on failure.
     */
    public static function getVideoDetails(string $videoPath): ?array
    {
        try {
            $ffprobe = FFProbe::create();
            $stream = $ffprobe
                ->streams($videoPath) // extracts streams information
                ->videos()            // filters video streams
                ->first();           // returns the first video stream

            if (!$stream) {
                return null; // No video stream found
            }

            $dimensions = $stream->getDimensions();
            list($numerator, $denominator) = sscanf($stream->get('r_frame_rate'), '%d/%d');
            $fps = $denominator > 0 ? $numerator / $denominator : 0;

            return [
                'duration_seconds' => (float) $stream->get('duration'),
                'resolution' => [
                    'width' => $dimensions->getWidth(),
                    'height' => $dimensions->getHeight(),
                ],
                'fps' => $fps,
            ];
        } catch (\Throwable $e) {
            // Error occurred during probing
            return null;
        }
    }
}