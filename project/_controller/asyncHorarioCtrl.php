<?php
include 'grupo_horarioModel.php';
class AsyncHorarioCtrl {
    public function get_horario_plan_semestre($plan, $semestre, $turno) {
        $model = new Grupo_Horario();
        if($turno == 'Mix') {
            return Array(
                'detalles' => $model->get_horarios_plan_semestre($plan, $semestre),
                'grupos' => $model->get_grupos($plan, $semestre) 
            );
        } else {
            return Array(            
                'detalles' => $model->get_horario_turno($plan, $semestre, $turno),
                'grupos' => $model->get_grupos_turno($plan, $semestre, $turno) 
            );
        }
    }
    public function get_horario_grupo($plan, $grupo){
        $model = new Grupo_Horario();
        return $model->get_horario_grupo($plan, $grupo);
    }
}