<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VagasAlteradas Model
 *
 * @property \App\Model\Table\VagasTable&\Cake\ORM\Association\BelongsTo $Vagas
 *
 * @method \App\Model\Entity\VagasAlterada newEmptyEntity()
 * @method \App\Model\Entity\VagasAlterada newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\VagasAlterada[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VagasAlterada get($primaryKey, $options = [])
 * @method \App\Model\Entity\VagasAlterada findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\VagasAlterada patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VagasAlterada[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VagasAlterada|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VagasAlterada saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VagasAlterada[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VagasAlterada[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\VagasAlterada[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VagasAlterada[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VagasAlteradasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('vagas_alteradas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Vagas', [
            'foreignKey' => 'vaga_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nome')
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('acao')
            ->requirePresence('acao', 'create')
            ->notEmptyString('acao');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('vaga_id', 'Vagas'), ['errorField' => 'vaga_id']);

        return $rules;
    }
}
