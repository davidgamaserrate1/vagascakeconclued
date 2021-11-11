<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VagasLog $vagasLog
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vagas Log'), ['action' => 'edit', $vagasLog->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vagas Log'), ['action' => 'delete', $vagasLog->id], ['confirm' => __('Tem certeza que deseja excluir a vaga # {0}?', $vagasLog->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vagas Logs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vagas Log'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vagasLogs view content">
            <h3><?= h($vagasLog->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Vaga') ?></th>
                    <td><?= $vagasLog->has('vaga') ? $this->Html->link($vagasLog->vaga->nome_vaga, ['controller' => 'Vagas', 'action' => 'view', $vagasLog->vaga->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vagasLog->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vagas Departamento Id') ?></th>
                    <td><?= $this->Number->format($vagasLog->vagas_departamento_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vagas Empresa Id') ?></th>
                    <td><?= $this->Number->format($vagasLog->vagas_empresa_id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Acao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($vagasLog->acao)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
