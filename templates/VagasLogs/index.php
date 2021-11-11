<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VagasLog[]|\Cake\Collection\CollectionInterface $vagasLogs
 */
?>
<div class="vagasLogs index content">
    <?= $this->Html->link(__('New Vagas Log'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vagas Logs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('vaga_id') ?></th>
                    <th><?= $this->Paginator->sort('vagas_departamento_id') ?></th>
                    <th><?= $this->Paginator->sort('vagas_empresa_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vagasLogs as $vagasLog): ?>
                <tr>
                    <td><?= $this->Number->format($vagasLog->id) ?></td>
                    <td><?= $vagasLog->has('vaga') ? $this->Html->link($vagasLog->vaga->nome_vaga, ['controller' => 'Vagas', 'action' => 'view', $vagasLog->vaga->id]) : '' ?></td>
                    <td><?= $this->Number->format($vagasLog->vagas_departamento_id) ?></td>
                    <td><?= $this->Number->format($vagasLog->vagas_empresa_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vagasLog->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vagasLog->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vagasLog->id], ['confirm' => __('Deseja realmente excluir a vaga # {0}?', $vagasLog->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
