<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PackagistPackage Entity.
 *
 * @property int $id
 * @property int $packagist_vendor_id
 * @property \App\Model\Entity\PackagistVendor $packagist_vendor
 * @property string $title
 * @property string $name
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\PackagistPackageCpeName[] $packagist_package_cpe_names
 * @property \App\Model\Entity\PackagistVersion[] $packagist_versions
 */
class PackagistPackage extends Entity
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
