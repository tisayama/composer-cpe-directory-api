<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cve Entity.
 *
 * @property int $id
 * @property string $title
 * @property string $cve_name
 * @property string $summary
 * @property string $cvss_v2_score
 * @property string $cvss_v2_source
 * @property \Cake\I18n\Time $cvss_v2_generated_on
 * @property string $cvss_v3_score
 * @property string $cvss_v3_source
 * @property \Cake\I18n\Time $cvss_v3_generated_on
 * @property bool $disabled
 * @property \App\Model\Entity\CveAffectedProductCpe[] $cve_affected_product_cpes
 * @property \Cake\I18n\Time $published
 * @property \Cake\I18n\Time $last_modified
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Cve extends Entity
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
