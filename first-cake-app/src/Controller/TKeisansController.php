<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TKeisans Controller
 *
 * @property \App\Model\Table\TKeisansTable $TKeisans
 *
 * @method \App\Model\Entity\TKeisan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TKeisansController extends AppController
{
    public $components = [ // TODO 単数形でOK（コンポーネントは単数）
        'TKeisan',
        'User',
        'Category'
    ];
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // $tKeisans = $this->paginate($this->TKeisans);
        // $tKeisans2 = $this->paginate($this->TKeisans);
        $tKeisans = $this->TKeisan->getTkeisan();
        $tKeisans = $this->paginate($tKeisans);
        $this->set(compact('tKeisans'));
    }

    /**
     * View method
     *
     * @param string|null $id T Keisan id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tKeisan = $this->TKeisan->getTkeisanDetail($id);
        $this->set('tKeisan', $tKeisan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // -------- データ取得 -------- //
        $tKeisan = $this->TKeisans->newEntity();
        // ユーザーデータ取得 // TODO あとで対応する
        $users = $this->User->getAllUser();
        // カテゴリー連携
        $categories = $this->Category->getAllList();

        if ($this->request->is('post')) {
            $tKeisan = $this->TKeisans->patchEntity($tKeisan, $this->request->getData());
            if ($this->TKeisans->save($tKeisan)) {
                $this->Flash->success(__('The t keisan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('登録が正常に完了しませんでした。'));
        }
        // -------- データセット -------- //
        $this->set(compact('tKeisan'));
        $this->set(compact('users'));
        $this->set(compact('categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id T Keisan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // 計算データ
        $tKeisan = $this->TKeisans->get($id, [
            'contain' => [],
        ]);
        // ユーザーデータ取得 // TODO あとで対応する
        $users = $this->User->getAllUser();

        // カテゴリー連携
        $categories = $this->Category->getAllList();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $tKeisan = $this->TKeisans->patchEntity($tKeisan, $this->request->getData());
            if ($this->TKeisans->save($tKeisan)) {
                $this->Flash->success(__('登録完了です。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The t keisan could not be saved. Please, try again.'));
        }
        $this->set(compact('tKeisan'));
        
        // ユーザーデータ追加
        $this->set(compact('users'));
        // カテゴリー連携
        $this->set(compact('categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id T Keisan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tKeisan = $this->TKeisans->get($id);
        if ($this->TKeisans->delete($tKeisan)) {
            $this->Flash->success(__('The t keisan has been deleted.'));
        } else {
            $this->Flash->error(__('The t keisan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
