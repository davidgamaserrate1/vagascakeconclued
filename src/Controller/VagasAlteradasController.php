<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * VagasAlteradas Controller
 *
 * @property \App\Model\Table\VagasAlteradasTable $VagasAlteradas
 * @method \App\Model\Entity\VagasAlterada[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VagasAlteradasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vagas'],
        ];
        $vagasAlteradas = $this->paginate($this->VagasAlteradas);

        $this->set(compact('vagasAlteradas'));
    }

    /**
     * View method
     *
     * @param string|null $id Vagas Alterada id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vagasAlterada = $this->VagasAlteradas->get($id, [
            'contain' => ['Vagas'],
        ]);

        $this->set(compact('vagasAlterada'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vagasAlterada = $this->VagasAlteradas->newEmptyEntity();
        if ($this->request->is('post')) {
            $vagasAlterada = $this->VagasAlteradas->patchEntity($vagasAlterada, $this->request->getData());
            if ($this->VagasAlteradas->save($vagasAlterada)) {
                $this->Flash->success(__('The vagas alterada has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vagas alterada could not be saved. Please, try again.'));
        }
        $vagas = $this->VagasAlteradas->Vagas->find('list', ['limit' => 200])->all();
        $this->set(compact('vagasAlterada', 'vagas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vagas Alterada id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vagasAlterada = $this->VagasAlteradas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vagasAlterada = $this->VagasAlteradas->patchEntity($vagasAlterada, $this->request->getData());
            if ($this->VagasAlteradas->save($vagasAlterada)) {
                $this->Flash->success(__('The vagas alterada has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vagas alterada could not be saved. Please, try again.'));
        }
        $vagas = $this->VagasAlteradas->Vagas->find('list', ['limit' => 200])->all();
        $this->set(compact('vagasAlterada', 'vagas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vagas Alterada id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vagasAlterada = $this->VagasAlteradas->get($id);
        if ($this->VagasAlteradas->delete($vagasAlterada)) {
            $this->Flash->success(__('The vagas alterada has been deleted.'));
        } else {
            $this->Flash->error(__('The vagas alterada could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
