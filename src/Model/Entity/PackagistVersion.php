<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PackagistVersion Entity.
 *
 * @property int $id
 * @property int $packagist_package_id
 * @property \App\Model\Entity\PackagistPackage $packagist_package
 * @property string $title
 * @property string $name
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $cpe_item_id
 * @property \App\Model\Entity\CpeItem $cpe_item
 * @property \App\Model\Entity\PackagistVersionCpeName[] $packagist_version_cpe_names
 */
class PackagistVersion extends Entity
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
