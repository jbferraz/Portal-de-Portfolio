<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function ratingMaker($avaliacao, $limit)
{
    $ci =& get_instance();

    foreach ($avaliacao as $key => $value) 
        $av_split[$value->usuario_id][] = $value->avaliacoes;

    foreach ($av_split as $key => $value) {
        $size = count($value);
        //$av_split[$key] = array_sum($value)/$size;
        $av_split[$key] = bcdiv(array_sum($value), $size, 1); // Formata rate em (3) 3.000
    }

    arsort($av_split);

    if ($limit < count($av_split) && !($limit === null)) {
        $av_split = array_slice($av_split, 0, $limit, true);
    }

    $topusuario = array();
    $ct = 0;
    foreach ($av_split as $key => $value) {
        $topusuario = array_merge($topusuario, $ci->ur_m->getAllUsuarioById($key));
        $topusuario[$ct++]->rate = $value;
    }

    return $topusuario;
}