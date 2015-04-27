<?php

foreach ($list_data_komentar as $value) {
    echo '<pre><strong>'.$value->username.'</strong>&nbsp;:&nbsp;' . $value->komentar . '</pre>';
}
?>
