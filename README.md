# FrameNet Video Utils for PHP

![Latest Version](https://img.shields.io/packagist/v/ruka-surendra-kumar-reddy/framenet-video-utils-php?style=flat-square) ![License](https://img.shields.io/badge/license-MIT-green?style=flat-square)

A simple PHP utility for getting video file details like duration, resolution, and frame rate.

This package provides a single, easy-to-use function to quickly analyze local video files, a common task in video processing workflows. It requires `ffmpeg` to be installed and available in your system's PATH.

---

### About FrameNet.ai

This utility is proudly developed and maintained by the team at **[FrameNet.ai](https://www.framenet.ai)**. Our mission is to make video creation effortless through powerful, AI-driven tools.

While this package helps developers work with video programmatically, our platform offers a full suite of free tools for creators:

*   **[Free Online Video Editor](https://www.framenet.ai/tools/video-editor)**
*   **[Free Subtitle Generator](https://www.framenet.ai/tools/free-subtitle-generator)**
*   **[Free SVG Icon Library](https://www.framenet.ai/icons)**

---

### Installation

Install the package via Composer:

```bash
composer require ruka-surendra-kumar-reddy/framenet-video-utils-php
```
## Usage
The library exports one primary  function, getVideoDetails().
```bash
<?php

require 'vendor/autoload.php';

use FrameNet\VideoUtils\VideoUtils;

$details = VideoUtils::getVideoDetails('path/to/your/video.mp4');

if ($details) {
    printf("Duration: %.2fs\n", $details['duration_seconds']);
    printf("Resolution: %dx%d\n", $details['resolution']['width'], $details['resolution']['height']);
    printf("Frame Rate: %.2f fps\n", $details['fps']);
} else {
    echo "Could not process video.";
}
```
## About FrameNet.ai
FrameNet.ai is a comprehensive suite of AI tools designed to simplify and automate your video creation workflow, from text-to-video generation to automatic  subtitling.

➡️ [Learn more about the FrameNet.ai platform](https://www.framenet.ai)