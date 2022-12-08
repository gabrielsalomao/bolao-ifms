<?php
function renderErrors($errors)
{
    $alerElement = '';
    $liElements = '';

    foreach ($errors as $error) {
        $liElements .= '<li>' . $error . '</li>';
    }

    $alerElement .= '<div
            class="alert alert-danger"
            role="alert"
         >
            <ul class="mb-0">'
        . $liElements .
        '   </ul>
        </div>';

    return $alerElement;
}

?>