<?php
namespace App\Model\Table;

use App\Model\Entity\PackagistVersion;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PackagistVersions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PackagistPackages
 * @property \Cake\ORM\Association\BelongsTo $CpeItems
 * @property \Cake\ORM\Association\HasMany $PackagistVersionCpeNames
 */
class PackagistVersionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('packagist_versions');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PackagistPackages', [
            'foreignKey' => 'packagist_package_id'
        ]);
        $this->belongsTo('CpeItems', [
            'foreignKey' => 'cpe_item_id'
        ]);
        $this->hasMany('PackagistVersionCpeNames', [
            'foreignKey' => 'packagist_version_id'
        ]);

        $this->belongsToMany('Cves', [
            'joinTable' => 'CvesPackagistVersions',
            'targetForeignKey' => 'cve_id'

        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('title');

        $validator
            ->allowEmpty('name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['packagist_package_id'], 'PackagistPackages'));
        $rules->add($rules->existsIn(['cpe_item_id'], 'CpeItems'));
        return $rules;
    }
}
