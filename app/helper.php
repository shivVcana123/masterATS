<?php
if(!function_exists('format_date')){
    function format_date($date){
        return \Carbon\Carbon::createFromFormat('Y-m-d', $date);
    }
}
if(!function_exists('format_datetime')){
    function format_datetime($datetime){
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->format('d/M/Y H:i:s');
    }
}
