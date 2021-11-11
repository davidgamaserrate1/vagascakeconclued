<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VagasLog $vagasLog
 * @var string[]|\Cake\Collection\CollectionInterface $vagas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vagasLog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vagasLog->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Vagas Logs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vagasLogs form content">
            <?= $this->Form->create($vagasLog) ?>
            <fieldset>
                <legend><?= __('Edit Vagas Log') ?></legend>
                <?php
                    echo $this->Form->control('vaga_id', ['options' => $vagas, 'empty' => true]);
                    echo $this->Form->control('vagas_departamento_id');
                    echo $this->Form->control('vagas_empresa_id');
                    echo $this->Form->control('acao');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
