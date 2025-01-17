<?php
include 'planModel.php';
include 'mapaModel.php';
class AsyncPlanCtrl {
    public static function get_plan_carrera($carrera) {
        return Array (
            'planes' => Plan::get_plan_carrera($carrera),
            'semestres' => Plan::get_semestre_carrera($carrera)
        );
    }
    public static function get_mapa_curricular($plan, $carrera) {
        $model = new MapaCurricular();
        $mapa = $model->get_mapa_curricular($plan, $carrera);
        return $mapa;
    }
}