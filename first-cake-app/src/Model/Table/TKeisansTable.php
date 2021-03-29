<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TKeisans Model
 *
 * @method \App\Model\Entity\TKeisan get($primaryKey, $options = [])
 * @method \App\Model\Entity\TKeisan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TKeisan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TKeisan|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TKeisan saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TKeisan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TKeisan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TKeisan findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TKeisansTable extends Table
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

        $this->setTable('t_keisans');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('userId')
            ->allowEmptyString('userId');

        // $validator
        //     ->dateTime('targetDate')
        //     ->allowEmptyDateTime('targetDate');

        $validator
            ->scalar('category')
            ->maxLength('category', 20)
            ->allowEmptyString('category');

        $validator
            ->scalar('sum')
            ->maxLength('sum', 20)
            ->allowEmptyString('sum');

        $validator
            ->scalar('koumoku')
            ->maxLength('koumoku', 20)
            ->allowEmptyString('koumoku');

        return $validator;
    }
}
