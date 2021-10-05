<?php

/*
 *
 * Angle of clock hands
 *
 * */

$now = (empty($_REQUEST['time'])) ? time() : strtotime($_REQUEST['time']);
$h = intval(date("g", $now));
$m = intval(date("i", $now));
$s = intval(date("s", $now));
$h_angle = $h / 12 * 360 + ($m / 60 * 360 / 12);
$m_angle = $m / 60 * 360;
$s_angle = $s / 60 * 360;

$img_width = 860;
$img_height = 860;
$clock = imagecreatetruecolor($img_width, $img_height);
$bg_image = 'images/background.jpg';
$back = imagecreatefromjpeg($bg_image);
imagecopy($clock, $back, 0, 0, 0, 0, $img_height, $img_height);

$color_black = imagecolorallocate($clock, 0, 0, 0);
$color_red = imagecolorallocate($clock, 255, 0, 0);
$color_blue = imagecolorallocate($clock, 0, 0, 255);

imagestring($clock, 5, 10, 10, 'TIME ' . $h . ':' . $m . ':' . $s, $color_black);

$x_arc = $img_width / 2;
$y_arc = $img_height / 2;
imagesetthickness($clock, 6);
$hands_angle = abs(0.5 * (60 * $h - 11 * $m));
if ($hands_angle > 180) {
    $hands_angle = 360 - $hands_angle;
    imagearc($clock, $x_arc, $y_arc, $x_arc, $y_arc, max($h_angle, $m_angle) - 90, min($h_angle, $m_angle) - 90, $color_blue);
} else {
    imagearc($clock, $x_arc, $y_arc, $x_arc, $y_arc, min($h_angle, $m_angle) - 90, max($h_angle, $m_angle) - 90, $color_blue);
}
imagestring($clock, 5, 10, 30, 'ANGLE ' . $hands_angle, $color_blue);

imagesetthickness($clock, 0);
new_hand($h_angle, 20, 15, $color_black);
new_hand($m_angle, 40, 10, $color_black);
new_hand($s_angle, 40, 1, $color_red);

header("Content-type: image/jpeg");
imagejpeg($clock);
imagedestroy($clock);

function new_hand($angle, $length, $thickness, $color_black)
{
    global $clock;
    global $img_width;
    global $img_height;

    $length *= 10;
    $rad = $length / 2;
    $res = 1;
    $x = $img_width / 2;
    $y = $img_height / 2;
    $i = deg2rad($angle);
    $x_c = round(sin($i) * $rad * $res) + round($x);
    $y_c = -round(cos($i) * $rad * $res) + round($y);

    $rad = $thickness / 2;
    $i = deg2rad($angle - 90);
    $x_a = round(sin($i) * $rad * $res) + round($x);
    $y_a = -round(cos($i) * $rad * $res) + round($y);
    $x_b = -round(sin($i) * $rad * $res) + round($x);
    $y_b = round(cos($i) * $rad * $res) + round($y);

    $plots = array(
        $x_a, $y_a,
        $x_b, $y_b,
        $x_c, $y_c,
    );
    imagefilledpolygon($clock, $plots, 3, $color_black);
}
