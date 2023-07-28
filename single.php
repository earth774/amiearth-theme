<?php
if (in_category('life')) {
    get_template_part('views/single', 'life');
} else if (in_category('dev')) {
    get_template_part('views/single', 'dev');
}
