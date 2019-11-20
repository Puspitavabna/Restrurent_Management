<?php
function get_food_image_path($name = '')
{
    return asset('/uploads/food/image' . $name);
}
?>