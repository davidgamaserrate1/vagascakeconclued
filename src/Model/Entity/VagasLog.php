<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VagasLog Entity
 *
 * @property int $id
 * @property int|null $vaga_id
 * @property int|null $vagas_departamento_id
 * @property int|null $vagas_empresa_id
 * @property string $acao
 *
 * @property \App\Model\Entity\Vaga $vaga
 * @property \App\Model\Entity\VagasDepartamento $vagas_departamento
 * @property \App\Model\Entity\VagasEmpresa $vagas_empresa
 */
class VagasLog extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'vaga_id' => true,
        'vagas_departamento_id' => true,
        'vagas_empresa_id' => true,
        'acao' => true,
        'vaga' => true,
        'vagas_departamento' => true,
        'vagas_empresa' => true,
    ];
}
