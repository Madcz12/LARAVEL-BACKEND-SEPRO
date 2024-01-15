<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'sector',
        'empresa',
        'nombre_proyecto',
        'objetivo',
        'estudio',
        'alcance',
        'monto_inicial',
        'tipo_financiamiento',
        'financiamiento',
        'nudos_criticos',
        'base',
        'plan',
        'recomendaciones',
        'tecnologia',
        'gerente',
        'ubi_tech',
        'cronograma',
        'permisos',
        'gestion_adquisicion_lp',
        'diseno_basico',
        'contratacion',
        'infraestructura',
        'aseguramiento_tec',
        'plan_ejecucion',
        'procura',
        'construccion',
        'avance_financiero',
        'avance_doc',
        'equipos_vacio',
        'pruebas_arranque',
        'training_personal',
        'pruebas_garantia',
        'acep_provisional',
        'test_accept',
        'manuales_op',
        'manuales_mant',
        'planos_construidos',
        'acep_final',
        'cierre_contrato',
        'transfer_actives',
        'transfer_warrants',
    ];
}
