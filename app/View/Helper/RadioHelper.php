<?php

class RadioHelper extends AppHelper {

    function display($options = array()) {
        $options = array('options' => array('1' => 'Male', '2' => 'Female'), 'name' => 'gender');
        
        if (isset($options['options']) && !empty($options['options'])) {
            $rc = "";
            foreach ($options['options'] as $val => $option) {
                $rc .= '<label class="radio-inline" for="'.$options['name'].'-'.$val.'">';
                $rc .= '<input type="radio" name="data[Client]['.$options['name'].']" id="'.$options['name'].'-'.$val.'" value="'.$val.'" checked="checked">'.$option;
                $rc .= '</label>';
            }
            return($rc);
        }
        return(false); // No options supplied.
    }
}

?>
