<?php
class DataManager_model extends CI_Model {

    private $tblProcessProject = 'relacion_indicadores_proceso';
    private $tblProject = 'relacion_indicadores';
    private $tblProjectHistory = 'relacion_indicadores_historico';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function saveIndicador($record) {
        if ($record) {
            $this->saveCurrent($record);
            $this->saveHistory($record);
        }
    }

    function saveCurrent($record) {
        if ($record) {
            $this->db->set('idProceso', $record["idProceso"]);
            $this->db->set('idEmpresa', $record["idEmpresa"]);
            $this->db->set('idIndicador', $record["idIndicador"]);
            $this->db->set('valorIndicador', $record["valorIndicador"]);
            $this->db->insert($this->tblProject);
            return $this->db->insert_id();
        }
    }

    function saveHistory($record) {
        if ($record) {
            $this->db->set('idProceso', $record["idProceso"]);
            $this->db->set('idEmpresa', $record["idEmpresa"]);
            $this->db->set('idIndicador', $record["idIndicador"]);
            $this->db->set('valorIndicador', $record["valorIndicador"]);
            $this->db->insert($this->tblProjectHistory);
            return $this->db->insert_id();
        }
    }

    function saveProceso() {
        $this->db->set('id', null);
        $this->db->insert($this->tblProcessProject);
        return $this->db->insert_id();
    }

    function delIndicador($idEmpresa = 0, $idIndicador = 0) {
        $this->db->where('idEmpresa', $idEmpresa);
        $this->db->where('idIndicador', $idIndicador);
        $this->db->delete($this->tblProject);
    }

    function getTasasHistorico($idEmpresa = 0, $idIndicador = 0) {
        $this->db->select("valorIndicador, (YEAR(fechaRegistro)) as ano, (MONTH(fechaRegistro)) as mes, DAY(fechaRegistro) as dia");
        $this->db->where('idEmpresa', $idEmpresa);
        $this->db->where('idIndicador', $idIndicador);
        $this->db->where('idProceso > 0');
        $this->db->where('valorIndicador > 0');
        $this->db->group_by('valorIndicador');
        $this->db->group_by('ano');
        $this->db->group_by('mes');
        $this->db->group_by('dia');
        $this->db->order_by("fechaRegistro", "asc");
        $tasas = $this->db->get($this->tblProjectHistory)->result();

        $result = "";
        $result = $result . "[";
        foreach ($tasas as $tasa) {
            $result = $result . "[Date.UTC(" . $tasa->ano . "," . ($tasa->mes - 1) . "," . $tasa->dia . ")," . $tasa->valorIndicador . "],";
        }
        $result = $result . "];";
        return $result;
    }

    function getTasas($idIndicador = 0) {
		$tasasReturn = null;
        $orderby = "asc";
        if ($idIndicador == 1 || $idIndicador == 3) {
            $orderby = "desc";
        } else if ($idIndicador == 2 || $idIndicador == 4) {
            $orderby = "asc";
        } else if ($idIndicador == 6 || $idIndicador == 7 || $idIndicador == 8 || $idIndicador == 9) {
            $orderby = "desc";
        }

        $this->db->where('idIndicador', $idIndicador);
        $this->db->where('idProceso > 0');
        $this->db->where('valorIndicador > 0');

        $this->db->group_by("idEmpresa");

        $this->db->order_by("idProceso", "asc");
        $this->db->order_by("idIndicador", "asc");
        $this->db->order_by("valorIndicador", $orderby);
        $tasas = $this->db->get($this->tblProject)->result();

		if (count($tasas) > 0){
			
			foreach ($tasas as $tasa) {
				$tasa->nombreEmpresa = $this->getEmpresaName($tasa->idEmpresa);
				$tasa->nombreIndicador = $this->getIndicadorField($tasa->idIndicador, 'nombreIndicador');
				$tasa->formaCalculo = $this->getIndicadorField($tasa->idIndicador, 'formaCalculo');
				$tendencia = $this->getTendencia($tasa->idEmpresa, $idIndicador);
				$tasa->score = $this->getComentariosScore($tasa->idEmpresa);
				if ($tendencia == "up") {
					$tasa->tendencia = $tendencia; //"é";
					$tasa->color = "green";
					if ($tasa->formaCalculo == 'masesmejor'){
						$tasa->tendenciaVal = -1;
					} elseif ($tasa->formaCalculo == 'menosesmejor'){
						$tasa->tendenciaVal = 1;
					} else {
						$tasa->tendenciaVal = -1;
					}
				} elseif ($tendencia == "down") {
					$tasa->tendencia = $tendencia; //"ê";
					$tasa->color = "red";
					if ($tasa->formaCalculo == 'masesmejor'){
						$tasa->tendenciaVal = 1;
					} elseif ($tasa->formaCalculo == 'menosesmejor'){
						$tasa->tendenciaVal = -1;
					} else {
						$tasa->tendenciaVal = 1;
					}
				} else {
					$tasa->tendencia = "";
					$tasa->color = "";
					if ($tasa->formaCalculo == 'masesmejor'){
						$tasa->tendenciaVal = 0;
					} elseif ($tasa->formaCalculo == 'menosesmejor'){
						$tasa->tendenciaVal = 0;
					} else {
						$tasa->tendenciaVal = 0;
					}
				}
			}
			
			$tasasReturn = $this->sortArray($tasas, $tasa->formaCalculo, array('score', 'valorIndicador', 'tendenciaVal'));
			
			//print_r($tasasReturn);
		
		}
		
        return $tasasReturn;
    }

	function sortArray() {
		//get args of the function 
		$args = func_get_args();
		$c = count($args);
		if ($c < 2) {
			return false;
		}
		//get the array to sort 
		$array = array_splice($args, 0, 1);
		print_r($array);
		$formaCalculo = array_splice($args, 1, 1);
		$arrayArgs = array_splice($args, 2, 1);
		$array = $array[0];
		$formaCalculo = $formaCalculo[0];
		//sort with an anoymous function using args 
		usort($array, function($a, $b) use($arrayArgs) {
					$i = 0;
					$c = count($arrayArgs);
					$cmp = 0;
					while ($cmp == 0 && $i < $c) {
						$field = $arrayArgs[$i];
						if ($field == 'score' || $field == 'tendenciaVal'){
							$cmp = strcmp($b->$field, $a->$field);
						} else {
							$cmp = strcmp($a->$field, $b->$field);
						}
						
						$i++;
					}
					return $cmp;
				});
		echo("/**********************************************************************************/");
		print_r($array);
		return $array;
	}

    function getEmpresas($idTipoEmpresa = 1) {
        $this->db->order_by("nombreEmpresa", "asc");
        $this->db->where('tipoEmpresa', $idTipoEmpresa);
        $this->db->where('estadoEmpresa', 'A');
        $empresas = $this->db->get('empresas')->result();
        return $empresas;
    }

    function getEmpresasIds($idTipoEmpresa = 1) {
        $this->db->order_by("id", "asc");
        $this->db->where('tipoEmpresa', $idTipoEmpresa);
        $this->db->where('estadoEmpresa', 'A');
        $empresas = $this->db->get('empresas')->result();
        $empresasOut = array();
        foreach ($empresas as $empresa) {
            $empresasOut[] = $empresa->id;
        }
        return $empresasOut;
    }

    function getTendencias($idTipoEmpresa = 0, $idIndicador = 0) {
        $ids = $this->getEmpresasIds($idTipoEmpresa);
        $tendenciasOut = array();
        foreach ($ids as $idEmpresa) {
            $tendencias = $this->getTendenciasRows($idEmpresa, $idIndicador);
            $tendenciaValue = array();
            $tendenciaWay = "";
            foreach ($tendencias as $tendencia) {
                $tendenciaValue[] = $tendencia->valorIndicador;
            }
            if (count($tendenciaValue) == 3) {
                if ($tendenciaValue[0] > $tendenciaValue[1] && $tendenciaValue[1] > $tendenciaValue[2]) {
                    $tendenciaWay = "up";
                } elseif ($tendenciaValue[0] < $tendenciaValue[1] && $tendenciaValue[1] < $tendenciaValue[2]) {
                    $tendenciaWay = "down";
                } else {
                    $tendenciaWay = "none";
                }
            } elseif (count($tendenciaValue) > 0 && count($tendenciaValue) <> 3) {
                $tendenciaWay = "none";
            }
            if ($tendenciaWay != "") {
                $tendenciasOut[] = $tendenciaWay;
            }
        }
        return $tendenciasOut;
    }

    function getTendencia($idEmpresa = 0, $idIndicador = 0) {
        $tendencias = $this->getTendenciasRows($idEmpresa, $idIndicador);
        $tendenciaValue = array();
        $tendenciaWay = "";
        foreach ($tendencias as $tendencia) {
            $tendenciaValue[] = $tendencia->valorIndicador;
        }
        if (count($tendenciaValue) == 3) {
            if ($tendenciaValue[0] > $tendenciaValue[1] && $tendenciaValue[1] > $tendenciaValue[2]) {
                $tendenciaWay = "up";
            } elseif ($tendenciaValue[0] < $tendenciaValue[1] && $tendenciaValue[1] < $tendenciaValue[2]) {
                $tendenciaWay = "down";
            } else {
                $tendenciaWay = "none";
            }
        } elseif (count($tendenciaValue) > 0 && count($tendenciaValue) <> 3) {
            $tendenciaWay = "none";
        }
        return $tendenciaWay;
    }

    function getTendenciasRows($idEmpresa = 1, $idIndicador = 1) {
        $this->db->select("max(id) as id, idEmpresa, idIndicador, valorIndicador");
        $this->db->where('idEmpresa', $idEmpresa);
        $this->db->where('idIndicador', $idIndicador);
        $this->db->where('idProceso > 0');
        $this->db->where('valorIndicador > 0');
        $this->db->group_by('idEmpresa');
        $this->db->group_by('idIndicador');
        $this->db->group_by('valorIndicador');
        $this->db->order_by("idEmpresa", "asc");
        $this->db->order_by("idIndicador", "asc");
        $this->db->order_by("id", "desc");
        $this->db->limit(3);
        $tendencias = $this->db->get($this->tblProjectHistory)->result();
        return $tendencias;
    }

    function getTiposEmpresas() {
        $this->db->order_by("nombreTipo", "asc");
        $this->db->where('estadoTipo', "A");
        $tipos_empresas = $this->db->get('tipos_empresas')->result();
        return $tipos_empresas;
    }

    function getTipoEmpresa($idTipoEmpresa) {
        $this->db->where('id', $idTipoEmpresa);
        $tipo_empresa = $this->db->get('tipos_empresas')->row();
        return $tipo_empresa;
    }

    function getIndicadores($idTipoEmpresa = 0) {
        $this->db->order_by("nombreIndicador", "asc");
        $this->db->where('idTipoEmpresa', $idTipoEmpresa);
        $tipos_indicadores = $this->db->get('vw_relacion_indicadores_tipos_empresas')->result();
        return $tipos_indicadores;
    }

    function getEmpresa($idEmpresa = 0) {
        $this->db->where('id', $idEmpresa);
        $empresas = $this->db->get('empresas')->row();
        return $empresas;
    }

    function getComentarios($idEmpresa = 0) {
        $this->db->where('entityId', $idEmpresa);
        $comentarios = $this->db->get('comentarios')->result();
        return $comentarios;
    }
    
    function getComentariosScore($idEmpresa = 0) {
        $result = 0;
        $this->db->select('entityId');
        $this->db->select('(ROUND(avg(score))) AS score');
        $this->db->where('entityId', $idEmpresa);
        $this->db->group_by('entityId');
        $comentarios = $this->db->get('comentarios')->row();
        if (isset($comentarios->score)){
            $result = $comentarios->score;
        }
        return $result;
    }

    function getIndicador($idIndicador = 0) {
        $this->db->where('id', $idIndicador);
        $indicadores = $this->db->get('indicadores')->row();
        return $indicadores;
    }

    function getEmpresaName($idEmpresa = 0) {
        $empresa = $this->getEmpresa($idEmpresa);
        return $empresa->nombreEmpresa;
    }

    function getIndicadorName($idIndicador = 0) {
        $indicador = $this->getIndicador($idIndicador);
        return $indicador->nombreIndicador;
    }

    function getIndicadorField($idIndicador = 0, $fieldName = "id") {
        $indicador = $this->getIndicador($idIndicador);
        return $indicador->$fieldName;
    }
}
?>