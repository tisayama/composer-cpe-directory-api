<?php
namespace App\Model\Table;

use App\Model\Entity\PackagistPackage;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PackagistPackages Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PackagistVendors
 * @property \Cake\ORM\Association\HasMany $PackagistPackageCpeNames
 * @property \Cake\ORM\Association\HasMany $PackagistVersions
 */
class PackagistPackagesTable extends Table
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

        $this->table('packagist_packages');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PackagistVendors', [
            'foreignKey' => 'packagist_vendor_id'
        ]);
        $this->hasMany('PackagistPackageCpeNames', [
            'foreignKey' => 'packagist_package_id'
        ]);
        $this->hasMany('PackagistVersions', [
            'foreignKey' => 'packagist_package_id'
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
        $rules->add($rules->existsIn(['packagist_vendor_id'], 'PackagistVendors'));
        return $rules;
    }
}
