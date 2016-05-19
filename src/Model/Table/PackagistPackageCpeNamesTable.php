<?php
namespace App\Model\Table;

use App\Model\Entity\PackagistPackageCpeName;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PackagistPackageCpeNames Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PackagistPackages
 */
class PackagistPackageCpeNamesTable extends Table
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

        $this->table('packagist_package_cpe_names');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PackagistPackages', [
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
            ->allowEmpty('cpe_name');

        $validator
            ->allowEmpty('cpe_v23_name');

        $validator
            ->allowEmpty('source');

        $validator
            ->boolean('generated')
            ->allowEmpty('generated');

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
        return $rules;
    }
}
