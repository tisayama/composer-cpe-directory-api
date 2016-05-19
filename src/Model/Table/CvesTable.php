<?php
namespace App\Model\Table;

use App\Model\Entity\Cve;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cves Model
 *
 * @property \Cake\ORM\Association\HasMany $CveAffectedProductCpes
 */
class CvesTable extends Table
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

        $this->table('cves');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CveAffectedProductCpes', [
            'foreignKey' => 'cve_id'
        ]);

        $this->belongsToMany('PackagistVersions',
            [
                'joinTable' => 'CvesPackagistVersions',
                'foreignKey' => 'cve_id'

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
            ->allowEmpty('cve_name');

        $validator
            ->allowEmpty('summary');

        $validator
            ->allowEmpty('cvss_v2_score');

        $validator
            ->allowEmpty('cvss_v2_source');

        $validator
            ->dateTime('cvss_v2_generated_on')
            ->allowEmpty('cvss_v2_generated_on');

        $validator
            ->allowEmpty('cvss_v3_score');

        $validator
            ->allowEmpty('cvss_v3_source');

        $validator
            ->dateTime('cvss_v3_generated_on')
            ->allowEmpty('cvss_v3_generated_on');

        $validator
            ->boolean('disabled')
            ->allowEmpty('disabled');

        $validator
            ->dateTime('published')
            ->allowEmpty('published');

        $validator
            ->dateTime('last_modified')
            ->allowEmpty('last_modified');

        return $validator;
    }
}
