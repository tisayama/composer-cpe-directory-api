<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CpeItemReference Entity.
 *
 * @property int $id
 * @property int $cpe_item_id
 * @property \App\Model\Entity\CpeItem $cpe_item
 * @property string $title
 * @property string $href
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class CpeItemReference extends Entity
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
