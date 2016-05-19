<?php
namespace App\Model\Table;

use App\Model\Entity\CpeItem;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CpeItems Model
 *
 * @property \Cake\ORM\Association\HasMany $CpeItemReferences
 * @property \Cake\ORM\Association\HasMany $PackagistVersions
 */
class CpeItemsTable extends Table
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

        $this->table('cpe_items');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CpeItemReferences', [
            'foreignKey' => 'cpe_item_id',
            'dependent' => true
        ]);

        $this->hasMany('PackagistVersions', [
            'foreignKey' => 'cpe_item_id',
            'dependent' => false
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

        return $validator;
    }
}
