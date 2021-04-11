<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categories Model
 *
 * @method \App\Model\Entity\Category get($primaryKey, $options = [])
 * @method \App\Model\Entity\Category newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Category[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Category|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Category saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Category patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Category[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Category findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CategoriesTable extends Table
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

        $this->setTable('categories');
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
            ->scalar('categoryCd')
            ->maxLength('categoryCd', 20)
            // ->requirePresence('categoryCd', 'create');
            ->requirePresence('categoryCd', 'create')
            ->notEmptyString('categoryCd');

        $validator
            ->scalar('categoryName')
            ->maxLength('categoryName', 20)
            ->allowEmptyString('categoryName');

        $validator
            ->scalar('subCategoryName')
            ->maxLength('subCategoryName', 20)
            ->allowEmptyString('subCategoryName');

        $validator
            ->scalar('koumoku')
            ->maxLength('koumoku', 20)
            ->allowEmptyString('koumoku');

        return $validator;
    }

    /**
     *  データ取得ファンクション
     *
     * @param // なんていうオブジェクトやっけ、クエリのインスタンスみたいなやつ
     * @return Query Queyオブジェクト
     */
    public function findAllUser(Query $query): Query
    {
        return $query->select([
            'categories.categoryCd',
            'categories.categoryName',
            'categories.subCategoryName',
        ])
        ->where([
            'categories.categoryCd is not ' => null
        ])
        ->order([
            'categories.categoryCd' => 'ASC'
        ]);
    }
}
