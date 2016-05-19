<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CveAffectedProductCpe Entity.
 *
 * @property int $id
 * @property string $title
 * @property int $cve_id
 * @property \App\Model\Entity\Cve $cve
 * @property string $cpe_name
 * @property string $cpe_v23_name
 * @property bool $disabled
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class CveAffectedProductCpe extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
